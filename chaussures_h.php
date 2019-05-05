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
                <h1>Chaussures Homme </h1>
                <p>Retrouvez ici toutes nos chaussures pour homme. Vous en trouverez pour tous les goûts, alors faites vous plaisir!</p>
              
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
                
                $sql = "SELECT * FROM item WHERE categorie = 'ChaussureH' ";
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
                            
                            echo "<p style='font-size:15px;'><strong>Description: </strong>".$data['descrip']."<br>";//Description
                            echo "<strong>Prix:</strong> ".$data['prix']."&#8364<br>"; //Prix 
                            echo "<strong>Quantité disponible : ".$data['qteEnVente']."</strong></p>"; //Quantité disponible
                            
                            echo "
                                
                                    <form class='form-inline' method='post' action=''>
                                    <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Pointure</label>
                                    <select name='sel' class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref'>
                                        <option value='' disabled selected>Choix...</option>
                                        <option value=".$data['tailleCh1'].">".$data['tailleCh1']."</option>
                                        <option value=".$data['tailleCh2'].">".$data['tailleCh2']."</option>
                                        <option value=".$data['tailleCh3'].">".$data['tailleCh3']."</option>
                                    </select><br>";
                            ///////////////////////////////////////////
                            //////    AJOUTER AU PANIER DEBUT   ///////
                            ///////////////////////////////////////////
                            echo "<input  type='submit' name='".$data['id']."' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' value='Ajouter au panier'>
                            
                                    </form> 
                                    ";
                            // echo "<p style='text-align:center;'><input type='submit' class='btn btn-secondary' style='padding:11px 40px; font-size:18px; ' formaction='ajoutPanier.php' value='Ajouter au panier'></p>";
                           
                            if(isset($_POST[$data['id']]) && isset($_POST['sel']) )
                            {
                                //Supprime l'item
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
