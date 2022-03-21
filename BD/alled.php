<?php
            $include 'fonctiongenevisiteur.php';
            // Connexion    la base de donnes gsb_frais
            $cnxBDD = connexion();

             $montant= "SELECT id FROM fichefrais" ;
	     $result= $cnxBDD->query($montant);
	     while ($row = mysqli_fetch_assoc($result)){
             $idfrais=$row['id'];
	     }

?>
