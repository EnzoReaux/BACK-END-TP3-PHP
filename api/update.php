<?php
header('Content-Type: application/json');
require_once '../classes/Capteur.php';

if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'ID manquant']);
    exit;
}

$id = (int) $_GET['id'];
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['error' => 'Aucune donnée reçue ou JSON invalide']);
    exit;
}

$capteur = new Capteur();
$result = $capteur->update($id, $data);

echo $result;
