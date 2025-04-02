Gestionnaire de commandes clients
Contexte
La petite entreprise BatiExperts souhaite améliorer son suivi des commandes. Actuellement, les commandes sont gérées sur un carnet, ce qui entraîne erreurs et oublis. L'objectif de cette application est de développer un système permettant de : 
Gérer les clients (nom, email, téléphone)
Enregistrer et suivre des commandes (chaque commande est liée à un client et a un statut : "en attente", "expédiée", "livrée").

Relation :
Un client peut passer plusieurs commandes
Une commande appartient à un seul client

/mvc-orders
|- /controllers
|  |- ClientController.php 
|  |- OrderController.php
|- /lib
|  |- database.php
|- /models
|  |- /repositories
|  |  |- ClientRepository.php
|  |  |- OrderRepository.php
|  |- Client.php
|  |- Order.php
|- /views
|  |- 404.php
|  |- /templates
|  |  |- footer.php
|  |  |- header.php
|  |- /client
|  |  |- create.php
|  |  |- edit.php
|  |  |- list.php
|  |  |- view.php
|  |- /orders
|  |  |- create.php
|  |  |- edit.php
|  |  |- list.php
|  |  |- view.php
|  |- home.php
|- index.php
|- README.md


Fonctionnalités
Clients : 
CRUD (ajouter/voir/modifier/supprimer)
Afficher les commandes pour chaque client

Commandes : 
est liée à un client
a un statut ("en attente", "expediée", "livrée")
un client peut avoir plusieurs commandes
afficher le client de la commande

Exemple d'utilisation
Un employé ajoute un nouveau client
Il enregistre une commande pour ce client
La commande est affichée avec son statut
L'employé peut mettre à jour le statut de la commande
L'employé peut consulter toutes les commandes d'un client donné

Méthodologie
Créer la structure de la base de données avec des données de test
Faire le CRUD client
Faire le CRUD commande
Faire le lien entre client et commande