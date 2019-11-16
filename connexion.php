<html>
<head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="index.css" media="screen" type="text/css" />
</head>
<?php
session_start();
    if ($_SESSION['login'] == true)
    {
    include 'barnavco.php';
}
    else
    {
        include 'barnav.php';
    }
    ?>
<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="connexion.php" method="POST">
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

            <label><b>Mot de passe</b></label>
            <input type="text" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='LOGIN' >
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        </form>
    </div>
    <div id="content">


        <!-- tester si l'utilisateur est connecté -->
        <?php

   

  ?>

</div>
</body>
</html>

<?php
if (!isset($_SESSION['login']))
{
    $_SESSION['login'] = '';
}

if(isset($_POST['login']) && isset($_POST['password']))
{
    // connexion à la base de données
    $connexion = mysqli_connect ("localhost", "root", "", "moduleconnexion");

    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $login = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['login'])); 
    $password = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['password']));
    
    if($login !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateurs where 
        login = '".$login."' and password = '".$password."' ";
        $exec_requete = mysqli_query($connexion,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count!=0 && $_SESSION['login'] == "")
        {

            $_SESSION['login'] = $login;
            $user = $_SESSION['login'];
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
        
   }
}    

if(isset($_GET['deconnexion']))
{

    echo "On vous deconnecte";
    session_unset();

}

if (isset($_SESSION['login']) && $_SESSION['login'] !== '')
{
    $user = $_SESSION['login'];
    echo "Bonjour $user, vous êtes connecté";
    echo "<a href='connexion.php?deconnexion=true'><span>Déconnexion</span></a>";
}



?>