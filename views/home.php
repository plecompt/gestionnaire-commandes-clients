<?php require_once __DIR__ . '/templates/header.php'; ?>
        
echo "Choix du gestionnaire client ou gestionnaire commande";

<h2 class="home"><a href="?action=client-list">Afficher les clients</a></h2>
<h2 class="home"><a href="?action=order-list">Afficher les commandes</a></h2>

<?php require_once __DIR__ . '/templates/footer.php';