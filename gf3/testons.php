<?php
//conexion
header('Content-type:text/html; charset=iso-8859-1');
include 'fonctiongenevisiteur.php';
$cnxBDD = connexion();


//sortie de la BD
$montant= "SELECT id FROM fichefrais where id=$i";
$result= $cnxBDD->query($montant);
while ($row = mysqli_fetch_assoc($result)){}
    $idfrais=$row['id'];
    echo $idfrais;
}
?>