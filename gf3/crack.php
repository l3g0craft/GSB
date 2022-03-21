<?php
            $include 'fonctiongenevisiteur.php';
            // Connexion    la base de donnes gsb_frais
            $cnxBDD = connexion();

            $idforfait = "SELECT id FROM etat" ;
            $result= $cnxBDD->query($idforfait);
            while ($row = mysqli_fetch_assoc($result)){
            echo $row['id'];
            }
?>