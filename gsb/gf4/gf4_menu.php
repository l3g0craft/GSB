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
    <div style="background-color: white;color: rgb(0, 132, 255);";>

                    <h1 >Gestion des Frais <img src="gf4.png" style="vertical-align:middle; "onclick="history.back(-1);"></h1>
                    <form action="saisie_HF.php">
                        <button>saisie hors forfait</button>
                    </form>
                </div>
        <form action="saisie.HF.php" method="get">
            <div style="background-color: rgb(0, 174, 255); width: 600px;margin: 0 auto;">

                
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
                <h2>
                    frais au forfait
                </h2>


                <br>




                <table class="frais">
                    <?php if($modifier==1){?>
                    <tr>
                        <td>repas midi :</td>
                        <td><input type="number" id="repas" value=<?php echo $repas?> name="repas" class="saisie_input" ></td>
                    </tr>
                    <tr>
                        <td>Nuitees :</td>
                        <td><input type="number" id="nuitees" value=<?php echo $nuitees?> name="nuitees" class="saisie_input"></td>
                    </tr>
                    <tr>
                        <td>Etape :</td>
                        <td><input type="number" id="etape" value=<?php echo $etape?> name="etape" class="saisie_input"></td>
                    </tr>
                    <tr>
                        <td>Km :</td>
                        <td><input type="number" id="km" value=<?php echo $km?> name="km" class="saisie_input"></td>
                    </tr>

                    <?php }else{?>

                    <tr>
                        <td>repas midi :</td>
                        <td><input type="number" id="repas" value="" name="repas" class="saisie_input" ></td>
                    </tr>
                    <tr>
                        <td>Nuitees :</td>
                        <td><input type="number" id="nuitees" value="" name="nuitees" class="saisie_input"></td>
                    </tr>
                    <tr>
                        <td>Etape :</td>
                        <td><input type="number" id="etape" value="" name="etape" class="saisie_input"></td>
                    </tr>
                    <tr>
                        <td>Km :</td>
                        <td><input type="number" id="km" value="" name="km" class="saisie_input"></td>
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