<link rel="stylesheet" href="css/style.css">
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