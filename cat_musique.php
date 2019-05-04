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

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 


    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Nos musiques </h1>
                <p>Retrouvez ici toutes nos musiques.</p>
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
                $sql = "SELECT id,nom, photo, descrip, categorie, prix, auteur, video FROM item WHERE categorie = 'Musique'";
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
                        echo "<div class='col-lg-4 col-md-4' style='text-align:center;'>";
                            echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre de la musique
                            echo "<img data-toggle='modal' data-target=#".$data['nom']." style='width : 230px; height:230px;' src=".$data['photo']." class='img-fluid'>"; //Image de la musique

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
                                        <h4 class='modal-title'>".$data['auteur']." - ".$data['nom']."</h4>
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
                            echo "<p style='font-size:20px;'><strong>Artiste: ".$data['auteur']."<br>"; //Artiste de la musique
                            echo "Prix: ".$data['prix']."&#8364</strong></p>"; //Prix de la musique 
                            ///////////////////////////////////////////
                            //////    AJOUTER AU PANIER DEBUT   ///////
                            ///////////////////////////////////////////
                            echo"<form action='' method='post' >";
                            echo "<input  type='submit' name='".$data['id']."' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' value='Ajouter au panier'>";
                            echo"</form>";
                            
                            if(isset($_POST[$data['id']]))
                            {
                                //Supprime l'item
                                $sql_ajout_panier = "UPDATE item SET isPanier = '1', qteAchetee=qteAchetee+'1'  WHERE item.id = " .$data['id']." ";
                                if(mysqli_query($db_handle, $sql_ajout_panier)) //Si la suppression marche on le fait savoir
                                {
                                    //echo"<script>alert('Ajout confirmé')</script>";
                                    echo"L'item ".$data['nom']." a été ajouté au panier";
                                }
                                else 
                                {
                                    echo "Error creating database: " . mysqli_error($db_handle);
                                } 
                            }
                            ////////////////////////////////////////////
                            //////     AJOUTER AU PANIER  FIN     //////
                            ////////////////////////////////////////////
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
    <br><br>
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