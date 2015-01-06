<?php
App::uses('AppController', 'Controller');
/**
 * Universities Controller
 *
 * @property University $University
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UniversitiesController extends AppController {

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
		$this->University->recursive = 0;
		$this->set('universities', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->University->exists($id)) {
			throw new NotFoundException(__('Invalid university'));
		}
		$options = array('conditions' => array('University.' . $this->University->primaryKey => $id));
		$this->set('university', $this->University->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {

			$this->request->data['University']['logo'] = $this->moveUploadedFile($this->request->data['University']['logo']);

			$this->University->create();
			if ($this->University->save($this->request->data)) {
				$this->Session->setFlash(__('The university has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The university could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$this->set('cities', $this->University->City->find('list'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->University->exists($id)) {
			throw new NotFoundException(__('Invalid university'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->University->save($this->request->data)) {
				$this->Session->setFlash(__('The university has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The university could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('University.' . $this->University->primaryKey => $id));
			$this->request->data = $this->University->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->University->id = $id;
		if (!$this->University->exists()) {
			throw new NotFoundException(__('Invalid university'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->University->delete()) {
			$this->Session->setFlash(__('The university has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The university could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(array('index'));
	}


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index($city = NULL) {
		$this->University->recursive = 0;
		$this->set('universities', $this->Paginator->paginate());
	}
}


