<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_musique.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="accueil.js"></script>
</head>


<body>

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 


    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Nos Livres </h1>
                <p>Retrouvez ici tous les livres disponibles à l'achat.</p>
              
            </div>
            </div>
            </div>
    

    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Les misérables</h3>
            <img src="img/miserables.jpg" class="img-fluid">
            <p> Auteur: Victor Hugo <br>Prix: 5.29€ <br> Année: 1862</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">La maison biscornue</h3>
            <img src="img/maison.jpg" class="img-fluid">
            <p> Auteur: Agatha Christie <br>Prix: 4.99€ <br> Année: 1949</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Voyage au centre de la Terre</h3>
            <img src="img/voyage.jpg" class="img-fluid">
            <p> Auteur: Jules Verne <br>Prix: 8.79€ <br> Année: 1864</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">La peau de chagrin</h3>
            <img src="img/peau.jpg" class="img-fluid">
            <p> Auteur: Balzac <br>Prix: 3.29€ <br> Année: 1831</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">L'étranger</h3>
            <img src="img/etranger.jpg" class="img-fluid">
            <p> Auteur: Albert Camus <br>Prix: 5.39€ <br> Année: 1942</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Candide</h3>
            <img src="img/candide.jpg" class="img-fluid">
            <p> Auteur: Voltaire <br>Prix: 1.99€ <br> Année: 1759</p>
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