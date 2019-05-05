<html>
<head>
    <title>Ventes flash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_musique.css" rel="stylesheet" type="text/css"/>

    <!--Les deux link suivants nous servent à avoir une police de titre spéciale-->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:bold' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>


<body>

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 


    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Ventes flash </h1>
                <p>Retrouvez ici nos produits les plus vendus.</p>
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
                $sql = "SELECT * FROM item WHERE qteVendue =(SELECT MAX(qteVendue) FROM item WHERE categorie='Livre') AND categorie='Livre'";
                $result = mysqli_query($db_handle, $sql);
                
                //s'il n'y a de résultat
               /* if (mysqli_num_rows($result) == 0) 
                {
                    echo "<br><br><div class='bord'><br>";
                    echo "<p class='titre'>Notre site n'a pas encore enregistré de vente, soyez la première personne à nous faire confiance !</p></div>";
                    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='accueil.php'>Retour menu</button></div></form>";
                }*/ 
                if (mysqli_num_rows($result) != 0) //Si des produits ont déja été vendus
                {
                    //s'il y a bien des résulats à la requête sql
                    while ($data = mysqli_fetch_assoc($result)) 
                    {
                        echo "<div class='col-lg-4 col-md-4' style='text-align:center;'>";
                            echo "<h2 class='feature-title'>".$data['categorie']." le plus vendu</h2>"; //Titre
                            echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre 
                            echo "<img data-toggle='modal' data-target=#".$data['nom']." style='width : 230px; height:230px;' src=".$data['photo']." class='img-fluid'>"; //Image 

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
                            echo "<br><strong>Prix: </strong>".$data['prix']."&#8364</p>"; //Prix  
                            echo "<strong>Quantité disponible : ".$data['qteEnVente']."</strong></p>"; //Quantité disponible
                            ///////////////////////////////////////////
                            //////    AJOUTER AU PANIER DEBUT   ///////
                            ///////////////////////////////////////////
                            echo"<form action='' method='post' >";
                            echo "<input type='submit' name='".$data['id']."' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' value='Ajouter au panier'>";
                            echo"</form>";
                            
                            if(isset($_POST[$data['id']]))
                            {
                                if($data['qteEnVente'] > $data['qteAchetee'])
                                {
                                    //Ajout panier
                                    $sql_ajout_panier = "UPDATE item SET isPanier = '1', qteAchetee=qteAchetee+'1'  WHERE item.id = " .$data['id']." ";
                                    if(mysqli_query($db_handle, $sql_ajout_panier)) //Si la suppression marche on le fait savoir
                                    {
                                        //echo"<script>alert('Ajout confirmé')</script>";
                                    
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
                    ////////////////////////////////////////
                    ////////////////////////////////////////
                    ////////  CATEGORIE SUIVANTE   /////////
                    ////////////////////////////////////////
                    ////////////////////////////////////////
                } 
                $sql = "SELECT * FROM item WHERE qteVendue =(SELECT MAX(qteVendue) FROM item WHERE categorie='teeshirt') AND categorie='teeshirt'";
                $result = mysqli_query($db_handle, $sql);
                
                //s'il n'y a de résultat
               /* if (mysqli_num_rows($result) == 0) 
                {
                    echo "<br><br><div class='bord'><br>";
                    echo "<p class='titre'>Notre site n'a pas encore enregistré de vente, soyez la première personne à nous faire confiance !</p></div>";
                    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='accueil.php'>Retour menu</button></div></form>";
                }*/ 
                if (mysqli_num_rows($result) != 0) //Si des produits ont déja été vendus
                {
                    //s'il y a bien des résulats à la requête sql
                    while ($data = mysqli_fetch_assoc($result)) 
                    {
                        echo "<div class='col-lg-4 col-md-4' style='text-align:center;'>";
                            echo "<h2 class='feature-title'>".$data['categorie']." le plus vendu</h2>"; //Titre
                            echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre 
                            echo "<img data-toggle='modal' data-target=#".$data['nom']." style='width : 230px; height:230px;' src=".$data['photo']." class='img-fluid'>"; //Image 

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
                            echo "<br><strong>Prix: </strong>".$data['prix']."&#8364</p>"; //Prix  
                            echo "<strong>Quantité disponible : ".$data['qteEnVente']."</strong></p>"; //Quantité disponible
                            ///////////////////////////////////////////
                            //////    AJOUTER AU PANIER DEBUT   ///////
                            ///////////////////////////////////////////
                            echo"<form action='' method='post' >";
                            echo "<input type='submit' name='".$data['id']."' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' value='Ajouter au panier'>";
                            echo"</form>";
                            
                            if(isset($_POST[$data['id']]))
                            {
                                if($data['qteEnVente'] > $data['qteAchetee'])
                                {
                                    //Ajout panier
                                    $sql_ajout_panier = "UPDATE item SET isPanier = '1', qteAchetee=qteAchetee+'1'  WHERE item.id = " .$data['id']." ";
                                    if(mysqli_query($db_handle, $sql_ajout_panier)) //Si la suppression marche on le fait savoir
                                    {
                                        //echo"<script>alert('Ajout confirmé')</script>";
                                    
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
                    ////////////////////////////////////////
                    ////////////////////////////////////////
                    ////////  CATEGORIE SUIVANTE   /////////
                    ////////////////////////////////////////
                    ////////////////////////////////////////
                } //else = si la requete a des resultats
                
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