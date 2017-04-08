<?php

//This class take care of our request our URL/class/method/
class Bootstrap {
	private $controller;// as URL this is user - class
	private $action;// as URL this is register-action-method
	private $request;
	
	public function __construct($request) {
		$this->request = $request;
		if($this->request['controller'] == "") {
			$this->controller = 'home';
		} else {
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		} else {
			$this->action = $this->request['action'];
		}
		
		
	}
	
	public function createController() {
		// Check Class
		if(class_exists($this->controller)) {
			$parents = class_parents($this->controller);
			// Check Extend
			if(in_array("Controller", $parents)) { // We check if basecontroller class exists
				if(method_exists($this->controller, $this->action)) { //We check if method in contr exists
					return new $this->controller($this->action, $this->request);
				
				} else {
					//Method does not exists
					echo '<h1>Method does not exists<h1>';
					return;
				}
			
			} else {
				// Base Controller Does Not Exist
				echo '<h1>Base controller not exists<h1>';
				return;
			}
		} else {
			// Controller Class Does Not Exists
			echo '<h1>Controller Class not exists<h1>';
			return;
		}
	}		
}



