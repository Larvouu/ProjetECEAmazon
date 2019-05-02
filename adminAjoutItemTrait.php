<head>
    <title>ECE Amazon</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='createVendeurForm.css' rel='stylesheet' type='text/css'>
</head>

<?php include 'navbar.php';

//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";

if($categorie == "musique")//nom(titre), auteur(artiste), descrip(genre), photo, prix, ----- vendeur_email, categorie,
{
    echo "
        <div class='uploadImgUser'>
            <strong style='color:#ffe0ef;'>Compléter les informations de la musique à ajouter:</strong>
            <form action='adminAjoutItem.php' method='post'>
                
            <table style='margin-left:30px;'>
                <tr>
                    <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Titre de la musique :</strong></td>
                    <td><input type='text' name='nom' placeholder='ex : Stand by Me'/></td>
                </tr>

                <tr>
                    <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Artiste :</strong></td>
                    <td><input type='text' name='auteur' placeholder='ex : Ben E. King'/></td>
                </tr>

                <tr>
                    <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Genre :</strong></td>
                    <td><input type='text' name='descrip' placeholder='ex : Soul'/></td>
                </tr>

                <tr>
                    <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Lien photo :</strong></td>
                    <td><input type='text' name='photo' placeholder='ex : img/nomPhoto.jpg'/></td>
                </tr>

                <tr>
                    <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Prix :</strong></td>
                    <td><input type='text' name='prix' placeholder='ex : 0.99&#8364'/></td>
                </tr>

            </table>
                <br><br>
                <input class='button' type='submit' name='submit' value='ENTER'/>
        
            </form>
        </div>";
}
else if ($categorie == "livre")//nom, auteur, descrip(description), photo,  prix, ----- vendeur_email, categorie
{
    echo "
    <div class='uploadImgUser'>
        <strong style='color:#ffe0ef;'>Compléter les informations du livre à ajouter:</strong>
        <form action='adminAjoutItem.php' method='post'>
            
        <table style='margin-left:30px;'>
            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Titre du livre : </strong></td>
                <td><input type='text' name='nom' placeholder='ex : Les Misérables'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Auteur : </strong></td>
                <td><input type='text' name='auteur' placeholder='ex : Victor Hugo'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Prix :</strong></td>
                <td><input type='text' name='prix' placeholder='ex : 4,49&#8364'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Date de parution : </strong></td>
                <td><input type='text' name='descrip' placeholder='ex : 1862'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Page de couverture:</strong></td>
                <td><input type='text' name='photo' placeholder='ex : img/nomImage.jpg'/></td>
            </tr>

        </table>
            <br><br>
            <input class='button' type='submit' name='submit' value='ENTER'/>
    
        </form>
    </div>";
}
else if ($categorie == "sport")//nom, photo, descrip(descrip + durée), prix, ------- vendeur_email, categorie
{
    echo "
    <div class='uploadImgUser'>
        <strong style='color:#ffe0ef;'>Compléter les informations du sport/loisir à ajouter:</strong>
        <form action='adminAjoutItem.php' method='post'>
            
        <table style='margin-left:30px;'>
            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Nom de l'activité :</strong></td>
                <td><input type='text' name='nom' placeholder='ex : EuropaPark (PASS 1 DAY)'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Description :</strong></td>
                <td><input type='text' name='descrip' placeholder='ex : Meilleur parc d'attraction'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Prix :</strong></td>
                <td><input type='text' name='photo' placeholder='ex : 54.00&#8364'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Photo de l'activité :</strong></td>
                <td><input type='text' name='photo' placeholder='ex : img/nomImage.jpg'/></td>
            </tr>

        </table>
            <br><br>
            <input class='button' type='submit' name='submit' value='ENTER'/>
    
        </form>
    </div>";
}
else if ($categorie == "teeshirt")//nom, descrip, photo, prix, tailleS, tailleM, tailleL, ------- vendeur_email, categorie
{
    echo "
    <div class='uploadImgUser'>
        <strong style='color:#ffe0ef;'>Compléter les informations du TeeShirt à ajouter:</strong>
        <form action='adminAjoutItem.php' method='post'>
            
        <table style='margin-left:30px;'>
            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Nom du TeeShirt :</strong></td>
                <td><input type='text' name='nom' placeholder='ex : TeeShirt Calvin Klein'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Description :</strong></td>
                <td><input type='text' name='descrip' placeholder='ex : col rond, cintré'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Photo du TeeShirt:</strong></td>
                <td><input type='text' name='photo' placeholder='ex : img/nomPhoto.jpg'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Prix :</strong></td>
                <td><input type='text' name='prix' placeholder='ex : 36.50&#8364'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Tailles disponibles: </strong></td>
                
            </tr>
        </table><input type='text' name='tailleS' placeholder='ex : S'/><br>
                <input type='text' name='tailleM' placeholder='ex : M'/><br>
                <input type='text' name='tailleL' placeholder='ex : L'/>
            <br><br>
            <input class='button' type='submit' name='submit' value='ENTER'/>
    
        </form>
    </div>";
}
else if ($categorie == "chaussh")//nom, descrip, photo, prix, tailleCh1, tailleCh2, tailleCh3 ---- vendeur_email, categorie
{
    echo "
    <div class='uploadImgUser'>
        <strong style='color:#ffe0ef;'>Compléter les informations de la chaussure Homme à ajouter:</strong>
        <form action='adminAjoutItem.php' method='post'>
            
        <table style='margin-left:30px;'>
            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Nom de la chaussure :</strong></td>
                <td><input type='text' name='nom' placeholder='ex : Nike SB Janoski'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Description :</strong></td>
                <td><input type='text' name='descrip' placeholder='ex : for daily use or skateboard'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Lien photo :</strong></td>
                <td><input type='text' name='photo' placeholder='ex : img/nomPhoto.jpg'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Prix :</strong></td>
                <td><input type='text' name='img_fond' placeholder='ex : 72.00&#8364'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Tailles disponibles :</strong></td>
            </tr>
        </table>
                <input type='text' name='tailleCh1' placeholder='ex : 41'/><br>
                <input type='text' name='tailleCh2' placeholder='ex : 42'/><br>
                <input type='text' name='tailleCh3' placeholder='ex : 44'/>

            <br><br>
            <input class='button' type='submit' name='submit' value='ENTER'/>
    
        </form>
    </div>";
}
else if ($categorie == "chaussf")//nom, descrip, photo, prix, tailleCh1, tailleCh2, tailleCh3, couleur1, couleur2, ----- vendeur_email, categorie
{
    echo "
    <div class='uploadImgUser'>
        <strong style='color:#ffe0ef;'>Compléter les informations de la chaussure Femme à ajouter:</strong>
        <form action='adminAjoutItem.php' method='post'>
            
        <table style='margin-left:30px;'>
            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Nom de la chaussure :</strong></td>
                <td><input type='text' name='nom' placeholder='ex : Bottines talons Minelli '/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Description :</strong></td>
                <td><input type='text' name='descrip' placeholder='ex : faux-leather noir'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Lien photo :</strong></td>
                <td><input type='text' name='photo' placeholder='ex : img/nomPhoto.jpg'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Prix :</strong></td>
                <td><input type='text' name='img_fond' placeholder='ex : 72.00&#8364'/></td>
            </tr>

            <tr>
                <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Tailles disponibles :</strong></td>
            </tr>
        </table>
                <input type='text' name='tailleCh1' placeholder='ex : 36'/><br>
                <input type='text' name='tailleCh2' placeholder='ex : 37'/><br>
                <input type='text' name='tailleCh3' placeholder='ex : 38'/><br>
        <table>
            <tr>
            <td><strong style='color:#ffe0ef; font-family: Ebrima; font-size: 19px;'>Couleurs disponibles :</strong></td>
            </tr>
        </table>
                <input type='text' name='couleur1' placeholder='ex : orange'/><br>
                <input type='text' name='couleur2' placeholder='ex : violet'/><br>

        <br><br>
        <input class='button' type='submit' name='submit' value='ENTER'/>
    
        </form>
    </div>";
}
else
{
    echo "there is a problem .........";
}



?>


<br><br>
<footer>
<small>
    <p>
        Tous droits reserves | Copyright © 2019, ECE Amazon, Paris | Sarah Le, Antoine Ghiassi, Axel Vinant 
    </p>
</small>
</footer>

