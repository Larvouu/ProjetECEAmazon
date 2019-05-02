<head>
    <title>ECE Amazon</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='adminAjoutItemCat.css' rel='stylesheet' type='text/css'>
</head>

<?php include 'navbar.php';?>


<body>
<div class="uploadImgUser">

<form method="post" action="adminAjoutItemTrait.php">  
    Choisis catégorie :<br><br>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="categorie" value="musique">
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
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios5" value="chaussh">
          <label class="form-check-label" for="gridRadios5">
            Chaussures Hommes
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios6" value="chaussf">
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
