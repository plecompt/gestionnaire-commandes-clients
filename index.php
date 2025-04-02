<?php
    require_once __DIR__ . '/controllers/OrderController.php';
    require_once __DIR__ . '/controllers/ClientController.php';

    // $orderController = new OrderController();
    $clientController = new ClientController();

    $action = $_GET['action'] ?? 'home'; //home par defaut.
    $id = $_GET['id'] ?? null;

    switch($action){
        case 'home':
            $clientController->home(); //afficher choix entre les deux gestionnaires
            break;
        // case 'order-view':
        //     $orderController->show($id); //afficher une order
        //     break;
        // case 'order-create':
        //     $orderController->create(); //creer une order
        //     break;
        // case 'order-list':
        //     $orderController->showAll(); //afficher la liste des orders
        //     break;
        // case 'order-add':
        //     $orderController->store(); //enregistrer une order
        //     break;
        // case 'order-edit':
        //     $orderController->edit($id); //afficher le formulaire d'édition
        //     break;
        // case 'order-update':
        //     $orderController->update(); //enregistre les modifications de l'édition dans la bdd
        //     break;
        // case 'order-delete': //supprimer une order
        //     $orderController->delete($id);
        //     break;
        case 'client-view':
            $clientController->show($id);
            break;
        case 'client-create':
            $clientController->create();
            break;
        case 'client-list':
            $clientController->showAll();
            break;
        case 'client-add':
            $clientController->add();
            break;
        case 'client-edit':
            $clientController->edit($id);
            break;
        case 'client-update':
            $clientController->update();
            break;
        case 'client-delete':
            $clientController->delete($id);
            break;
        default:
            $clientController->forbidden(); //clientController doit gerer une route pour forbidden
        break;
    }