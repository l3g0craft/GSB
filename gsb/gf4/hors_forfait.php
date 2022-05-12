<?php
include '../fonctiongenevisiteur.php';

$cnxBDD=connexion();

$date=$_GET['Date'];
$libelle=$_GET['libelle'];
$montant=$_GET['Montant'];
$id=$_GET["id"];


$identifiant=idSQL('ligne_frais_hors_forfait');
$sql="INSERT INTO ligne_frais_hors_forfait (ID,FFR_ID,LIBELLE,MONTANT,ETA_ID,DTE) 
VALUES ($identifiant,$id,'$libelle',$montant,'CL','$date');";
$requete = $cnxBDD->query($sql)
or die ("Requete invalide : ".$sql);


$cnxBDD->close();

echo "<script>
window.history.go(-2);
</script>";

?>