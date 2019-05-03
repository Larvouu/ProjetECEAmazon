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

        <p id='nomVendeur'>". $data['nom']."</p>";

        /////////////////////////////////
        ///     LES TROIS BOUTONS     ///
        /////////////////////////////////
        echo "<input id='addProductButton' type='button' value='Vendre un nouveau produit'>
        <input id='addVendeursButton' type='button' value='Ajouter un vendeur'>

        <a id='supprVendeursButton' class='button' href='supprVendeurForm.php' type='button'>Supprimer un vendeur</a>
    
        </div>

        <div id='section' style=' background: url(".$data['img_fond'].") no-repeat center; background-size: 100%;'>"; 
    }
    ///DEUXIEME WHILE
    /////////////////////////////////////////
    //Requete pour afficher les items de l'admin ( = tous les items)
    //Select les infos de l'item where l'email du vendeur = l'email de connection au compte vendeur (déjà vérifié donc déjà valide)
    $sql1 = "SELECT id, nom, photo, descrip, categorie, prix FROM item";
    $result1 = mysqli_query($db_handle, $sql1);
    if (mysqli_num_rows($result1) == 0) 
    {
        //pas de resultat1
        echo "<br><br><div class='bord'><br>";
        echo "<p class='titre'>Aucun item en vente pour le moment</p></div>";
    } 
    else 
    {
        echo "<div class='container features'>";
        echo "<div class='row'>";
        while($data1 = mysqli_fetch_assoc($result1))  
        {    
            echo "<div class='col-lg-4 col-md-4' style='text-align:center;'>";
            echo "<h3 style='text-shadow:1px 1px #000000; color : #ffffff;' class='feature-title'>".$data1['nom']."</h3>"; //Titre
            echo "<img src=".$data1['photo']." class='img-fluid'>"; //Image
            echo "<p style='font-size:15px;text-shadow:1px 1px #000000; color : #ffffff;'><strong>Description: </strong>".$data1['descrip']."<br>";//Description Livre
            echo "Prix: ".$data1['prix']."&#8364</strong></p>"; //Prix Livre

            ///////////////////////////////////////////
            //////  SUPPRESSION D UN ITEM  DEBUT //////
            ///////////////////////////////////////////
            echo "<form action='' method='post'>";
            echo "<input  type='submit' id='supprBtn' name='".$data1['id']."' value='Retirer de la vente'>";
            echo "</form>";
            
            if(isset($_POST[$data1['id']]))
            {
                //Supprime l'item
                $sql_delete = "DELETE FROM item WHERE item.id = ".$data1['id']."";
                if(mysqli_query($db_handle, $sql_delete)) //Si la suppression marche on rafraichit la page
                {
                    echo '<script>location.reload();</script>';
                }
                if (!mysqli_query($db_handle, $sql_delete)) 
                {
                    echo "Error creating database: " . mysqli_error($db_handle);
                } 
            }
            ////////////////////////////////////////////
            //////    SUPPRESSION D UN ITEM  FIN  //////
            ////////////////////////////////////////////
            echo "</div>";
        }
        echo "</div>";
    }
    mysqli_close($db_handle);
}
else
{
    echo "Sorry, Database not found";
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