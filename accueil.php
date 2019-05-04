<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="accueil.css" rel="stylesheet" type="text/css"/>
    
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>



</head>


<body>

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 

            <div class="description">
                <h1>Bienvenue Dans l'ECE Amazon !</h1><br>
               <!-- <p>Venez acheter ou vendre tous types de produits ! le premier site de commerce uniquement pour les élèves de l'ECE</p> -->
                <a class="btn btn-lg" role="button" href="ventes_flash.php">Découvirir les offres du moment</a>
            </div>
    
    <!-- -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" src="img/c_music.jpg" style="width:70%; height:700px; border-radius:20px;" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="img/c_sport.jpg" style="width:70%; height:700px; border-radius:20px;" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block " src="img/c_clothes.jpg" style="width:70%; height:700px; border-radius:20px;" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="img/c_book.jpeg" style="width:70%; height:700px; border-radius:20px;" alt="Fourth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<br><br><br><br>
<!-- -->
    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Meilleure vente</h3>
            <img src="img/malte.jpg" class="img-fluid">
            <p> Venez découvrir notre article le plus vendu et ne ratez pas votre chance de vous le procurer!</p>
            <a class="btn btn-lg" role="button" href="ventes_flash.php">J'en profite !</a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Vendre des articles</h3>
            <img src="img/buda.jpg" class="img-fluid">
            <p>Vous avez des articles dont vous ne vous servez plus? Venez les ventre sur notre site web au lieu de les jetter!</p>
            <a class="btn btn-lg" role="button" href="vendeurFormulaire.php">Vendre des articles</a>
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
                <input type="submit" class="btn btn-lg" value="Envoyer" name="">

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