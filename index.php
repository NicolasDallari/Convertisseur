
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Convertisseur</title>
</head>
    <body>
        <h1>Convertisseur de monnaie</h1>
            <div class="container">
                <form method="GET" action="">
                    <h3>Devise a Convertir</h3>
            <select name="choix">
                <option value="francs"> francs</option>
                <option value="dollar"> dollar</option>
                <option value="device"> device</option>
            </select>
                    <h3>Montant euros a Convertir</h3>
        <label for="chiffre">&nbsp;</label>
        <input type="number" id="chiffre" name="chiffre" />
        <div class="button">
    <?php
            
        if (!empty($_GET['chiffre']) && is_numeric($_GET['chiffre'])) {
            $valeur = ($_GET)['chiffre'];
            $valeurchoix = ($_GET['choix']);
            $resultat = $valeur * 6.55;

            echo '<h2>Résultat =' . $resultat. ' francs.</h2>'; 
        } else {
            echo "enter un chiffre ";
        }
    ?>
                <button type="submit">Convertir</button>
            </div>
        </form>
        </div>
    </body>
</html>
