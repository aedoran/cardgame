#!/usr/bin/env php
<?
#test phpversion definately not need, just here for habit sake.
if (version_compare(phpversion(), '5.0.0', '<')===true) {
    echo  "You need version of php greater than 5.0.0 \n";
    exit();
}



#set includes
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('BP',dirname(__FILE__));
$paths[] = BP . DS . 'lib';
set_include_path(implode(PS,$paths));



#check config exists
if (!file_exists(BP . DS . 'config.php')) {
	echo "config.php needs to exist in the same directory as run.php\n";
	exit();
}


#include the config
include(BP . DS . 'config.php');


#check players and dealer_name is set
if (!isset($players) OR !isset($dealer_name)) {
	echo "\$players and \$dealers needs to be set in the config.php\n";
	exit();
}


#check the types set in the config
if (!is_array($players) OR !is_string($dealer_name)) {
	echo "\$players must be an array, and \$dealer_name must be a string\n";
	exit();
}

#set the autoloader
function __autoload($class_name) {
	$class_file = str_replace('_','/',$class_name);
	include $class_file . '.php';
}



#players and dealer values are set from config.php
$g = new Game_Blackjack($players,$dealer_name);

$g->runRound();
$g->displayRound();


?>