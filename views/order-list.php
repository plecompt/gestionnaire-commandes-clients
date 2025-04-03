<?php require_once __DIR__ . '/templates/header.php'; ?>
        
        <section>
            <h1>Liste des commandes</h1>

                <table>
                    <thead>
                        <tr>
                            <th>ID Commande</th>
                            <th>ID Client</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Statut</th>
                            <th>Crée le</th>
                            <th>Dernière mise à jour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($orders as $order): ?>
                        <tr>
                            <td><?= $order->getId(); ?></td>
                            <td><?= $order->getClientId(); ?></td>
                            <td><a id="order-link" href="?action=order-view&id=<?= $order->getId() ?>"><?= $order->getTitle(); ?></a></td>
                            <td><?= $order->getDescription(); ?></td>
                            <td><?= $order->getStatus(); ?></td>
                            <td><?= $order->getCreatedAt() ?></td>
                            <td><?= $order->getUpdatedAt() ?></td>
                            <td class="list-options">
                                <button id="view"><a href="?action=order-view&id=<?= $order->getId() ?>">Voir 🔎</a></button>
                                <button id="edit"><a href="?action=order-edit&id=<?= $order->getId() ?>">Modifier ✏️</a></button>
                                <button id="delete"><a onclick="return confirm('Voulez-vous supprimer cette commande?');" href="?action=order-delete&id=<?= $order->getId() ?>">Supprimer ❌</a></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

<?php require_once __DIR__ . '/templates/footer.php';