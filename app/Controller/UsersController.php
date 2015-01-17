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
		$this->Auth->allow('registration', 'login', 'logout', 'admin_logout');
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash('— Неправильный e-mail или пароль, попробуйте снова.', 'default', array(), 'auth');
		}
	}

	public function registration($state = null){

		if ($state == 'success'){
			$this->render('registration_success');
		}
		if ($this->request->is('post')) {
			$User = $this->data['User'];
			$autoFields = array(
				'visability_fields' => serialize($this->User->defaultVisibility),
				'self_registered' => 1,
				'activation_code' => $this->User->generate_code(),
				'activation_code_date' => mysqldate(),
				'activation_function' => 'registration',
			);
			$User = array_merge($User, $autoFields);
//			$AvatarFile = array_merge($this->data['AvatarFile'], array('type' => 'photo'));


			/*$this->User->set( $User );
			debug($this->User->validates());
			debug($this->User->invalidFields());*/

			if ($this->User->saveAll(compact('User'))){//, 'AvatarFile'))) {
				$title = 'Регистрация на mcl.resp.su';
				$this->User->sendEmailToUser($this->User->id, 'registration', $title, array('code' => $User['activation_code']));
				$this->redirect(array('success'));
			}

//			$this->Session->write('user.registration.allowedStates', array('step1', 'success'));
//			$this->redirect(array('success'));
		}

		$this->set('geoCountries', $this->User->GeoCountry->find('list'));
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
