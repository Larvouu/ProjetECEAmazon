<html>
<head>
    <title>Mon Compte</title>
    <link href="acheteurFormulaire.css" rel="stylesheet" type="text/css">
    
    <!--Les deux link suivants nous servent à avoir une police de titre spéciale-->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:bold' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
</head>

<body>
    
    <?php include 'navbar.php'; ?>

    <div class="container-fluid"> 
        <div class="overlay">
            <div class="description">
                <h1>Identifiez-vous</h1>
                <p>Connectez-vous ou appuyer sur <strong>Créer un compte client</strong> si vous n'avez pas encore de compte.</p>
              
            </div>
        </div>
    </div>

    <div id="centrerBouton">
        <a class="button" href="createAcheteurForm.php">Créer un compte</a>
        <a class="button" href="loginAcheteurForm.php">Se connecter</a>
    </div>  


</body>
</html>
