<?php
App::uses('AppModel', 'Model');
/**
 * Hub Model
 *
 * @property Hub $ParentHub
 * @property LogoFile $LogoFile
 * @property BackgroundFile $BackgroundFile
 * @property Hub $ChildHub
 * @property Post $Post
 * @property Tournament $Tournament
 * @property User $User
 */
class Hub extends AppModel {

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
		'ParentHub' => array(
			'className' => 'Hub',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'LogoFile' => array(
			'className' => 'LogoFile',
			'foreignKey' => 'logo_file_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BackgroundFile' => array(
			'className' => 'BackgroundFile',
			'foreignKey' => 'background_file_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChildHub' => array(
			'className' => 'Hub',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'hub_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Tournament' => array(
			'className' => 'Tournament',
			'joinTable' => 'hubs_tournaments',
			'foreignKey' => 'hub_id',
			'associationForeignKey' => 'tournament_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'User' => array(
			'className' => 'User',
			'joinTable' => 'users_hubs',
			'foreignKey' => 'hub_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
