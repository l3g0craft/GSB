<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>valide fiche</title>
        <link rel="stylesheet" type="text/css" href="../gsb.css"/>
    </head>
    <body>
        <div class="valide">
            <h1>Validation des frais par visiteur</h1>
            <form method="get" action="valide_fiche_site.php">
                <table style="padding-right:10%">
                    <tr>
                        
                        <td>
                            <?php
                            
                                include '../fonctiongenevisiteur.php';

                                $cnxBDD= connexion();

                                //récupère les prenom des visiteur dont l'idEtat est cloturée
                                $select = 'SELECT DISTINCT visiteur.id,nom,prenom FROM visiteur,fichefrais WHERE fichefrais.idVisiteur=visiteur.id AND idEtat="CL";';
                                
                                //exécution de la requete select
                                $result = $cnxBDD->query($select);
                                echo '<label for="Visiteur">Choix du visiteur :</label>'; 
                                echo'<td>';
                                    echo '<select name="visiteur" id="visiteur" required>';
                                    echo '<option value=""></option>'; 
                                    
                                    //affichage des noms des visiteurs dans une liste
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='$row[id]'>($row[id]) $row[prenom] $row[nom]</option>";
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
                            <select name="mois">
                                <option></option>
                            </select>
                            <select name="annee">
                                <option></option>
                            </select>
                        </td>
                    </tr>
                </table>
                <h2>Frais au forfait</h2>
                <table border="1" class="tablo">
                    <tr>
                        <td width="75px">Repas midi</td>
                        <td width="75px">Nuitée</td>
                        <td width="75px">Etape</td>
                        <td width="75px">Km</td>
                        <td>Situation</td>
                    </tr>
                    <tr>
                            <td>
                               
                            </td>
                            <td>

                            </td>
                            <td>
                            
                            </td>
                            <td>
                            
                            </td>
                        <td class="cellule">
                            <input type="radio" name="valide" value="valide" disabled/>
                            <label for="Situation">Valide</label>
                            <input type="radio" name="valide" value="non valide" disabled/>
                            <label for="Situation">Non Valide</label>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <label for="justificatifs">Nb justificatifs :</label>
                            <input style="width:50px" type="text" name="nb_justificatifs" readonly/>
                        </td>
                        <td class="bg_bouton">
                            <button type="submit" name="bouton" value="True">valider visiteur</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
    <footer>

    </footer>
</html>