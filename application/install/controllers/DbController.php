<?php
require_once 'Zend/Controller/Action.php';
require_once 'User/Controller/Action.php';
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
require_once '../conf/messages.php';
require_once( 'User/Db/DBApi.php' );

class Install_DbController extends User_Controller_Action
{

	public function installAction()
    {
        header("Content-Type:text/html;charset = UTF-8");
		require_once 'Zend/Config/Ini.php';
		$config = new Zend_Config_Ini('../conf/setting.ini', 'database');

		if(!$this -> authCheck($config->install->user, $config->install->password))
		{
			$send['message'] = "사용자아이디와 암호 설치 실패.";
			$this->_forward('index', 'index', 'install', $send);
			return false;
		}
		else
		{
			$db_name = $config->dbname;
			$db_user = $config->username ;
			$db_password = $config->password;
			$db_host = $config->host;
			$lang_config = new Zend_Config_Ini('../conf/setting.ini', 'language');
			$lang = "'" . $lang_config->language . "'";
	    	
			$db_error = "";
			require_once "common.php";


			user_manage($db_user, $db_password);

			$err_msg  = "";
			$db_linker = false;
			$err_flag = false;
			$error = check_db_connect($db_host, $db_user, $db_password, $db_linker);
			$db_exist = is_exist_db($db_name);

			if ($error != '') {
				$err_msg = MSG_INSTALL_FAILED."<br>상세：" . $error . "<br>";
				$err_flag = true;
				@mysql_close();
			}

			if( $err_flag == false )
			{
				if (!db_install("../conf/DumpFiles/sims.sql",$db_host, $db_user, $db_password,$db_name)) {
					$err_msg = MSG_INSTALL_FAILED."<br>상세：$db_error<br>";
					$err_flag = true;
					@mysql_close();
				}
			}

			if( $err_flag == true )
			{
				$this -> view -> msg = $err_msg;
				return;
			}

			@mysql_close();

			$this -> view -> msg = MSG_INSTALL_OK;
		}

    }



}

?>