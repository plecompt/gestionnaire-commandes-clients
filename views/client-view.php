<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">Détails du client</h2>

<p><strong>Nom: </strong> <?= $client->getNom() ?></p>
<p><strong>Prénom: </strong> <?= $client->getPrenom() ?></p>
<p><strong>Adresse: </strong> <?= $client->getAdresse() ?></p>
<p><strong>Adresse e-mail</strong> <?= $client->getEmail() ?></p>

<a href="?action=client-edit&id=<?= $client->getIdClient() ?>" class="btn btn-warning">Modifier les informations du client</a>
<a href="?action=client-list" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php'; 