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
	// this method will give us oportunity to pass values from controllers t view
	protected function returnView($viewmodel, $fullview) {
		$view = 'views/' . get_class($this) . '/' . $this->action . '.php';
		if($fullview) {
			require 'views/main.php';// main layup fille
			
		} else {
			require $view;
		}
	
	}	

}