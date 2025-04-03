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
        require_once __DIR__ . '/../views/order-create.php';
    }

    public function add()
    {
        $order = new Order(id: -1, title: $_POST['title'], description: $_POST['description'], status: Utils::toEnum($_POST['status']));
        $this->orderRepository->create($order);

        header('Location: ?');
    }

    public function edit(int $id)
    {
        $order = $this->orderRepository->getOrder($id);
        require_once __DIR__ . '/../views/order-edit.php';
    }

    public function update()
    {   
        $order = new Order(id: $_POST['id'], title: $_POST['title'], description: $_POST['description'], status: Utils::toEnum($_POST['status']));
        $this->orderRepository->update($order);

        header('Location: ?');
    }

    public function delete(int $id)
    {
        $this->orderRepository->delete($id);

        header('Location: ?');
    }
}