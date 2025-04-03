<?php
    require_once __DIR__ . '/../lib/database.php';
    require_once __DIR__ . '/../lib/Status.php';

    class Order
    {
        private ?int $clientId;
        private ?int $id;
        private string $title;
        private string $description;
        private Status $status;
        private ?DateTime $createdAt = null;
        private ?DateTime $updatedAt = null;

        public function __construct(?int $clientId = null, ?int $id = null, string $title, string $description, Status $status, ?DateTime $createdAt = null, ?DateTime $updatedAt = null){
            $this->clientId = $clientId ?? null;
            $this->id = $id ?? null;
            $this->title = $title;
            $this->description = $description;
            $this->status = $status;
            $this->createdAt = $createdAt ?? new DateTime();
            $this->updatedAt = $updatedAt ?? new DateTime();
        }

        public function getClientId(): int
        {
            return $this->clientId;
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

        public function getStatus(): string
        {
            return $this->status->toString();
        }

        public function getCreatedAt(): string
        {
            return $this->createdAt->format('Y-m-d H:i:s');
        }

        public function getUpdatedAt(): string
        {
            return $this->updatedAt->format('Y-m-d H:i:s');
        }

        public function setClientId(int $clientId): void
        {
            $this->clientId = $clientId;
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