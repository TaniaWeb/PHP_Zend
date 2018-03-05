<?php
    define('ROOT_DIR' , dirname(dirname(__FILE__)));
    define('ZEND_LIB_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'library');
    define('DEFAULT_CTRL_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'application/default/controllers');
    define('ADMIN_CTRL_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'application/admin/controllers');
    define('USER_CTRL_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'application/user/controllers');

    //-----Set include path
    set_include_path(ZEND_LIB_DIR . PATH_SEPARATOR . get_include_path());

    require_once 'Zend/Controller/Front.php';
    require_once 'Zend/Controller/Router/Route.php';

    $controller = Zend_Controller_Front::getInstance();

    //-----Set Controller directory
    $controller->setControllerDirectory(array(
                        'default'   => DEFAULT_CTRL_DIR,
                        'user'  => USER_CTRL_DIR,
                        'admin' => ADMIN_CTRL_DIR
                        ));

    $controller->dispatch();

?>
