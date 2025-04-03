<?php require_once __DIR__ . '/templates/header.php'; ?>

<section id="list">
                <h1>Liste des clients</h1>

                <table>
                    <thead>
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
                            <td><?= $client->getNom(); ?></td>
                            <td><?= $client->getPrenom(); ?></td>
                            <td><?= $client->getAdresse(); ?></td>
                            <td><?= $client->getEmail(); ?></td>
                            <td class="list-options">
                                <button id="view"><a href="?action=client-view&id=<?= $client->getIdClient() ?>">Voir 🔎</a></button>
                                <button id="edit"><a href="?action=client-edit&id=<?= $client->getIdClient() ?>">Modifier ✏️</a></button>
                                <button id="delete"><a onclick="return confirm('Voulez-vous supprimer cette entrée?');" href="?action=client-delete&id=<?= $client->getIdClient() ?>">Supprimer ❌</a></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

<?php require_once __DIR__ . '/templates/footer.php'; 