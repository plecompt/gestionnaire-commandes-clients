<?php require_once __DIR__ . '/templates/header.php'; ?>

            <section>
                <h1>Modifier le client</h1>
                <form action="?action=client-update" method="POST">
                    <input type="hidden" name="idClient" value="<?= $client->getIdClient() ?>">
                    <div class="form">
                        <label for="nom" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?= $client->getNom() ?>" disabled>
                    </div>
                    <div class="form">
                        <label for="prenom" class="form-label">Prénom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $client->getPrenom() ?>" disabled>
                    </div>
                    <div class="form">
                        <label for="adresse" class="form-label">Adresse: </label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $client->getAdresse() ?>" required>
                    </div>
                    <div class="form">
                        <label for="email" class="form-label">Adresse e-mail: </label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $client->getEmail() ?>" required>
                    </div>
                    <button class="form-valid" type="submit">Modifier les informations</button>
                </form>
                
                <button class="return"><a href="?action=client-list" >Retour à la liste</a></button>
            </section>


<?php require_once __DIR__ . '/templates/footer.php'; 