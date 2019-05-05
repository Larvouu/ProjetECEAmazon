<head>
    <title>Créer un compte</title>
    <link href='loginVendeur.css' rel='stylesheet' type='text/css'>
</head>

<?php 

    include 'navbar.php';
//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$email = isset($_POST["email"])? $_POST["email"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$ville = isset($_POST["ville"])? $_POST["ville"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$codePostal = isset($_POST["codePostal"])? $_POST["codePostal"] : "";
$pays = isset($_POST["pays"])? $_POST["pays"] : "";
$numTel = isset($_POST["numTel"])? $_POST["numTel"] : "";
$numCarte = isset($_POST["numCarte"])? $_POST["numCarte"] : "";
$typeCarte = isset($_POST["typeCarte"])? $_POST["typeCarte"] : "";
$nomAfficheCarte = isset($_POST["nomAfficheCarte"])? $_POST["nomAfficheCarte"] : "";
$dateExpi = isset($_POST["dateExpi"])? $_POST["dateExpi"] : "";
$codeSecu = isset($_POST["codeSecu"])? $_POST["codeSecu"] : "";

$alreadyExist = false; 

if(isset($_POST["submit"]))
{
    //Si un des champs est vide 
    if ($email=="" || $mdp=="" || $nom=="" || $prenom=="" || $ville=="" || $adresse=="" || $codePostal==""|| $pays=="" || $numTel=="" || $numCarte=="" || $typeCarte=="" || $nomAfficheCarte=="" || $dateExpi=="" || $codeSecu=="")
    {
        //on affiche un message informant qu'au moins un des champs est vide
        //on invite l'utilisateur à ré-essayer de se créer un compte via un bouton
        echo "<br><br>
                <div class='bord'>
                    <br><p class='titre'>Veuillez remplir tous les champs</p>
                </div>
              <br><br>
                <div id='centrerB'>
                    <form><button id='submitB' type='submit' formaction='createAcheteurForm.php'>Ré-essayer de se créer un compte</button></form>
                </div>";
        
    }
    else
    {
        //Identifier la BDD
        $database = "eceamazon";
        //Connexion dans la BDD
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) 
        {
            //Vérifions que l'email entré (clé primaire) n'existe pas déjà dans la bdd
            $sql1 = "SELECT email, mdp, nom, prenom, ville, adresse, codePostal, pays, numTel, numCarte, typeCarte, nomAfficheCarte, dateExpi, codeSecu FROM acheteur";
            $result = mysqli_query($db_handle, $sql1);   
             
            //si la bdd est nulle
            if (mysqli_num_rows($result) == 0) 
            {
                //on affiche un message informant qu'il n'y a pas encore de compte vendeur existant
                //alors, on invite l'utilisateur à créer un compte vendeur via un bouton
                echo "<br><br><div class='bord'><br>";
                echo "<p class='titre'>il n'existe pas encore d'acheteur.</p></div>";
                echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createAcheteurForm.php'>Créer un compte</button></div></form>";
            } 
            else 
            {
                //on vérifie qu'aucun email déjà existant ne soit égal à celui entré dans le formulaire
                while ($data = mysqli_fetch_assoc($result)) 
                {
                    //si l'email entré est égal à l'un des emails déjà existant
                    if ($email==$data["email"] )
                    {
                        //on set le booléen à true 
                        $alreadyExist=true;

                        //on affiche un message informant que l'email entré existe déjà
                        //alors, on invite l'utilisateur à ré-essayer de se créer un compte vendeur via un bouton
                        echo "<br><br><div class='bord'><br>";
                        echo "<p class='titre'>l'email existe déjà dans la bdd</p></div>";
                        echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createAcheteurForm.php'>Ré-essayer de créer un compte</button></div></form>";
                    }
                    
                }

                //Si l'email entré n'existe PAS
                if($alreadyExist==false) 
                {
                    //$cpt++;
                    //requête sql permettant d'ajouter un vendeur dans la table vendeur
                    $sql2 = "INSERT INTO acheteur(email, mdp, nom, prenom, ville, adresse, codePostal, pays, numTel,
                    numCarte, typeCarte, nomAfficheCarte, dateExpi, codeSecu) values ('$email', '$mdp', '$nom', '$prenom', '$ville',
                    '$adresse','$codePostal', '$pays', '$numTel', '$numCarte', '$typeCarte', '$nomAfficheCarte', '$dateExpi', '$codeSecu')";
                
                    //on vérifie que la requête a fonctionné
                    if (mysqli_query($db_handle, $sql2)) 
                    {
                        //on affiche un message informant que le compte a été créé avec SUCCES
                        //ainsi, on invite l'utilisateur à se connecter via un bouton
                        echo "<div class='bord'>";
                        echo "<p class='titre'>Les informations du compte créé ont bien été ajoutées dans la bdd.</p>";
                        echo "</div>";

                        echo "<div id='centrerB'><br><br>
                                    <form><button id='submitB' type='submit' formaction='loginAcheteurForm.php'>Connectez vous dès maintenant</button></form>
                                </div>";

                    } 
                    else 
                    {
                        echo "Error creating database: " . mysqli_error($db_handle);
                    }
                }
                 
                
            }

        }
        else
        {
            echo "Sorry, Database not found";
        }

        //echo "NB DE FOIS QUE CA CREE UN COMPTE : ".$cpt." ";
        mysqli_close($db_handle);
    }
}

?>
