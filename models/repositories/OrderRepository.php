<?php

require_once __DIR__ . '/../Order.php';
require_once __DIR__ . '/../../lib/database.php';

class orderRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getOrders(): ?array
    {
        $statement = $this->connection->getConnection()->query('SELECT * FROM order');
        $result = $statement->fetchAll();

        if (!$result){
            return null;
        }

        $orders = [];
        foreach ($result as $row) {

            //enum status
            switch($result['status']){
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

            $order = new Order($row['order_id'], $row['order_title'], $row['order_description'], $status, date_create_from_format('Y-m-d H:i:s', $row['order_date']), date_create_from_format('Y-m-d H:i:s', $row['order_lastUpdate']));
            $orders[] = $order;
        }

        return $orders;
    }

    public function getOrder(int $id): ?Order
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM order WHERE id=:id");
        $statement->execute(['order_id' => $id]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        //enum status
        switch($result['status']){
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

        $order = new Order($result['order_id'], $result['order_title'], $result['order_description'], $status, date_create_from_format('Y-m-d H:i:s', $result['order_date']), date_create_from_format('Y-m-d H:i:s', $result['order_lastUpdate']));

        return $order;
    }

    public function create(Order $order): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('INSERT INTO order (title, description, status) VALUES (:title, :description, :status);');

        return $statement->execute([
            'title' => $order->getTitle(),
            'description' => $order->getDescription(),
            'status' => $order->getStatus()
        ]);
    }

    public function update(Order $order): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('UPDATE order SET title = :title, description = :description, status = :status WHERE id = :id');

        return $statement->execute([
            'id' => $order->getId(),
            'title' => $order->getTitle(),
            'description' => $order->getDescription(),
            'status' => $order->getStatus()
        ]);
    }

    public function delete(int $id): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('DELETE FROM order WHERE id = :id');
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}