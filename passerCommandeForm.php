<html>
<head>
    <link href="loginVendeurForm.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <?php include 'navbar.php'; ?>

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

            <br><br><input id="button" type="submit" value="ENTER" name='connect'>
        </form>

    </div>

</body>


</html>
     
