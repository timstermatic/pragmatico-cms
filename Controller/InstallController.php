<?php
/**
 * Install Controller
 *
 * @package       pragmatico cms
 */

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class InstallController extends AppController {

/**
 * beforeFilter
 */
  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow('index');
  }

/**
 * create the admin user
 */
  public function index()
  {
  	$this->loadModel('User');
  	if($this->User->_count() != 0) {
  		$this->redirect(array('cms'=>true, 'controller'=>'users', 'action'=>'login'));
  	}
  	$this->layout = 'cms';
  	if($this->request->is('post')) {
  		$this->request->data['User']['group_id'] = 1;
  		if($this->User->save($this->request->data)) {
  			$this->Session->setFlash(__('Admin user created. Please login'), 'flash_success');
  			$this->redirect(array('cms'=>true, 'controller'=>'users', 'action'=>'login'));
  		}
  	}

  }

/**
 * hash password blowfish style
 */
  public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}

}
