<?php require_once __DIR__ . '/templates/header.php'; ?>

            <section>
                <h1>Modifier la commande</h1>
                <form action="?action=order-update" method="POST">
                    <input type="hidden" name="id" value="<?= $order->getId() ?>">
                    <div class="form">
                        <label for="clientId" class="form-label">ID Client:</label>
                        <input type="text" class="form-control" id="clientId" name="clientId" value="<?= $order->getClientId() ?>" required>
                    </div>
                    <div class="form">
                        <label for="title" class="form-label">Titre :</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $order->getTitle() ?>" required>
                    </div>
                    <div class="form">
                        <label for="description" class="form-label">Description :</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?= $order->getDescription() ?></textarea>
                    </div>
                    <div class="form">
                        <label for="status" class="form-label">Statut:</label>
                        <?php $status = $order->getStatus(); ?>
                        <select class="form-control" name="status" id="status">
                            <option <?= $status == 'En attente' ? 'selected' : '' ?> value="En attente">En attente</option>
                            <option <?= $status == 'Expédiée' ? 'selected' : '' ?> value="Expédiée">Expédiée</option>
                            <option <?= $status == 'Livrée' ? 'selected' : '' ?> value="Livrée">Livrée</option>
                        </select>
                    </div>
                    <button class="form-valid" type="submit">Modifier les informations</button>
                </form>
                
                <button class="return"><a href="?action=order-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/templates/footer.php'; 
