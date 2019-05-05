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
                <a class="btn btn-lg" role="button" href="ventes_flash.php">Découvrir les offres du moment</a>
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

<br><br><br><br><br>
<!-- -->
    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h3 class="feature-title">Meilleure vente</h3>
                <img src="img/malte.jpg" class="img-fluid">
                <p> Venez découvrir nos articles les plus vendus et ne ratez pas votre chance de vous les procurer!</p>
                <a class="btn btn-lg" role="button" href="ventes_flash.php">J'en profite !</a>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <h3 class="feature-title">Vendre des articles</h3>
                <img src="img/buda.jpg" class="img-fluid">
                <p>Vous avez des articles dont vous ne vous servez plus? Venez les vendre sur notre site web au lieu de les jeter!</p>
                <a class="btn btn-lg" role="button" href="vendeurFormulaire.php">Vendre des articles</a>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
            <form action="" method="post">
                <h3 class="feature-title">Entrer en contact!</h3>
                    <div class="form-group">
                        <input name="nom" type="text" class="form-control" placeholder="Nom Prénom" >
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="votreEmail@gmail.com" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="msg" class="form-control" id="com" placeholder="Le message que vous voulez nous transmettre">Vos commentaires</textarea>
                    </div>
                    <input name="submit" type="submit" class="btn btn-lg" value="Envoyer" >
            </form>
            </div>
        
    </div> <!--fin div container features -->
    <br><br><br><br><br>

<?php include 'footer.php' ?>
 
</body>

</html>

<!--_______________________________________________________________________________________-->
<?php      
$email = isset($_POST["email"])? $_POST["email"] : "";//EXPEDITEUR :mail de la personne souhaitant entrer en contact avec nous
$nom= isset($_POST["nom"])? $_POST["nom"] : "";//nom et prénom de la personne souhaitant entrer en contact avec nous
$to="sarah.lepkmn@gmail.com";//DESTINATAIRE : mail de l'admin de ECEAmazon
$msg= isset($_POST["msg"])? $_POST["msg"] : "";//CONTENU du mail
 
if ( $email=="" || $nom=="" || $msg=="")
{
    echo"
    <div class='alert alert-danger' role='alert'>
        Vous n'avez pas entré un des champs! (votre nom/prénom, votre adresse mail ou le message que vous voulez nous transmettre ! Veuillez remplir les 3 champs.)
    </div>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    ";
}
else
{

    $header="MIME-Version: 1.0\r\n";
    $header.='From:"'.$nom.'"<'.$email.'>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';


    //envoi mail 
    if( mail($to, "Avis utilisateur de $email", $msg, $header))
    {
        //Une fois que le mail a bien été envoyé, une message de succès s'affiche 
        echo"
        <div id='msg' class='alert alert-success' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            <strong>Votre mail d'avis utilisateur a bien été envoyé !</strong><br>
            Nous vous remercions d'avoir partager votre avis.
        </div>
        ";
    }
    else
    {
        echo"
        <div id='msg' class='alert alert-danger' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            L'envoi du mail ne peut pas se faire sans avoir téléchargé <strong>Fake Send Mail</strong> associé à quelques autres manipulation.<br>
            Si cela vous intéresse, voici <a href='https://www.youtube.com/watch?v=2KmzkPWty7Y' class='alert-link'>un tuto Youtube.</a> et 
            <a href='https://www.glob.com.au/sendmail/ ' class='alert-link'>le lien pour télécharger FakeSendMail</a>.

        </div>
        ";
    }

}



?>
