<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['login']))
{
    $_SESSION['login'] = '';
}

?>

    <head>
        <title>moduleconnexion</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href= "index.css">
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

        <h1 id="h1">Bienvenue sur notre site<br>et bonne navigation</h1><br><br>

            <div id="bouton">

                <p>Cliquez ci-dessous pour commencer<p><br>

                     <form action="inscription.php" method="POST">

                        <input type="submit" name="Commencer" value="Commencer">

                    </form>
            </div>

        <footer>

            <div id="logo">
                <img height="60"src="logoface.png">
                <img class=log2 height="60"src="logotwit.png">

            </div>

        </footer>

</body>
        


        