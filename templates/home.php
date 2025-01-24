<?php require "../app/form/traitement.php"
?>
<h1>Convertisseur de devises</h1>
<div class="container">
    <form method="GET" action="">
        <input type="number" name="montant" step="any" placeholder="Montant" required />
        <label for="devise-source">DE:</label>
        <select name="devise_source" id="devise-source" required>
            <?php foreach ($tauxConversion as $devise => $taux): ?>
                <option value="<?php echo htmlspecialchars($devise); ?>">
                    <?php echo  htmlspecialchars($devise); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="devise-cible">VERS :</label>
        <select id="devise-cible" class="devise-cible" name="devise_cible" required>
            <?php foreach ($tauxConversion as $devise => $taux): ?>
                <option value="<?php echo htmlspecialchars($devise); ?>">
                    <?php echo htmlspecialchars($devise); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="containerConvertir">
            <div class="button">
                <button type="submit">Convertir</button>
            </div>
    </form>
    <div class="containerresultat">
        <?php if ($resultat): ?>
            <h2 class="deviceSource">
                <?php echo htmlspecialchars($montant . ' ' . $deviseSource); ?>
                <span class="equal">=</span>
            </h2>
            <h2 class="deviceCible"><?php echo htmlspecialchars($resultat); ?></h2>
        <?php elseif ($messageErreur): ?>
            <h2 style="color: red;"><?php echo htmlspecialchars($messageErreur); ?></h2>
        <?php endif; ?>
    </div>
</div>