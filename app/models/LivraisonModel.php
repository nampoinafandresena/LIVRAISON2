<?php

namespace app\models;
use flight\Flight;
use PDO;
class LivraisonModel{
    
     private $db;
  
     public function __construct($db) {
		$this->db = $db;
	}

     public function getAllLivraisonDetails() {
          $stmt = $this->db->query("SELECT * FROM v_livraison_details");
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function getLivraisonsAvecRevenu() {
          $stmt = $this->db->query("SELECT * FROM v_livraison_revenu");
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     // public function getPrixKilo() {
     //      $stmt = $this->db->query("SELECT prix_kilo FROM conf LIMIT 1");
     //      $result = $stmt->fetch(PDO::FETCH_ASSOC);
     //      return $result ? $result['prix_kilo'] : 0;
     // }

     // public function getLivraisonsAvecRevenu() {
     //      $prix_kilo = $this->getPrixKilo();

     //      $sql = "
     //           SELECT 
     //                l.id_livraison,
     //                c.description AS colis_description,
     //                c.poids AS colis_poids,
     //                l.carburant,
     //                lr.nom AS livreur_nom,
     //                lr.salaire AS salaire_livreur,
     //                l.destination,
     //                (c.poids * :prix_kilo) AS revenu_colis,
     //                (l.carburant + lr.salaire) AS cout_livraison,
     //                ((c.poids * :prix_kilo) - (l.carburant + lr.salaire)) AS profit
     //           FROM livraison l
     //           JOIN colis c ON l.id_colis = c.id_colis
     //           JOIN livreur lr ON l.id_livreur = lr.id_livreur
     //      ";

     //      $stmt = $this->db->prepare($sql);
     //      $stmt->bindValue(':prix_kilo', $prix_kilo);
     //      $stmt->execute();

     //      return $stmt->fetchAll(PDO::FETCH_ASSOC);
     // }

}