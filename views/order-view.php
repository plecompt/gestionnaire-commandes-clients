<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">📋 Détail de la commande</h2>

<!-- <p><strong>ID Client : </strong> <?= $order->getId() ?></p> -->
<p><strong>ID Commande : </strong> <?= $order->getId() ?></p>
<p><strong>Titre : </strong> <?= $order->getTitle() ?></p>
<p><strong>Description : </strong> <?= $order->getDescription() ?></p>
<p><strong>Statut : </strong> <?= $order->getStatus() ?></p>
<p><strong>Créée le : </strong> <?= $order->getCreatedAt() ?></p>
<p><strong>Dernière mise à jour : </strong> <?= $order->getUpdatedAt() ?></p>

<a href="?action=order-edit&id=<?= $order->getId() ?>" class="btn btn-warning">Modifier la commande</a>
<a onclick="return confirm('T’es sûr ?');" href="?action=order-delete&id=<?= $order->getId() ?>" class="btn btn-dark btn-sm">❌ Supprimer</a>
<a href="?action=order-list" class="btn btn-secondary">Retour à la liste des commandes</a>

<?php require_once __DIR__ . '/templates/footer.php'; 
