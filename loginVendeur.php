<head>
    <title>ECE Amazon</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='loginVendeur.css' rel='stylesheet' type='text/css'>
</head>

<?php 
    include 'navbar.php';
//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$email = isset($_POST["email"])? $_POST["email"] : "";
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
 
if ( $email=="" && $pseudo=="")
{
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>les champs n'ont pas été saisis !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
}
else if ($email=="" && isset($_POST["pseudo"]))//si le champ pseudo n'a pas été rempli
{
    
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>Le champ email est vide !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";

}
else if($pseudo=="" && isset($_POST["email"]))//si le champ email n'a pas été rempli
{
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>Le champ pseudo est vide !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
}
else //si les 2 valeurs ont ben été set
{
    //Identifier la BDD
    $database = "eceamazon";

    //Connexion dans la BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) 
   {
       $sql = "SELECT email,pseudo,photo,img_fond FROM vendeur WHERE email = '$email' ";
       $result = mysqli_query($db_handle, $sql);
       
       //regarder s'il y a de résultat
       if (mysqli_num_rows($result) == 0) 
       {
           //l'email entré n'existe pas
           echo "<br><br><div class='bord'><br>";
           echo "<p class='titre'>l'email n'a pas été trouvé dans la bdd !</p></div>";
           echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
       } 
       else 
       {
           //l'email entré a été trouvé --> Affichage de la page du vendeur
           while ($data = mysqli_fetch_assoc($result)) 
           {
            if($pseudo != $data['pseudo'])
            {
                //le pseudo entré ne correspond pas à l'email
                echo "<br><br><div class='bord'><br>";
                echo "<p class='titre'>le pseudo ne correspond pas à l'email !</p></div>";
                echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
            }
            else{

                echo "<div id='nav'>
                
                <img id='photo' src=".$data['photo']."  alt='photo'>

                <p id='pseudoVendeur'>". $data['pseudo']."</p>

                <input id='addProductButton' type='button' value='Vendre un nouveau produit'>
                </div>

                <img id='section' src=".$data['img_fond']."  alt='image_de_couverture'>
                
                <footer>
                    <small>
                        <p>
                            Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
                        </p>
                    </small>
                </footer>";
           }
        }
       }
    
       mysqli_close($db_handle);
   }
   else
   {
      echo "Sorry, Database not found";
   }

}


/*else if ($email=="" )//si le champ email n'a pas été rempli
{
    
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>Le champ email est vide !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se créer un compte</button></div></form>";

}*/
?>