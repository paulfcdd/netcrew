<?php
namespace Silexpack\Service;

use Silex\Application;

class Service {

	/**
	 * @var \Silex\Application
	 */
	private $app;

	/**
	 * Service constructor.
	 * @param Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * @param string $tableName
	 * @return mixed
	 */
	public function selectAll(string $tableName){
		$tableName = $this->validateTableName($tableName);
		return $this->app['db']->fetchAll("SELECT * FROM $tableName");
	}

	/**
	 * @param $tableName
	 * @return string
	 */
	private function validateTableName($tableName){
		$tableName = strtolower($tableName);
		$tableName = trim($tableName);
		return $tableName;
	}
}