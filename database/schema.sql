-- CREATE DATABASE IF NOT EXISTS livraison;
-- USE livraison;

CREATE TABLE entrepot (
    id INT PRIMARY KEY AUTO_INCREMENT,
    adresse VARCHAR(100) NOT NULL
);

CREATE TABLE zone_livraison (
    id INT PRIMARY KEY AUTO_INCREMENT,
    zone_livraison VARCHAR(50) NOT NULL
);

CREATE TABLE vehicule (
    id INT PRIMARY KEY AUTO_INCREMENT,
    immatriculation VARCHAR(70) NOT NULL
);

CREATE TABLE livreur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(70) NOT NULL,
    salaire FLOAT
);

CREATE TABLE chiffredaffaire (
    prixkg FLOAT NOT NULL
);

CREATE TABLE livraison (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_entrepot INT,
    status VARCHAR(50),
    date_livraison DATE,
    id_destination INT,
    id_vehicule INT,
    id_livreur INT,
    carburant FLOAT,

 
        FOREIGN KEY (id_entrepot) REFERENCES entrepot(id),

  
        FOREIGN KEY (id_destination) REFERENCES zone_livraison(id),

  
        FOREIGN KEY (id_vehicule) REFERENCES vehicule(id),

   
        FOREIGN KEY (id_livreur) REFERENCES livreur(id)
);

CREATE TABLE colis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_livraison INT,
    description TEXT,
    poids FLOAT,
        FOREIGN KEY (id_livraison) REFERENCES livraison(id)
);

INSERT INTO entrepot (adresse) VALUES
('Dakar Plateau'),
('Thiès Centre'),
('Saint-Louis Nord');

INSERT INTO zone_livraison (zone_livraison) VALUES
('Zone A'),
('Zone B'),
('Zone C');

INSERT INTO vehicule (immatriculation) VALUES
('DK-1234-AA'),
('DK-5678-BB'),
('TH-9012-CC');

INSERT INTO livreur (nom, salaire) VALUES
('Mamadou Diallo', 150000),
('Cheikh Ndiaye', 140000),
('Ousmane Fall', 160000);

INSERT INTO chiffredaffaire (prixkg) VALUES
(500);

INSERT INTO livraison (
    id_entrepot, status, date_livraison,
    id_destination, id_vehicule, id_livreur, carburant
) VALUES
(1, 'En cours', '2025-01-10', 1, 1, 1, 20.5),
(2, 'Livrée',  '2025-01-12', 2, 2, 2, 15.0),
(3, 'Annulée', '2025-01-13', 3, 3, 3, 10.2);

INSERT INTO colis (id_livraison, description, poids) VALUES
(1, 'Téléviseur LED', 12.5),
(1, 'Carton de vêtements', 8.0),
(2, 'Ordinateur portable', 3.2),
(3, 'Meubles démontés', 25.0);

