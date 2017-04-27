<?php

//Include config
require 'config.php';

//Reference to the bootstrap class and base classes
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';

//Reference to the Controllers
require 'controllers/home.php';
require 'controllers/shares.php';
require 'controllers/users.php';

//Rerference to the Models
require 'models/home.php';
require 'models/share.php';
require 'models/user.php';

// Our main code for loading main environment of the program - ROUTING
$bootstrap = new Bootstrap($_GET);// Break down URL commands with assistance with .htaccess 
//var_dump($bootstrap);

$controller = $bootstrap->createController();// Here $bootstrap class interpret which controller is being requested,instatiate it...
//var_dump($controller);

if($controller) {
	$controller->executeAction();// We call method of our controller class and from here every control is in the controller
}