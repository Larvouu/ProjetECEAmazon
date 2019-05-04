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
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
 
if ( $email=="" && $pseudo=="" )
{
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>les champs n'ont pas été saisis !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
   
}
else if ($email=="" && isset($_POST["pseudo"]))//si le champ pseudo n'a pas été rempli
{
    
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>Le champ email est vide !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";


}
else if($pseudo=="" && isset($_POST["email"]))//si le champ email n'a pas été rempli
{
    echo "<br><br><div class='bord'><br>";
    echo "<p class='titre'>Le champ pseudo est vide !</p></div>";
    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
}
else //si les 2 valeurs ont ben été set
{
    //////////////////////////////////
    //  SI ON A AFFAIRE A UN ADMIN  //
    //////////////////////////////////
    if($email == "sarah.le@edu.ece.fr" && $pseudo =="schouketta")
    {
        echo "<br><br><div class='bord'><br>";
        echo "<p class='titre'>Hello admin Sarah</p></div>";
        echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='admin.php'>Accéder à votre page</button></div></form>";
    }
    ////////////////////////////////////
    //  SI ON A AFFAIRE A UN VENDEUR  //
    ////////////////////////////////////
    else
    {
    //Identifier la BDD
    $database = "eceamazon";

    //Connexion dans la BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) 
    {
        //Requete pour afficher nom, photo, img_fond du vendeur
        $sql = "SELECT email, pseudo, nom, photo, img_fond FROM vendeur WHERE email = '$email'";
        $result = mysqli_query($db_handle, $sql);
        
        //regarder s'il y a de résultat
        if (mysqli_num_rows($result) == 0) 
        {
            //l'email entré n'existe pas
            echo "<br><br><div class='bord'><br>";
            echo "<p class='titre'>l'email n'a pas été trouvé dans la bdd !</p></div>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
            echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Créer un nouveau compte</button></div></form>";
        } 
        else 
        {
            //l'email entré a été trouvé --> Affichage de la page du vendeur
            while ($data = mysqli_fetch_assoc($result)) 
            {

                if($pseudo != $data['pseudo'])
                {
                    //le pseudo entré ne correspond pas à l'email
                    echo "<br><br><div class='bord'><br>";
                    echo "<p class='titre'>le pseudo ne correspond pas à l'email !</p></div>";
                    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Ré-essayer de se connecter</button></div></form>";
                    echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Créer un nouveau compte</button></div></form>";
                }
                else 
                {              
                    echo "<div id='nav'>
                    
                    <img id='photo' src=".$data['photo']."  alt='photo'>

                    <p id='nomVendeur'>". $data['nom']."</p>

                    <form method='post' action='vendeurAjoutItemCat.php'>
                        <input type='hidden' name='email' value='".$email."'></input>
                        <input type='hidden' name='pseudo' value='".$pseudo."'></input>
                        <button id='button' type='submit'>Ajouter un nouvel item</button>
                    </form>
                    </div>
                    
                    <div id='section' style=' background: url(".$data['img_fond'].") no-repeat center; background-size: 100% 100%;'>";
                    //Requete pour afficher les items du vendeur
                    //Select les infos de l'item where l'email du vendeur = l'email de connection au compte vendeur (déjà vérifié donc déjà valide)
                    $sql1 = "SELECT item.id, item.nom, item.photo, item.descrip, item.categorie, item.prix, item.vendeur_email FROM item, vendeur WHERE item.vendeur_email = vendeur.email AND vendeur.email = '$email' ";
                    $result1 = mysqli_query($db_handle, $sql1);
                    if (mysqli_num_rows($result1) != 0) 
                    {
                        echo "<div class='container features'>";
                        echo "<div class='row'>";
                        while($data1 = mysqli_fetch_assoc($result1))  
                        {    
                            echo "<div class='col-lg-4 col-md-4' style='text-align:center;'>";
                            echo "<h3 style='text-shadow:1px 1px #000000; color : #ffffff;' class='feature-title'>".$data1['nom']."</h3>"; //Titre
                            echo "<img src=".$data1['photo']." style='width : 230px; height:230px;' class='img-fluid'>"; //Image
                            echo "<p style='font-size:15px;text-shadow:1px 1px #000000; color : #ffffff;'><strong></strong>".$data1['descrip']."<br>";//Description Livre
                            echo "Prix: ".$data1['prix']."&#8364</strong></p>"; //Prix Livre
                            ///////////////////////////////////////////
                            //////  SUPPRESSION D UN ITEM  DEBUT //////
                            ///////////////////////////////////////////
                            echo"<form action='' method='post' >
                            <input type='hidden' name='email' value='".$email."'></input>
                            <input type='hidden' name='pseudo' value='".$pseudo."'></input>
                            <input  type='submit' id='supprBtn' name='".$data1['id']."' value='Retirer de la vente'>";
                            echo"</form>";
                            
                            if(isset($_POST[$data1['id']]))
                            {
                                //Supprime l'item
                                $sql_delete = "DELETE FROM item WHERE item.id = ".$data1['id']."";
                                if(mysqli_query($db_handle, $sql_delete)) //Si la suppression marche on rafraichit la page
                                {
                                    echo '<script>location.reload();</script>';
                                }
                                else 
                                {
                                    echo "Error creating database: " . mysqli_error($db_handle);
                                } 
                            }
                            ////////////////////////////////////////////
                            //////    SUPPRESSION D UN ITEM  FIN  //////
                            ////////////////////////////////////////////
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                }//Remarque : On fait passer par méthode POST l'email du vendeur
            } 

        
            
        }
        
        mysqli_close($db_handle);

    } //fin if($db_found)
    else
    {
        echo "Sorry, Database not found";
    }
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


