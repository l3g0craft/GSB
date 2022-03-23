<html>
    <head>
        <title>Last 10 Results</title>
    </head>
    <body>
        <h1>fiche de frais :
    <table>
        <tr>
            <td>
                date
            </td>
            <td>
                supprimer
            </td>
            <td>
                modifier
            </td>
            <td>
                voir
            </td>
        </tr>

    <?php
            echo "hello";

        include 'fonctiongenevisiteur.php';

        // Connexion    la base de donn  es gsb_frais
        $cnxBDD = connexion();
         echo "hello";

        $montant= "SELECT id FROM fichefrais " ;
        $result= $cnxBDD->query($montant);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            

                <tr>
                <td>  
                    <?php print($row['id']); ?>
                </td>
                <td>
                    <h1>modifier</h1>
                </td>
                </tr>
            </table>

        <?php } ?>

            
    </body>
</html>