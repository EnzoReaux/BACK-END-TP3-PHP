<?php
require_once '../classes/Capteur.php';
header('Content-Type: application/json');

$id = $_GET['id'] ?? null; //id du capteur passé en paramètre dans l'url

if (!$id) {
    http_response_code(400);
    echo json_encode(['error' => 'ID requis']);
    exit;
}

// Instancie la classe Capteur
$capteur = new capteur();   // ← nom de la classe

// Appelle la méthode de suppression et renvoie la réponse JSON
echo $capteur->delete((int)$id);   // ← nom de la méthode

