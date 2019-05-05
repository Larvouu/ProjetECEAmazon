<head>
    <title>Se connecter</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='loginVendeur.css' rel='stylesheet' type='text/css'>
</head>

<?php 
    include 'navbar.php';
//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$numCarte = isset($_POST["numCarte"])? $_POST["numCarte"] : "";
$typeCarte = isset($_POST["typeCarte"])? $_POST["typeCarte"] : "";
$nomAfficheCarte = isset($_POST["nomAfficheCarte"])? $_POST["nomAfficheCarte"] : "";
$dateExpi = isset($_POST["dateExpi"])? $_POST["dateExpi"] : "";
$codeSecu = isset($_POST["codeSecu"])? $_POST["codeSecu"] : "";
 
if ( $nom=="" || $prenom=="" || $adresse=="" || $email=="" || $numCarte==""
|| $typeCarte=="" || $nomAfficheCarte=="" || $dateExpi=="" || $codeSecu=="" )
{
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>Veuillez remplir tous les champs !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginAcheteurForm.php'>Ré-essayer de se connecter</button></div></form>";
}
else //si les valeurs ont ben été set
{
    //Identifier la BDD
    $database = "eceamazon";

    //Connexion dans la BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) 
    {
        //Requete pour afficher nom, photo, img_fond du vendeur
        $sql = "SELECT nom,prenom,adresse,email,numCarte,typeCarte,nomAfficheCarte,dateExpi,codeSecu FROM acheteur WHERE email = '$email'";
        $result = mysqli_query($db_handle, $sql);
        
        //regarder s'il y a de résultat
        if (mysqli_num_rows($result) == 0) 
        {
            //l'email entré n'existe pas
            echo "<br><br><div class='bord'><br>";
            echo "<p class='titre'>l'acheteur n'a pas été trouvé dans la bdd !</p></div>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginAcheteurForm.php'>Ré-essayer de se connecter</button></div></form>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createAcheteurForm.php'>Créer un nouveau compte</button></div></form>";
        } 
        else 
        {
            echo "<br><br><div class='bord'><br>";
            echo "<p class='titre'>Connection réussie, bienvenue $prenom</p></div>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='accueil.php'>Retour à la page d'accueil</button></div></form>";
        }
        
        mysqli_close($db_handle);

    } //fin if($db_found)
    else
    {
        echo "Sorry, Database not found";
    }
  
}
?>
</div>
</div>
<br><br>
<footer>
<small>
    <p>
        Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
    </p>
</small>
</footer>

