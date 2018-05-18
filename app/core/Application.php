<?php

/**
 * 
 */
class Application 
{
	protected $controller='HomeController';
	protected $method ='index';
	protected $params=[];

	public function __construct()
	{
		$this->prepareURL();
		if(file_exists(CONTROLLER.$this->controller.'.php')){
			$this->controller = new $this->controller;

			//call homecontroller@index with params
			if(method_exists($this->controller, $this->method)){
				call_user_func_array([$this->controller,$this->method], $this->params);
			}
		}
		//echo $this->controller, '<br>' .$this->method, print_r($this->params);
	}

	protected function prepareURL(){
		
		//removes the first backstroke
		$request=trim($_SERVER['REQUEST_URI'],'/');
		
		if(!empty($request)){
			//convert into an array
			$url=explode('/', $request);
			$this->controller = isset($url[0]) ? $url[0].'Controller': 'HomeController';
			$this->method = isset($url[1]) ? $url[1]: 'index';
			unset($url[0], $url[1]);
			$this->params = !empty($url) ? array_values($url) : [];
		}
	}
}