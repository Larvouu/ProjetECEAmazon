<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="cat_vet.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="accueil.js"></script>
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
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Meilleure vente</h3>
            <img src="img/malte.jpg" class="img-fluid">
            <p> Artiste: Game of Thrones main theme <br>Prix: 1.29€ <br> durée: 1m51</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Overgrown</h3>
            <img src="img/wonder.jpg" class="img-fluid">
            <p> Artiste: Oh Wonder <br>Prix: 1.19€ <br> durée: 3m58</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="Acheter" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Pinacle</h3>
            <img src="img/pinacle.jpg" class="img-fluid">
            <p> Artiste: Lucio Bukowski <br>Prix: 0.99€ <br> durée: 7m35</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="Acheter" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">What it takes</h3>
            <img src="img/what_it_takes.jpg" class="img-fluid">
            <p> Artiste: Aerosmith <br>Prix: 1.29€ <br> durée: 5m11</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="Acheter" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Happier</h3>
            <img src="img/happier.jpg" class="img-fluid">
            <p> Artiste: Marshmello <br>Prix: 1.39€ <br> Durée: 3m34</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="Acheter" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Let me down slowly</h3>
            <img src="img/let_me_down.jpg" class="img-fluid">
            <p> Artiste: Alec Benjamin <br>Prix: 1.15€ <br> durée: 1m49</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="acheter" name="">
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