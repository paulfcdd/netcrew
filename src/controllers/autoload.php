<?php
use Silexpack\Service\Service;

$service = new Service($app);

$files = scandir(__DIR__);

unset($files[0]);
unset($files[1]);

foreach ($files as $file) {
	require_once $file;
}