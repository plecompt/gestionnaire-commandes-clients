
<?php require_once __DIR__ . '/templates/header.php'; ?>

            <section>
                <h1>Créer une nouvelle commande</h1>
                <form action="?action=order-add" method="POST">
                    <div class="form">
                        <label for="clientId" class="form-label">ID Client:</label>
                        <input type="text" class="form-control" id="clientId" name="clientId" value="<?php echo $_GET['id']?>" required>
                    </div>
                    <div class="form">
                        <label for="title" class="form-label">Titre:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form">
                        <label for="status" class="form-label">Statut:</label>
                        <select class="form-control" name="status" id="status">
                            <option value="En attente">En attente</option>
                            <option value="Expédiée">Expédiée</option>
                            <option value="Livrée">Livrée</option>
                        </select>
                    </div>
                    <button class="form-valid" type="submit">Ajouter</button>
                </form>
                
                <button class="return"><a href="?action=order-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/templates/footer.php'; 