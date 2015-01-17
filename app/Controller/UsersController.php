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
		$this->Auth->allow('activation', 'registration', 'login', 'logout', 'admin_logout');
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
			App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
			$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha1'));
			$User['password'] = $passwordHasher->hash($User['password']);
			$User['repeat_password'] = $passwordHasher->hash($User['repeat_password']);

			$AvatarFile = array_merge($this->data['AvatarFile'], array('type' => 'photo'));

//			$AvatarFile = array_merge($this->data['AvatarFile'], array('type' => 'photo'));

			/*$this->User->set( $User );
			debug($this->User->validates());
			debug($this->User->invalidFields());*/

			if ($this->User->saveAll(compact('User', 'AvatarFile'))) {
				$title = 'Регистрация на mcl.resp.su';
				$this->User->sendEmailToUser($this->User->id, 'registration', $title, array('code' => $User['activation_code']));
				$this->redirect(array('success'));
			}

//			$this->Session->write('user.registration.allowedStates', array('step1', 'success'));
//			$this->redirect(array('success'));
		}

		$this->set('geoCountries', $this->User->GeoCountry->find('list'));
	}

	public function activation($code)
	{
		//$this->layout = false;
		if (null == $code)
			return;
		$user = $this->User->find('first',
			array(
				'conditions'=>array('activation_code'=>$code),
				//'fields'=>array('id','mail','activation_new_mail','activation_function')
			)
		);

		if(empty ($user)){
			$this->Session->setFlash('Код активации не найден.');
		}
		else{

			$autologin=false;
			$siteSave = $siteParamSave = $accountSave = true;
			$messages = array(
				'registration'=>'Регистрация завершена. Добро пожаловать.',
				'change_mail' =>'Ваш e-mail сменен.',
				'forgot'=>'Новый пароль отправлен вам на почту.'
			);

			$user['User']['activation_code'] = NULL;
			$this->User->query('START TRANSACTION');
			if($user['User']['activation_function']=='registration')
			{
				$user['User']['active']=1;
				$this->User->sendEmailToUser($user['User']['id'], 'registration_confirmed', 'Регистрация подтверждена');
				$autologin=true;

			}
			else if($user['User']['activation_function'] == 'change_mail')
			{
				$user['User']['mail']=$user['User']['activation_new_mail'];
			}
			else if($user['User']['activation_function'] == 'forgot')
			{
				$code = $this->User->generate_code(6);
				$user['User']['password'] = SHA1(Configure::read('Security.salt').$code);
				$title = "Новый пароль на ".PROJECTSITE;
				$this->User->sendEmailToUser($user['User']['id'], 'new_password', $title, array('mail'=>$user['User']['email'],'pass' => $code));
				$user['User']['self_registered'] = true;
				$user['User']['active'] = true;
				$autologin=true;
			}

			if($this->User->save($user, false))
			{
				$this->Session->setFlash($messages[$user['User']['activation_function']]);

				$this->User->query('COMMIT');

				if($autologin){
					$trololo = array('User' => array(
						'username' => $user['User']['nick'],
						'password' => $user['User']['password'],)
					);
					$this->Auth->login($trololo);
					$this->redirect('/');
				}
			}
			else
			{
				$this->User->query('ROLLBACK');
				$this->Session->setFlash('Сбой на сервере.');
			}
		}

		$this->redirect('/');
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
