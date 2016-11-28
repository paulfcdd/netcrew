<?php
namespace Silexpack\Service;
use Symfony\Component\HttpFoundation\Session\Session;

trait Traits {
	
	/**
	 * @param string $value
	 */
	public function setLang(string $value){
		$session = new Session();
		return $session->set('lang', $value);
	}

	/**
	 * @return mixed
	 */
	public function getLang(){
		$session = new Session();
		return $session->get('lang');
	}
}