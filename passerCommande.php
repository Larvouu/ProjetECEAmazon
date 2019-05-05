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
$totalpanier= isset($_POST["totalpanier"])? $_POST["totalpanier"] : "";
 
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

                    <input type='hidden' name='email' value='".$email."'>
                    <input type='hidden' name='mdp' value='".$mdp."'>
                    <input type='hidden' name='totalpanier' value='".$totalpanier."'>
                    
        
                    <br><br><input id='button' type='submit' value='Finaliser ma commande' name='payer'>
                </form>";  

                if(isset($_POST['payer']))
                {
                    $totalpanier= isset($_POST["totalpanier"])? $_POST["totalpanier"] : "";

                    if($_POST["nom"] == $data['nom'] && $_POST["prenom"] == $data['prenom'] && $_POST["adresse"] == $data['adresse'] && 
                    $_POST["ville"] == $data['ville'] &&
                    $_POST["pays"] == $data['pays'] && $_POST["codePostal"] == $data['codePostal'] && $_POST["numTel"] == $data['numTel'] &&
                    $_POST["numCarte"] == $data['numCarte'] && $_POST["nomAfficheCarte"] == $data['nomAfficheCarte'] && $_POST["dateExpi"] == $data['dateExpi'] &&
                    $_POST["codeSecu"] == $data['codeSecu'] && $_POST["typeCarte"] == $data['typeCarte'] )
                    {
                        echo"GAGNE";
                        $header="MIME-Version: 1.0\r\n";
                        $header.='From:"Sarah"<sarah.lepkmn@gmail.com>'."\n";
                        $header.='Content-Type:text/html; charset="uft-8"'."\n";
                        $header.='Content-Transfer-Encoding: 8bit';


                        $to=$email;
                        $message='<html>
                        <head>
                            
                        </head>
                      
                        <body> 
                        
                        <div style="text-align:center; font-size:30px;"><h1>ECE AMAZON</h1></div><hr>
                        <br><br>
                       <p style="font-size:18px;"> Bonjour <strong>'.$_POST["prenom"].' '. $data["nom"].'</strong>,</p>
                       <p style="font-size:18px;"> Nous vous informons que votre commande a été expédiée. Votre colis est en cours d\'acheminement.</p><hr>
                        
                       <p style="text-align:center; font-size:18px;">Détails de votre commande<br><p>
                        <div style="background-color :#d1d1d1;">
                            <div> <p style="text-align:center; font-size:15px;">Livraison : </p><p style="text-align:center; color:green; font-size:15px;"><strong>Mardi 14 Mai 2019</strong></p></div>
                            <div><p style="text-align:center; font-size:15px;">Votre adresse :</p><p style="text-align:center; color:green; font-size:15px;"><strong> '.$_POST['adresse'].', '.$_POST['ville'].', '.$_POST['codePostal'].'</strong></p></div>
                            
                        </div>
                        <div><p style="font-size:18px;"><strong>Prix Total :'.$totalpanier.' </strong></p></div><br>

                        </body>
                        </html>
                        ';

                        mail("sarah.lepkmn@gmail.com", "Copie : ".$_POST["prenom"]." ".$data["nom"]." a passé une commande", $message, $header);
                        
                        if(  mail($to, "Confirmation de votre commande ECEAmazon", $message, $header)
                        )
                        {
                            echo "sent";
                        }
                        else
                        {
                            echo"erreur";
                        }
                        

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


