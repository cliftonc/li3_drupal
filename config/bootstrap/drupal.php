<?

/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2010, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

use lithium\core\Environment;
use lithium\security\Auth;

if (defined('DRUPAL_LITHIUM_PATH')) {
	
	/**
	 * Over-ride environment, set a set for this particular project, including one that detects running in Drupal
	 */
	Environment::is(function($request) {	
		
		global $base_url;
		$drupal = $base_url ? true : false;	
		if ($request->env('HTTP_HOST') == 'localhost' && !$drupal) {
			return 'dev-li3';
		}
		if ($request->env('HTTP_HOST') == 'localhost' && $drupal) {
			return 'dev-drupal';
		}
		if($drupal) {
			return 'production-drupal';	
		}
		return 'production-li3';
	
	});
	
	Auth::config(
		array('default' => array(
				'adapter' => '\li3_drupal\security\auth\adapter\Drupal'
			)
		)
	);
	
} else {

	
	Auth::config(array(
	      'default' => array(
			     'adapter' => 'Http', 'users' => array('admin' => 'bob'),
			     'method' => 'basic'
			)
	));
	
}

?>
