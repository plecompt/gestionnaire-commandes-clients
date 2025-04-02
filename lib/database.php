<?php 

class DatabaseConnection {
    
    private ?\PDO $database = null;
    
    public function getConnection(): PDO
    {
        // prépare la connexion si elle n'existe pas
        if ($this->database == null) {
            $host = 'localhost';
            $dbname = 'mvc-orders';
            $username = 'root';
            $password = '';
            $charset = 'utf8mb4';
            
            // dsn = data source name?
            // crée une nouvelle connexion (pont) entre l'application php et la bd
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            
            // on essaye de créer un nouvel objet PDO avec les paramètres précédents pour initialiser le pont.
            // si cela échoue, le programme quitte avec un message (getMessage() méthode de PDOException))
            try {
                $this->database = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }
        
        return $this->database;
    }
    
}
