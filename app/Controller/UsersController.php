<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout', 'admin_logout');
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash('— Неправильный e-mail или пароль, попробуйте снова.', 'default', array(), 'auth');
		}
	}

	public function admin_login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash('— Неправильный e-mail или пароль, попробуйте снова.');
		}
	}


	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function admin_logout() {
		return $this->redirect($this->Auth->logout());
	}

}
