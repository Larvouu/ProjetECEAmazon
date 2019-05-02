<head>
    <title>ECE Amazon</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='admin.css' rel='stylesheet' type='text/css'>
</head>

<?php 
include 'navbar.php';
//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$email = "sarah.le@edu.ece.fr";
$pseudo = "schouketta";
//Identifier la BDD
$database = "eceamazon";

//Connexion dans la BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) 
{
    $sql = "SELECT email,pseudo,nom,photo,img_fond FROM vendeur WHERE email = '$email'";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result))
    {
        echo "<div id='nav'>
        <p style='font-size : 60px; text-align : center; color : #2c3e50'><strong>ADMIN</strong></p>
        <img id='photo' src=".$data['photo']."  alt='photo'>

        <p id='nomVendeur'>". $data['nom']."</p>

        <input id='addProductButton' type='button' value='Vendre un nouveau produit'>
        <input id='gererVendeursButton' type='button' value='Gérer les vendeurs'>
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

    mysqli_close($db_handle);
}
else
{
    echo "Sorry, Database not found";
}
?>