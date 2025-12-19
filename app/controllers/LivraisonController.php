<?php
namespace app\controllers;

use flight\Engine;
use app\models\LivraisonModel;
use Flight;
class LivraisonController{
    	protected Engine $app;
        protected LivraisonModel $livraison;
	public function __construct() {
	    $this->livraison = new LivraisonModel(Flight::db());
	}

    // public function allLivraisonDetails(){
    //     $allLivraisonDetails = $this->livraison->getAllLivraisonDetails();
    //     Flight::render('listelivraison',['livraisons' => $allLivraisonDetails]);
    // }
    
    // public function allLivraisonRevenu() {
    //     $livraisons = $this->livraison->getLivraisonsAvecRevenu();
    //     Flight::render('listeLivraisonRevenu', ['livraisonsR' => $livraisons]);
    // }

    public function allLivraisonCombined() {
    // maka liste tsotra misy details
    $livraisons = $this->livraison->getAllLivraisonDetails();

    // liste avec revenus / couts / profits
    $livraisonsR = $this->livraison->getLivraisonsAvecRevenu();

    // Envoi des deux datasets à la vue
    Flight::render('listeLivraisonCombined', [
        'livraisons' => $livraisons,
        'livraisonsR' => $livraisonsR
    ]);
}



}

?>