<?php
require_once 'Zend/Controller/Action.php';
require_once 'User/Controller/Action.php';
class ErrorController extends User_Controller_Action
{
    public function errorAction()
    {

		echo "error page";
    	//var_dump($this->_getParam('error_handler'));

    	/*$errors = $this->_getParam('error_handler');

		switch ($errors->type) {
		    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
		    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
		    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:

		        // 404 error -- controller or action not found
		        $this->getResponse()->setHttpResponseCode(404);
		        $this->view->message = 'Page not found';
		        break;

		    // check for any other exception
		    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_OTHER:
		        if ($errors->exception instanceof My_Exception_Blocked) {
		            $this->getResponse()->setHttpResponseCode(403);
		            $this->view->message = $errors->exception->getMessage();
		            break;
		        }
		        // fall through if not of type My_Exception_Blocked

		    default:
		        // application error
		        $this->getResponse()->setHttpResponseCode(500);
		        $this->view->message = 'Application error';
		        break;
		}*/
    }
}

?>