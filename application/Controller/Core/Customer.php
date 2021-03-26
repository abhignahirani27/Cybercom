<?php

namespace Controller\Core;
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Controller\Core\Abstracts');

class Customer extends \Controller\Core\Abstracts{
	// protected $request = Null;
	// protected $layout = Null;
	// protected $message = Null;

	// public function __construct() {
	// 	$this->setRequest();
	// 	$this->setLayout();
	// 	$this->setMessage();
	// }
	// public function setRequest() {
	// 	$this->request = \Mage::getModel('Model\Core\Request');
	// 	return $this;
	// }
	// public function getRequest() {
	// 	if(!$this->request){
	// 		$this->setRequest();
	// 	}
	// 	return $this->request;
	// }
	public function setLayout($layout=null) {
		if(!$layout){
			$layout = \Mage::getBlock('Block\Customer\Layout');
		}
		$this->layout = $layout;
		return $this;
	}
	// public function getLayout() {
	// 	if(!$this->layout){
	// 		$this->setLayout();
	// 	}
	// 	return $this->layout;
	// }

	// public function toHtmlLayout() {
	// 	$this->getLayout()->toHtml();
	// }

	// public function redirect($actionName = Null, $controllerName = Null, $params = Null, $resetParams = Null) {
	// 	if($actionName == Null) {
	// 		$actionName	= $_GET['a'];
	// 	}
	// 	if($controllerName == Null) {
	// 		$controllerName = $_GET['c'];
	// 	}
	// 	header("Location:{$this -> getUrl($actionName,$controllerName,$params,$resetParams)}");
	// 	exit(0);
	// }

	// public function getUrl($actionName = Null, $controllerName = Null, $params = Null, $resetParams = false) {
	// 	$final = $_GET;
	// 	if($resetParams) {
	// 		$final = [];
	// 	}
	// 	if($actionName == Null) {
	// 		$actionName	= $_GET['a'];
	// 	}
	// 	if($controllerName == Null) {
	// 		$controllerName = $_GET['c'];
	// 	}
	// 	if($params == Null) {
	// 		$params = [];
	// 	}

	// 	$final['c'] = $controllerName;
	// 	$final['a'] = $actionName;

	// 	$final = array_merge($final,$params);
	// 	$queryString = http_build_query($final);
	// 	unset($final);
	// 	return "http://localhost/application/index.php?{$queryString}";
	// }
	public function setMessage($message = null)
	{
		$this->message =  \Mage::getModel('Model\Customer\Message');
		return $this;
	}
	
	// public function getMessage()
	// {
	// 	if(!$this->message){
	// 		$this->setMessage();
	// 	}
	// 	return $this->message;
	// }
	
}

?>