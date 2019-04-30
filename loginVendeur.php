<?php 
echo "<head>
        <link href='loginVendeur.css' rel='stylesheet' type='text/css'>
    </head>";


if (isset($_POST["email"]))
{
     //Déclaration et initialisation des variables $email et $pseudo 
     //avec ce qui a été passé par méthode POST
     $email = isset($_POST["email"])? $_POST["email"] : "";
     $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";

     //Identifier la BDD
     $database = "eceamazon";

     //Connexion dans la BDD
     $db_handle = mysqli_connect('localhost', 'root', '');
     $db_found = mysqli_select_db($db_handle, $database);

     if ($db_found) 
    {
        $sql = "SELECT email,pseudo FROM vendeur WHERE email = '$email' ";
        $result = mysqli_query($db_handle, $sql);
        
        //regarder s'il y a de résultat
        if (mysqli_num_rows($result) == 0) 
        {
            //l'email entré n'existe pas
            echo "l'email n'a pas été trouvé dans la bdd";
        } 
        else 
        {
            //l'email entré a été trouvé 
            while ($data = mysqli_fetch_assoc($result)) 
            {
                echo "email: " . $data['email'] . "<br>";
                echo "pseudo: " . $data['pseudo'] . "<br>";
                
            }
        }
    }
    else
    {
       echo "Sorry, Database not found";
    }
}
mysqli_close($db_handle);

?>