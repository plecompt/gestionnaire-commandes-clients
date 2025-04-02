<?php require_once __DIR__ . '/templates/header.php'; ?>
        
<h2 class="mb-4">Liste des clients</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Adresse e-mail</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clients as $client): ?>

            <tr>

                <td><?= $client->getIdClient(); ?></td>
                <td><a href="?action=view&id=<?= $client->getIdClient() ?>"><?= $client->getNom(); ?></a></td>
                <td><a href="?action=view&id=<?= $client->getIdClient() ?>"><?= $client->getPrenom(); ?></a></td>
                <td><?= $client->getAdresse(); ?></td>
                <td><?= $client->getEmail(); ?></td>
                <td>
                    <a href="?action=view&id=<?= $client->getIdClient() ?>" class="btn btn-primary btn-sm">Voir</a>
                    <a href="?action=edit&id=<?= $client->getIdClient() ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a onclick="return confirm('T’es sûr ?');" href="?action=delete&id=<?= $client->getIdClient() ?>" class="btn btn-dark btn-sm">❌</a>
                </td>

            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/templates/footer.php';
