<?php

namespace app\controllers;

use \lithium\core\Environment;
use \lithium\security\Auth;
use app\models\Example;
use app\libraries\DrupalController;


/**
 * Very simple, example controller.  
 *
 * @see app\libraries\DrupalController
 */
class ExampleController extends DrupalController {

	// Set to true if you want to enforce a drupal login to access the controller
        // TODO : Allow for more fine grained access control
	public $_secure = true;

	public function index() {
	     $examples = Example::all();
	     $user = $this->_user ? $this->_user->name : '';
	     $env = Environment::get();
             return compact('examples','user','env');
	}

	public function view() {

		$example = Example::first($this->request->id);

		if (!$example) {
			// Not found
			$this->redirect('Example::index',array('exit'=>true));
		}

		return compact('example');
	}

	public function delete() {

	        $success = false;
		$example = Example::first($this->request->id);
		$success = $example->delete();

		if ($success) {
			$this->redirect('Example::index',array('exit'=>true));
		}

		return compact('success');
	}


	public function add() {
	        $success = false;
	        if ($this->request->data) {
	            $example = Example::create($this->request->data);
	            $success = $example->save();
		    if($success) {
			$this->redirect('Example::index',array('exit'=>true));
		    }
	        }
	        return compact('success');
	}

}

?>	
