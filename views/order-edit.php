<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">✏️ Modifier une commande</h2>

<form action="?action=order-update" method="POST">
    <input type="hidden" name="id" value="<?= $order->getId() ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $order->getTitle() ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description :</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?= $order->getDescription() ?></textarea>
    </div>
    <div class="mb-3">
        <?php

        $status = $order->getStatus();

        ?>
        <label for="Statut" class="form-label">Statut :</label>
        <select class="form-control" name="status" id="status">
            <option <?= $status == 'waiting' ? 'selected' : '' ?> value="En attente">En attente</option>
            <option <?= $status == 'delivery' ? 'selected' : '' ?> value="Expédiée">Expédiée</option>
            <option <?= $status == 'delivred' ? 'selected' : '' ?> value="Livrée">Livrée</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<a href="?action=order-list" class="btn btn-secondary">Retour à la liste des commandes</a>

<?php require_once __DIR__ . '/templates/footer.php'; 
