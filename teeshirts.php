<html>
<head>
    <title>Tee shirts</title>
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
                <h1>Nos Tee-shirts </h1>
                <p>Retrouvez ici notre plus belle selection de Tshirts et impressionez vos amis avec nos Tshirts originaux !</p>
            </div>
        </div>
    </div>

    <div class="container features">
        <div class="row">

    <?php
            //Identifier la BDD
            $database = "eceamazon";

            //Connexion dans la BDD
            $db_handle = mysqli_connect('localhost', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);
           

            if ($db_found) 
            {
                
                $sql = "SELECT * FROM item WHERE categorie = 'TeeShirt' ";
                $result = mysqli_query($db_handle, $sql);
                
                //s'il n'y a de résultat
                if (mysqli_num_rows($result) == 0) 
                {
                    echo "<br><br><div class='bord'><br>";
                    echo "<p class='titre'>Erreur : Pas de résultats (select datas d'une musique)</p></div>";
                    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='accueil.php'>Retour menu</button></div></form>";
                } 
                else 
                {
                    //s'il y a bien des résulats à la requête sql
                    //On affiche chacun des items appartenant à la categorie TeeShirt
                    while ($data = mysqli_fetch_assoc($result)) 
                    {
                        echo "<div class='col-lg-4 col-md-4'>";
                            echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre du Tshirt
                            echo "<p style='text-align:center;'><img src=".$data['photo']." style='width : 230px; height:230px;' class='img-fluid'></p>"; //Photo du Tshirt   
                            echo "<p style='font-size:15px;'><strong>Description: </strong>".$data['descrip']."<br>";//Description 
                            echo "<strong>Prix:</strong> ".$data['prix']."&#8364<br>"; //Prix 
                            echo "<strong>Quantité disponible : ".$data['qteEnVente']."</strong></p>"; //Quantité disponible
                            
                            echo "
                                
                                    <form class='form-inline' method='post'>
                                    <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Taille</label>
                                    <select name='sel' class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref'>
                                        <option disabled selected>Choix...</option>
                                        <option value=".$data['tailleS'].">".$data['tailleS']."</option>
                                        <option value=".$data['tailleM'].">".$data['tailleM']."</option>
                                        <option value=".$data['tailleL'].">".$data['tailleL']."</option>
                                    </select>";

                                    ///////////////////////////////////////////
                                    //////    AJOUTER AU PANIER DEBUT   ///////
                                    ///////////////////////////////////////////
                                    echo "<input  type='submit' name='".$data['id']."' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' value='Ajouter au panier'>
                                    
                                            </form> 
                                            ";
                                    // echo "<p style='text-align:center;'><input type='submit' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' formaction='ajoutPanier.php' value='Ajouter au panier'></p>";
                                
                                    if(isset($_POST[$data['id']]) && isset($_POST['sel']))
                                    {
                                        if($data['qteEnVente'] > $data['qteAchetee'])
                                        {
                                            //Ajout panier
                                            $sql_ajout_panier = "UPDATE item SET isPanier = '1', qteAchetee=qteAchetee+'1', taille_choisie='".$_POST['sel']."'   WHERE item.id = " .$data['id']." ";
                                            if(mysqli_query($db_handle, $sql_ajout_panier)) //Si la suppression marche on le fait savoir
                                            {
                                                echo"<div class='alert alert-success'>
                                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                L'item <strong>".$data['nom']." - Taille ".$_POST['sel'].",</strong> a été ajouté au panier
                                                </div>";
                                            }
                                            else 
                                            {
                                                echo "Error creating database: " . mysqli_error($db_handle);
                                            } 
                                        }
                                    }
                                    else if((isset($_POST[$data['id']]) && !isset($_POST['sel'])) )
                                    {
                                        echo"<div class='alert alert-danger'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                           Vous n'avez pas séléctionner la Taille et/ou la couleur!
                                            </div>";
                                    }


                                    ////////////////////////////////////////////
                                    //////     AJOUTER AU PANIER  FIN     //////
                                    ////////////////////////////////////////////
                           // echo "<p style='text-align:center;'><input type='submit' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' formaction='ajoutPanier.php' value='Ajouter au panier'></p>";
                        echo "</div>";
                    }
                }
                
                mysqli_close($db_handle);
            }
            else
            {
                echo "Sorry, Database not found";
            }

    ?>
    </div>
    </div><br><br>

    <footer class="footer-copyright text-center text-black-50 py-3">
        <small>
            <p>
                Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
            </p>
        </small>
    </footer>


        
</body>
</html>

<!-- Code de traitement du bouton "ajouter panier". 
     Ce code traite la Taille du vêtement que l'acheteur
     a selectionné. -->

<?php
/*
if(isset($_POST['submit']))
{       
    $option = isset($_POST['sel']) ? $_POST['sel'] : false;
    if ($option) 
    {
        echo "taille :".$_POST['sel']."";
        echo "<script>alert('".$_POST['sel']."');</script>";

    } 
    else 
    {
        echo "task option is required";
        exit; 
    }
}*/
?>