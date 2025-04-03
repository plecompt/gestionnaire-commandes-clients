<?php require_once __DIR__ . '/templates/header.php'; ?>
        
            <section>
                <h1>Bienvenue sur notre site!</h1> <br>
                <p>Vous pouvez consulter nos clients et nos commandes ci-dessous.</p>
                <div class="home-options">
                    <div class="home-option">
                        <a href="?action=client-list"><p>Consulter la liste des clients</p></a>
                    </div>
                    <div class="home-option">
                        <a href="?action=order-list"><p>Consulter la liste des commandes</p></a>
                    </div>
                </div>
            </section>

<?php require_once __DIR__ . '/templates/footer.php';
