<?php
/**
 * User model for pragmatico cms.

 * @package       pragmatico cms
 */

class User extends AppModel {


/**
 * validation rules
 */
	public $validate = array(
		'email' => array(
			'email'=>array(
				'rule'=>'email',
				'message'=>'Please enter a valid email address'
			),
			'unique'=>array(
				'rule'=>'isUnique',
				'message'=>'This email address is already in use'
			),
		),
		'password' => array(
			'between'=>array(
				'rule'=>array('between',6,15),
				'message'=>'Passwords should be between 6 and 15 characters'
			),
			'alphanumeric'=>array(
				'rule'=>'alphaNumeric',
				'message'=>'Passwords should be letters and numbers only'
			),
			'match'=>array(
				'rule'=>array('match'),
				'message'=>'Passwords do not match'
			),
		)
	);

/**
 * match passwords
 */
	public function match()
	{
		return $this->data[$this->alias]['password'] == $this->data[$this->alias]['confirm_password'];
	}

/**
 * get total number of system users
 * 
 * @return int $count
 */
	public function _count()
	{
		return $this->find('count');
	}




}