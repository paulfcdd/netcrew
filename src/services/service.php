<?php
namespace Silexpack\Service;

use Silex\Application;

class Service {
	
	use Traits;
	
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
	 * @return mixed
	 */
	public function checkLang(){
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		if ($this->getLang() == null) {
			$this->setLang($lang);
			return $this->getLang();
		} else {
			return $this->getLang();
		}
	}

	/**
	 * @param string $lang
	 * @return bool|string
	 */
	public function switchLang(string $lang){
		try {
			$this->setLang($lang);
			return true;
		} catch (\Exception $e) {
			return $e->getMessage();
		} 
	}

	/**
	 * @param string $lang
	 * @return string
	 */
	public function loadTranslation(string $lang){
		$dir = __DIR__ . '/../../web/translations/'.$lang.'/';
		$files = scandir($dir);
		unset($files[0]);
		unset($files[1]);
		foreach ($files as $file) {
			return $dir . $file;
		}
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