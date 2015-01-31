<?php
App::uses('AppModel', 'Model');
/**
 * Slot Model
 *
 * @property Match $Match
 * @property Party $Party
 */
class Slot extends AppModel {


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
		),
		'Party' => array(
			'className' => 'Party',
			'foreignKey' => 'party_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
