<?php
include '../fonctiongenevisiteur.php';

$cnxBDD = connexion();

$paiement=$_GET["bouton"];
$dateact = date("y-m-d");

$sql="UPDATE fichefrais SET dateModif='$dateact', idEtat='RB' WHERE idEtat='VA';";
	setlocale(LC_CTYPE, 'fr_FR');
			
	echo "Sql : ".$sql."<br />";
	$result = $cnxBDD->query($sql)
		or die ("Requete invalide : ".$sql); 

$sql="$paiement";
	setlocale(LC_CTYPE, 'fr_FR');
			
	echo "Sql : ".$sql."<br />";
	$result = $cnxBDD->query($sql)
		or die ("Requete invalide : ".$sql); 


$cnxBDD->close();	 
?>