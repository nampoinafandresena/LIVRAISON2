<?php
namespace app\controllers;

use flight\Engine;
use app\models\StatModel;
use Flight;
class StatController{
    	protected Engine $app;
        protected StatModel $Stat;
	public function __construct() {
	    $this->Stat = new StatModel(Flight::db());
	}


   public function getStat(){
    $filtre = Flight::request()->data->filtre;
    $stat =$this->Stat->getprofit($filtre);
    Flight::render('statistiques',['stats'=>$stat]);
   }

}

?>