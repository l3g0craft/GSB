<?php
header('Content-type:text/html; charset=iso-8859-1');

include '../fonctiongenevisiteur.php';


// Connexion à la base de données gsb_frais
$cnxBDD = connexion();


$date = date("y-m-d"); 
$j=1;
for($i=1;$i<199;$i++){
     $mont=rand(1,1000);
     // Insertion dans la table visiteur du nieme nom de famille et du pieme prenom 
     $sql="INSERT INTO fichefrais (id, idVisiteur, mois, annee, montantValide, dateModif) VALUES ('$j','$i', '12', '2021','$mont','$date');";
     setlocale(LC_CTYPE, 'fr_FR');

     echo "Sql : ".$sql."<br />";
     $result = $cnxBDD->query($sql)
          or die ("Requete invalide : ".$sql);
     $j++;
     $sql="INSERT INTO fichefrais (id, idVisiteur, mois, annee, montantValide, dateModif) VALUES ('$j','$i', '01', '2022','$mont','$date');";
     echo "Sql : ".$sql."<br />";
     $result = $cnxBDD->query($sql)
          or die ("Requete invalide : ".$sql);
     $j++;
}

// Fermer la connexion MYSQL
$cnxBDD->close();	 

?>
