<?php
require_once '../classes/Capteur.php';
require_once '../classes/Database.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajoutez un capteur</title>
</head>
<body>
<form name="capteur" method="post">

    <label for="type">Ajoutez un type de capteur :</label>
    <input type="text" name="type" id="type" required />

    <label for="mode">Ajoutez un mode de capteur :</label>
    <input type="text" name="mode" id="mode" required />

    <label for="identifiant">Ajoutez un identifiant de capteur :</label>
    <input type="text" name="identifiant" id="identifiant" required />

    <label for="date">Ajoutez une date :</label>
    <input type="text" name="date" id="date" required />

    <label for="logement">Ajoutez un logement de capteur :</label>
    <select name="logement">
        <option value="L001">L001</option>
        <option value="L002">L002</option>
        <option value="L003">L003</option>
    </select>

    <input type="submit" value="Validé !">

</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {// Vérifie si le formulaire a été soumis

    $data = [
        'type' => $_POST['type'],
        'mode' => $_POST['mode'],
        'identifiant' => $_POST['identifiant'],
        'date' => $_POST['date'],
        'logement' => $_POST['logement']
    ];

    try {
        $capteur = new Capteur();
        $result = $capteur->add($data);
        echo $result;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

</body>
</html>