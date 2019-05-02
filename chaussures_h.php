<html>
<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cat_sport.css" rel="stylesheet" type="text/css"/>
</head>


<body>

    <!-- On inclut la barre de navigation 'navbar.php'. Cela permet d'éviter de tout recopier à chaque fois 
    car cette barre de navigation est utilisée dans beaucoup de fichiers.-->
    <?php include 'navbar.php'; ?> 


    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Chaussures homme </h1>
                <p>Retrouvez ici toutes nos chaussures pour homme. Vous en trouverez pour tous les goûts, alors faites vous plaisir!</p>
              
            </div>
        </div>
    </div>
    

    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Nike Air Max 2017</h3>
            <img src="img/airmax.jpg" class="img-fluid">
            <p> Prix: 209€ <br> taille: disponible entre 39 et 49</p>
            <!--      _____________________________________________________________      -->
            <!--      _____________________________________________________________      -->
            <form action="" method="post">
            <div class="form-row align-items-center">
            <div class="col-auto my-1">
      
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="select">
            <option selected>Choose...</option>
            <option value="34">34</option>
            <option value="36">36</option>
            <option value="38">38</option>
            </select>
            </div>
    
            <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary" name="SubmitButton">Submit</button>
            </div>
            </div>
            </form>
            
            <!--      _____________________________________________________________      -->
            <!--      _____________________________________________________________      -->
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="J'en profite!" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Stan Smith</h3>
            <img src="img/stan.jpg" class="img-fluid">
            <p> Prix: 79€ <br> taille: entre 40 et 44</p>
            <input  type="submit"  class="btn btn-secondary btn-block" formaction='assignment.php' value="ajouter au panier" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Adidas Falcon</h3>
            <img src="img/falcon.jpg" class="img-fluid">
            <p> Prix: 155€ <br> taille: entre 37 et 46</p>
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

<?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
$input = $_POST['select']; //get input text
$message = "T'as des ptits pieds. ".$input;
echo "<script>alert('$input');</script>";
}    
?>