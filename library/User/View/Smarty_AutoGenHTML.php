<?php
/**
 * 利用者正義 Smarty View
 *
 * PHP versions 4 and 5
 *
 * Copyright (c) 2007-2010 KESTECH
 *
 * @package   	library
 * @subpackage  view
 * @author    	李昌革 <flashtoday@hotmail.com>
 * @copyright  	2007-2010 KESTECH
 * @license    
 * @version 	1.0
 * @link      	http://www.ucube.com
 * @since      	2007-08-15
 */

/** 
 *Zend View 抽象クラスです。
 *
 *Zend_Controller_Actionを含みます。
 */
require_once 'Zend/View/Abstract.php';

/** 
 * Smartyクラスです。
 *
 * Smartyクラスを含みます。
 */
require_once 'Smarty/libs/Smarty.class.php';

/**
 * 利用者正義 Smarty Viewクラスです。
 *
 * @package    UCUBE_Classes
 * @subpackage common
 */

class User_View_Smarty extends Zend_View_Abstract
{
    /**
     * Smarty object
     * @var Smarty $_smarty
     */
    protected $_smarty;
    /**
     * Html write to file
     * @var Boolean $htmlout
     */
    public $htmlout = false;
	/**
     * Html out directory
     * @var String $outpath
     */
    protected $outpath = "";

	
    protected function _run()
    {
    }
	/**
     *コンストラクトクラスです。
	 * 
	 *@access	public
	 *@param String $tmplPath テンプルレート ファイル経路です。
	 *@param array $extraParams  
     */
    public function __construct($tmplPath = null, $extraParams = array())
    {
        $this->_smarty = new Smarty;

        if (null !== $tmplPath) {
            $this->setScriptPath($tmplPath);
        }

        foreach ($extraParams as $key => $value) {
            $this->_smarty->$key = $value;
        }
    }
	/**
     *Set HTML Outpath。
	 * 
	 *@access	public
     */
    public function setHTMLOutDir($path)
    {
		$this->outpath = $path;
    }
	/**
     *Smartyオブジェクトを取得する。
	 * 
	 *@access	public
     *@return Smarty
     */
    public function getEngine()
    {
        return $this->_smarty;
    }
	/**
     *Smartyテンプルレートオブジェクトを設定する。
	 * 
	 *@access	public
     *@param String $key
     *@param Smarty $val
     */
    public function __set($key, $val)
    {
        $this->_smarty->assign($key, $val);
    }
	/**
     *Smartyテンプルレートオブジェクトを取得する。
	 * 
	 *@access	public
     *@return Smarty
     */
    public function __get($key)
    {
        return $this->_smarty->get_template_vars($key);
    }
	/**
     *Smartyテンプルレートオブジェクトが設定されているかを検査する。
	 * 
	 *@access	public
     *@param string $key
     *@return boolean
     */
    public function __isset($key)
    {
        return (null !== $this->_smarty->get_template_vars($key));
    }

    /**
     * Smartyテンプルレートオブジェクトが設定を解除する。
     *
     * @access	public
	 * @param string $key
     * @return void
     */
    public function __unset($key)
    {
        $this->_smarty->clear_assign($key);
    }

    /**
     * テンプルレートオブジェクトを結合する。
     *
     * @see __set()
     * @param string|array $spec 
     * @param mixed $value 
     * @return void
     */
    public function assign($spec, $value = null)
    {
        if (is_array($spec)) {
            $this->_smarty->assign($spec);
            return;
        }

        $this->_smarty->assign($spec, $value);
    }

    /**
     * テンプルレートオブジェクトをクリアする。
     *
     * {@link assign()} 
     * ({@link __get()}/{@link __set()}) 
     *
     * @return void
     */
    public function clearVars()
    {
        $this->_smarty->clear_all_assign();
    }

    /**
     * View オブジェクトのレンダリングを進行する。
     *
     * @param string $name
     * @return string
     */
    public function render($name)
    {
		require_once 'Zend/Config/Ini.php';
		$config = new Zend_Config_Ini('../conf/setting.ini', 'smarty');
		$path = $this -> getAllPaths();
		$script_path = $path["script"][0];
		$compile_dir = $config -> compile_dir;
		$cache_dir = $config -> cache_dir;
		
		if (is_readable($script_path) && is_readable($compile_dir) && is_readable($cache_dir)) {
			$this->_smarty->template_dir = $script_path;
			$this->_smarty->cache_dir = $cache_dir ;
			$this->_smarty->compile_dir = $compile_dir;

			if($this->htmlout)
			  return $this->_smarty->publishHTML($name,$this->outpath);
			else
			  return $this->_smarty->fetch($name);
        }
        throw new Exception('Invalid file path: '.$script_path.'  :  '.$compile_dir.'  :  '. $cache_dir .'----');        
    }
	
	
}
?>
