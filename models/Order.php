<?php

require_once __DIR__ . '/../lib/database.php';
require_once __DIR__ . '/../lib/Status.php';

class Order
{
    private int $id;
    private string $title;
    private string $description;
    private Status $status;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(?int $id = null, string $title, string $description, Status $status, ?DateTime $createdAt, ?DateTime $updatedAt){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt->format('Y-m-d H:i:s');
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = htmlspecialchars($title);
    }

    public function setDescription(string $description): void
    {
        $this->description = htmlspecialchars($description);
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}

