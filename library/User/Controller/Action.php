<?php

require_once 'Zend/Controller/Action.php';
require_once 'Zend/Session/Namespace.php';
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';

/**
 * すべてのペジらのコントローラーの親クラス
 * 
 * すべてのページで使用される共通的な関数を定義する。
 * @author	jckim
 * @version	1.0
 * @since	2016-01-16
 */
class User_Controller_Action extends Zend_Controller_Action
{

	/**
	 * Zend_Db_Adapter_Pdo_Mysql オブジェクトを含む変数
	 */
	private $_db_adapter_pdo_mysql;

	/**
	 * Mysql Database 接近者を得る。
	 */
	public function getMysqlDB()
	{
		if($this->_db_adapter_pdo_mysql) return $this->_db_adapter_pdo_mysql;
		else {
			require_once 'Zend/Config/Ini.php';
			$config = new Zend_Config_Ini('../conf/setting.ini', 'database');
			$this->_db_adapter_pdo_mysql = new Zend_Db_Adapter_Pdo_Mysql($config ->toArray());
			return $this->_db_adapter_pdo_mysql;
		}
	
	}

	public function authCheck($user, $password)
	{
		if($user != '' || $password != ''){
			if (!isset($_SERVER['PHP_AUTH_USER'])) {
				header('WWW-Authenticate: Basic realm="OCEANUS Installer"');
				header('HTTP/1.0 401 Unauthorized');
				return false;
			} 
			else 
			{
				if($user != '' && $_SERVER['PHP_AUTH_USER'] == $user)
				{
					if($password == $_SERVER['PHP_AUTH_PW'])
					{
						return true;
					}
					else
					{
						header('WWW-Authenticate: Basic realm="OCEANUS Installer"');
						header('HTTP/1.0 401 Unauthorized');
						return false;
					}
				}
				else
				{
					header('WWW-Authenticate: Basic realm="OCEANUS Installer"');
					header('HTTP/1.0 401 Unauthorized');
					return false;
				}
			}
		}
		else
			return true;
	
	}

	/**
	 * Session Controllerを得る。
	 */
	public function getSession()
	{
		return new Zend_Session_Namespace('ZENDSAMPLE');
	
	}

	/**
	 * Sessionに資料を書くする。
	 * @param name
	 * @param value
	 * 
	 */
	public function writeToSession($name, $value)
	{
		$this->getSession()->__set($name, $value);
	}

	/**
	 * Session変数の値を得る。
	 * @param name
	 * 
	 */
	public function readSession($name)
	{
		return $this->getSession()->__get($name);
	}

	/**
	 * Session変数を削除する。
	 * @param name
	 * 
	 */
	public function deleteSessionValue($name)
	{
		return $this->getSession()->__unset($name);
	}
	

	public function isLogined()
	{
		$result = $this->getSession()->logined == "YES";

		return $result;
	}
	
	public function setLogined()
	{
		$this->getSession()->logined = "YES";
	}

	public function isManager()
	{
		if( !$this->getSession()->__isset("user_info") )
			return false;
		$user_info = $this->readSession("user_info");
		return $user_info["usertype"] == 0;
	}

	public function getUserId()
	{
		if( !$this->getSession()->__isset("user_info") )
			return false;
		$user_info = $this->readSession("user_info");
		return $user_info["id"];
	}

	public function getUserInfo()
	{
		if( !$this->getSession()->__isset("user_info") )
			return false;
		$user_info = $this->readSession("user_info");
		return $user_info;
	}

	public function logout($flag=true)
	{
		$this->getSession()->unsetAll();
		if($flag)
			$this->_forward('index', 'index', 'user', array());
	}

    public function random_string($length) 
    {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('a', 'z'));

	    for ($i = 0; $i < $length; $i++) 
	    {
	        $key .= $keys[array_rand($keys)];
	    }

	    return $key;
	}

	public function resizeImage($srcfile, $dstfile, $thumbWidth, $thumbHeight, $isCircle)
	{
		/* Get original image x y*/
		list($w, $h) 	= getimagesize($srcfile['tmp_name']); //$_FILES['image']['tmp_name']);
		/* calculate new image size with ratio */
		$new_width 		= $thumbWidth;
		$new_height 	= (1.0*$new_width/$w)*$h;
		if($new_height > $thumbHeight)
		{
			$new_width 	= ($thumbHeight/$new_height) * $new_width;
			$new_height = $thumbHeight;
		}

		/* new file name */
		$path 			= $dstfile; //'uploads/'.$width.'x'.$height.'_'.$_FILES['image']['name'];
		/* read binary data from image file */
		$imgString 		= file_get_contents($srcfile["tmp_name"]);
		/* create image from string */
		$image 			= imagecreatefromstring($imgString);

		$tmp 			= imagecreatetruecolor($new_width, $new_height);
		$whiteBackground = imagecolorallocate($tmp, 255, 255, 255); 
		imagefill($tmp,0,0,$whiteBackground);
	
		imagecopyresampled($tmp, $image, 0, 0, 0, 0, $new_width, $new_height, $w, $h);	
				
		/* Save image */
		switch ($srcfile['type']) 
		{
			case 'image/jpeg':
				imagejpeg($tmp, $path, 100);
				break;
			case 'image/png':
				imagepng($tmp, $path, 0);
				break;
			case 'image/gif':
				imagegif($tmp, $path);
				break;
			default:
				return "";
		}
		/* cleanup memory */
		imagedestroy($image);
		imagedestroy($tmp);
		return $path;
	}

	public function saveImage($srcfile, $dstfile)
	{
		$path 			= $dstfile;
		$imgString 		= file_get_contents($srcfile["tmp_name"]);
		/* create image from string */
		$image 			= imagecreatefromstring($imgString);
		$black 			= imagecolorallocate($image, 0, 0, 0);

		// Make the background transparent
		imagecolortransparent($image, $black);

		switch ($srcfile['type']) 
		{
			case 'image/jpeg':
				imagejpeg($image, $path, 100);
				break;
			case 'image/png':
				imagepng($image, $path, 0);
				break;
			case 'image/gif':
				imagegif($image, $path);
				break;
			default:
				return "";
		}
		/* cleanup memory */
		imagedestroy($image);

		return $path;		
	}
}

?>