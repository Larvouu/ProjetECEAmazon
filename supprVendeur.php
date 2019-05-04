<head>
    <title>ECE Amazon</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='loginVendeur.css' rel='stylesheet' type='text/css'>
</head>

<?php 
    include 'navbar.php';
//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$email = isset($_POST["email"])? $_POST["email"] : "";
 
if ($email=="")
{
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>L'email n'a pas été saisi</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='supprVendeurForm.php'>Ré-essayer</button></div></form>";
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
        //Requete pour selectionner le vendeur
        $sql = "SELECT vendeur.email, item.vendeur_email FROM vendeur,item WHERE vendeur.email = '$email' AND item.vendeur_email='$email'";
        $result = mysqli_query($db_handle, $sql);
        
        //regarder s'il y a de résultat
        if (mysqli_num_rows($result) == 0) 
        {
            //l'email entré n'existe pas
            echo "<br><br><div class='bord'><br>";
            echo "<p class='titre'>Le vendeur n'existe pas ou n'a aucun item en vente !</p></div>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='supprVendeurForm.php'>Ré-essayer</button></div></form>";
        } 
        else 
        {
            //l'email entré a été trouvé --> Affichage de la page du vendeur
            while ($data = mysqli_fetch_assoc($result)) 
            {       
                //Supprime le vendeur
                $sql_delete_vendeur = "DELETE FROM vendeur WHERE vendeur.email= '$email'";   
                
                

                $sql_delete_items_associes = "DELETE FROM item WHERE item.vendeur_email = '$email'";
                if(!mysqli_query($db_handle, $sql_delete_items_associes)) //Si la suppression ne marche pas on le fait savoir
                {
                    echo "Aucun résultat pour cette requete";
                }
            } 
            if(mysqli_query($db_handle, $sql_delete_vendeur)) //Si la suppression marche on affiche le message de confimation
            {
                echo "<br><br><div class='bord'><br>";
                echo "<p class='titre'>Le vendeur correspondant à cet email a bien été supprimé<br>Ses items ont été retiré de la vente</p></div>";
                echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='admin.php'>Revenir à la page admin</button></div></form>";
            }
            else{
                echo "erreur : la suppression n'a pas marché";
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

