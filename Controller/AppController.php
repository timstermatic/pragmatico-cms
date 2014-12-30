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
    'Auth'=>array(
      'authenticate' => array(
        'Form' => array(
          'passwordHasher' => 'Blowfish',
          'fields' => array('username' => 'email')
        )
      )
    ),
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

    if(!empty($this->params['prefix'])) {
      // set layout based on prefix
      $this->layout = $this->params['prefix'];

      // block cms to non-admin users
      if($this->Auth->user('id')) {
        if($this->Auth->user('group_id') !=1 && $this->params['action'] != 'cms_login') {
          $this->Auth->logout();
          $this->redirect(array('cms'=>true, 'controller'=>'users', 'action'=>'login'));
        }
      }

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
