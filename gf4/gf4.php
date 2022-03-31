<?php
#$nom =$_GET['nom'];
#$prenom = $_GET['prenom'];


if($_GET['modifier'] != -1){
    $id=$_GET['id']
    $select_forfait= "SELECT id,libelle,montant FROM forfait where $id"  ;
    $result= $cnxBDD->query($select_forfait);
    $row = mysqli_fetch_assoc($result)
    echo $row
}

?>



<html>
    <head>
        <title>Gestion des frais</title>
    </head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">

    <body style="color: white";>
        <form action="valider.php" method="get">
            <div style="background-color: rgb(0, 174, 255); width: 600px;margin: 0 auto;">

                <div style="background-color: white;color: rgb(0, 132, 255);";>

                    <h1 >Gestion des Frais <img src="gf4.png" style="vertical-align:middle;"></h1>

                </div>

                <h2>
                    Saisie
                </h2>
                <br>
                <table>
                    <tr>
                        <td style="width: 180px;">PERIODE </td>
                        <td >Mois (2 chiffres) :<input type="number" id="mois" value=<?php echo (date("m"));?> name="mois" required maxlength="2" class="saisie_input" readonly="readonly" ></td>
                        <td >Année (4 chiffres) :<input type="text" id="annee" value=<?php echo (date("Y"));?> name="annee" required maxlength="4" class="saisie_input" readonly="readonly"></td>
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
                    <tr>
                        <td>repas midi :</td>
                        <td><input type="number" id="repas" name="repas" class="saisie_input" ></td>
                    </tr>
                    <tr>
                        <td>Nuitées :</td>
                        <td><input type="number" id="nuitees" name="nuitees" class="saisie_input"></td>
                    </tr>
                    <tr>
                        <td>Etape :</td>
                        <td><input type="number" id="etape" name="etape" class="saisie_input"></td>
                    </tr>
                    <tr>
                        <td>Km :</td>
                        <td><input type="number" id="km" name="km" class="saisie_input"></td>
                    </tr>

                </table>
                <input type="submit"  id="valider" value="soumettre la requte">
            </div>
        </form>
    </body>