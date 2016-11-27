<?php
$app
	->get('/header', function () use ($app, $service) {
		return $app['twig']->render('default/header.twig', [
			'siteName' => 'Silexpack',
		]);
	})
	->bind('header');