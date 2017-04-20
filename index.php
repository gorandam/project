<?php

//Include config

require 'config.php';
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';

require 'controllers/home.php';
require 'controllers/shares.php';
require 'controllers/users.php';

require 'models/home.php';
require 'models/share.php';
require 'models/user.php';

$bootstrap = new Bootstrap($_GET);// Break down URL commands with assistance with .htaccess 
//var_dump($bootstrap);
$controller = $bootstrap->createController();// Here $bootstrap class interpret which controller is being requested,instatiate it...
//var_dump($controller);

if($controller) {
	$controller->executeAction();// We call method of our class
}