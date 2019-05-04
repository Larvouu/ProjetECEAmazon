<head>
    <link href='vendeurAjoutItem.css' rel='stylesheet' type='text/css'>
</head>

<?php 
include 'navbar.php';
$email = isset($_POST["email"])? $_POST["email"] : "";
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";


//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$descrip = isset($_POST["descrip"])? $_POST["descrip"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";

//propre à Musique
$video = isset($_POST["video"])? $_POST["video"] : "";

//propre à Musique et Livres
$auteur = isset($_POST["auteur"])? $_POST["auteur"] : "";

//propre aux Teeshirts
$tailleS = isset($_POST["tailleS"])? $_POST["tailleS"] : "";
$tailleM = isset($_POST["tailleM"])? $_POST["tailleM"] : "";
$tailleL = isset($_POST["tailleL"])? $_POST["tailleL"] : "";

//propre aux Chaussures (Homme et Femme confondus)
$tailleCh1 = isset($_POST["tailleCh1"])? $_POST["tailleCh1"] : "";
$tailleCh2 = isset($_POST["tailleCh2"])? $_POST["tailleCh2"] : "";
$tailleCh3 = isset($_POST["tailleCh3"])? $_POST["tailleCh3"] : "";

//propre aux chaussures Femme
$couleur1 = isset($_POST["couleur1"])? $_POST["couleur1"] : "";
$couleur2 = isset($_POST["couleur2"])? $_POST["couleur2"] : "";


