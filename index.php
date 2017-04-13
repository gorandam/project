<?php

//Include config

require 'config.php';
require 'classes/Bootstrap.php';
require 'classes/Controller.php';

require 'controllers/home.php';
require 'controllers/shares.php';
require 'controllers/users.php';

$bootstrap = new Bootstrap($_GET);// Break down URL commands with assistance with .htaccess 
$controller = $bootstrap->createController();// Here $bootstrap class interpret which controller is being requested,instatiate it, and what method in this controller is being invoked
if($controller) {
	$controller->executeAction();// We call method of our class
}