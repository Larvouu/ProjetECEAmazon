<html>
<head>
    <link href="loginAcheteurForm.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <?php include 'navbar.php'; ?>

    <div class="logForm">
        <br><br>
        <p id="loginInterface">Login</p>
        <br><br>
        <form action="loginAcheteur.php" method="post">
            <table style="text-align:center;">
                <tr>
                    <td style="color:white; font-family:Ebrima;"><strong>Nom : </strong></td>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                <td style="color:white; font-family:Ebrima;"><strong>Prénom : </strong></td>
                    <td><input type="text" name="prenom"></td>
                </tr>
                <td style="color:white; font-family:Ebrima;"><strong>Adresse : </strong></td>
                    <td><input type="text" name="adresse"></td>
                </tr>
                <td style="color:white; font-family:Ebrima;"><strong>Email : </strong></td>
                    <td><input type="text" name="email"></td>
                </tr>
                <td style="color:white; font-family:Ebrima;"><strong>Numéro de carte : </strong></td>
                    <td><input type="password" name="numCarte"></td>
                </tr>
                <td style="color:white; font-family:Ebrima;"><strong>Type de carte : </strong></td>
                    <td><input type="password" name="typeCarte"></td>
                </tr>
                <td style="color:white; font-family:Ebrima;"><strong>Titulaire de la carte : </strong></td>
                    <td><input type="text" name="nomAfficheCarte"></td>
                </tr>
                <td style="color:white; font-family:Ebrima;"><strong>Date d'expiration : </strong></td>
                    <td><input type="text" name="dateExpi"></td>
                </tr>
                <td style="color:white; font-family:Ebrima;"><strong>Code de sécurité : </strong></td>
                    <td><input type="password" name="codeSecu"></td>
                </tr>
            </table>

            <br><br><input id="button" type="submit" value="Se connecter">
        </form>

    </div>

</body>


</html>
     
