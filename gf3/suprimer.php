<?php


include '../fonctiongenevisiteur.php';
// Connexion  la base de donnes gsb_frais
$cnxBDD = connexion();


$id =$_GET['id'];

$sql="DELETE FROM  fichefrais WHERE id=$id;";

echo "Sql : ".$sql."<br />";
$result = $cnxBDD->query($sql)
 	or die ("Requete invalide : ".$sql);  
?>