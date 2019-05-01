<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_sport.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="accueil.js"></script>
</head>


<body>

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 


    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Nos activités </h1>
                <p>Retrouvez ici tous nos sports et loisirs proposés.</p>
              
            </div>
        </div>
    </div>

    <!--________________________________________________________________________________________-->
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
                $sql = "SELECT nom, photo, descrip, categorie, prix FROM item WHERE categorie = 'SportsLoisirs' ";
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
                    //On affiche chacun des items appartenant à la categorie Musique
                    while ($data = mysqli_fetch_assoc($result)) 
                    {
                        echo "<div class='col-lg-4 col-md-4'>";
                            echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre de la musique
                            echo "<p  style='text-align:center;'><img src=".$data['photo']." class='img-fluid'></p>"; //Image de la musique
                            echo "<p>Description : ".$data['descrip']."<br>"; //Image de la musique
                            echo "Prix : ".$data['prix']."&#8364</strong></p>"; //Prix de la musique 
                            echo "<p  style='text-align:center;'><input type='submit' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' formaction='ajoutPanier.php' value='Ajouter au panier'></p>";
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