<?php

class Database {

    private array $env;   // Tableau contenant les variables du fichier .env

    public function __construct() {
        // Charge les variables du fichier .env
        $this->env = $this->loadEnv();   // ← méthode à compléter
    }

    /**
     * Charge le fichier .env et retourne un tableau clé => valeur
     */
    private function loadEnv(): array {
        $vars = [];
        $envPath = __DIR__ . '/../.env' ;   // ← nom du fichier à compléter

        if (!file_exists($envPath)) {
            throw new RuntimeException(".env introuvable à l'emplacement $envPath");
        }

        // Lit le fichier ligne par ligne
        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $line = trim($line);

            // Ignore les lignes vides ou les commentaires
            if ($line === '' || substr($line, 0, 1) === '#') {
                continue;
            }

            // Sépare clé et valeur
            $parts = explode('=', $line, 2);  // ← nombre de morceaux
            $key = trim($parts[0]);
            $value = isset($parts[1]) ? trim($parts[1]) : '';

            $vars[$key] = $value;
        }

        // Vérifie que toutes les clés nécessaires existent
        $requiredKeys = ['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS', 'DB_PORT'];
        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $vars)) {
                $vars[$key] = ''; // valeur vide par défaut
            }
        }

        return $vars;
    }

    /**
     * Retourne une instance PDO
     */
    public function getConnection(): PDO {
        // Récupération des variables du .env
        $host = $this->env['DB_HOST'];   // ← compléter
        $dbname = $this->env['DB_NAME']; // ← compléter
        $user = $this->env['DB_USER'];   // ← compléter
        $pass = $this->env['DB_PASS'];   // ← compléter
        $port = $this->env['DB_PORT'] ?: 3306;  // ← port par défaut

        // Construction du DSN
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;port=$port";

        try {
            return new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base : " . $e->getMessage());
        }
    }
}