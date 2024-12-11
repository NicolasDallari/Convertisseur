<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Convertisseur</title>
</head>

<body>
    <?php require "tableaux.php" ?>
    <h1>Convertisseur de monnaie en euros</h1>
    <div class="container">
        <?php
        $resultat = '0'; // Initialiser la variable
        if (!empty($_GET['chiffre']) && is_numeric($_GET['chiffre'])) {
            $valeur = $_GET['chiffre'];
            $valeurchoix = $_GET['choix'];

            if (array_key_exists($valeurchoix, $tauxConversion)) {
                $resultat = $valeur / $tauxConversion[$valeurchoix];
                $resultat = (round($resultat, 2)) . ' euros';
            } else {
                $resultat = "Devise invalide.";
            }
        } else {
            $resultat = "Veuillez entrer un montant numérique valide.";
        }
        ?>
        <form method="GET" action="">
            <h3>Devise à convertir</h3>
            <select name="choix">
                <?php foreach ($tauxConversion as $device => $taux): ?>
                    <option value="<?php echo htmlspecialchars($device); ?>">
                        <?php echo ucfirst($device); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <h3>Montant</h3>
            <label for="chiffre">&nbsp;</label>
            <input type="number" id="chiffre" name="chiffre" placeholder="ex 10"/>
            <div class="button">
                <button type="submit">Convertir</button>
            </div>
        </form>
        <h2>Résultat : <?php echo htmlspecialchars($resultat); ?></h2>
    </div>
</body>

</html>