<?php 
include '../fonctiongenevisiteur.php';
// Connexion    la base de donn  es gsb_frais
$cnxBDD = connexion();


$nomvisiteur=$_GET['nom'];
$prenomvisiteur=$_GET['prenom'];
$montant= "SELECT idVisiteur FROM fichefrais,Etat where idVisiteur in (select id from visiteur where nom='$nomvisiteur' and prenom='$prenomvisiteur')";
$result= $cnxBDD->query($montant);
while ($row = mysqli_fetch_assoc($result)){  
    $id=$row['id'];
}


?>
<html>
    <head>
        <title>fiche de frais</title>
    </head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">

    <body>
        <div style=" width: 1000px;margin: 0 auto;">
            <h1>fiche de frais de : <?php echo " $nomvisiteur  $prenomvisiteur    " ?> <a href="../gf4/gf4.php?nom=<?php echo $nomvisiteur;?> & prenom=<?php echo $prenomvisiteur;?> & id=<?php echo $id;?>">  ajouter<img src="ajouter.png" class="image" ></a></h1>
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

                


                $montant= "SELECT fichefrais.id,mois,annee,montantValide,libelle,idEtat FROM fichefrais,Etat where idVisiteur in (select id from visiteur where nom='$nomvisiteur' and prenom='$prenomvisiteur') and fichefrais.idEtat=Etat.id ORDER BY annee DESC ,mois DESC ; " ;
                $result= $cnxBDD->query($montant);
                while ($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td class="ligne"><?php print($row['mois'] ."/". $row['annee']." ". $row['montantValide'] ." ". $row['libelle']); ?></td>

                            <td class="ligne">
                                <?php if ($row['idEtat']=="CR"){?>
                                    <a href="suprimer.php?id=<?php echo $id;?>"><img src="supprimer.jpg"class="image"></a>
                                <?php } ?>
                            </td>

                            <td class="ligne">
                                <?php if ($row['idEtat']=="CR"){?>
                                    <a href="../gf4/gf4.php?modifier=1 & id=<?php echo $id;?>">
                                    <img src="modifier.jpg" class="image" ></td>
                                <?php } ?>

                            <td class="ligne"><a href="../gf5/gf5.php?id=<?php echo $id;?> & nom=<?php echo $nomvisiteur;?> & prenom=<?php echo $prenomvisiteur;?> & mois=<?php echo $row['mois'];?> & annee=<?php echo $row['annee'];?>"><img src="voir.jpg" class="image" ></td>
                        </tr>
                    

                <?php } ?>
            </table>
        </div>        
    </body>
</html>