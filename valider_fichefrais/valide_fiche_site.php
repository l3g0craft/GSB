<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>valide fiche</title>
        <link rel="stylesheet" type="text/css" href="valide_fiche.css"/>
    </head>
    <body>
        <div class="valide">
            <h1>Validation des frais par visiteur</h1>
            <form method="get" action="valide_fiche.php">
                <table style="padding-right:10%">
                    <tr>
                        
                        <td>
                            <?php
                            
                                include '../fonctiongenevisiteur.php';

                                $cnxBDD= connexion();

                                //récupère les prenom des visiteur dont l'idEtat est cloturée
                                $select = 'SELECT DISTINCT nom,prenom FROM visiteur,fichefrais WHERE fichefrais.idVisiteur=visiteur.id AND idEtat="Cloturee";';
                                
                                //exécution de la requete select
                                $result = $cnxBDD->query($select);
                                echo '<label for="Visiteur">Choix du visiteur :</label>'; 
                                echo'<td>';
                                    echo '<select name="visiteur" id="visiteur">';
                                    echo '<option value=""></option>'; 
                                    
                                    //affichage des noms des visiteurs dans une liste
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='$row[prenom]'>$row[prenom]"." "."$row[nom]</option>";
                                    }
                                    echo '</select>';  
                                echo'<td>';
                            $cnxBDD->close();
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
                            <td>
                                <input type="number" min="0" name="repas" class="txt"/>
                            </td>
                            <td>
                                <input type="number" min="0" name="nuitee" class="txt"/>
                            </td>
                            <td>
                                <input type="number" min="0" name="Etape" class="txt"/>
                            </td>
                            <td>
                                <input type="number" min="0" name="Km" class="txt"/>
                            </td>
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
