<?php
include '../fonctiongenevisiteur.php';

$cnxBDD=connexion();
    $suppr=$_GET['suppr'];

    $result=$cnxBDD->query($suppr) or die ("Requete invalide : ".$suppr); 

    $cnxBDD->close();

    echo "<script>
window.history.go(-1);
</script>";

?>