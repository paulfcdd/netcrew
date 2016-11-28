<?php
$app
	->get('/', function () use ($app, $service) {
		return $app['twig']->render('index.twig',
			require_once $service->loadTranslation($service->checkLang()));
	})
	->bind('index');

$app
	->post('/switch_lang', function () use ($app, $service) {
		if ($service->switchLang($_POST['lang']) == true) {
			return $app->redirect($app['url_generator']->generate('index'));
		} else {
			return $service->setLang($_POST['lang']);
		}
	})
	->bind('switch_lang');