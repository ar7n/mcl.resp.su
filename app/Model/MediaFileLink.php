<?php
App::uses('AppModel', 'Model');
/**
 * MediaFileLink Model
 *
 * @property MediaFile $MediaFile
 */
class MediaFileLink extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'MediaFile' => array(
			'className' => 'MediaFile',
			'foreignKey' => 'media_file_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
