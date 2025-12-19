DROP DATABASE IF EXISTS livraison_db;
CREATE DATABASE livraison_db;
USE livraison_db;

CREATE TABLE entrepot (
    id_entrepot INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(150) NOT NULL
);

CREATE TABLE vehicule (
    id_vehicule INT AUTO_INCREMENT PRIMARY KEY,
    immatriculation VARCHAR(20) NOT NULL
);

CREATE TABLE livreur (
    id_livreur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    salaire DECIMAL(10,2) NOT NULL
);

CREATE TABLE colis (
    id_colis INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(100),
    poids DECIMAL(10,2) NOT NULL
);

CREATE TABLE status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(20) NOT NULL
);

CREATE TABLE livraison (
    id_livraison INT AUTO_INCREMENT PRIMARY KEY,
    id_colis INT NOT NULL,
    id_entrepot INT NOT NULL,
    destination VARCHAR(150) NOT NULL,
    id_status INT NOT NULL,
    id_livreur INT NOT NULL,
    id_vehicule INT NOT NULL,
    carburant DECIMAL(10,2) NOT NULL,
    date_livraison DATE NOT NULL,

    FOREIGN KEY (id_colis) REFERENCES colis(id_colis),
    FOREIGN KEY (id_entrepot) REFERENCES entrepot(id_entrepot),
    FOREIGN KEY (id_status) REFERENCES status(id_status),
    FOREIGN KEY (id_livreur) REFERENCES livreur(id_livreur),
    FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule)
);

CREATE TABLE conf (
    id_conf INT AUTO_INCREMENT PRIMARY KEY,
    prix_kilo DECIMAL(10,2) NOT NULL
);
INSERT INTO conf (prix_kilo) VALUES (2000);

/* INSERTIONS DE DONNEES */

/* Status */
INSERT INTO status (libelle) VALUES
('en attente'),
('livré'),
('annulé');

/* Entrepot (unique) */
INSERT INTO entrepot (adresse) VALUES
('Entrepôt Central – Zone Industrielle');

/* Livreurs */
INSERT INTO livreur (nom, salaire) VALUES
('Jean', 15000),
('Paul', 12000),
('Marc', 18000);

/* Vehicules */
INSERT INTO vehicule (immatriculation) VALUES
('ABC-123'),
('XYZ-456'),
('LMN-789');

/* Colis */
INSERT INTO colis (description, poids) VALUES
('Ordinateur portable', 10),
('Téléphone mobile', 5),
('Meuble', 20),
('Télévision', 12),
('Réfrigérateur', 30);

/* Livraisons (dates sur plusieurs mois) */
INSERT INTO livraison VALUES
(NULL, 1, 1, 'Lot II A 25, Antananarivo', 2, 1, 1, 5000, '2025-01-10'),
(NULL, 2, 1, 'Rue des Banques, Antananarivo', 2, 2, 2, 4000, '2025-01-25'),
(NULL, 3, 1, 'Ambodivona, Antananarivo', 2, 3, 3, 8000, '2025-02-05'),
(NULL, 4, 1, 'Analakely, Antananarivo', 2, 1, 2, 6000, '2025-02-18'),
(NULL, 5, 1, 'Ivandry, Antananarivo', 2, 2, 1, 9000, '2025-03-03'),
(NULL, 1, 1, 'Ambohimanarina, Antananarivo', 1, 3, 3, 3000, '2025-03-15'),
(NULL, 2, 1, 'Ankorondrano, Antananarivo', 3, 1, 2, 2000, '2025-04-01');

/* Creation de vue */
CREATE OR REPLACE VIEW v_livraison_details AS
SELECT
    l.id_livraison,

    c.description       AS colis_description,
    c.poids             AS colis_poids,

    e.adresse           AS entrepot_adresse,

    l.destination,

    s.libelle           AS status,

    liv.nom             AS livreur_nom,
    liv.salaire         AS livreur_salaire,

    v.immatriculation   AS vehicule_immatriculation,

    l.carburant,
    l.date_livraison

FROM livraison l
JOIN colis c       ON l.id_colis = c.id_colis
JOIN entrepot e    ON l.id_entrepot = e.id_entrepot
JOIN status s      ON l.id_status = s.id_status
JOIN livreur liv   ON l.id_livreur = liv.id_livreur
JOIN vehicule v    ON l.id_vehicule = v.id_vehicule;

SELECT * FROM v_livraison_details;

CREATE OR REPLACE VIEW v_livraison_revenu AS
SELECT 
    l.id_livraison,
    c.description AS colis_description,
    c.poids AS colis_poids,
    l.carburant,
    lr.nom AS livreur_nom,
    lr.salaire AS salaire_livreur,
    l.destination,
    (c.poids * cf.prix_kilo) AS revenu_colis,
    (l.carburant + lr.salaire) AS cout_livraison,
    ((c.poids * cf.prix_kilo) - (l.carburant + lr.salaire)) AS profit
FROM livraison l
JOIN colis c ON l.id_colis = c.id_colis
JOIN livreur lr ON l.id_livreur = lr.id_livreur
JOIN conf cf ON 1=1;  

SELECT * FROM v_livraison_revenu;
