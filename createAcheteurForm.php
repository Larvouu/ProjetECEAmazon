<html>
<head>
    <link href="createVendeurForm.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <?php include 'navbar.php'; ?>
   
        <div class="uploadImgUser">
            <strong>Compléter ces champs afin de vous créer un compte Acheteur :</strong>
            <form action="createAcheteur.php" method="post">
                
            <table style="margin-left:30px;">
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Email :</strong></td>
                    <td><input type="text" name="email"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Mot de passe :</strong></td>
                    <td><input type="text" name="mdp"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Nom :</strong></td>
                    <td><input type="text" name="nom"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Prénom :</strong></td>
                    <td><input type="text" name="prenom"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Ville :</strong></td>
                    <td><input type="text" name="ville"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Adresse :</strong></td>
                    <td><input type="text" name="adresse"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Code postal :</strong></td>
                    <td><input type="text" name="codePostal"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Pays :</strong></td>
                    <td><input type="text" name="pays"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Numéro de téléphone :</strong></td>
                    <td><input type="text" name="numTel"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Type de carte :</strong></td>
                    <td><input type="text" name="typeCarte"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Titulaire de la carte :</strong></td>
                    <td><input type="text" name="nomAfficheCarte"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Date d'expiration :</strong></td>
                    <td><input type="text" name="dateExpi"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Code de sécurité :</strong></td>
                    <td><input type="text" name="codeSecu"/></td>
                </tr>

            <table>
                <br><br>
                <input class="button" type="submit" name="submit" value="ENTER"/>
        </div>
    </form>
    
     

</body>
</html>