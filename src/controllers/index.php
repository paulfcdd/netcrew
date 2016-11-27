<?php
$app
	->get('/', function () use($app, $service){
		return $app['twig']->render('default/index.twig', [
			'title' => 'Main page'
		]);
	})
	->bind('index');