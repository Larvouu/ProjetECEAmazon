<head>
    <title>Ajouter un item</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='vendeurAjoutItemCat.css' rel='stylesheet' type='text/css'>
</head>

<?php include 'navbar.php';
$email = isset($_POST["email"])? $_POST["email"] : "";
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
//echo "hello $email et $pseudo";
?>


<body>
<div class="uploadImgUser">

<form method="post" action="vendeurAjoutItemTrait.php">  
  <!--On fait passer par méthode POST l'email du vendeur -->
  <input type='hidden' name='email' value="<?php echo "".$email."" ?>">
  <input type='hidden' name='pseudo' value="<?php echo "".$pseudo."" ?>">

    <!-- Le vendeur doit cocher la catégorie de l'item qu'il veut vendre-->
    Choisis catégorie :<br><br>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="categorie" value="Musique">
          <label class="form-check-label" for="gridRadios1">
            Musiques
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="categorie" value="livre" checked>
          <label class="form-check-label" for="gridRadios2">
            Livres
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="categorie" value="sport">
          <label class="form-check-label" for="gridRadios3">
            Sports et Loisirs
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="categorie" value="teeshirt">
          <label class="form-check-label" for="gridRadios4">
            TeeShirts
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="categorie" value="chaussh">
          <label class="form-check-label" for="gridRadios5">
            Chaussures Hommes
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="categorie" value="chaussf">
          <label class="form-check-label" for="gridRadios6">
            Chaussures Femmes
          </label>
        </div>
      </div>
      <br>
      <div style="text-align :center;"><input class='button' type="submit" name="submit" value="Submit"> </div>
</form>
</div>
</body>

    <footer class="footer-copyright text-center text-black-50 py-3">
        <small>
            <p>
                Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
            </p>
        </small>
    </footer>
