<html>
<head>
    <title>Sports et loisirs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_sport.css" rel="stylesheet" type="text/css"/>

    <!--Les deux link suivants nous servent à avoir une police de titre spéciale-->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:bold' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
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
                
                $sql = "SELECT * FROM item WHERE categorie = 'SportsLoisirs' ";
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
                        echo "<h3 class='feature-title'>".$data['nom']."</h3>"; //Titre 
                        echo "<p  style='text-align:center;'><img src=".$data['photo']." style='width : 230px; height:230px;' class='img-fluid'></p>"; //Image 
                        echo "<p style='font-size:15px;'><strong>Description: </strong>".$data['descrip']."<br>";//Description
                        echo "<strong>Prix:</strong> ".$data['prix']."&#8364<br>"; //Prix 
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
                                            L'item <strong>".$data['nom']."</strong> a été ajouté au panier
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
                
                mysqli_close($db_handle);
            }
            else
            {
                echo "Sorry, Database not found";
            }

    ?><br><br>
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