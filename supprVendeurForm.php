<html>
<head>
    <title>Supprimer un vendeur</title>
    <link href="supprVendeurForm.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <?php include 'navbar.php'; 
    

    echo "<div class='grid-container'>";//div qui regroupe le tableau de vendeurs et le formulaire du vendeur à supprimer
    echo "<div> </div>";
    
    echo "<div class='scrolling'><p style='color:white;'>Voici tous les vendeurs actuels : </p>";
    echo "<table id='vendeurs'>"; //début du tableau montrant tous les vendeurs
    echo "<tr>
            <th>Photo de profil</th>
            <th>Pseudo</th>
            <th>Email</th>
          </tr>
    ";
    
    //////////////////////////////////////////////////////////////////
    //Identifier la BDD
    $database = "eceamazon";

    //Connexion dans la BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) 
    {
        //Requete pour afficher nom, photo, img_fond du vendeur
        $sql = "SELECT email, pseudo, photo FROM vendeur WHERE email<>'sarah.le@edu.ece.fr'";
        $result = mysqli_query($db_handle, $sql);
        
        //regarder s'il y a de résultat
        if (mysqli_num_rows($result) == 0) 
        {
            //l'email entré n'existe pas
            echo "<br><br><div class='bord'><br>";
            echo "<p class='titre'>Petit pb....</p></div>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Créer un nouveau compte</button></div></form>";
        } 
        else 
        {
            //l'email entré a été trouvé --> Affichage de la page du vendeur
            while ($data = mysqli_fetch_assoc($result)) 
            {
                echo "
                    <tr>
                        <td><img src=".$data['photo']." style='width:100px; height=100px; border-radius:2px;' alt='photo'></td>
                        <td>".$data['pseudo']."</td>
                        <td>".$data['email']."</td>
                    </tr>
                ";
                
            } 

            echo"</table></div>";//fin tableau
 
        }
        
        mysqli_close($db_handle);

    } //fin if($db_found)
    else
    {
        echo "Sorry, Database not found";
    }


    ///////////////////////////////////////////////////////////////////////
    ?>
    <div></div>

    <div>
    <div class="logForm">
        <br><br>
        <p id="loginInterface">Entrez l'email du vendeur à supprimer</p>
        <br><br>
        <form action="supprVendeur.php" method="post">
            <table style="text-align:center;">
                <tr>
                    <td style="color:white; font-family:Ebrima;"><strong>Email</strong></td>
                    <td><input type="text" name="email"></td>
                </tr>
            </table>

            <br><br><input id="button" type="submit" value="ENTER">
        </form>

    </div>

    </div><!--fin div qui regroupe le tableau et le formulaire avec l'email du vendeur à supprimer-->
</div>

</body>
<footer class="footer-copyright text-center text-black-50 py-3">
        <small>
            <p>
                Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
            </p>
        </small>
    </footer>

</html>
     
