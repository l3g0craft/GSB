<?php
header('Content-type:text/html; charset=iso-8859-1');

include '../fonctiongenevisiteur.php';


// Connexion à la base de données gsb_frais
$cnxBDD = connexion();
$T=["ETP","KM","NUI","REP"];
for($i=1;$i<400;$i++){
     $montant= "SELECT id FROM fichefrais where id=$i" ;
     $result= $cnxBDD->query($montant);
     while ($row = mysqli_fetch_assoc($result)){
          $idfrais=$row['id'];
     }
     for($a=0;$a<4;$a++){
          
          $rand=rand(1,10);
          $sql="INSERT INTO lignefraisforfait (idFicheFrais,idForfait,quantite) VALUES ('$idfrais','$T[$a]','$rand');";

          setlocale(LC_CTYPE, 'fr_FR');

          echo "Sql : ".$sql."<br />";
          $result = $cnxBDD->query($sql)
               or die ("Requete invalide : ".$sql);

}}
// Fermer la connexion MYSQL
$cnxBDD->close();	 
?>
