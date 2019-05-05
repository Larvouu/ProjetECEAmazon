<html>
<head>
    <title>Passer ma commande</title>
    <link href="loginVendeurForm.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <?php include 'navbar.php'; 
    $totalPanier= isset($_POST["totalpanier"])? $_POST["totalpanier"] : "";

    ?>

<!--
    <div class="logForm">
        <br><br>
        <p id="loginInterface">Login</p>
        <br><br>
        <form action="passerCommande.php" method="post">
            <table style="text-align:center;">
                <tr>
                    <td style="color:white; font-family:Ebrima;"><strong> Email : </strong></td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                <td style="color:white; font-family:Ebrima;"><strong> Mot de passe : </strong></td>
                    <td><input type="password" name="mdp"></td>
                </tr>
            </table>
            <input type='hidden' name='totalpanier' value="<?php// echo "".$totalPanier."" ?>">
            <br><br><input id="button" type="submit" value="ENTER" name='connect'>
        </form>
    </div>
-->


    <div class="logForm">
        <br><br>
        <p id="loginInterface">Login</p><br>
       
        <form action="passerCommande.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Saisir email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Pseudo">
            </div>
            <br>
            <input type='hidden' name='totalpanier' value="<?php echo "".$totalPanier."" ?>">
            <input id="button" type="submit" value="ENTER" name='connect'>
        </form>
    </div>

</body>


</html>
     
