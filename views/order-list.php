<?php require_once __DIR__ . '/templates/header.php'; ?>
        
<h2 class="mb-4">📋 Liste des commandes</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID Client</th>
            <th>ID Commande</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Statut</th>
            <th>Créé le</th>
            <th>Mise à jour le</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order): ?>

            <tr>
                <td><?= $order->getClientId(); ?></td>
                <td><?= $order->getId(); ?></td>
                <td><a href="?action=order-view&id=<?= $order->getId() ?>"><?= $order->getTitle(); ?></a></td>
                <td><?= $order->getDescription(); ?></td>
                <td><?= $order->getStatus(); ?></td>
                <td><?= $order->getCreatedAt() ?></td>
                <td><?= $order->getUpdatedAt() ?></td>
                <td>
                    <a href="?action=order-view&id=<?= $order->getId() ?>" class="btn btn-primary btn-sm">👀</a>
                    <a href="?action=order-edit&id=<?= $order->getId() ?>" class="btn btn-warning btn-sm">✏️</a>
                    <a onclick="return confirm('Etes vous sur de vouloir supprimer cette commande ?');" href="?action=order-delete&id=<?= $order->getId() ?>" class="btn btn-dark btn-sm">❌</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/templates/footer.php';