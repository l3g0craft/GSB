<?php
	
	header('Content-type:text/html; charset=iso-8859-1');
	ini_set('display_errors', 1);
	include 'fonctiongenevisiteur.php';

   	// Connexion à la base de données gsb_frais
	$cnxBDD = connexion();

    // les noms sont dans le fichier nom.txt
	$NomFichier = 'nom.txt';
	$TabloNomFamille = file($NomFichier);

	// les prenoms garcon sont dans le fichier garcon.txt
	// les prenoms fille sont dans le fichier fille.txt
	// $NomFichier = 'fille.txt';
	$NomFichier = 'garcon.txt';
	$TabloPrenom = file($NomFichier);
	
	// Les adresse se trouvent dans le fichier adresse.txt
	$NomFichier = 'adresse.txt';
	$TablAdresse = file($NomFichier);

	// Les adresse postale se trouvent dans le fichier cp.txt
	$NomFichier = 'cp.txt';
	$TablCP = file($NomFichier);

	// Les adresse se trouvent dans le fichier adresse.txt
	$NomFichier = 'ville.txt';
	$TablVille = file($NomFichier);
		
	$i=1;
	while ($i<=100){

	// rand(x, y) fournit un nombre au hasard entre x et y
	$n = rand(1, sizeof($TabloNomFamille))-1;			// $n contient un numéro de ligne au hasard
	$p = rand(1, sizeof($TabloPrenom))-1;			// $p contient un numéro de ligne au hasard
	//$f = rand(1, sizeof($TabloPrenomFille));        //$f contient un numéro de ligne au hasard
	$a= rand(1, sizeof($TablAdresse))-1;				// $a contient un numéro de ligne au hasard
	$VI= rand(1, sizeof($TablVille))-1;



	// Insertion dans la table visiteur du nieme nom de famille et du pieme prenom 
	$sql="INSERT INTO visiteur (id, nom, prenom, adresse, cp, ville) VALUES ('$i','$TabloNomFamille[$n]', '$TabloPrenom[$p]', '$TablAdresse[$a]', '$TablCP[$VI]', '$TablVille[$VI]');";
	setlocale(LC_CTYPE, 'fr_FR');
	$sql=iconv('utf8', 'ASCII//TRANSLIT//IGNORE', $sql);
	echo "Sql : ".$sql."<br />";
	$result = $cnxBDD->query($sql)
 		or die ("Requete invalide : ".$sql);   
	$i++;
	}
	// Fermer la connexion MYSQL
	$cnxBDD->close();	 

?>


