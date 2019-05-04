<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_sport.css" rel="stylesheet" type="text/css"/>

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
                <h1>Mon panier </h1>
                <p>Retrouvez ici tous vos articles et passez votre commande en ligne !</p>
              
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
                
                $sql = "SELECT id, nom, photo, descrip, prix, tailleCh1, tailleCh2, tailleCh3,taille_choisie, couleur1, couleur2, couleur_choisie, video FROM item WHERE isPanier ='1' ";
                $result = mysqli_query($db_handle, $sql);
                
                //s'il n'y a de résultat
                if (mysqli_num_rows($result) == 0) 
                {
                    echo "<br><br><div class='bord'><br>";
                    echo "<p class='titre'>Aucun article dans le panier</p></div>";
                    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='accueil.php'>Retour menu</button></div></form>";
                } 
                else 
                {
                    //s'il y a bien des résulats à la requête sql
                    //On affiche chacun des items appartenant à la categorie TeeShirt
                    while ($data = mysqli_fetch_assoc($result)) 
                    {
                        echo "<div class='col-lg-4 col-md-4'  style='text-align:center;'>";
                        echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre
                        echo "<p style='text-align:center;'><img data-toggle='modal' data-target=#".$data['nom']." style='width : 230px; height:230px;' src=".$data['photo']." class='img-fluid'></p>"; //Photo du Tshirt
                        //Si l'item possède une vidéo, la vidéo s'affiche en cliquant sur la photo de l'item
                        if($data['video']!="")
                        {
                            //On utilise les OPEN MODAL de Bootstrap
                        echo "
                        <div class='modal fade' id=".$data['nom']." role='dialog'>
                            <div class='modal-dialog modal-dialog-centered'>
                            
                                <!-- Modal content-->
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                    <h4 class='modal-title'>".$data['nom']."</h4>
                                    </div>
                                    <div class='modal-body'>
                                    <iframe width='420' height='345' src=".$data['video'].">
                                    </iframe>
                                    </div>
                                    <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                    </div>
                                </div>
                            
                            </div>
                        </div>                     
                        ";
                        }
                        
                        echo "<p style='font-size:15px;'><strong>Marque : ".$data['descrip']."<br>"; //Marque du Tshirt
                        echo "Prix : ".$data['prix']."&#8364</strong></p>"; //Prix du Tshirt
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