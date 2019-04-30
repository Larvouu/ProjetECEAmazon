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
                <h1>Nos activités </h1>
                <p>Retrouvez ici tous nos sports et loisirs proposés.</p>
              
            </div>
            </div>
            </div>
    

    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Parachutimse</h3>
            <img src="img/parachute.jpg" class="img-fluid">
            <p> Descripton: Un saut en parachute pour un moment inoubliable et un maximum d'adrénaline en compagnie d'un professionnel. <br>Prix: 239€ <br> durée: environ 4h</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Week-end à Disney</h3>
            <img src="img/disney.jpg" class="img-fluid">
            <p> Description: Venez passer un merveilleux week-end avec l'élu(e) de votre coeur ou un ami et entrez dans la magie de Disney.  <br>Prix: 179€ <br> durée: deux jours</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Stage de pilotage (18 tours)</h3>
            <img src="img/f1.jpg" class="img-fluid">
            <p> Description: Révélez le Lewis Hamilton qui sommeille en vous en prenant les commandes d'une F4. <br>Prix: 455€ <br> durée: env 2h</p>
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