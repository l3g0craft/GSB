<?php
setlocale(LC_CTYPE, 'fr_FR');

//récupère les fonction du fichier fonctionsql.php
include '../fonctiongenevisiteur.php';

//connection à la base de donnée
$cnxBDD = connexion();

$visiteur=$_GET['visiteur'];
$mois=$_GET["mois"];
$annee=$_GET["annee"];
$situation=$_GET["valide"];
$nbrjustificatifs=$_GET["nb_justificatifs"];
$requete=$_GET["bouton"];



//Initialisation pour la récupération de l'id du visiteur sélectionné
$idvisiteur="SELECT visiteur.id FROM visiteur,fichefrais WHERE fichefrais.idVisiteur=visiteur.id AND idVisiteur='$visiteur';";
$requeteid = $cnxBDD->query($idvisiteur)
	or die ("Requete invalide : ".$idvisiteur);

//Valide l'état fichefrais grace à l'id visiteur
if($situation=="valide"){
	//récupération de l'id du visiteur
	while($row = mysqli_fetch_assoc($requeteid)) {
    	$idvalide="UPDATE fichefrais SET idEtat='VA' WHERE idVisiteur=$row[id] AND mois='$mois' AND annee='$annee';";
        $justif="UPDATE fichefrais SET nbJustificatifs=$nbrjustificatifs WHERE idVisiteur=$row[id] AND mois='$mois' AND annee='$annee';";

	//execution de la requete idvalide
	echo "Sql : ".$idvalide."<br />";
    echo "Sql : ".$justif."<br />";
	$result = $cnxBDD->query($idvalide)
		or die ("Requete invalide : ".$idvalide); 
    $result = $cnxBDD->query($justif)
        or die ("Requete invalide : ".$justif);
	}
}

//N e valide pas l'état fichefrais grace à l'id visiteur
if($situation=="non valide"){

	//récupération de l'id du visiteur
	while($row = mysqli_fetch_assoc($requeteid)) {
    	$idinvalide="UPDATE fichefrais SET idEtat='NB' WHERE idVisiteur=$row[id] AND mois='$mois' AND annee='$annee';";
        $justif="UPDATE fichefrais SET nbJustificatifs=$nbrjustificatifs WHERE idVisiteur=$row[id] AND mois='$mois' AND annee='$annee';";

	//execution de la requete idinvalide
	$result = $cnxBDD->query($idinvalide)
		or die ("Requete invalide : ".$idinvalide);
    $result = $cnxBDD->query($justif)
        or die ("Requete invalide : ".$justif); 
	}
}

$cnxBDD->close();

?>