<?php
#$nom =$_GET['nom'];
#$prenom = $_GET['prenom'];
include '../fonctiongenevisiteur.php';
        // Connexion    la base de donn  es gsb_frais
$cnxBDD = connexion();
$modifier = $_GET['modifier'];
$id = $_GET['id'];
$i=0;
if($modifier==1){
    $id=$_GET['id'];
    $select_forfait= "SELECT quantite FROM lignefraisforfait where idfichefrais=$id"  ;
    $result= $cnxBDD->query($select_forfait);
    $lignefraisforfait=[];
    while ($row = mysqli_fetch_assoc($result)){
        $i++;
        $lignefraisforfait[$i]=$row['quantite'];
    }
    $repas =$lignefraisforfait[1];
    $nuitees =$lignefraisforfait[2];
    $etape =$lignefraisforfait[3];
    $km =$lignefraisforfait[4];
    echo $repas;
}

?>

<html>
    <head>
        <title>Gestion des frais</title>
    </head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">

    <body style="color: white";>
        
        
        <form action="hors_forfait.php" method="get">
            <div style="background-color: rgb(0, 174, 255); width: 600px;margin: 0 auto;">
            <div style="background-color: white;color: rgb(0, 132, 255);";>

                <h1>Gestion des Frais <img src="gf4.png" style="vertical-align:middle; "onclick="history.back(-1);"></h1>
            </div>    
            <h2>
                    Saisie
                </h2>
                <br>
                <table>
                    <tr>
                        <td style="width: 180px;">PERIODE </td>
                        <td >Mois (2 chiffres) :<input type="number" id="mois" value=<?php echo (date("m"));?> name="mois" required maxlength="2" class="saisie_input" readonly="readonly" ></td>
                        <td >Annee (4 chiffres) :<input type="text" id="annee" value=<?php echo (date("Y"));?> name="annee" required maxlength="4" class="saisie_input" readonly="readonly"></td>
                    </tr>
                    <tr>
                        <td>D'ENGAGEMENT</td>
                    </tr>
                </table>
                


                <br>

                <table class="frais" id="tableaux">
                    <?php if($modifier==1){?>
                        <tr>
                        <td>
                            <h2>
                                Hors Forfait
                            </h2>
                        </td>

                    <tr>
                        <td></td>
                        <td style="padding-right:50px">Date</td>
                        <td style="padding-right:50px">Libellé</td>
                        <td style="padding-right:50px">Montant</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input style="width:100px" type="text" name="Date" placeholder="Y-M-D">
                        </td>
                        <td>
                            <input style="width:100px" type="text" name="libelle">
                        </td>
                        <td>
                            <input style="width:100px" type="number" name="Montant">
                        </td>
                    </tr>


                    <?php }else{?>
                    <tr>
                        <td>
                            <h2>
                                Hors Forfait
                            </h2>
                        </td>

                    <tr>
                        <td></td>
                        <td style="padding-right:50px">Date</td>
                        <td style="padding-right:50px">Libellé</td>
                        <td style="padding-right:50px">Montant</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input style="width:100px" type="text" name="Date" placeholder="Y-M-D">
                        </td>
                        <td>
                            <input style="width:100px" type="text" name="libelle">
                        </td>
                        <td>
                            <input style="width:100px" type="number" min=0 name="Montant">
                        </td>

                    </tr>

                    <?php } ?>

                    
                    <input type="hidden" id="modifier" name="modifier" value=<?php echo $modifier?>>
                    <input type="hidden" id="id" name="id" value=<?php echo $id?>>
                </table>

                
                <input type="submit"  id="valider" value="soumettre la requete">
            </div>
             <?php 
                echo "<label for='id' hidden>id : </label>";
                echo"<input name='id' value='$id'readonly hidden>";
                echo "<input name='modifier' readonly hidden>";
                ?>
        </form>
    </body>