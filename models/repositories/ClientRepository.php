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
            $client->setIdClient($row['client_id']);
            $client->setNom($row['client_firstName']);
            $client->setPrenom($row['client_lastName']);
            $client->setAdresse($row['client_address']);
            $client->setEmail($row['client_email']);

            $clients[] = $client;
        }

        return $clients;
    }

    public function getClient(int $idC): ?Client
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM client WHERE client_id=:client_id");
        $statement->execute(['client_id' => $idC]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $client = new Client();
        $client->setIdClient($result['client_id']);
        $client->setNom($result['client_firstName']);
        $client->setPrenom($result['client_lastName']);
        $client->setAdresse($result['client_address']);
        $client->setEmail($result['client_email']);

        return $client;
    }

    public function create(Client $client): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('INSERT INTO client (client_firstName, client_lastName, client_address, client_email) VALUES (:client_firstName, :client_lastName, :client_address, :client_email);');

        return $statement->execute([
            'client_firstName' => $client->getNom(),
            'client_lastName' => $client->getPrenom(),
            'client_address' => $client->getAdresse(),
            'client_email' => $client->getEmail()
        ]);
    }

    public function update(Client $client): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('UPDATE client SET client_address = :client_address, client_email = :client_email WHERE client_id = :client_id');

        return $statement->execute([
            'client_id' => $client->getIdClient(),
            'client_address' => $client->getAdresse(),
            'client_email' => $client->getEmail()
        ]);
    }

    public function delete(int $idC): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('DELETE FROM client WHERE client_id = :client_id');
        $statement->bindParam(':client_id', $idC);

        return $statement->execute();
    }

}