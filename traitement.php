<?php
$nouvelle_ville = $_POST['ville'];
$nouveau_max = $_POST['haut'];
$nouveau_min = $_POST['bas'];

echo $nouvelle_ville;
echo $nouveau_max;
echo $nouveau_min;

//PHP ne comprend pas les instructions mySQL indiquée directement, il faut respecter plusieurs étrader_cdlgapsidesidewhite

//indiquer à php la DB concernée
$BD = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'user');

//Formuler la requête pour l'ajout de données dans la DB
$req =$BD->prepare("INSERT INTO Météo (ville,haut,bas) VALUES(:ville, :haut, :bas)");

//Indiqué une correspondance sous forme de tableau associatif entre le nom des VALUES et leurs valeurs
$req->execute
([
  "ville"=>$nouvelle_ville,
  "haut"=>$nouveau_max,
  "bas"=>$nouveau_min
]);
?>
