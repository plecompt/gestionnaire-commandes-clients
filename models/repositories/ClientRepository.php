<?php

require_once __DIR__ . '/../Client.php';
require_once __DIR__ . '/../../lib/database.php';

class ClientRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getClients(): array
    {
        $statement = $this->connection->getConnection()->query('SELECT * FROM client');
        $result = $statement->fetchAll();
        $clients = [];
        foreach ($result as $row) {
            $client = new Client();
            $client->setIdClient($row['idClient']);
            $client->setNom($row['nom']);
            $client->setPrenom($row['prenom']);
            $client->setAdresse($row['adresse']);
            $client->setEmail($row['email']);

            $clients[] = $client;
        }

        return $clients;
    }

    public function getClient(int $idC): ?Client
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM client WHERE id=:id");
        $statement->execute(['id' => $idC]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $client = new Client();
        $client->setIdClient($result['idClient']);
        $client->setNom($result['nom']);
        $client->setPrenom($result['prenom']);
        $client->setAdresse($result['adresse']);
        $client->setEmail($result['email']);

        return $client;
    }

    public function create(Client $client): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('INSERT INTO client (nom, prenom, adresse, email) VALUES (:nom, :prenom, :adresse, :email);');

        return $statement->execute([
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'adresse' => $client->getAdresse(),
            'email' => $client->getEmail()
        ]);
    }

    public function update(Client $client): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('UPDATE client SET adresse = :adresse, email = :email WHERE id = :id');

        return $statement->execute([
            'id' => $client->getIdClient(),
            'adresse' => $client->getAdresse(),
            'email' => $client->getEmail()
        ]);
    }

    public function delete(int $idC): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('DELETE FROM clients WHERE id = :id');
        $statement->bindParam(':id', $idC);

        return $statement->execute();
    }

}