<?php
    require_once __DIR__ . '/../lib/Status.php';
    class Utils{
        static function toEnum($orderStatus): Status
        {
            return match($orderStatus) {
                "En attente" => Status::waiting ,
                "Expédiée" => Status::delivery,
                "Livrée" => Status::delivered,
            };
        }
    }
?>