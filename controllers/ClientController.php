
<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../models/Client.php';

class ClientController
{
    private ClientRepository $clientRepository;

    public function __construct() {
        $this->clientRepository = new ClientRepository();
    }

    public function home() {
        $clients = $this->clientRepository->getClients();

        require_once __DIR__ . '/../views/home.php';
    }

    public function show(int $idC) {
        $client = $this->clientRepository->getClient($idC);

        require_once __DIR__ . '/../views/client-view.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/client-create.php';
    }

    public function showAll() {
        $clients = $this->clientRepository->getClients();

        require_once __DIR__ . '/../views/client-list.php';
    }

    public function add()
    {
        $client = new Client();
        $client->setNom($_POST['nom']);
        $client->setPrenom($_POST['prenom']);
        $client->setAdresse($_POST['adresse']);
        $client->setEmail($_POST['email']);
        $this->clientRepository->create($client);

        header('Location: ?action=client-list');
    }

    public function edit(int $idC)
    {
        $client = $this->clientRepository->getClient($idC);

        require_once __DIR__ . '/../views/client-edit.php';
    }

    public function update()
    {
        $client = new Client();
        $client->setIdClient($_POST['idClient']);
        $client->setAdresse($_POST['adresse']);
        $client->setEmail($_POST['email']);
        $this->clientRepository->update($client);

        header('Location: ?action=client-list');
    }

    public function delete(int $idC)
    {
        $this->clientRepository->delete($idC);

        header('Location: ?action=client-list');
    }

    public function forbidden()
    {
        require_once __DIR__ . '/../views/404.php';
        http_response_code(404);
    }
}