<?php

require_once __DIR__ . '/../models/repositories/OrderRepository.php';

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

    public function showAll()
    {
        $orders = $this->orderRepository->getOrders();
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

    public function store()
    {
        //Pour gerer les enums
        switch ($_POST['status']){
            case ("En attente"):
                $status = Status::waiting;
                break;
            case ("Expediée"):
                $status = Status::delivery;
                break;
            case ("Livrée"):
                $status = Status::delivered;
                break;
        }

        $order = new Order(title: $_POST['title'], description: $_POST['description'], status: $status);
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
        //Pour gerer les enums
        switch ($_POST['status']){
            case ("En attente"):
                $status = Status::waiting;
                break;
            case ("Expediée"):
                $status = Status::delivery;
                break;
            case ("Livrée"):
                $status = Status::delivered;
                break;
        }
        $order = new Order(id: $_POST['id'], title: $_POST['title'], description: $_POST['description'], status: $status);
        $this->orderRepository->update($order);

        header('Location: ?');
    }

    public function delete(int $id)
    {
        $this->orderRepository->delete($id);

        header('Location: ?');
    }
}