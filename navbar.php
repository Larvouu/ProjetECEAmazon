<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link href="navbar.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="navbar.js"></script>
</head>


<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
    <ul class="navbar-nav mr-auto">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Catégories</a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="cat_livre.php">Livres</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="cat_musique.php">Musique</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="cat_sport.php">Sports et loisirs</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-header">Vêtements</a>
            <a class="dropdown-item" href="#">Tee-shirts</a>
            <a class="dropdown-item" href="#">Chaussures Homme</a>
            <a class="dropdown-item" href="#">Chaussures Femme</a>
     
            </div>
        </li>
            
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Ventes flash</a>
            <div class="dropdown-menu">     
            <a class="dropdown-item" href="cat_livre.php">Livres</a>
            <a class="dropdown-item" href="cat_musique.php">Musique</a>
            <a class="dropdown-item" href="#">Vêtements</a>
            <a class="dropdown-item" href="cat_sport.php">Sports et loisirs</a>
            </div>
         </li>

        <li class="nav-item">
            <a class="nav-link" href="vendeurFormulaire.php">Vendre</a>
        </li>
    </ul>
</div>
           
<div class="mx-auto order-0">
    <a href="accueil.php"> <img src="img/logo.jpg" class="navbar-brand mx-auto"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
    <span class="navbar-toggler-icon"></span>
    </button>
</div>

<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#"><img src="img/monCompte.png" height=25px width=25px> Mon Compte</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><img src="img/panier.png" height=30px width=30px></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Admin</a>
        </li>
    </ul>
</div>
</nav>
