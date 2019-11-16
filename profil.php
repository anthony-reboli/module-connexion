<!DOCTYPE html>
<html>

<?php
session_start();
$connexion = mysqli_connect("localhost","root","","moduleconnexion");
$requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
$req = mysqli_query($connexion, $requete);
$data = mysqli_fetch_assoc($req);
?>

    <head>
        <title>moduleconnexion</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href= "profil.css">
    </head>
        
        <?php
    if ($_SESSION['login'] == true)
    {
    include 'barnavco.php';
}
    else
    {
        include 'barnav.php';
    }
    ?>

 <body id="Alexfond">

            <h1 id="h1">Modifiez votre profil</h1><br>

                <div>

                    <form method="POST" action="profil.php">

                        <label>nouveau mot de passe:</label>
                        <input type="password" value="<?php echo $data['password']?>" placeholder="nouveau mot de passe" name="mdp"></input><br><br/>

                        <label>nouvel identifiant</label>
                        <input type="text" value="<?php echo $data['login']?>" placeholder="Nouvel identifiant" name="login"></input><br><br/>

                        <label>nouveau prenom:</label>
                        <input type="text" value="<?php echo $data['prenom']?>" placeholder="Nouveau prenom" name="prenom"></input><br><br/>

                        <label>nouveau nom:</label>
                        <input type="text" value="<?php echo $data['nom']?>" placeholder="Nouveau nom" name="nom"></input><br><br/>
            
                        <input type="submit" name="Modifier" value ="Valider">

                    </form><br>

                </div>
<?php

if (isset($_POST['Modifier']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $passe = $_POST['mdp'];

    $requete2 = "UPDATE utilisateurs SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$passe' WHERE login = '".$_SESSION['login']."'";
    $query2=mysqli_query($connexion,$requete2);
    // $query= mysqli_query($connexion,$requete2);
}
else
{
    echo "le if ne marche pas";
}

?>
        <footer>

            <div id="logo">
                <img height="60"src="logoface.png">
                <img class=log2 height="60"src="logotwit.png">

            </div>

        </footer>

</body>