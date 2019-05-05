<html>
<head>
    <link href="createAcheteurForm.css" rel="stylesheet" type="text/css">
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


        <div class="logForm">
            <br>
            <p id="loginInterface">Création d'un nouveau compte <strong>Client</strong></p><br>

            <form action="createAcheteur.php" method="post">
            <table style="margin-left:30px;">
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Email :</td>
                    <td><input type="text" name="email"/></td>
                </tr>
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Mot de passe :</td>
                    <td><input type="password" name="mdp"/></td>
                </tr>
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Nom :</td>
                    <td><input type="text" name="nom"/></td>
                </tr>
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Prénom :</td>
                    <td><input type="text" name="prenom"/></td>
                </tr>
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Ville :</td>
                    <td><input type="text" name="ville"/></td>
                </tr>
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Adresse :</td>
                    <td><input type="text" name="adresse"/></td>
                </tr>
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Code postal :</td>
                    <td><input type="text" name="codePostal"/></td>
                </tr>
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Pays :</td>
                    <td><input type="text" name="pays"/></td>
                </tr>
                <tr>
                    <td style="color:white; font-family: Ebrima; font-size: 19px;">Numéro de téléphone :</td>
                    <td><input type="text" name="numTel"/></td>
                </tr>
                <tr>
                    <td><strong style="color:#ffe0ef; font-family: Ebrima; font-size: 19px;">Numéro de carte :</td>
                    <td><input type="password" name="numCarte"/></td>
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
                    <td><input type="password" name="codeSecu"/></td>
                </tr>

            <table>
                <br><br>
                <input id="button" type="submit" name="submit" value="ENTER"/>
        </div>
    </form>
    
     

</body>
</html>