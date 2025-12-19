<?php
namespace app\controllers;

use flight\Engine;
use app\models\ColisModel;
use Flight;
class ColisController{
    	protected Engine $app;
        protected ColisModel $colis;
	public function __construct() {
	    $this->colis = new ColisModel(Flight::db());
	}

   public function allColis(){
      $allcolis = $this->colis->getAll();
      Flight::render('listecolis',['colis' => $allcolis]);
   }
   public function insertColis(){
    $desc = Flight::request()->data->description;
    $poids = Flight::request()->data->poids;
    $this->colis->insertColis($desc,$poids);
    Flight::redirect('/colis/liste');
   }

}

?>