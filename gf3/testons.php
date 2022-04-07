<?php 
$nomvisiteur=$_GET['nom'];
$prenomvisiteur=$_GET['prenom'];
?>
<html>
    <head>
        <title>Last 10 Results </title>
    </head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">

    <body>
    <h1>fiche de frais de : <?php echo " $nomvisiteur  $prenomvisiteur    " ?> <a href="../gf4/gf4.php?nom=<?php echo $nomvisiteur;?> & prenom=<?php echo $prenomvisiteur;?>,">  ajouter<img src="ajouter.png" class="image" ></a></h1>
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

        include '../fonctiongenevisiteur.php';
        // Connexion    la base de donn  es gsb_frais
        $cnxBDD = connexion();


        $montant= "SELECT fichefrais.id,mois,annee,montantValide,libelle,idEtat FROM fichefrais,Etat where idVisiteur in (select id from visiteur where nom='$nomvisiteur' and prenom='$prenomvisiteur') and fichefrais.idEtat=Etat.id ORDER BY annee DESC ,mois DESC ; " ;
        $result= $cnxBDD->query($montant);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td class="ligne"><?php print($row['mois'] ."/". $row['annee']." ". $row['montantValide'] ." ". $row['libelle']); ?></td>

                    <td class="ligne">
                        <?php if ($row['idEtat']=="CR"){?>
                            <a href="suprimer.php?id=<?php echo $row['id'];?>"><img src="supprimer.jpg"class="image"></a>
                        <?php } ?>
                    </td>

                    <td class="ligne">
                        <?php if ($row['idEtat']=="CR"){?>
                            <a href="../gf4/gf4.php?modifier=1 & id=<?php echo $row['id'];?>">
                            <img src="modifier.jpg" class="image" ></td>
                        <?php } ?>

                    <td class="ligne"><img src="voir.jpg" class="image" ></td>
                </tr>
            

        <?php } ?>
        </table>
            
    </body>
</html>