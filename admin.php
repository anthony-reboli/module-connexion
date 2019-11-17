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

 $connexion = mysqli_connect("localhost", /*nom de l'admin entre guillemet*/"root", /*mot de passe entre guillemet*/"", /*nom de la base de donnée entre guillemet*/"moduleconnexion");
  $requete = /*Choix de la requête*/"SELECT `utilisateurs`.`id`, `utilisateurs`.`login`, `utilisateurs`.`prenom`, `utilisateurs`.`nom`, `utilisateurs`.`password`
FROM `utilisateurs`;";
  $query = mysqli_query(/*Ce que l'on veut afficher*/$connexion, $requete);
  $resultat = mysqli_fetch_all($query) /*afficher le résultart*/;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta sharset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
        <link rel="stylesheet" href= "admin.css">
        <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">

    </head>



<body>

<?php

if ($_SESSION['login'] !="admin")
{
  echo "Vous n'avez pas acces a la page";
}
else{

  echo "<div id=\"personnesinscrites\">
  <table border>
        <tr>
          <th>ID</th><th>login</th><th>Prénom</th><th>Nom</th><th>Password</th>

        </tr>
</div>";

    foreach($resultat as $key)
    {
      echo "<tr>";
      foreach($key as $value)
      {
        echo "<td>".$value."</td>";
      }
      echo "</tr>";
    }
   echo "</table>";


}

?>






</body>
