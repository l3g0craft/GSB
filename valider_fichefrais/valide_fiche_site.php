<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>valide fiche</title>
        <link rel="stylesheet" type="text/css" href="../gsb.css"/>
    </head>
    <body>
        <div class="valide">
            <h1>Validation des frais par visiteur</h1>
            <form method="get" action="valide_fiche.php?data<=?=$visiteur?>">
                <table style="padding-right:10%">
                    <tr>
                        <td>
                            <?php
                            
                                include '../fonctiongenevisiteur.php';

                                $cnxBDD= connexion();

                                $visiteur=$_GET["visiteur"];
                                $idvisiteur=$visiteur;
                                echo '<label for="visiteur">ID du visiteur :</label>'; 
                                echo'<td>';
                                    echo "<input type='text' name='visiteur' value='$visiteur' readonly></input>"; 
                                echo'<td>';

                            ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mois">Mois : </label>
                        </td>
                        <td>
                            <select name="mois" required>
                                <option></option>
                                <option value="1">01</option>
                                <option value="12">12</option>
                            </select>
                            <select name="annee" required>
                                <option></option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>

                            </select>
                        </td>
                    </tr>
                </table>
                <h2>Frais au forfait</h2>
                <table border="1" class="tablo">
                    <tr>
                        <td>Repas midi</td>
                        <td>Nuitée</td>
                        <td>Etape</td>
                        <td>Km</td>
                        <td>Situation</td>
                    </tr>
                    
                    <tr>
                        <?php
                            echo'<td width="75px" class="carre">';
                            

                                $visiteur=$_GET['visiteur'];

                                $repas="SELECT DISTINCT quantite
                                FROM visiteur,fichefrais,lignefraisforfait
                                WHERE visiteur.id = fichefrais.idVisiteur
                                AND fichefrais.idVisiteur=lignefraisforfait.idFicheFrais
                                AND visiteur.id=$visiteur
                                AND idForfait='REP';";

                                $result = $cnxBDD->query($repas);

                                while($row = mysqli_fetch_assoc($result)) {
                                    echo"$row[quantite]<br/>";
                                }

                                //$cnxBDD ->close();
                            
                            echo'</td>';
                            echo'<td width="75px" class="carre">';
                                $nuitee="SELECT DISTINCT quantite
                                FROM visiteur,fichefrais,lignefraisforfait
                                WHERE visiteur.id = fichefrais.idVisiteur
                                AND fichefrais.idVisiteur=lignefraisforfait.idFicheFrais
                                AND visiteur.id=$visiteur
                                AND idForfait='NUI';";

                                $result = $cnxBDD->query($nuitee);

                                while($row = mysqli_fetch_assoc($result)) {
                                    echo"$row[quantite]<br/>";
                                }
                            echo'</td>';
                            echo'<td width="75px" class="carre">';
                                $etape="SELECT DISTINCT quantite
                                FROM visiteur,fichefrais,lignefraisforfait
                                WHERE visiteur.id = fichefrais.idVisiteur
                                AND fichefrais.idVisiteur=lignefraisforfait.idFicheFrais
                                AND visiteur.id=$visiteur
                                AND idForfait='ETP';";

                                $result = $cnxBDD->query($etape);

                                while($row = mysqli_fetch_assoc($result)) {
                                    echo"$row[quantite]<br/>";
                                }
                            echo'</td>';
                            echo'<td width="75px" class="carre">';
                                $km="SELECT DISTINCT quantite
                                FROM visiteur,fichefrais,lignefraisforfait
                                WHERE visiteur.id = fichefrais.idVisiteur
                                AND fichefrais.idVisiteur=lignefraisforfait.idFicheFrais
                                AND visiteur.id=$visiteur
                                AND idForfait='KM';";

                                $result = $cnxBDD->query($km);

                                while($row = mysqli_fetch_assoc($result)) {
                                    echo"$row[quantite]<br/>";
                                }
                            echo'</td>';
                        ?>
                        <td class="cellule">
                            <input type="radio" name="valide" value="valide" required/>
                            <label for="Situation">Valide</label>
                            <input type="radio" name="valide" value="non valide" required/>
                            <label for="Situation">Non Valide</label>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <label for="justificatifs">Nb justificatifs :</label>
                            <input style="width:50px" type="text" name="nb_justificatifs"/>
                        </td>
                        <td class="bg_bouton">
                            <button class="bouton" type="submit" name="bouton" value="True">Soumettre la requête</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
    <footer>

    </footer>
</html>
