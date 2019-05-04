<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_musique.css" rel="stylesheet" type="text/css"/>
    
    <!--Les deux link suivants nous servent à avoir une police de titre spéciale-->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:bold' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
</head>


<body>

    <!--______________________________________________________________________________ -->
    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 

    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Chaussures femmes </h1>
                <p>Retrouvez ici toutes nos chaussures pour femme. Des chaussures de sport en passant par des talons élégants, vous trouverez tout ce qu'il vous faut !</p>
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
                
                $sql = "SELECT id,nom, photo, descrip, prix, tailleCh1, tailleCh2, tailleCh3, taille_choisie, couleur1, couleur2, couleur_choisie FROM item WHERE categorie = 'ChaussureF' ";
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
                        echo "<div class='col-lg-4 col-md-4'  style='text-align:center;'>";
                            echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre du Tshirt
                            echo "<p style='text-align:center;'><img src=".$data['photo']." style='width : 230px; height:230px;' class='img-fluid'></p>"; //Photo du Tshirt
                            echo "<p style='font-size:15px;'><strong>Marque : ".$data['descrip']."<br>"; //Marque du Tshirt
                            echo "Prix : ".$data['prix']."&#8364</strong></p>"; //Prix du Tshirt
                            echo "
                                
                                    <form class='form-group' method='post'>

                                    <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Pointure</label>
                                    <select name='sel' class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref'>
                                        <option  value='' disabled selected>Choix...</option>
                                        <option value=".$data['tailleCh1'].">".$data['tailleCh1']."</option>
                                        <option value=".$data['tailleCh2'].">".$data['tailleCh2']."</option>
                                        <option value=".$data['tailleCh3'].">".$data['tailleCh3']."</option>
                                    </select>

                                    <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Couleur</label>
                                    <select name='sel2' class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref'>
                                        <option value='' disabled selected>Choix...</option>
                                        <option value=".$data['couleur1'].">".$data['couleur1']."</option>
                                        <option value=".$data['couleur2'].">".$data['couleur2']."</option>
                                    </select>";
                                    ///////////////////////////////////////////
                                    //////    AJOUTER AU PANIER DEBUT   ///////
                                    ///////////////////////////////////////////
                                    echo "<input  type='submit' name='".$data['id']."' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' value='Ajouter au panier'>
                                    
                                            </form> 
                                            ";
                                    // echo "<p style='text-align:center;'><input type='submit' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' formaction='ajoutPanier.php' value='Ajouter au panier'></p>";
                                
                                    if(isset($_POST[$data['id']]))
                                    {
                                        //Supprime l'item
                                        $sql_ajout_panier = "UPDATE item SET isPanier = '1', qteAchetee=qteAchetee+'1', taille_choisie='".$_POST['sel']."', couleur_choisie='".$_POST['sel2']."'   WHERE item.id = " .$data['id']." ";
                                        if(mysqli_query($db_handle, $sql_ajout_panier)) //Si la suppression marche on le fait savoir
                                        {
                                            //echo"<script>alert('Ajout confirmé')</script>";
                                            echo"L'item ".$data['nom']." taille ".$_POST['sel']." en colori ".$_POST['sel2']." a été ajouté au panier";
                                        }
                                        else 
                                        {
                                            echo "Error creating database: " . mysqli_error($db_handle);
                                        } 
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

if(isset($_POST['submit']))
{       
    $option = isset($_POST['sel']) ? $_POST['sel'] : false;
    $option2 = isset($_POST['sel2']) ? $_POST['sel2'] : false;

    if ($option && $option2) 
    {
        echo "taille :".$_POST['sel']."";
        echo "couleur :".$_POST['sel2']."";
        echo "<script>alert('Vous avez ajouté chaussure pointure : ".$_POST['sel']." et couleur : ".$_POST['sel2']."');</script>";
        
    } 
    else 
    {
        echo "task option is required";
        exit; 
    }

}
?>
