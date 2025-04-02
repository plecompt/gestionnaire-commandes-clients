<?php

require_once __DIR__ . '/../lib/database.php';

class Client {
    private int $idClient;
    private string $nom;
    private string $prenom;
    private string $adresse;
    private string $email;

    public function getIdClient(): int
    {
        return $this->idClient;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }

    public function setNom(string $nom): void
    {
        $this->nom = htmlspecialchars($nom);
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = htmlspecialchars($prenom);
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = htmlspecialchars($adresse);
    }

    public function setEmail(string $email): void
    {
        $this->email = htmlspecialchars($email);
    }
}

