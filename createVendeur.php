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

$cpt =0;
$alreadyExist = false;

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
            //Vérifions que l'email entré (clé primaire) n'existe pas déjà dans la bdd
            $sql1 = "SELECT email FROM vendeur";
            $result = mysqli_query($db_handle, $sql1);   
             
            if (mysqli_num_rows($result) == 0) //si la bdd est nulle
            {
                //La bdd est nulle
                echo "<br><br><div class='bord'><br>";
                echo "<p class='titre'>il n'existe pas encore de vendeur.</p></div>";
                echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Créer un compte</button></div></form>";
            } 
            else 
            {
                //vérifie qu'aucun email déjà existant ne soit égal à celui entré dans le formulaire
                while ($data = mysqli_fetch_assoc($result)) 
                {
                    if ($email==$data["email"] )
                    {
                        $alreadyExist=true;
                        //l'email entré existe déjà
                        echo "<br><br><div class='bord'><br>";
                        echo "<p class='titre'>l'email existe déjà dans la bdd</p></div>";
                        echo "<BR><br><div id='centrerB'><form><button id='submitB' type='submit' formaction='createVendeurForm.php'>Ré-essayer de créer un compte</button></div></form>";
                    }
                    
                }

                if($alreadyExist==false) //si l'email entré existe déjà
                {
                    //$cpt++;
                    $sql2 = "INSERT INTO vendeur(email, pseudo, photo, img_fond) values ('$email', '$pseudo', '$photo', '$img_fond')";
                
                    //regarder s'il y a de résultat
                    if (mysqli_query($db_handle, $sql2)) 
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
                }
                 
                
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