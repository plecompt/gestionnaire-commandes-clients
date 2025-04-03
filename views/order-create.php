
<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">⊕ Créer une nouvelle commande</h2>

<form action="?action=order-add" method="POST">
    <div class="mb-3">
        <label for="clientId" class="form-label">ID Client :</label>
        <input type="text" class="form-control" id="clientId" name="clientId" value="<?php echo $_GET['id']?>" required>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description :</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="Statut" class="form-label">Statut :</label>
        <select class="form-control" name="status" id="status">
            <option value="En attente">En attente</option>
            <option value="Expédiée">Expédiée</option>
            <option value="Livrée">Livrée</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?action=order-list" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php'; 