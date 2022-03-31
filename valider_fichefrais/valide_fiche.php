<?php
setlocale(LC_CTYPE, 'fr_FR');

//récupère les fonction du fichier fonctionsql.php
include '../fonctiongenevisiteur.php';

//connection à la base de donnée
$cnxBDD = connexion();

//récupération des données du formulaire html
$visiteur=$_GET["visiteur"];
$mois=$_GET["mois"];
$annee=$_GET["annee"];
$situation=$_GET["valide"];
$nbrjustificatifs=$_GET["nb_justificatifs"];
$requete=$_GET["bouton"];
$repas=$_GET["repas"];
$nuitee=$_GET["nuitee"];
$etape=$_GET["Etape"];
$km=$_GET["Km"];

//affichage des données du formulaires html
/*
echo("<br/>visiteur =>".$visiteur);
echo("<br/>mois =>".$mois);
echo("<br/>annee =>".$annee);
echo("<br/>situation =>".$situation);
echo("<br/>nbjustificatifs =>".$nbrjustificatifs);
echo("<br/>requete =>".$requete);
echo("<br/>repas =>".$repas);
echo("<br/>nuitee =>".$nuitee);
echo("<br/>etape>".$etape);
echo("<br/>km =>".$km."<br/>");
*/

//Initialisation pour la récupération de l'id du visiteur sélectionné
$idvisiteur="SELECT visiteur.id FROM visiteur,fichefrais WHERE fichefrais.idVisiteur=visiteur.id AND prenom='$visiteur';";
	$requeteid = $cnxBDD->query($idvisiteur)
	or die ("Requete invalide : ".$idvisiteur);

//Valide l'état fichefrais grace à l'id visiteur
if($situation=="valide"){
	//récupération de l'id du visiteur
	while($row = mysqli_fetch_assoc($requeteid)) {
    	$idvalide="UPDATE fichefrais SET idEtat='Valide' WHERE idVisiteur=$row[id] AND annee='$annee';";
        $justif="UPDATE fichefrais SET nbJustificatifs=$nbrjustificatifs WHERE idVisiteur=$row[id] AND annee='$annee';";
	}

	//execution de la requete idvalide
	echo "Sql : ".$idvalide."<br />";
    echo "Sql : ".$justif."<br />";
	$result = $cnxBDD->query($idvalide)
		or die ("Requete invalide : ".$idvalide); 
    $result = $cnxBDD->query($justif)
        or die ("Requete invalide : ".$justif);
}

//N e valide pas l'état fichefrais grace à l'id visiteur
if($situation=="non valide"){

	//récupération de l'id du visiteur
	while($row = mysqli_fetch_assoc($requeteid)) {
    	$idinvalide="UPDATE fichefrais SET idEtat='NonValide' WHERE idVisiteur=$row[id] AND annee='$annee';";
        $justif="UPDATE fichefrais SET nbJustificatifs=$nbrjustificatifs WHERE idVisiteur=$row[id] AND annee='$annee';";
	}

	//execution de la requete idinvalide
	echo "Sql : ".$idinvalide."<br />";
    echo "Sql : ".$justif."<br />";
	$result = $cnxBDD->query($idinvalide)
		or die ("Requete invalide : ".$idinvalide);
    $result = $cnxBDD->query($justif)
        or die ("Requete invalide : ".$justif); 
}

$cnxBDD->close();

/*
$select="SELECT prenom FROM visiteur,fichefrais WHERE fichefrais.idVisiteur=visiteur.id AND idEtat='Cloturee';";
	setlocale(LC_CTYPE, 'fr_FR');
			
	$resultat = $cnxBDD->query($select)
		or die ("Requete invalide : ".$select); 

		while($row= mysqli_fetch_assoc($resultat)){
					echo "<option value='$row[prenom]'>$row[prenom]</option>";
					echo '</br>';
		}

		$select = 'SELECT prenom FROM visiteur,fichefrais WHERE fichefrais.idVisiteur=visiteur.id AND idEtat="Cloturee";';
		$result = $cnxBDD->query($select);
		echo '<label for="Visiteur">Visiteur :</label>'; 
		echo '<select name="visiteur" id="visiteur">'; 
		while($row = mysqli_fetch_assoc($result)) {

			echo "<option value='$row[prenom]'>$row[prenom]</option>";
		}
		echo '</select>'; 
*/

?>