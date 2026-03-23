<?php
require_once 'Database.php';

class Capteur {

    private PDO $db;   // Connexion PDO à la base

    public function __construct() {
        // Instancie Database et récupère la connexion PDO
        $database = new Database();
        $this->db = $database->getConnection();   // ← méthode à compléter
    }

    /**
     * Retourne tous les capteurs
     */
    public function getAll(): string {
        try {
            // Exécute une requête simple SELECT *
            $stmt = $this->db->query("SELECT * FROM capteur");  // ← compléter SELECT
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return json_encode($data);
        } catch (PDOException $e) {
            return json_encode(['error' => $e->getMessage()]);  // ← méthode d’erreur
        }
    }

    /**
     * Retourne un capteur par son ID
     */
    public function getById(int $id): string {
        try {
            $stmt = $this->db->prepare("SELECT * FROM capteur WHERE idCapteur = :id"); // ← nom de la clé primaire
            $stmt->execute(['id' => $id]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return json_encode($data ?: ['message' => 'Capteur non trouvé']);
        } catch (PDOException $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    /**
     * Ajoute un capteur
     */
    public function add(array $data): string {
        try {
            // Récupération + nettoyage des champs
            $type = trim($data['type'] ?? '');
            $mode = trim($data['mode'] ?? '');
            $identifiant = trim($data['identifiant'] ?? '');
            $date = trim($data['date'] ?? '');
            $logement = trim($data['logement'] ?? '');

            // Vérification des champs obligatoires
            if (!$type || !$mode || !$identifiant || !$date || !$logement) {   // ← compléter les conditions
                return json_encode(['error' => 'Champs manquants']);
            }

            // Requête d’insertion
            $sql = "INSERT INTO capteur(type, modeCommunication, identifiantCommunication, dateInstallation, codeLogement) 
                    VALUES (:type, :mode, :identifiant, :date, :logement)";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                'type' => $type,
                'mode' => $mode,
                'identifiant' => $identifiant,
                'date' => $date,
                'logement' => $logement
            ]);

            return json_encode([
                'success' => true,
                'id' => $this->db->lastInsertId()   // ← méthode pour récupérer le dernier ID
            ]);

        } catch (PDOException $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    /**
     * Met à jour un capteur
     */
    public function update(int $id, array $data): string {
        try {
            // Récupération des champs
            $type = trim($data['type'] ?? '');
            $mode = trim($data['mode'] ?? '');
            $identifiant = trim($data['identifiant'] ?? '');
            $date = trim($data['date'] ?? '');
            $logement = trim($data['logement'] ?? '');

            if (!$type || !$mode || !$identifiant || !$date || !$logement) {
                return json_encode(['error' => 'Champs manquants']);
            }

            // Requête UPDATE
            $sql = "UPDATE capteur 
                    SET type = :type,
                        modeCommunication = :mode,
                        identifiantCommunication = :identifiant,
                        dateInstallation = :date,
                        codeLogement = :logement
                    WHERE idCapteur = :id";   // ← compléter le nom du paramètre

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                'type' => $type,
                'mode' => $mode,
                'identifiant' => $identifiant,
                'date' => $date,
                'logement' => $logement,
                'id' => $id
            ]);

            return json_encode(['success' => true]);

        } catch (PDOException $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    /**
     * Supprime un capteur
     */
    public function delete(int $id): string {
        try {
            $stmt = $this->db->prepare("DELETE FROM capteur WHERE idCapteur = :id"); // ← compléter
            $stmt->execute(['id' => $id]);

            return json_encode([
                'success' => true,
                'deleted' => $stmt->rowCount()   // ← méthode pour savoir combien de lignes supprimées
            ]);

        } catch (PDOException $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }
}