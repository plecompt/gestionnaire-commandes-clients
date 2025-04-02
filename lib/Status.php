<?php
    enum Status
    {
        case waiting;
        case delivery;
        case delivered;

        public function toString(): string
        {
            return match($this) {
                self::waiting => "En attente",
                self::delivery => "Expédiée",
                self::delivered => "Livrée",
            };
        }
    }
?>
