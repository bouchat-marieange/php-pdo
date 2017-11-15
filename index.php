<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Titre du document</title>
</head>

<body>

  <?php
  try
  {
    // On se connecte à MySQL
    $BD = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'user');
  }
  catch(Exception $e)
  {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
  }

  // On stocke dans une variable $resultat la totalité du tableau (toutes ses cellules) (*) de la table (array) Météo
  // On récupére le contenu de la table Météo
  $resultat = $BD->query('SELECT * FROM Météo');

  // Grâce à la fonction fetch() on récupère et on stocke dans une variable $donnees, toutes les données du tableau météo pour pouvoir les traiter
  $donnees = $resultat->fetch();

  echo '<h2>Affichage du tableau HTML rangée par rangée du tableau retourné</h2>';

  // On affiche un tableau html avec une rangée par rangée le tableau retourné
  echo '<table>';
  while ($donnees = $resultat->fetch())
  {
    echo '<tr><td>'.$donnees['ville']. '</td><td>'. $donnees['haut']. '</td><td>' . $donnees['bas']. '</td></tr>';
  }
  echo '</table>';
  ?>

  <h2>Ajouter de nouvelles villes et températures</h2>

  <form method="post" action="traitement.php">
    <div class="ligne_form">
      <label for="ville">Ville : </label>
      <input id="ville" type = "text"  name="ville" />
    </div>

    <div class="ligne_form">
      <label for="haut">T° max : </label>
      <input id="haut" type = "number"  name="haut" />
    </div>

    <div class="ligne_form">
      <label for="bas">T° min : </label>
      <input id="bas" type = "number"  name="bas" />
    </div>


    <div class="button">
      <input class="button" type="submit" value="Ajouter"/>
    </div>
  </form>


</body>

</html>
