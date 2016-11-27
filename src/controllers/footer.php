<?php
$app
	->get('/footer', function () use($app, $service) {
		return $app['twig']->render('default/footer.twig', [

		]);
	})
	->bind('footer');