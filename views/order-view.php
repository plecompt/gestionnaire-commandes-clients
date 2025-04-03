<?php require_once __DIR__ . '/templates/header.php'; ?>

            <section>
                <h1>Détails de la commande</h1>
                <div class="view-container">
                    <div class="view-options">
                        <div class="view-option key">ID Commande</div>
                        <div class="view-option value"><?= $order->getId() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">ID Client</div>
                        <div class="view-option value"><?= $order->getClientId() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Titre</div>
                        <div class="view-option value"><?= $order->getTitle() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Description</div>
                        <div class="view-option value"><?= $order->getDescription() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Statut</div>
                        <div class="view-option value"><?= $order->getStatus() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Création de la commande</div>
                        <div class="view-option value"><?= $order->getCreatedAt() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Dernière mise à jour</div>
                        <div class="view-option value"><?= $order->getUpdatedAt() ?></div>
                    </div>
                    <div class="view-buttons">
                        <button id="edit"><a href="?action=order-edit&id=<?= $order->getId() ?>">Modifier les informations de la commande ✏️</a></button>
                        <button id="delete"><a onclick="return confirm('Voulez-vous supprimer cette entrée?');" href="?action=order-delete&id=<?= $order->getId() ?>">Supprimer la commande ❌</a></button>
                    </div>
                </div>
                <button class="return"><a href="?action=order-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/templates/footer.php'; 
