<?php
App::uses('AppModel', 'Model');
/**
 * Game Model
 *
 * @property Match $Match
 */
class Game extends AppModel {

	public $actsAs = array(
		'Containable'
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'match_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
