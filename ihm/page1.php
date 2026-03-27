<?php

require_once '../classes/Capteur.php';

$capteur = new Capteur();

$listecapteurs = json_decode($capteur->getAll()); //data base.php renvoie un objet json don on de decode en php//


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>tableau capteur de fou</title>
</head>
<body>

<table border="1">
    <tr>
        <th>Type</th>
        <th>Mode</th>
        <th>ID</th>
        <th>Date</th>
        <th>Logement</th>
    </tr> <!-- creation de la premiere ligne du tableau !-->

    <?php foreach ($listecapteurs as $capteur): ?>

        <tr >
            <td><?php echo $capteur->idCapteur; ?></td>
            <td><?php echo $capteur->type; ?></td>
            <td><?php echo $capteur->modeCommunication; ?></td>
            <td><?php echo $capteur->idCapteur; ?></td>
            <td><?php echo $capteur->dateInstallation; ?></td>
            <td><?php echo $capteur->codelogement; ?></td>
        </tr>

    <?php endforeach; ?>
    <!-- creation d'une boucle creant des lignes en changeant la variable listecapteurs ! -->
    <a href="../indexSecu.html"><button>Acces a la page index</button></a>

</table>
</body>
</html>