<html>
<head>
    <title>Livres</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_musique.css" rel="stylesheet" type="text/css"/>

    <!--Les deux link suivants nous servent à avoir une police de titre spéciale-->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:bold' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
</head>


<body>

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 


    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Nos Livres </h1>
                <p>Retrouvez ici tous les livres disponibles à l'achat.</p>
              
            </div>
        </div>
    </div>
    

    <div class="container features">
        <div class="row">
           
<?php
    //On précise à quelle BDD on veut accéder...
    $database = "eceamazon";

    //pour s'y connecter
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) //Si la connection est établie
    {
        //On sélectionne les attributs (seulement ceux à afficher) d'item pour les livres (WHERE)
        $sql = "SELECT * FROM item WHERE categorie = 'Livre' ";
        $result = mysqli_query($db_handle, $sql);
        
        if (mysqli_num_rows($result) == 0) //Si on a aucun résultat suite à la requette
        {
            echo "<br><br><div class='bord'><br>";
            echo "<p class='titre'>Erreur : Aucun livre en vente actuellement </p></div>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='accueil.php'>Retour menu</button></div></form>";
        } 

        else //Si la requete SQL obtient des résultats
        {
            while ($data = mysqli_fetch_assoc($result)) // = tant que la connexion est établie ?
            {
                echo "<div class='col-lg-4 col-md-4' style='text-align:center;'>";
                echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre Livre
                echo "<img src=".$data['photo']." style='width : 230px; height:230px;' class='img-fluid'>"; //Couverture Livre
                echo "<p style='font-size:20px;'><strong>Auteur: ".$data['auteur']."</strong><br>"; //Auteur Livre
                echo "<p style='font-size:15px;'><strong>Genre: </strong>".$data['descrip']."<br>";//Description Livre
                echo "<strong>Prix:</strong> ".$data['prix']."&#8364<br>"; //Prix Livre
                echo "<strong>Quantité disponible : ".$data['qteEnVente']."</strong></p>"; //Quantité disponible
                ///////////////////////////////////////////
                //////    AJOUTER AU PANIER DEBUT   ///////
                ///////////////////////////////////////////
                echo"<form action='' method='post' >";
                echo "<input  type='submit' name='".$data['id']."' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' value='Ajouter au panier'>";
                echo"</form>";
                
                if(isset($_POST[$data['id']]))
                {
                    if($data['qteEnVente'] > $data['qteAchetee'])
                    {
                        //Ajout panier
                        $sql_ajout_panier = "UPDATE item SET isPanier = '1', qteAchetee=qteAchetee+'1'  WHERE item.id = " .$data['id']." ";
                        if(mysqli_query($db_handle, $sql_ajout_panier)) //Si la suppression marche on le fait savoir
                        {
                            echo"<div class='alert alert-success'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            L'item <strong>".$data['nom']." - ".$data['auteur']."</strong> a été ajouté au panier
                            </div>";
                        }
                        else 
                        {
                            echo "Error creating database: " . mysqli_error($db_handle);
                        } 
                    }
                }
                ////////////////////////////////////////////
                //////     AJOUTER AU PANIER  FIN     //////
                ////////////////////////////////////////////
                echo "</div>";
            }

        }

        mysqli_close($db_handle);//Toujours à la fin d'une connexion de BDD
    }
    else //Si la connexion échoue
    {
        echo "Sorry, Database not found";
    }

?>
        </div>
        </div>
    <br><br>
    <footer class="footer-copyright text-center text-black-50 py-3">
        <small>
            <p>
                Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
            </p>
        </small>
    </footer>
        

        
</body>



</html>