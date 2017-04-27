<?php

//Other controllers extend from it
abstract class Controller {
	protected $request;// protected that other child controllers can acess it
	protected $action;
	
	public function __construct($action, $request) {
		$this->action = $action;
		$this->request = $request;
	}
	
	public function executeAction() {
		return $this->{$this->action}();
	}
	
	// this method will give us oportunity to pass values from controllers to view
	protected function returnView($viewmodel, $fullview) {
		$view = 'views/' . strtolower(get_class($this)) . '/' . $this->action . '.html.php';// Here we add strtolower function to make case sensitive path right
		if($fullview) {
			require 'views/main.html.php';// main layup fille	
		} else {
			require $view;
		}
	}	
}