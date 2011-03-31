<?

#set includes
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('BP',dirname(__FILE__));
$paths[] = BP . DS . 'lib';

set_include_path(get_include_path().PS.implode(PS,$paths));



#set the autoloader to work with tests and phpunit 3.5
function autoload($class) {
    $file = str_replace('_','/',$class.'.php');
    try{
        include_once $file;
    } catch (Exception $e) {

    }
}
spl_autoload_register('autoload');