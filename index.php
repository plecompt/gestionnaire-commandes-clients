<?php

require_once __DIR__ . '/controllers/ClientController.php';

$clientController = new ClientController();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'client-view':
        $clientController->show($id);
        break;
    case 'client-create':
        $clientController->create();
        break;
    case 'index':
        $clientController->home();
        break;
    case 'store':
        $clientController->store();
        break;
    case 'edit':
        $clientController->edit($id);
        break;
    case 'update':
        $clientController->update();
        break;
    case 'delete':
        $clientController->delete($id);
        break;
    default:
        $clientController->forbidden();
        break;
}
