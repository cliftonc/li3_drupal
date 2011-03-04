<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2010, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

use lithium\net\http\Router;
use lithium\core\Environment;

/**
 * 
 *  Ok - we need to over-ride the base path if we are using drupal, to be as the module name
 * 
 */
if (defined('DRUPAL_LITHIUM_PATH')) {
 
    $base_path = "/" . DRUPAL_LITHIUM_PATH;
    
	/**
	 * Here, we are connecting '/' (base path) to controller called 'Pages',
	 * its action called 'view', and we pass a param to select the view file
	 * to use (in this case, /app/views/pages/home.html.php)...
	 */
	Router::connect($base_path, array('Pages::view', 'args' => array('home')));
	
	/**
	 * ...and connect the rest of 'Pages' controller's urls.
	 */
	Router::connect($base_path.'/pages/{:args}', 'Pages::view');
	
	/**
	 * Connect the testing routes.
	 */
	if (!Environment::is('production')) {
		Router::connect($base_path.'/test/{:args}', array('controller' => 'lithium\test\Controller'));
		Router::connect($base_path.'/test', array('controller' => 'lithium\test\Controller'));
	}
	
	/**
	 * Finally, connect the default routes.
	 */
	Router::connect($base_path.'/{:controller}/{:action}/{:id:[0-9]+}.{:type}', array('id' => null));
	Router::connect($base_path.'/{:controller}/{:action}/{:id:[0-9]+}');
	Router::connect($base_path.'/{:controller}/{:action}/{:args}');

}

?>
