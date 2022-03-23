<html>
    <head>
        <title>Last 10 Results</title>
    </head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">

    <body>
        <h1>fiche de frais :
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
                    <td><?php print($row['id']); ?></td>
                    <td>suppr</td>
                    <td>modifier</td>
                    <td>voir</td>
                </tr>
            

        <?php } ?>
        </table>
            
    </body>
</html>