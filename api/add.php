<?php
require_once '../classes/Capteur.php';
header('Content-Type: application/json');

$raw = trim(file_get_contents('php://input'));

// Convertit le JSON en tableau associatif
$input = json_decode($raw, true);   // ← true ou false ?

// Vérifie si le JSON est valide
if (!$input) {
    http_response_code(400);   // ← code HTTP pour "Bad Request"
    echo json_encode([
        'error' => 'Données invalides',
        'raw_received' => $raw
    ]);
    exit;
}

// Instancie la classe Capteur
$capteur = new capteur();   // ← nom de la classe

// Appelle la méthode d’ajout et renvoie la réponse JSON
echo $capteur->add($input);   // ← nom de la méthode
