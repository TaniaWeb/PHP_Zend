<?php
/**
 * このファイルは「User_View_Smarty」クラスを含む。
 *
 * @package     library
 * @subpackage  view
 * @author
 * @copyright   2007-2008 KESTECH
 * @license
 * @version     1.0
 * @link        http://www.ucube.com
 * @since       2007-08-22
 *
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
 * ビュー基礎クラス
 *
 * 画面表示のための関数を含む。
 *
 * @package    UCUBE_Classes
 * @subpackage common
 */
class User_View_Smarty extends Zend_View_Abstract
{
    /**
     * Smarty object
     * @var Smarty
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
		//include func_get_arg(0);
    }
    /**
     * コンストラクタ
     *
     * @param string $tmplPath
     * @param array $extraParams
     * @return void
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

		require_once 'Zend/Config/Ini.php';
		$config = new Zend_Config_Ini('../conf/setting.ini', 'database');

		$this->__set( "dns", $config->local->dns );
    }

	/**
     * Set HTML Outpath
	 * 
	 * @access public
     */
    public function setHtmlOutdir($path)
    {
		$this->outpath = $path;
    }

    /**
     * テンプレートエンジンオブジェクトを返します
     *
     * @return Smarty
     */
    public function getEngine()
    {
        return $this->_smarty;
    }
    /**
     * 変数をテンプレートに代入します
     *
     * @param string $key 変数名
     * @param mixed $val 変数の値
     * @return void
     */
    public function __set($key, $val)
    {
        $this->_smarty->assign($key, $val);
    }

    /**
     * 代入された変数を取得します
     *
     * @param string $key 変数名
     * @return mixed 変数の値
     */
    public function __get($key)
    {
        return $this->_smarty->get_template_vars($key);
    }

    /**
     * empty() や isset() のテストが動作するようにします
     *
     * @param string $key
     * @return boolean
     */
    public function __isset($key)
    {
        return (null !== $this->_smarty->get_template_vars($key));
    }

    /**
     * オブジェクトのプロパティに対して unset() が動作するようにします
     *
     * @param string $key
     * @return void
     */
    public function __unset($key)
    {
        $this->_smarty->clear_assign($key);
    }

    /**
     * 変数をテンプレートに代入します
     *
     * 指定したキーを指定した値に設定します。あるいは、
     * キー => 値 形式の配列で一括設定します
     *
     * @see __set()
     * @param string|array $spec 使用する代入方式 (キー、あるいは キー => 値 の配列)
     * @param mixed $value (オプション) 名前を指定して代入する場合は、ここで値を指定します
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
     * 代入済みのすべての変数を削除します
     *
     * Zend_View に {@link assign()} やプロパティ
     * ({@link __get()}/{@link __set()}) で代入された変数をすべて削除します
     *
     * @return void
     */
    public function clearVars()
    {
        $this->_smarty->clear_all_assign();
    }

    /**
     * テンプレートを処理し、結果を出力します
     *
     * @param string $name 処理するテンプレート
     * @return string 出力結果
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
			  return $this->_smarty->publishHtml($name, $this->outpath);
			else
			  return $this->_smarty->fetch($name);
        }
        throw new Exception('Invalid file path: '.$script_path.'  :  '.$compile_dir.'  :  '. $cache_dir .'----');        
    }
	
	
}
?>