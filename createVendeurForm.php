<html>
<head>
    <title>Créer un compte</title>  
    <link href="createVendeurForm.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <?php include 'navbar.php'; ?>
   
        <div class="uploadImgUser">
            <strong>Compléter ces champs afin de vous créer un compte Vendeur :</strong>
            <form action="createVendeur.php" method="post">
                
            <table style="margin-left:30px;">
                <tr>
                    <td><strong style="color:white; font-family: Ebrima; font-size: 19px;">Email :</strong></td>
                    <td><input type="text" name="email"/></td>
                </tr>

                <tr>
                    <td><strong style="color:white; font-family: Ebrima; font-size: 19px;">Pseudo :</strong></td>
                    <td><input type="text" name="pseudo"/></td>
                </tr>

                <tr>
                    <td><strong style="color:white; font-family: Ebrima; font-size: 19px;">Nom :</strong></td>
                    <td><input type="text" name="nom"/></td>
                </tr>

                <tr>
                    <td><strong style="color:white; font-family: Ebrima; font-size: 19px;">lien photo :</strong></td>
                    <td><input type="text" name="photo" placeholder="img/nomPhoto.jpg"/></td>
                </tr>

                <tr>
                    <td><strong style="color:white; font-family: Ebrima; font-size: 19px;">lien image de fond :</strong></td>
                    <td><input type="text" name="img_fond" placeholder="img/nomImage.jpg"/></td>
                </tr>

            <table>
                <br><br>
                <input class="button" type="submit" name="submit" value="ENTER"/>
        </div>
    </form>
    
     

</body>
</html>