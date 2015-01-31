<?php
App::uses('AppModel', 'Model');
/**
 * HubsTournament Model
 *
 * @property Hub $Hub
 * @property Tournament $Tournament
 */
class HubsTournament extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Hub' => array(
			'className' => 'Hub',
			'foreignKey' => 'hub_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tournament' => array(
			'className' => 'Tournament',
			'foreignKey' => 'tournament_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
