<?php
/**
 * このfileは"DB_Api"classを含めている。
 *
 * @package     library
 * @subpackage  DB_Api
 * @author      jckim
 * @copyright   
 * @license
 * @version     1.0
 * @link        
 * @since       2016-01-16
 *
 */

require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
require_once  'Zend/Auth/Adapter/DbTable.php';

/** 
 * DB管理のための基礎class
 *
 * 共通となる関数を定義する。
 *
 * @package    
 * @subpackage DB_API
 */
class DB_Api {

	// Zend_Db_Adapter_Pdo_Mssql object
	private $_db_adapter_pdo_mysql;
	
	// Zend_Db_Adapter_Pdo_Mssql object
	public $db; 	
	
	/**
	 * DB_Api クラスの構築者
	 */
	public function DB_Api()
	{
		$this->db = $this->getMysqlDB();
	}

	/**
	 * Zend Mssql Ojbectを返す。
	 * 
	 */
	public function getMysqlDB()
	{
		if($this->_db_adapter_pdo_mysql)
		{
			return $this->_db_adapter_pdo_mysql;
		}
		else
		{
			require_once 'Zend/Config/Ini.php';
			$config = new Zend_Config_Ini('../conf/setting.ini', 'database');
			$this->_db_adapter_pdo_mysql = new Zend_Db_Adapter_Pdo_Mysql($config ->toArray());
			return $this->_db_adapter_pdo_mysql;
		}
	}


	/**
	 * テブルでレコードを削除する。
	 *
	 * @access public
	 * @param string $table table name
	 * @param string @where 
	 * @return bool 
	 */
	public function deleteRecord($table, $where)
	{
		try {
			$this->db->delete($table, $where);
			return true;
		}
		catch(Exception $e)  {
			return false;
		}
	}


}
?>