<?php


include 'fonctiongenevisiteur.php';
// Connexion  la base de donnes gsb_frais
$cnxBDD = connexion();


$id =$_GET['id'];

$sql="DELETE FROM  fichefrais WHERE id=$id;";
setlocale(LC_CTYPE, 'fr_FR');
$sql=iconv('utf8', 'ASCII//TRANSLIT//IGNORE', $sql);
echo "Sql : ".$sql."<br />";
$result = $cnxBDD->query($sql)
 	or die ("Requete invalide : ".$sql);  
?>