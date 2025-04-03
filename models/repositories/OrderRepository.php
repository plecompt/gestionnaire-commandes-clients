<?php

require_once __DIR__ . '/../Order.php';
require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../../utils/utils.php';

class orderRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getOrders(?int $id = null): ?array
    {
        if ($id !== null) {
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `order` WHERE client_id = :id');
            $statement->execute([':id' => $id]);
        } else {
            $statement = $this->connection->getConnection()->query('SELECT * FROM `order`');
        }
        $result = $statement->fetchAll();
    
        if (!$result) {
            return null;
        }
    
        $orders = [];
        foreach ($result as $row) {
            $order = new Order(
                clientId: $row['clientId'],
                id: $row['order_id'], 
                title: $row['order_title'], 
                description: $row['order_description'], 
                status: Utils::toEnum($row['order_status']), 
                createdAt: date_create_from_format('Y-m-d H:i:s', $row['order_date']),
                updatedAt: date_create_from_format('Y-m-d H:i:s', $row['order_lastUpdate'])
            );
            $orders[] = $order;
        }
    
        return $orders;
    }
    
    public function getOrder(int $id): ?Order
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM `order` WHERE `order_id` = :id");
        $statement->execute([':id' => $id]);
        $result = $statement->fetch();
    
        if (!$result) {
            return null;
        }

        $order = new Order(
            clientId: $result['clientId'],
            id: $result['order_id'], 
            title: $result['order_title'], 
            description: $result['order_description'], 
            status: Utils::toEnum($result['order_status']), 
            createdAt: date_create_from_format('Y-m-d H:i:s', $result['order_date']), 
            updatedAt: date_create_from_format('Y-m-d H:i:s', $result['order_lastUpdate'])
        );
    
        return $order;
    }

    public function create(Order $order): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('INSERT INTO `order` (order_title, order_description, order_status, clientId) VALUES (:title, :description, :status, :clientId);');

        return $statement->execute([
            'title' => $order->getTitle(),
            'description' => $order->getDescription(),
            'status' => $order->getStatus(),
            'clientId' => $order->getClientId()
        ]);
    }

    public function update(Order $order): bool
    {
        $statement = $this->connection
        ->getConnection()
        ->prepare('UPDATE `order` SET order_title = :title, order_description = :description, order_status = :status, order_lastUpdate = NOW() WHERE order_id = :id');

        return $statement->execute(['id' => $order->getId(), 'title' => $order->getTitle(), 'description' => $order->getDescription(), 'status' => $order->getStatus()]);
    }

    public function delete(int $id): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('DELETE FROM `order` WHERE order_id = :id');
        $statement->bindParam(':id', $id);
        
        return $statement->execute();
    }
}