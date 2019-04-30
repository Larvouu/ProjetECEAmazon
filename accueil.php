<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="accueil.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="accueil.js"></script>
</head>


<body>

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 

    <header class="page-header header container-fluid">
        <div class="overlay">
            <div class="description">
                <h1>Bienvenue Dans l'ECE Amazon !</h1>
                <p>Venez acheter ou vendre tous types de produits ! le premier site de commerce uniquement pour les élèves de l'ECE</p>
                <button class="btn btn-outline-secondary btn-lg">Découvirir les offres du moment</button>
            </div>
    </header>
    
    <div id="demo" class="carousel slide" data-ride="carousel">            
        <!-- The slideshow -->
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="img/image1.jpg"  alt="Vêtements">
            </div>

            <div class="carousel-item">
                <img src="img/image2.jpg"  alt="Musique">
            </div>

            <div class="carousel-item">
                <img src="img/image3.jpg"  alt="Sports et loisirs">
            </div>

            <div class="carousel-item">
            <img src="img/image4.jpg"  alt="livres">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        </a>

    </div>

    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Meilleure vente</h3>
            <img src="img/malte.jpg" class="img-fluid">
            <p> Venez découvrir notre article le plus vendu et ne ratez pas votre chance de vous le procurer!</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Vendre des articles</h3>
            <img src="img/buda.jpg" class="img-fluid">
            <p>Vous avez des articles dont vous ne vous servez plus? Venez les ventre sur notre site web au lieu de les jetter!</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="Vendre des articles" name="">
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Entrer en contact!</h3>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Votre nom:" name="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Courriel:" name="email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="4">Vos commentaires</textarea>
                </div>
                <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="">

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