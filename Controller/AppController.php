<?php
/**
 * Application level Controller
 *
 * @package       pragmatico cms
 */

App::uses('Controller', 'Controller');

class AppController extends Controller {

/**
 * beforeFilter
 */
  public function beforeFilter()
  {
  	parent::beforeFilter();
  	// check if installed
  	if($this->params['controller'] != 'install') {
  	  $this->_isInstalled();
  	}
  }

/**
 * checks if installed
 */
  public function _isInstalled() 
  {
  	$this->loadModel('User');
  	$userCount = $this->User->find('count');
  	if( $userCount == 0) {
      $this->redirect(array('prefix'=>false, 'controller'=>'install', 'action'=>'index'));	  
  	}
  }

}
