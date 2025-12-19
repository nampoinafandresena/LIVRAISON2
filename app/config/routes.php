<?php

use app\controllers\ApiExampleController;
use app\controllers\ColisController;
use app\controllers\LivraisonController;
use app\controllers\MiniTemplateController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
	$router->group('', function(Router $router) use ($app) {
			// makany am index
		$router->get('/', function() use ($app){
			$app->render('index');
		});

			// makany am liste livraison
		// $router->get('/colis/livraisons/list',[LivraisonController::class,'allLivraisonDetails']);
			
			// makany am liste livraison avec revenu
		// $router->get('/colis/livraisons/revenu',[LivraisonController::class,'allLivraisonRevenu']);
		
			// makany am liste livraison avec revenu sy details miaraka
		$router->get('/colis/livraisons/combined', [LivraisonController::class, 'allLivraisonCombined']);

			// makany am liste colis
		$router->get('/colis/liste',[ColisController::class,'allcolis']);


			//makany am formulaire colis
		$router->get('/colis/form',function() use ($app){
			$app->render('formcolis');
		});	

			//mampanao insert colis
		$router->post('/colis/insert',[ColisController::class,'insertColis']);

	
	


	
}, [ SecurityHeadersMiddleware::class ]);