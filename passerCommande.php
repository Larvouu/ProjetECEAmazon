<head>
    <title>ECE Amazon</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='loginVendeur.css' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
</head>

<?php 
    include 'navbar.php';
//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$email = isset($_POST["email"])? $_POST["email"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
 
if ( $email=="" || $mdp=="" )
{
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>Les champs n'ont pas été saisis !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='passerCommandeForm.php'>Ré-essayer de se connecter</button></div></form>";
    echo "<br><br><br>";
   
}
else //si les 2 valeurs ont ben été set
{
    //Identifier la BDD
    $database = "eceamazon";

    //Connexion dans la BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) 
    {
        //Requete pour afficher nom, photo, img_fond du vendeur
        $sql = "SELECT * FROM acheteur WHERE email = '$email'";
        $result = mysqli_query($db_handle, $sql);
        
        //regarder s'il y a de résultat
        if (mysqli_num_rows($result) == 0) 
        {
            //l'email entré n'existe pas
            echo "<br><br><div class='bord'><br>";
            echo "<p class='titre'>L'email n'a pas été trouvé dans la bdd !</p></div>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='passerCommandeForm.php'>Ré-essayer de se connecter</button></div></form>";
            echo "<br><br><br>";
        } 
        else 
        {
            //l'email entré a été trouvé --> Affichage de la page du vendeur
            while ($data = mysqli_fetch_assoc($result)) 
            {

                if($mdp != $data['mdp'])
                {
                    //le mdp entré ne correspond pas à l'email
                    echo "<br><br><div class='bord'><br>";
                    echo "<p class='titre'>Le mot de passe ne correspond pas à l'email !</p></div>";
                    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='passerCommandeForm.php'>Ré-essayer de se connecter</button></div></form>";
                    echo "<br><br><br>";
                }
                else 
                {
                    echo"<form action='' method='post'>
                    <table style='text-align:center;'>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Nom : </strong></td>
                            <td><input type='text' name='nom'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Prenom : </strong></td>
                            <td><input type='text' name='prenom'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Adresse : </strong></td>
                            <td><input type='text' name='adresse'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Ville : </strong></td>
                            <td><input type='text' name='ville'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Code Postal : </strong></td>
                            <td><input type='text' name='codePostal'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Pays : </strong></td>
                            <td><input type='text' name='pays'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Numéro de tel : </strong></td>
                            <td><input type='text' name='numTel'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Type de carte : </strong></td>
                            <td><input type='text' name='typeCarte'></td>
                        </tr>
                        <tr>
                        <td style='color:white; font-family:Ebrima;'><strong> Numéro de carte : </strong></td>
                            <td><input type='password' name='numCarte'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Titulaire : </strong></td>
                            <td><input type='text' name='nomAfficheCarte'></td>
                        </tr>
                        <tr>
                            <td style='color:white; font-family:Ebrima;'><strong> Date d'expiration : </strong></td>
                            <td><input type='text' name='dateExpi'></td>
                        </tr>
                        <tr>
                        <td style='color:white; font-family:Ebrima;'><strong> Code de sécurité : </strong></td>
                            <td><input type='password' name='codeSecu'></td>
                        </tr>
                    </table>

                    <input type='hidden' name='email1' value='".$email."'>
                    <input type='hidden' name='mdp1' value='".$mdp."'>
        
                    <br><br><input id='button' type='submit' value='Finaliser ma commande' name='payer'>
                </form>";  

                if(isset($_POST['payer']))
                {
                    if($_POST["nom"] == $data['nom'] && $_POST["prenom"] == $data['prenom'] && $_POST["adresse"] == $data['adresse'] && 
                    $_POST["ville"] == $data['ville'] &&
                    $_POST["pays"] == $data['pays'] && $_POST["codePostal"] == $data['codePostal'] && $_POST["numTel"] == $data['numTel'] &&
                    $_POST["numCarte"] == $data['numCarte'] && $_POST["nomAfficheCarte"] == $data['nomAfficheCarte'] && $_POST["dateExpi"] == $data['dateExpi'] &&
                    $_POST["codeSecu"] == $data['codeSecu'] && $_POST["typeCarte"] == $data['typeCarte']  )
                    {
                        echo"GAGNE";
                    }
                    else{//si on rentre les mauvaises infos ...
                    echo "<br><br><div class='bord'><br>";
                    echo "<p class='titre'>Aucune correspondance avec la base de données !</p></div>";
                    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='passerCommandeForm.php'>Ré-essayer</button></div></form>";
                    echo "<br><br><br>";
                    }
                }
                }
            } 

        
            
        }
        
        mysqli_close($db_handle);

    } //fin if($db_found)
    else
    {
        echo "Sorry, Database not found";
    }
  
}
?>
</div>
</div>
<br><br>

    <footer class="footer-copyright text-center text-black-50 py-3">
        <small>
            <p>
                Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
            </p>
        </small>
    </footer>


