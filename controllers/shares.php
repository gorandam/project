<?php

class Shares extends Controller {
	protected function Index(){
		$viewmodel = new ShareModel();// This object menage database conection
		//print_r($viewmodel);
		$this->returnView($viewmodel->Index(), true);
	}
}