if(isset($_POST["submit"]))
{
    //Si un des champs commun est vide 
    if ($nom=="" || $descrip=="" || $photo=="" || $prix=="")
    {
        //on affiche un message informant que des champs sont vides
        //on invite l'utilisateur à ré-essayer de se créer un compte via un bouton
        echo "<br><br>
                <div class='bord'>
                    <br><p class='titre'>Champ(s) vide(s) !!!</p>
                </div>
              <br><br>
                <div id='centrerB'>
                    <form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Ré-essayer de se créer un compte</button></form>
                </div>";
        
    }
    else
    {
        //Identifier la BDD
        $database = "eceamazon";
        //Connexion dans la BDD
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) 
        { 
            //si l'item ajouté est une Musique ou un Livre
            if($categorie == "Musique")
            {
                $sql = "INSERT INTO item (nom, descrip, photo, prix, auteur, video, categorie, vendeur_email) values ('$nom', '$descrip', '$photo', '$prix', '$auteur','$video','$categorie', '$email')"; 
                 
                if (mysqli_query($db_handle, $sql)) //Si la requête a bien été réalisée
                {
                    //on affiche un message informant que l'item a été ajouté avec SUCCES
                    //ainsi, on invite l'utilisateur à retourner sur son compte Vendeur
                    echo "<div class='uploadImgUser'>";
                    echo "<p class='titre'>L'item $auteur - $nom a bien été ajouté à la vente.</p>";
                    echo "</div>";

                    echo "
                        <div id='centrerB'><br><br>
                                <form method='post' action='loginVendeur.php'>
                                    <input type='hidden' name='email' value='".$email."'></input>
                                    <input type='hidden' name='pseudo' value='".$pseudo."'></input>
                                    <button id='submitB' type='submit'>Retourner à la page de votre compte vendeur.</button>
                                    
                                </form>
                            </div>";

                } 
                else 
                {
                    echo "Error database: " . mysqli_error($db_handle);
                }
            }
            else if ($categorie == "livre")
            {
                $sql = "INSERT INTO item (nom, descrip, photo, prix, auteur, categorie, vendeur_email) values ('$nom', '$descrip', '$photo', '$prix', '$auteur','$categorie', '$email')"; 
                 
                if (mysqli_query($db_handle, $sql)) //Si la requête a bien été réalisée
                {
                    //on affiche un message informant que l'item a été ajouté avec SUCCES
                    //ainsi, on invite l'utilisateur à retourner sur son compte Vendeur
                    echo "<div class='uploadImgUser'>";
                    echo "<p class='titre'>L'item $auteur - $nom a bien été ajouté à la vente.</p>";
                    echo "</div>";

                    echo "
                        <div id='centrerB'><br><br>
                                <form method='post' action='loginVendeur.php'>
                                    <input type='hidden' name='email' value='".$email."'></input>
                                    <input type='hidden' name='pseudo' value='".$pseudo."'></input>
                                    <button id='submitB' type='submit'>Retourner à la page de votre compte vendeur.</button>
                                    
                                </form>
                            </div>";

                } 
                else 
                {
                    echo "Error database: " . mysqli_error($db_handle);
                }
            }
            else if ($categorie == "sport")
            {
                $sql = "INSERT INTO item (nom, descrip, photo, prix, categorie, vendeur_email) values ('$nom', '$descrip', '$photo', '$prix','$categorie', '$email')"; 
                 
                if (mysqli_query($db_handle, $sql)) //Si la requête a bien été réalisée
                {
                    //on affiche un message informant que l'item a été ajouté avec SUCCES
                    //ainsi, on invite l'utilisateur à retourner sur son compte Vendeur 
                    echo "<div class='uploadImgUser'>";
                    echo "<p class='titre'>L'activité $nom a bien été ajouté à la vente.</p>";
                    echo "</div>";

                    echo "
                        <div id='centrerB'><br><br>
                                <form method='post' action='loginVendeur.php'>
                                    <input type='hidden' name='email' value='".$email."'></input>
                                    <input type='hidden' name='pseudo' value='".$pseudo."'></input>
                                    <button id='submitB' type='submit'>Retourner à la page de votre compte vendeur.</button>
                                    
                                </form>
                            </div>";

                } 
                else 
                {
                    echo "Error database: " . mysqli_error($db_handle);
                }
            }
            else if ($categorie == "teeshirt")
            {
                $sql = "INSERT INTO item (nom, descrip, photo, prix, tailleS, tailleM, tailleL, categorie, vendeur_email) values ('$nom', '$descrip', '$photo', '$prix','$tailleS','$tailleM','$tailleL','$categorie', '$email')"; 
                 
                if (mysqli_query($db_handle, $sql)) //Si la requête a bien été réalisée
                {
                    //on affiche un message informant que l'item a été ajouté avec SUCCES
                    //ainsi, on invite l'utilisateur à retourner sur son compte Vendeur 
                    echo "<div class='uploadImgUser'>";
                    echo "<p class='titre'>Le $nom a bien été ajoutée à la vente.</p>";
                    echo "</div>";

                    echo "
                        <div id='centrerB'><br><br>
                                <form method='post' action='loginVendeur.php'>
                                    <input type='hidden' name='email' value='".$email."'></input>
                                    <input type='hidden' name='pseudo' value='".$pseudo."'></input>
                                    <button id='submitB' type='submit'>Retourner à la page de votre compte vendeur.</button>
                                    
                                </form>
                            </div>";

                } 
                else 
                {
                    echo "Error database: " . mysqli_error($db_handle);
                }
            }
            else if ($categorie == "chaussh")
            {
                $sql = "INSERT INTO item (nom, descrip, photo, prix, tailleCh1, tailleCh2, tailleCh3, categorie, vendeur_email) values ('$nom', '$descrip', '$photo', '$prix','$tailleCh1','$tailleCh2','$tailleCh3','$categorie', '$email')"; 
                 
                if (mysqli_query($db_handle, $sql)) //Si la requête a bien été réalisée
                {
                    //on affiche un message informant que l'item a été ajouté avec SUCCES
                    //ainsi, on invite l'utilisateur à retourner sur son compte Vendeur 
                    echo "<div class='uploadImgUser'>";
                    echo "<p class='titre'>La chaussure $nom a bien été ajoutée à la vente.</p>";
                    echo "</div>";

                    echo "
                        <div id='centrerB'><br><br>
                                <form method='post' action='loginVendeur.php'>
                                    <input type='hidden' name='email' value='".$email."'></input>
                                    <input type='hidden' name='pseudo' value='".$pseudo."'></input>
                                    <button id='submitB' type='submit'>Retourner à la page de votre compte vendeur.</button>
                                    
                                </form>
                            </div>";

                } 
                else 
                {
                    echo "Error database: " . mysqli_error($db_handle);
                }
            }
            else if ($categorie == "chaussf")
            {
                $sql = "INSERT INTO item (nom, descrip, photo, prix, tailleCh1, tailleCh2, tailleCh3, couleur1, couleur2, categorie, vendeur_email) values ('$nom', '$descrip', '$photo', '$prix','$tailleCh1','$tailleCh2','$tailleCh3','$couleur1','$couleur2','$categorie', '$email')"; 
                 
                if (mysqli_query($db_handle, $sql)) //Si la requête a bien été réalisée
                {
                    //on affiche un message informant que l'item a été ajouté avec SUCCES
                    //ainsi, on invite l'utilisateur à retourner sur son compte Vendeur 
                    echo "<div class='uploadImgUser'>";
                    echo "<p class='titre'>Le $nom a bien été ajouté à la vente.</p>";
                    echo "</div>";

                    echo "
                        <div id='centrerB'><br><br>
                                <form method='post' action='loginVendeur.php'>
                                    <input type='hidden' name='email' value='".$email."'></input>
                                    <input type='hidden' name='pseudo' value='".$pseudo."'></input>
                                    <button id='submitB' type='submit'>Retourner à la page de votre compte vendeur.</button>
                                    
                                </form>
                            </div>";

                } 
                else 
                {
                    echo "Error database: " . mysqli_error($db_handle);
                }
            }

            else
            {
                echo "petit pb";
            }

        }
        else
        {
            echo "Sorry, Database not found";
        }

        //echo "NB DE FOIS QUE CA CREE UN COMPTE : ".$cpt." ";
        mysqli_close($db_handle);
    }
}

?>