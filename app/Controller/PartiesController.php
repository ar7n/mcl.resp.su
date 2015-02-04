<?php
App::uses('AppController', 'Controller');
/**
 * Parties Controller
 *
 * @property Party $Party
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PartiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->loadModel('Hub');
		$ids = $this->Hub->getTournamentId(HUB_ID);
		$this->paginate = array('conditions' => array('tournament_id' => $ids));
		$this->Party->recursive = 0;
		$this->set('parties', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Party->exists($id)) {
			throw new NotFoundException(__('Invalid party'));
		}
		$options = array('conditions' => array('Party.' . $this->Party->primaryKey => $id));
		$this->set('party', $this->Party->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Party->create();
			if ($this->Party->save($this->request->data)) {
				$this->Session->setFlash(__('The party has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The party could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$tournaments = $this->Party->Tournament->find('list');
		$users = $this->Party->User->find('list');
		$universities = $this->Party->University->find('list');
		$users = $this->Party->User->find('list');
		$this->set(compact('tournaments', 'users', 'universities', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Party->exists($id)) {
			throw new NotFoundException(__('Invalid party'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Party->save($this->request->data)) {
				$this->Session->setFlash(__('The party has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The party could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Party.' . $this->Party->primaryKey => $id));
			$this->request->data = $this->Party->find('first', $options);
		}
		$mclUniversities = $this->Party->University->find('list');
		$this->set(compact('mclUniversities'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Party->id = $id;
		if (!$this->Party->exists()) {
			throw new NotFoundException(__('Invalid party'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Party->delete()) {
			$this->Session->setFlash(__('The party has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The party could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
