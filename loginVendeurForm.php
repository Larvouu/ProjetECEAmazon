<html>
<head>
    <title>Se connecter</title>
    <link href="loginVendeurForm.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <?php include 'navbar.php'; ?>

    <div class="logForm">
        <br><br>
        <p id="loginInterface">Login</p><br>
       
        <form action="loginVendeur.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Saisir email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="exampleInputPassword1" placeholder="Pseudo">
            </div>
            <br>
            <input id="button" type="submit" value="ENTER" name='connect'>
        </form>
    </div>

</body>


</html>
     
