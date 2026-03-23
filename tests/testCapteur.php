<?php

require_once '../classes/Capteur.php';

header('Content-Type: application/json');
//instanciation d'un capteur
$capteur = new Capteur();

/******** tester en décommentant étape par étape et vérifier sur phpmyadmin  *********/

// Exemple pour tester : récupérer tous les capteurs
echo $capteur->getAll();

// Pour tester par ID :
//echo $capteur->getById(2);

//Pour ajouter un capteur :
$data=['type' => 'Température',
      'mode' => 'WiFi',
      'identifiant' => 'ABC123',
      'date' => '2025-01-01',
      'logement' => 'L001'];
 echo $capteur->add();

// Pour supprimer un capteur :
// echo $capteur->delete(200);

 // Pour mettre à jour un capteur :
/*$data = [
    'type' => 'DHT22',
    'mode' => 'WiFi',
    'identifiant' => 'ESP32-01',
    'date' => '2026-02-03',
    'logement' => 'L002'
];

echo $capteur->update(3, $data);*/
