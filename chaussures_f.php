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
                <h1>Chaussures femmes </h1>
                <p>Retrouvez ici toutes nos chaussures pour femme. Des chaussures de sport en passant par des talons élégants, vous trouverez tout ce qu'il vous faut !</p>
              
            </div>
        </div>
    </div>
    

    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Nike Air Max 2017</h3>
            <img src="img/airmaxf.jpg" class="img-fluid">
            <p> Prix: 209€ <br> taille: disponible entre 35 et 42</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
            </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Croqs roses</h3>
            <img src="img/croqs.jpg" class="img-fluid">
            <p> Prix: 1000€ <br> taille: entre 34 et 44</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
         </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">lauboutin</h3>
            <img src="img/lauboutin.jpg" class="img-fluid">
            <p> Prix: 799€ <br> taille: entre 36 et 40</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        
       
       </div>
        </div>

        



        





    <footer>
        <small>
            <p>
                Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
            </p>
        </small>
    </footer>
        

        
</body>



</html>