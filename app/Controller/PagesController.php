<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(array('display', 'table'));
	}


	/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function table($tabname = 'A'){
		$this->set('currentMenuItem', 'Таблица сезона');
		$this->loadModel('Hub');
		$this->loadModel('Tournament');
		$ids = $this->Hub->getTournamentId(HUB_ID);
		$params = array(
			'conditions' => array('Tournament.id' => $ids, 'Tournament.division' => $tabname),
			'contain' => array(
				'Match' => array(
					'order' => array('start_time' => 'ASC'),
					'Game',
					'Slot'
				)
			),
		);
		$tournament = $this->Tournament->find('first', $params);
		$params = array(
			'conditions' => array('Party.tournament_id' => $ids),
			'contain' => array('University'),
		);
		$partiesRaw = $this->Tournament->Party->find('all', $params);
		$parties = array();
		foreach ($partiesRaw as $party) {
			$parties[$party['Party']['id']] = $party;
		}
		if (!empty($tournament['Match'])) {
			foreach ($tournament['Match'] as $mn => $match) {
				foreach ($match['Slot'] as $sn => $slot) {
					if ($slot['party_id']) {
						$tournament['Match'][$mn]['Slot'][$sn]['Party'] = $parties[$slot['party_id']]['Party'];
						$tournament['Match'][$mn]['Slot'][$sn]['Party']['University'] = $parties[$slot['party_id']]['University'];
					}
				}
			}
		}
		$this->set(compact('tournament', 'tabname'));
	}
}
