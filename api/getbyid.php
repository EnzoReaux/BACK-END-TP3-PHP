<?php
require_once '../classes/Capteur.php';
header('Content-Type: application/json');

$id = $_GET['/*à completer*/'] ?? null; //id du capteur passé en paramètre dans l'url
// Instancie la classe Capteur
$capteur = new _____();   // ← nom de la classe

if (!$id) {
    http_response_code(400);
    echo json_encode(['error' => 'ID requis']);
    exit;
}

// Appelle la méthode qui liste un capteur en fonction de son id et renvoie la réponse JSON
echo $capteur->_____________((int)$id);  // ← nom de la méthode
