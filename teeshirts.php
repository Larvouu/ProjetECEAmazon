<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_musique.css" rel="stylesheet" type="text/css"/>

</head>



<script>
function fruit() 
{
    var selected_options = document.querySelector('#choose-fruit-multiple').selectedOptions;

for(var i=0; i<selected_options.length; i++) {
    document.getElementById("fruito").innerHTML = selected_options[].text;}
}
</script>

<body>

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 

    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Nos Tee-shirts </h1>
                <p>Retrouvez ici notre plus belle selection de Tshirts et impressionez vous amis avec nos Tshirts originiaux !</p>
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
                
                $sql = "SELECT nom, photo, descrip, prix, tailleS, tailleM, tailleL FROM item WHERE categorie = 'TeeShirt' ";
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
                            echo "<p style='text-align:center;'><img src=".$data['photo']." class='img-fluid'></p>"; //Photo du Tshirt
                            echo "<p>Marque: ".$data['descrip']."<br>"; //Marque du Tshirt
                            echo "Prix : ".$data['prix']."&#8364</strong></p>"; //Prix du Tshirt
                            echo "
                                
                                    <form class='form-inline' method='post'>
                                    <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Taille</label>
                                    <select name='sel' class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref'>
                                        <option selected>Choix...</option>
                                        <option value=".$data['tailleS'].">".$data['tailleS']."</option>
                                        <option value=".$data['tailleM'].">".$data['tailleM']."</option>
                                        <option value=".$data['tailleL'].">".$data['tailleL']."</option>
                                    </select>

                                    <button name='submit' class='btn btn-primary my-1'>Ajouter au panier</button>
                                    </form>
                                
                            ";
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

    <footer>
        <small>
            <p>
                Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
            </p>
        </small>
    </footer>


        
</body>
</html>

<?php

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
}
?>