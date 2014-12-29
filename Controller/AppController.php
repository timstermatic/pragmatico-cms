<?php
/**
 * Application level Controller
 *
 * @package       pragmatico cms
 */

App::uses('Controller', 'Controller');

class AppController extends Controller {

/**
 * components
 */
  public $components = array(
    'DebugKit.Toolbar',
    'Session'
  );

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

    // set layout based on prefix
    if(!empty($this->params['prefix'])) {
      $this->layout = $this->params['prefix'];
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

/**
 * sets page title
 *
 * @param string $title of page
 */
  public function setTitle($string=null)
  {
    $this->set('title_for_layout', $string);
  }


}
