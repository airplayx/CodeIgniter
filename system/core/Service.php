<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

class CI_Service
{
	
	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		log_message('info', 'Service Class Initialized');
	}

	function __get($key)
    {
        return get_instance()->$key;
    }
} 


