
<link rel="stylesheet" href="css/style.css" >
<?php
    // Inclure le fichier des taux de conversion
    require "../app/data/tableaux.php";
    $resultat = ''; // Initialiser la variable pour le résultat
    $messageErreur = '';
    // Vérification si le formulaire est soumis
    if (
        isset($_GET['montant'], $_GET['devise_source'], $_GET['devise_cible']) &&
        is_numeric($_GET['montant'])
    ) {
        $montant = floatval($_GET['montant']); // Montant à convertir
        $deviseSource = $_GET['devise_source']; // Devise source
        $deviseCible = $_GET['devise_cible'];   // Devise cible

        // Vérifier si les devises sont valides
        if (array_key_exists($deviseSource, $tauxConversion) && array_key_exists($deviseCible, $tauxConversion)) {
            // Conversion du montant
            $montantEnEuros = $montant / $tauxConversion[$deviseSource]; // Convertir en euros
            $montantConverti = $montantEnEuros * $tauxConversion[$deviseCible]; // Convertir en devise cible
            $resultat = round($montantConverti, 2) . " $deviseCible"; // Arrondi du résultat
        } else {
            $messageErreur = "Les devises choisies ne sont pas valides.";
        }
    } 
    ?>
        <h1>Convertisseur de monnaies</h1>
    <div class="container">
        <form method="GET" action="">
            <input type="number" name="montant" step="any" placeholder="Montant" required />

            <select name="devise_source" id="devise-source" required>
                <?php foreach ($tauxConversion as $devise => $taux): ?>
                    <option value="<?php echo htmlspecialchars($devise); ?>">
                        <?php echo strtoupper($devise); ?>
                    </option>
                <?php endforeach; ?>
            </select>                         
            <p>&rightarrow;</p>
            <select class="devise-cible" name="devise_cible" required>
                <?php foreach ($tauxConversion as $devise => $taux): ?>
                    <option value="<?php echo htmlspecialchars($devise); ?>">
                        <?php echo strtoupper($devise); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div class="button">
                <button type="submit">Convertir</button>
            </div>
        </form>
        <?php if ($resultat): ?>
            <h2>Résultat : <?php echo htmlspecialchars($resultat); ?></h2>
        <?php elseif ($messageErreur): ?>
            <h2 style="color: red;"><?php echo htmlspecialchars($messageErreur); ?></h2>
        <?php endif; ?>
    </div>