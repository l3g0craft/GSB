<?php

include '../fonctiongenevisiteur.php';
        // Connexion    la base de donn  es gsb_frais
$cnxBDD = connexion();
$id=idSQL('fichefrais');



$resultat=[];
$idvisite=$_GET['id'];
$date = date("Y-m-d"); 
$mois =$_GET['mois'];
$annee = $_GET['annee'];
$repas =$_GET['repas'];
$nuitees = $_GET['nuitees'];
$etape =$_GET['etape'];
$km = $_GET['km'];
$modifier = $_GET['modifier'];

$resultat=[intval($etape),intval($km),intval($nuitees),intval($repas)];

    
$a=0;
$i=0;
$forfait = [];


$select_forfait= "SELECT id,libelle,montant FROM forfait" ;
$result= $cnxBDD->query($select_forfait);
    while ($row = mysqli_fetch_assoc($result)){
        $i++;
        $forfait[$i]=$row['montant'];
    }
$montant=$forfait[1]*$etape+$forfait[2]*$km+$forfait[3]*$repas+$forfait[4]*$nuitees;

var_dump ($forfait) ;


if($modifier==1){
    while($a<=count($T)-1){

        $sql="UPDATE lignefraisforfait SET quantite=$resultat[$a] where idFicheFrais=1 and idForfait='$T[$a]' ;";
        $a++;
        echo "Sql : ".$sql."<br />";
        $result = $cnxBDD->query($sql)
            or die ("Requete invalide : ".$sql);
        
        
    }
        $sql="UPDATE fichefrais SET montantValide=$montant where id=1 ;";
        echo "Sql : ".$sql."<br />";
        $result = $cnxBDD->query($sql)
            or die ("Requete invalide : ".$sql);
}else{


    $sql="INSERT INTO fichefrais (id,idvisiteur,mois,annee,montantValide,dateModif,idEtat) VALUES ($id,$idvisite,$mois,$annee,$montant,'$date','CR');";

    echo "Sql : ".$sql."<br />";
    $result = $cnxBDD->query($sql)
        or die ("Requete invalide : ".$sql);



        #ecrire lignefichefrais
        $T=["ETP","KM","NUI","REP"];
            for($a=0;$a<4;$a++){
                $table=[$etape,$km,$nuitees,$repas];
                $sql="INSERT INTO lignefraisforfait (idFicheFrais,idForfait,quantite) VALUES ('$id','$T[$a]','$table[$a]');";

                setlocale(LC_CTYPE, 'fr_FR');

                echo "Sql : ".$sql."<br />";
                $result = $cnxBDD->query($sql)
                    or die ("Requete invalide : ".$sql);
        

        }}






?>