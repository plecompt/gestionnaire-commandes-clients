<?php require_once __DIR__ . '/templates/header.php'; ?>

            <section>
                <h1>Détails du client</h1>
                <div class="view-container">
                    <div class="view-options">
                        <div class="view-option key">Nom</div>
                        <div class="view-option value"><?= $client->getNom() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Prénom</div>
                        <div class="view-option value"><?= $client->getPrenom() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Adresse</div>
                        <div class="view-option value"><?= $client->getAdresse() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Adresse e-mail</div>
                        <div class="view-option value"><?= $client->getEmail() ?></div>
                    </div>
                    <div class="view-buttons">
                        <button id="edit"><a href="?action=client-edit&id=<?= $client->getIdClient() ?>">Modifier les informations du client ✏️</a></button>
                        <button id="delete"><a onclick="return confirm('Voulez-vous supprimer cette entrée?');" href="?action=client-delete&id=<?= $client->getIdClient() ?>">Supprimer le profil client ❌</a></button>
                    </div>
                </div>
                <button class="return"><a href="?action=client-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/templates/footer.php'; 