<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property MediaFile $MediaFile
 * @property Avatar $Avatar
 * @property Photo $Photo
 * @property JudgesTournament $JudgesTournament
 * @property Party $Party
 * @property Post $Post
 * @property Tournament $Tournament
 * @property Hub $Hub
 * @property Party $Party
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'MediaFile' => array(
			'className' => 'MediaFile',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Avatar' => array(
			'className' => 'Avatar',
			'foreignKey' => 'avatar_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'photo_id',
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
		'JudgesTournament' => array(
			'className' => 'JudgesTournament',
			'foreignKey' => 'user_id',
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
		'Party' => array(
			'className' => 'Party',
			'foreignKey' => 'user_id',
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
			'foreignKey' => 'user_id',
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
		'Tournament' => array(
			'className' => 'Tournament',
			'foreignKey' => 'user_id',
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
		'Hub' => array(
			'className' => 'Hub',
			'joinTable' => 'users_hubs',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'hub_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Party' => array(
			'className' => 'Party',
			'joinTable' => 'users_parties',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'party_id',
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
