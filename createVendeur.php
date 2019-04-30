<?php 

echo "<head>
            <link href='createVendeur.css' rel='stylesheet' type='text/css'>
    </head>";

//Déclaration et initialisation des variables $email et $pseudo 
//avec ce qui a été passé par méthode POST
$email = isset($_POST["email"])? $_POST["email"] : "";
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$img_fond = isset($_POST["img_fond"])? $_POST["img_fond"] : "";


if(isset($_POST["submit"]))
{
    //Si un des champs est vide
    if ($email=="" || $pseudo=="" || $photo=="" || $img_fond=="")
    {
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
            $sql = "INSERT INTO vendeur(email, pseudo, photo, img_fond) values ('$email', '$pseudo', '$photo', '$img_fond')";
        
            //regarder s'il y a de résultat
            if (mysqli_query($db_handle, $sql)) 
            {
                echo "<div class='bord'>";
                echo "<p class='titre'>Les informations du compte créé ont bien été ajouté dans la bdd.</p>";
                echo "</div>";

                echo "<div id='centrerB'>
                            <form><button id='submitB' type='submit' formaction='loginVendeurForm.php'>Connectez-vous dès maintenant !</button></form>
                        </div>";

            } 
            else 
            {
                echo "Error creating database: " . mysqli_error($db_handle);
            }
            mysqli_close($db_handle);
        }
        else
        {
            echo "Sorry, Database not found";
        }
        
    }
}

?>