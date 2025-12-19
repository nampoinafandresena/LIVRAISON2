Examen Decembre 2025

database (MySQL)
(OK)    - Creation de la base de donnee livraison_db
(OK)    - Creation des tables:
        (OK)-> entrepot(id_entrepot, adresse)
        (OK)-> vehicule(id_vehicule, immatriculation)
        (OK)-> livreur(id_livreur, nom, salaire)
        (OK)-> colis(id_colis, description, poids, prix)
        (OK)-> status(id_status, status)
            status = en attente / livre / annule
        (OK)-> livraison(id_livraison, id_colis, id_entrepot, destination, id_status, id_livreur, id_vehicule, carburant, date_livraison)
            # donc on regroupe les livraisons par date_livraison pour avoir les infos sur une livraison
(OK)    - Insertion de donnees 

app
    - config
        -> config.php (A FAIRE EN DERNIER):
            - modifier Core config (a la fin de pour l url sur le serveur)
            - modifier aussi le database
        -> routes.php
            -faire les routages necessaires pour toutes les pages
                * formulaire de livraison
    - controllers
        -> Creation des Controllers necessaires:
            LivraisonController.php
                fonctions pour Livraison 
                    - getAllLivraison()
                    - getLivraisonByDate()
                    - insertLivraison() 
                    - updateLivraison() #pour la modification des statuts
                fonctions pour de livreur 
                    - getAllLivreurs()
                    - getLivreurById()
                    - updateLivreur() #pour changer son salaire par exemple
                    - insertLivreur()
    - models (CRUD et autres fonctions utiles)
        EntrepotModel.php
        VehiculeModel.php
        LivreurModel.php
        ColisModel.php
        StatusModel.php
        LivraisonModel.php
        StatistiqueModel.php # pour les requetes complexes avec les operations a faire (GROUP BY DATE, BENEFICES, ...)
    - views
(ok)    index.php: page d accueil
            (ok) - routages
            (ok) - mettre les liens vers les autres pages
            (ok) - css
            (ok) - routages a verifier
            (ok) - verifier les liens dans le menu


(ok)    formcolis.php: 
        (ok) - formulaire de colis
            (ok) input:  - colis (description colis)
                    - poids 
            (ok) submit: -> insert dans la base de donnee 
        (ok) - css
        (ok) - routages a verifier
        (ok) - verifier les liens dans le menu


(ok)    listecolis.php:
        (ok) affichage de la liste des colis
            (ok) - afficher tous les colis avec leurs details 
                (OK) - description
                (OK) - poids
            (ok) - css
        (OK) - routages a verifier
        (ok) - verifier les liens dans le menu

        listeLivraisonCombined.php:
            (OK) - css
            (OK)- affichage de la liste des livraisons:
                -> avec les details des colis et des livraisons
                -> avec le revenu par livraison
            (OK) - creer une view view_livraison_details
            (OK) - creer une view view_livraison_revenu
            (OK) - LivraisonController.php: 
                    -> allLivraisonCombined()
            (OK) - routages a verifier
            (ok) - verifier les liens dans le menu

                


    # TSY MBOLA NANGATHANA ALOHA
        # formulaire de livraison
        #     input:  - id_colis + "( description colis (tonga de affichage fotsiny par rapport am le id) )"
        #             - poids 
        #             - prix
        #             - entrepot (select meme si il n y a qu un seul entrepot)
        #             - destination (adresse)
        #             - status = select options 
        #                 en attente (par defaut) `
        #             - livreur = select options
        #             - vehicule = select options
        #             - date_livraison = input date
        #     submit: -> insert dans la base de donnee 
        #             colis(id_colis, description, poids, prix)
        #                 dans colis: prix = set le prix
        #             livraison(id_livraison, id_colis, id_entrepot, destination, id_status, id_livreur, id_vehicule, carburant, date_livraison)
        #                 dans livraison: 
        #                     id_colis = getIdColis where descri=colis 
        #                     entrepot = getIdEntrepot ...
        #                     destination = destination
        #                     id_status = status 
        #                     id_livreur = livreur
        #                     id_vehicule = vehicule
        #                     carburant = carburant
        #                     date_livraison = date_livraison
        #             -> + pop up "Livraison enregistree!" 

Travail à faire
1. Gestion des livraisons (Création , Statut)
    a. les colis correspondants
(OK)    - affichage de la liste des colis
(OK)    - ajout de nouveaux colis
            -> insertion dans la table colis

(OK) b. Paramètre par livraison
    (OK) i. cout de revient ( voiture + chauffeur (salaire journalier différent))
        (OK) 1. voiture ( à saisir par livraison)
                -> carburant
        (OK) 2. chauffeur (salaire par livraison), chaque chauffeur a son propre salaire
                -> dans la table livreur
            => cout_livraison = livraison.carburant + livreur.salaire

        (OK) ii. colis par kg  ( montant gagné par kg)
            -> prix d un kilo deja configure
                prix kilo * poids du colis = prix du colis
            => revenu_colis = colis.poids * prix_kilo

            DONC: profit = revenu_colis - cout_livraison

(OK) 2. Créer directement les autres données nécessaires dans la table

3. Page pour afficher les bénéfices par période (jour, mois, année)
    -> StatistiqueController.php
        fonctions:
            - getBeneficesByDate($date)
            - getBeneficesByMonth($month, $year)
            - getBeneficesByYear($year)
    -> views/statistiques.php
        input: 
            - date (input date)
            - mois + annee (select)
            - annee (select)
        submit: -> afficher les benefices selon la periode choisie
            benefices = SUM(prix_colis) - SUM(cout_reviens)
                cout_reviens = SUM(carburant + salaire_livreur)