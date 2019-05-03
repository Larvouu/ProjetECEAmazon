<head>
    <link href='vendeurAjoutItem.css' rel='stylesheet' type='text/css'>
</head>

<?php 
include 'navbar.php';
$email = isset($_POST["emailVendeur"])? $_POST["emailVendeur"] : "";
echo "hello $email";


//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$descrip = isset($_POST["descrip"])? $_POST["descrip"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$auteur = isset($_POST["auteur"])? $_POST["auteur"] : "";

$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";


//$cpt =0;

//booléen vaut false si l'email entré n'existe pas encore dans la bdd
$alreadyExist = false; 

if(isset($_POST["submit"]))
{
    //Si un des champs est vide 
    if ($email=="" || $pseudo=="" || $photo=="" || $img_fond=="")
    {
        //on affiche un message informant que des champs sont vides
        //on invite l'utilisateur à ré-essayer de se créer un compte via un bouton
        echo "<br><br>
                <div class='bord'>
                    <br><p class='titre'>Champ(s) vide(s) !!!</p>
                </div>
              <br><br>
                <div id='centrerB'>
                    <form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Ré-essayer de se créer un compte</button></form>
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
            $sql1 = "SELECT email FROM vendeur";
            $result = mysqli_query($db_handle, $sql1);   
             
            //si la bdd est nulle
            if (mysqli_num_rows($result) == 0) 
            {
                //on affiche un message informant qu'il n'y a pas encore de compte vendeur existant
                //alors, on invite l'utilisateur à créer un compte vendeur via un bouton
                echo "<br><br><div class='bord'><br>";
                echo "<p class='titre'>il n'existe pas encore de vendeur.</p></div>";
                echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Créer un compte</button></div></form>";
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
                        echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Ré-essayer de créer un compte</button></div></form>";
                    }
                    
                }

                //Si l'email entré n'existe PAS
                if($alreadyExist==false) 
                {
                    //$cpt++;
                    //requête sql permettant d'ajouter un vendeur dans la table vendeur
                    $sql2 = "INSERT INTO vendeur(email, pseudo, photo, img_fond) values ('$email', '$pseudo', '$photo', '$img_fond')";
                
                    //on vérifie que la requête a fonctionné
                    if (mysqli_query($db_handle, $sql2)) 
                    {
                        //on affiche un message informant que le compte a été créé avec SUCCES
                        //ainsi, on invite l'utilisateur à se connecter via un bouton
                        echo "<div class='bord'>";
                        echo "<p class='titre'>Les informations du compte créé ont bien été ajouté dans la bdd.</p>";
                        echo "</div>";

                        echo "<div id='centrerB'><br><br>
                                    <form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Connectez-vous dès maintenant !</button></form>
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