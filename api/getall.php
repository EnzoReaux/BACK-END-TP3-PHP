<?php
require_once '../classes/Capteur.php';
header('Content-Type: application/json');


// Instancie la classe Capteur
$capteur = new capteur();   // ← nom de la classe

// Appelle la méthode qui liste tous les capteurs et renvoie la réponse JSON
echo $capteur->getAll();  // ← nom de la méthode
