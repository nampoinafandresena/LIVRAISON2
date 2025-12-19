<?php

namespace app\models;
use flight\Flight;
use PDO;
class StatModel{
    
     private $db;

     	public function __construct($db) {
		$this->db = $db;
	}


        public function getprofit($id){
          $views = [
        1 => 'v_revenu_journalier',
        2 => 'v_revenu_mensuel',
        3 => 'v_revenu_annuel'
    ];

    if (!array_key_exists($id, $views)) {
        return [];
    }

    $stmt = $this->db->query("SELECT * FROM {$views[$id]}");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

}