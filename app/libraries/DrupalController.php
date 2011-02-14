<?php

namespace app\libraries;

use \lithium\security\Controller;
use \lithium\security\Auth;

class DrupalController extends \lithium\action\Controller {
		
	public $_user;
	public $_secure = true;

	public function _init() {

	     parent::_init();	 

	     // Simple override of init to ensure we always have the drupal user in the $_user object.    
	     $this->_user = Auth::check('default',$this->request);

	     if(!$this->_user && $this->_secure && $this->request->params['action'] != 'login') {
		// Need to find the right url!
		$this->redirect('Pages::login',array('exit'=>true));
	     }		



	}

}
?>
