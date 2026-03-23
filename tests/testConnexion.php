<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../classes/Database.php';

header('Content-Type: text/plain');

echo "=== Test de connexion à la base Captothèque ===\n\n";

try {
    $db = new Database();
    $pdo = $db->getConnection();

    echo "Connexion réussie !\n\n";

    echo "Type de l'objet Database : " . get_class($db) . "\n";
    echo "Type de l'objet retourné par getConnection() : " . get_class($pdo) . "\n";

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}