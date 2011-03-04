<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2010, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_drupal\security\auth\adapter;

use lithium\core\Libraries;

/**
 * The `Drupal` adapter provides basic authentication facilities for checking for session status within 
 * drupal global variables.
 *
 * @see lithium\net\http\Request::$data
 * @see lithium\data\Model::find()
 * @see lithium\util\String::hash()
 */
class Drupal extends \lithium\core\Object {

	/**
	 * List of configuration properties to automatically assign to the properties of the adapter
	 * when the class is constructed.
	 *
	 * @var array
	 */
	protected $_autoConfig = array();

	/**
	 * Sets the initial configuration for the `Drupal` adapter, as detailed below.
	 *
	 */
	public function __construct(array $config = array()) {
		$defaults = array();
		parent::__construct($config + $defaults);
	}

	/**
	 * Called by the `Auth` class to run an authentication check against the current Drupal session
	 */
	public function check($request, array $options = array()) {
				
		global $user;				
		$logged_in = $user->uid ? true : false;		
		if($logged_in) {		
			return array('username' => $user->name);
		} else {
			return array('username' => '');
		}
		
	}

	/**
	 * A pass-through method called by `Auth`. Returns the value of `$data`, which is written to
	 * a user's session. When implementing a custom adapter, this method may be used to modify or
	 * reject data before it is written to the session.
	 *
	 * @param array $data User data to be written to the session.
	 * @param array $options Adapter-specific options. Not implemented in the `Form` adapter.
	 * @return array Returns the value of `$data`.
	 */
	public function set($data, array $options = array()) {
		return $data;
	}

	/**
	 * Called by `Auth` when a user session is terminated. Not implemented in the `Drupal` adapter - not required.
	 *
	 * @param array $options Adapter-specific options. Not implemented in the `Drupal` adapter - not required.
	 * @return void
	 */
	public function clear(array $options = array()) {
	}

	protected function _init() {
		parent::_init();
	}

}

?>
