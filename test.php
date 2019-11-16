<!DOCTYPE html>
<html>

<?php
$connexion= mysqli_connect("localhost", "root", "", "moduleconnexion");
$requete= "Select * from article;";
$query= mysqli_query($connexion,$requete);
$resultat= mysqli_fetch_all($query);

?>


    <head>
        <title>moduleconnexion</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href= "profil.css">
    </head>

    <body>
        <form method="POST" action="text.php">
            <label>Voiture</label>
            <input type="text" name="voiture">
            
            <input type="submit" name="envoyer" value="valider">
</form>
<?php
// a reprendre ici
if (isset $_POST['envoyer'])
{
    $sql = "INSERT INTO article VALUES ($_POST['voiture'])";
    $query= mysqli_query($connexion,$sql);
}
?>