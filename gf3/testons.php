<?php $visiteur="Lucas"?>
<html>
    <head>
        <title>Last 10 Results <?php echo $visiteur ?> </title>
    </head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">

    <body>
        <h1>fiche de frais : <?php echo $visiteur ?><a>ajouter<img src="ajouter.png" class="image" ></a></h1>
    <table>
    <thead>
        <tr>
            <td>date</td>
            <td>supprimer</td>
            <td>modifier</td>
            <td>voir</td>
        </tr>
    </thead>
    <?php

        include 'fonctiongenevisiteur.php';
        // Connexion    la base de donn  es gsb_frais
        $cnxBDD = connexion();


        $montant= "SELECT id FROM fichefrais " ;
        $result= $cnxBDD->query($montant);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td class="ligne"><?php print($row['id']); ?></td>
                    <td class="ligne"><img src="supprimer.jpg"class="image" ></td>
                    <td class="ligne"><img src="modifier.jpg" class="image" ></td>
                    <td class="ligne"><img src="voir.jpg" class="image" ></td>
                </tr>
            

        <?php } ?>
        </table>
            
    </body>
</html>