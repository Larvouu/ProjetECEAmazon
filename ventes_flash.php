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
                <h1>Nos Ventes flash </h1>
                <p>Retrouvez ici toutes nos meilleures ventes de chaque catégorie. Ne manquez pas ces articles avant qu'ils soient épuisés ! .</p>
              
            </div>
            </div>
            </div>
    

    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Tee-shirt Père(fect)</h3>
            <img src="img/perfect.jpg" class="img-fluid">
            <p> Marque: Au masculin <br>Prix: 19.29€ <br> Taille: M-L-XL <br> Bientôt épuisé !</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">lauboutin</h3>
            <img src="img/lauboutin.jpg" class="img-fluid">
            <p> Prix: 799€ <br> taille: entre 36 et 40 <br> Bientôt épuisé ! <br> Offre rare !<br></p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Week-end à Disney</h3>
            <img src="img/disney.jpg" class="img-fluid">
            <p> Description: Venez passer un merveilleux week-end avec l'élu(e) de votre coeur ou un ami et entrez dans la magie de Disney.  <br>Prix: 179€ </p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Meilleure vente</h3>
            <img src="img/malte.jpg" class="img-fluid">
            <p> Artiste: Game of Thrones main theme <br>Prix: 1.29€ <br> durée: 1m51</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Happier</h3>
            <img src="img/happier.jpg" class="img-fluid">
            <p> Artiste: Marshmello <br>Prix: 1.39€ <br> Durée: 3m34</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Voyage au centre de la Terre</h3>
            <img src="img/voyage.jpg" class="img-fluid">
            <p> Auteur: Jules Verne <br>Prix: 8.79€ <br> Année: 1864</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        </div>
        </div>

        



        





    <footer class="footer-copyright text-center text-black-50 py-3">
        <small>
            <p>
                Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
            </p>
        </small>
    </footer>
        

        
</body>



</html>