<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">✏️ Modifier une tâche</h2>

<form action="?action=client-update" method="POST">
    <input type="hidden" name="idClient" value="<?= $client->getIdClient() ?>">
    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse: </label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $client->getAdresse() ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail: </label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $client->getEmail() ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<a href="?action=client-list" class="btn btn-secondary">Retour à la liste</a>


<?php require_once __DIR__ . '/templates/footer.php'; 