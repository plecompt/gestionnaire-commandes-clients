<?php

require_once __DIR__ . '/../models/repositories/OrderRepository.php';
require_once __DIR__ . '/../utils/utils.php';

class OrderController
{
    private OrderRepository $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function home()
    {
        require_once __DIR__ . '/../views/home.php';
    }

    public function showFor(?int $id = null)
    {
        $orders = $this->orderRepository->getOrders($id);
        require_once __DIR__ . '/../views/order-list.php';
    }

    public function show(int $id) 
    {
        $order = $this->orderRepository->getOrder($id);
        require_once __DIR__ . '/../views/order-view.php';
    }

    public function create()
    {
        require_once __DIR__ . "/../views/order-create.php";
    }

    public function add()
    {
        if(isset($_POST['clientId']) && is_numeric($_POST['clientId'])){
            $order = new Order(clientId: $_POST['clientId'], id: null, title: $_POST['title'], description: $_POST['description'], status: Utils::toEnum($_POST['status']));
            $this->orderRepository->create($order);
        } else {
            header('Location: ?action=404');
            return ;
        }

        header('Location: ?action=order-list');
    }

    public function edit(int $id)
    {
        $order = $this->orderRepository->getOrder($id);
        require_once __DIR__ . '/../views/order-edit.php';
    }

    public function update()
    {   
        $order = new Order(clientId: null, id: $_POST['id'], title: $_POST['title'], description: $_POST['description'], status: Utils::toEnum($_POST['status']));
        $this->orderRepository->update($order);

        header('Location: ?action=order-list');
    }

    public function delete(int $id)
    {
        $this->orderRepository->delete($id);

        header('Location: ?action=order-list');
    }
}