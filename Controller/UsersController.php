<?php
/**
 * Users Controller
 *
 * @package       pragmatico cms
 */

class UsersController extends AppController {

/**
 * cms user login
 */
  public function cms_login()
  {
   print_r($this->User->find('all'));
   if($this->request->is('post')) {
    if($this->Auth->login()) {
      $this->redirect(array('controller'=>'pages', 'action'=>'index'));    
    } else {
      $this->Session->setFlash(__('User not found'), 'flash_warning');
    }
   }
   $this->setTitle(__('CMS Login')); 
  }

}
