<?php

include '../fonctiongenevisiteur.php';
        // Connexion    la base de donn  es gsb_frais
$cnxBDD = connexion();
$id=idSQL('fichefrais')+1;

$date = date("Y-m-d"); 
$mois =$_GET['mois'];
$annee = $_GET['annee'];
$repas =$_GET['repas'];
$nuitees = $_GET['nuitees'];
$etape =$_GET['etape'];
$km = $_GET['km'];
$i=0;
$forfait = [];

$select_forfait= "SELECT id,libelle,montant FROM forfait" ;
$result= $cnxBDD->query($select_forfait);
    while ($row = mysqli_fetch_assoc($result)){
        $i++;
        $forfait[$i]=$row['montant'];
    }
$montant=$forfait[1]*$etape+$forfait[2]*$km+$forfait[3]*$repas+$forfait[4]*$nuitees;


$sql="INSERT INTO fichefrais (id,idvisiteur,mois,annee,montantValide,dateModif,idEtat) VALUES ($id,1,$mois,$annee,$montant,'$date','CR');";

echo "Sql : ".$sql."<br />";
$result = $cnxBDD->query($sql)
     or die ("Requete invalide : ".$sql);
?>