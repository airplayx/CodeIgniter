<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}
		$this->load =& load_class('Loader', 'core');
		$reflector = new ReflectionClass($this);
		$path = substr(dirname($reflector->getFileName()), strlen(realpath(APPPATH.config_item('module_folder')).DIRECTORY_SEPARATOR));
		$class_path = implode('/', array_slice(explode(DIRECTORY_SEPARATOR, $path), 0, -1));
		$class_name = $reflector->getName();
		
		$this->load->_ci_module_ready($class_path, $class_name);
		$this->load->initialize();
		log_message('info', 'CI_Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

}
/**
 * Application Smarty_Controller Class
 *
 * This class object is the super class that every library in
 * Smarty_Controller will be assigned to.
 *
 * @package		Smarty_Controller
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Bingoladen
 * @link		https://github.com/bingoladen/CodeIgniter
 */
class Smarty_Controller extends CI_Controller {

	protected $smarty;
	public function __construct() {
		parent::__construct();
		log_message('info', 'Smarty_Controller Class Initialized');
		if(!config_item('composer_autoload')){
			show_error('$config[\'composer_autoload\'] is set to FALSE,please set it to TRUE.');
		}else{
			if(!class_exists('Smarty',FALSE)){
				show_error('Unable to load class: Smarty,please Execute \'composer require smarty/smarty\' in '.APPPATH);
			}else{
				$this->load->config('smarty');
				$this->smarty = new Smarty;
				$this->smarty->left_delimiter = config_item('left_delimiter');
				$this->smarty->right_delimiter = config_item('right_delimiter');
				$this->smarty->setTemplateDir(config_item('template_dir'));
				$this->smarty->setCompileDir(config_item('compile_dir'));
				$this->smarty->setConfigDir(config_item('config_dir'));
				$this->smarty->setCacheDir(config_item('cache_dir'));
				$this->smarty->force_compile = config_item('force_compile');
				$this->smarty->compile_check = config_item('compile_check');
				$this->smarty->caching        = config_item('caching');
				$this->smarty->cache_lifetime = config_item('cache_lifetime');
			}
			
		}
	}

} 

/**
 * Application Ajax_Controller Class
 *
 * This class object is the super class that every library in
 * Ajax_Controller will be assigned to.
 *
 * @package		Ajax_Controller
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Bingoladen
 * @link		https://github.com/bingoladen/CodeIgniter
 */
class Ajax_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		log_message('info', 'Ajax_Controller Class Initialized');
		if(!$this->input->is_ajax_request()){
			die(json_encode(['msg'=>'Bad request!','code'=>422,'data'=>[]]));
		}
	}

} 
