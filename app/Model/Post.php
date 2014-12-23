<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property User $User
 * @property Hub $Hub
 */
class Post extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Hub' => array(
			'className' => 'Hub',
			'foreignKey' => 'hub_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
