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
                <h1>Nos Tee-shirts </h1>
                <p>Retrouvez ici notre plus belle selection de Tee-shirts et impressionez vous amis avec no Tee-shirts originiaux ! .</p>
              
            </div>
            </div>
            </div>
    

    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Tee-shirt Père(fect)</h3>
            <img src="img/perfect.jpg" class="img-fluid">
            <p> Marque: Au masculin <br>Prix: 19.29€ <br> Taille: M-L-XL</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Tee-shirt Brice de Nice</h3>
            <img src="img/brice.jpg" class="img-fluid">
            <p> Marque: Nike <br>Prix: 29.99€ <br> Taille: S-M-XL</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Tee-shirt bisous & love</h3>
            <img src="img/bisous.jpg" class="img-fluid">
            <p> Marque: Au féminin <br>Prix: 23.99€ <br> Taille S-M</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Tee-shirt Supreme</h3>
            <img src="img/supreme.jpg" class="img-fluid">
            <p> Marque: Supreme <br>Prix: 300€ <br> Taille M-L</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Tee-shirt Calvin Klein</h3>
            <img src="img/calvin.jpg" class="img-fluid">
            <p> Marque: Calvin Klein <br>Prix: 51€ <br> Taille: XS-M-L-XL-XXL</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Tee-shirt Taggle</h3>
            <img src="img/taggle.jpg" class="img-fluid">
            <p> Marque: Au féminin <br>Prix: 19.95€ <br> Taille: XS-S-M</p>
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