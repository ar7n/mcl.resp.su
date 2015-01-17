<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property MediaFile $MediaFile
 * @property Avatar $Avatar
 * @property Photo $Photo
 * @property JudgesTournament $JudgesTournament
 * @property Post $Post
 * @property Tournament $Tournament
 * @property Hub $Hub
 * @property Party $Party
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $validate = array(
		'geo_country_id' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Выберите страну',
				'allowEmpty' => false,
			),
		),
		'name' => array(
			'between' => array(
				'rule' => array('between', 2, 32),
				'message' => 'Имя должно иметь длину от 2 до 32 символов',
				'allowEmpty' => false,
			),
			'lettersOnly' => array(
				'rule' => '/^[\p{Cyrillic} -]*$|^[\p{Latin} -]*$/u',
				'message' => 'Имя должно состоять только из букв кириллицы, или только из букв латинского алфавита',
			)
		),
		'surname' => array(
			'between' => array(
				'rule' => array('between', 2, 32),
				'message' => 'Фамилия должна иметь длину от 2 до 32 символов',
				'allowEmpty' => false,
			),
			'lettersOnly' => array(
				'rule' => '/^[\p{Cyrillic} -]*$|^[\p{Latin} -]*$/u',
				'message' => 'Фамилия должно состоять только из букв кириллицы, или только из букв латинского алфавита',
			)
		),
		'sex' => array(
			'Это поле нельзя оставить пустым' => array(
				'rule' => 'notEmpty',
				'last' => true,
				'allowEmpty' => false,
			),
		),
		'fathername' => array(
			'between' => array(
				'rule' => array('between', 2, 32),
				'message' => 'Отчество должно иметь длину от 2 до 32 символов',
				'allowEmpty' => true,
			),
			'lettersOnly' => array(
				'rule' => '/^[\p{Cyrillic} -]*$|^[\p{Latin} -]*$/u',
				'message' => 'Отчество должно состоятьтолько из букв кириллицы, или только из букв латинского алфавита',
			)
		),
		'password' => array(
			'Введите пароль' => array(
				'rule' => 'notEmpty',
				'last' => true,
				'allowEmpty' => false,
			),
			'between' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Пароль должен иметь длину до 40 символов',
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Пароль должен состоять только из букв латинского алфавита и цифр',
			),
			'checkNewPassword' => array(
				'rule' => array('checkNewPassword', 'old_password','password'),
				'message' => 'Пароль совпадает со старым',
				'on' => 'update',
			),
		),
		'repeat_password' => array(
			'checkMatch' => array(
				'rule' => array('checkMatch', 'password', 'repeat_password'),
				'message' => 'Введенные пароли должны совпадать и не быть пустыми',
			),
		),
		'nick' => array(
			'between' => array(
				'rule' => array('between', 2, 32),
				'message' => 'Ник должен иметь длину от 2 до 32 символов',
				'allowEmpty' => false,
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Этот ник уже занят'
			),
			'lettersOnly' => array(
				'rule' => '/(^(\p{Cyrillic}|[^\p{Latin}])*$)|(^(\p{Latin}|[^\p{Cyrillic}])*$)/u',
				'message' => 'Ник не может содержать одновременно буквы кирилического и латинского алфавита',
			),
			'Ник не может начинаться с пустого символа' => array(
				'rule' => '/^[^\s].*$/u',
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email', false),// true),
				'message' => 'Вы ввели некорректный e-mail',
				'allowEmpty' => false,
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Профиль с таким e-mail уже зарегистрирован'
			),
			'checkMail' => array(
				'rule' => array('checkNewEmail'),
				'message' => 'Новый e-mail совпадает со старым',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'update',
			),
		),
		'phone' => array(
			'phoneRule' => array(
				'rule' => '/^[+]?[0-9\(\)\.\-\s]{7,20}$/',
				'allowEmpty' => true,
				'message' => 'Неправильный номер телефона',
			),
			'maxLength'=> array(
				'rule' => array('maxLength', 20),
				'message' => 'Телефон должен иметь длину до 20 символов',
			)
		),
		'birthday' => array(
			'Это поле нельзя оставить пустым' => array(
				'rule' => 'notEmpty',
				'last' => true,
				'allowEmpty' => false,
			),
			'Вы указали некорректную дату' => array(
				'rule' => array('date','ymd'),
			),
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'MediaFile' => array(
			'className' => 'MediaFile',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
//		'Avatar' => array(
//			'className' => 'Avatar',
//			'foreignKey' => 'avatar_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		),
//		'Photo' => array(
//			'className' => 'Photo',
//			'foreignKey' => 'photo_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		),
		'GeoCountry' => array(
			'className' => 'GeoCountry',
			'foreignKey' => 'geo_country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'JudgesTournament' => array(
			'className' => 'JudgesTournament',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Party' => array(
			'className' => 'Party',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Tournament' => array(
			'className' => 'Tournament',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Hub' => array(
			'className' => 'Hub',
			'joinTable' => 'users_hubs',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'hub_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Party' => array(
			'className' => 'Party',
			'joinTable' => 'users_parties',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'party_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	var $defaultVisibility = array(
//		'fathername' => true,
		'birthday' => true,
//		'nick' => true,
		'email' => true,
		'online' => true,
//		'location' => true,
		'icq' => true,
		'skype' => false,
		'phone' => true,
	);

	/**
	 * Пользовательское правило валидации, проверяющее совпадает ли данное поле
	 * с указанным
	 * Enter description here ...
	 * @param unknown_type $check
	 * @param unknown_type $firstField
	 * @param unknown_type $secondField
	 * @return boolean
	 */
	function checkMatch($check, $firstField, $secondField) {
		if (empty($this->data[$this->alias])) {
			return false;
		}
		$alias = &$this->data[$this->alias];
		return !empty($alias[$firstField]) && !empty($alias[$secondField]) && (
			$alias[$firstField] == $alias[$secondField] ||
			$alias[$firstField] ==
			SHA1(Configure::read('Security.salt').$alias[$secondField])
		);
	}

	/**
	 * Генерация случайного кода активации
	 */
	function generate_code($size=15,$type=''){
		$code='';
		srand();
		for($i=0; $i<$size; $i++){
			if($type=='num')
				$r=1;
			else
				$r=rand(1,3);
			if($r==1)
				$keycode=rand(48,57); //0-9
			else if($r==2)
				$keycode=rand(65,90); //A-Z
			else
				$keycode=rand(97,122); //a-z
			$code.=chr($keycode);
		}
		return $code;
	}

	/**
	 * Отправка письма, созданного из шаблона, пользователю
	 *
	 * @param type $id
	 * @param type $template
	 * @param type $data
	 * @param type $options
	 * @return boolean
	 */
	public function sendEmailToUser($id, $template, $title, $data = null, $options = null) {
		$user = $this->findById($id);
		if (empty($user)) {
			return FALSE;
		}
		if (empty($data)) {
			$data = array();
		}
		$data = array_merge($data, $user);
		if (!$this->sendEmail($user[$this->alias]['email'], $template, $title, $data, $options)){
			return FALSE;
		}
		$this->id = $id;
		$this->saveField('last_email_sent', mysqldate(), FALSE);
		return TRUE;
	}

}
