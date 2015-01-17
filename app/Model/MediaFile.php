<?php
App::uses('AppModel', 'Model');
/**
 * MediaFile Model
 *
 * @property User $User
 * @property MediaFile $ParentMediaFile
 * @property MediaFileLink $MediaFileLink
 * @property MediaFile $ChildMediaFile
 */
class MediaFile extends AppModel {

	public $tablePrefix = '';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ParentMediaFile' => array(
			'className' => 'MediaFile',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'MediaFileLink' => array(
			'className' => 'MediaFileLink',
			'foreignKey' => 'media_file_id',
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
		'ChildMediaFile' => array(
			'className' => 'MediaFile',
			'foreignKey' => 'parent_id',
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


	const TypePhoto = 'photo';
	const TypeAlbum = 'album';
	const TypeDemo  = 'demo';
	const TypeVideo = 'video';
	const TypeFile  = 'file';

	/**
	 * Список полей, показываемых в админке
	 */

	var $adminColumns = array(
		'id',
		'type',
		'user_id',
		'parent_id',
		'title',
		'description',
		'to_main',
		'approved_to_main',
		'created',
		'modified',
	);

	var $adminActions = array(
		'approveToMain' => array(
			'toggle' => 'approved_to_main',
			'position' => 15,
			0 => array(
				'title' => 'Approve to main',
				'url' => array('admin' => TRUE, 'controller' => 'media_files', 'action' => 'approveToMain', 1 => 1)
			),
			1 => array(
				'title' => 'Disapprove to main' ,
				'url' => array('admin' => TRUE, 'controller' => 'media_files', 'action' => 'approveToMain', 1 => 0)
			),
		),
	);

	function getAdminActionParams($data){
		if (isset($data[$this->alias])){
			return array(
				'id' => $data[$this->alias]['id'],
				'toggles' => array(
					'approved_to_main' => $data[$this->alias]['approved_to_main'],
				)
			);
		}
		else {
			return array(
				'id' => $data['id'],
				'toggles' => array(
					'approved_to_main' => $data['approved_to_main'],
				)
			);
		}
	}

	function hasAccess($user, $action){
		$this->accessError = NULL;
		if (empty($this->data)){
			return FALSE;
		}
		switch ($action){
			case 'setCover':
			case 'upload':
			case 'edit':
			case 'delete':
				if ($user['User']['role'] == 'admin'){
					return TRUE;
				}
				break;
		}
		return FALSE;
	}

	/**
	 * Отсоединяет файл от сущности
	 * @param int $id id медиафайла
	 * @param string $entity название сущности
	 * @param int $entity_id id сущности
	 */
	function disconnectEntity($id, $entity, $entity_id){
		App::import('Model', 'MediaFileLink');
		$mfl = new MediaFileLink();
		return $mfl->deleteAll(array(
				'media_file_id' => $id,
				'entity' => $entity,
				'entity_id' => $entity_id
			)
		);
	}

	/**
	 * Отсоединяет файл от альбома
	 * @param int $id id медиафайла
	 */
	function disconnectAlbum($id){
		$this->id = $id;
		return $this->saveField('parent_id', null);
	}

	/**
	 * Создает альбом.
	 * Возвращает $this->data после save
	 */
	function createAlbum(){
		$tmp = $this->save(array(
			$this->alias => array(
				'parent_id' => 0,
				'type' => self::TypeAlbum
			)
		));
		if(!$tmp){
			return false;
		}
		$tmp[$this->alias]['id'] = $this->id;
		return $tmp;
	}

	/**
	 * Устанавливает обложку альбома
	 * @param type $id
	 */
	function setCover($id, $cover_id){
		$this->contain();
		$cover = $this->findById($cover_id);
		$MediaFile = array(
			'id' => $id,
			'path' => $cover['MediaFile']['path'],
			'big_path' => $cover['MediaFile']['big_path'],
			'thumb_path' => $cover['MediaFile']['thumb_path'],
		);
		return $this->save(compact('MediaFile'), FALSE);
	}

	/**
	 *
	 * @param type $data
	 * @param type $win
	 * @param type $fail
	 * @return boolean
	 */
	function saveMedia($data, $win, $fail){
		$data = Sanitize::clean($data,array('backslash'=>false));
		$this->id = NULL;
		if (!$this->save($data, FALSE)){
//			debug($data);
//			die();
			$error = reset($this->validationErrors);
			if ($error === FALSE){
				$this->flashMessage = $fail;
			}
			else {
				$this->flashMessage = 'Ошибка: '.$error;
			}
			return FALSE;
		}
		$this->flashMessage = $win;
		return TRUE;
	}

	/**
	 * Проверяет, что файл загружен корректно
	 * @param array данные о файле
	 * @return bool файл загружен правильно
	 */
	function isUploadedFile($val){
		if (!is_array($val))
			return false;

		if (isset($val[$this->alias]))
			$val = array_shift($val);
		if ((isset($val['error']) && $val['error'] == 0) ||	(!empty($val['tmp_name']) && $val['tmp_name'] != 'none')) {
			return is_uploaded_file($val['tmp_name']);
		}

		return false;
	}

	/**
	 * Генерирует новое имя для медиафайла
	 * @param type $size
	 * @param type $type
	 * @param type $ext
	 * @return boolean
	 */
	function generatePath($size, $type, $ext){
		$hash = md5(srand().microtime());
		$first_catalog  = substr($hash, 0, 2);
		$second_catalog = substr($hash, 2, 2);
		$path = '/files/medium/'.$first_catalog.'/'.$second_catalog.'/';
		$full_path = WWW_ROOT.substr($path, 1);
		if (!is_dir($full_path)){
			if (!mkdir($full_path, 0777, TRUE)){
				return FALSE;
			}
		}
		return $path.$filename.$ext;
	}

	/**
	 * Генерация имени файла и создание необходимых путей
	 * @param <type> $file имя файла или массив в формате $_FILES
	 * @return string пути
	 */
	private function GeneratePaths($file, $type){
		if ($type === self::TypePhoto){
			$legal_exts = array('png','jpg','gif','jpeg');
		}
		elseif ($type === self::TypeDemo){
			$legal_exts = array_merge(array('dem','rar','bz2','zip'),Configure::read('App.DemoAllowedExtenstions'));
		}
		$ext = $this->get_extension($file['name']);
		if (isset($legal_exts) && !in_array($ext,$legal_exts)){
			return false;
		}

		$filename = md5($file['tmp_name'].microtime());
		$first_catalog = substr($filename,0,2);
		$second_catalog = substr($filename,2,2);


		$paths = array(
			'original' =>  '/files/original/'.$first_catalog.'/'.$second_catalog.'/',
			'big' =>   '/files/big/'.$first_catalog.'/'.$second_catalog.'/',
			'thumb' => '/files/thumb/'.$first_catalog.'/'.$second_catalog.'/',
			'medium' => '/files/medium/'.$first_catalog.'/'.$second_catalog.'/',
			'small' => '/files/small/'.$first_catalog.'/'.$second_catalog.'/',
		);

		foreach($paths as $i => $path){
			$full_dir = WWW_ROOT.$path;

			//debug($full_dir);

			if(!is_dir($full_dir))
				mkdir($full_dir,0777,true);

			$paths[$i].="$filename.$ext";
		}
		return $paths;
	}

	private function resizeUploadFiles($tmp_path, $paths){
		$sizes = array();
		foreach ($paths as $type => $path){
			if ($type === 'original'){
				$size = getimagesize($tmp_path);
				copy($tmp_path, WWW_ROOT.$path);
				$sizes['original'] = array(
					'size' => array(
						'sx' => 0,        'sy' => 0,
						'sw' => $size[0], 'sh' => $size[1],
						'ew' => $size[0], 'eh' => $size[1]
					),
					'result' => true
				);
			}
			else {
				$sizes[$type] = $this->resizeUploadFile($tmp_path, WWW_ROOT.$path, $type);
			}
		}
		return $sizes;
	}


	private function resizeUploadFile($tmp_path, $path, $type){
		$options=array(
			'big'=>array(
				'ew'=>800,
				'eh'=>600,
				'type'=>'ratio'
			),
			'thumb'=>array(
				'ew'=>120,
				'eh'=>120,
				'type'=>'square'
			),
			'medium'=>array(
				'ew'=>50,
				'eh'=>50,
				'type'=>'square'
			),
			'small'=>array(
				'ew'=>30,
				'eh'=>30,
				'type'=>'square'
			),
		);

		$size = $this->calculate_sizes($options[$type], $tmp_path);
		$result = $this->resize($tmp_path, $path, $size);
		return compact('result', 'size');
	}


	private function UploadFile(){
		if(!$this->isUploadedFile($this->data[$this->alias]['file'])){
			return false;
		}

		$file = $this->data[$this->alias]['file'];
		$type = $this->data[$this->alias]['type'];

		$paths = $this->GeneratePaths($file, $type);

		if (empty($paths)){
			return false;
		}

		if ($type === self::TypePhoto) {
			$sizes = $this->resizeUploadFiles($file['tmp_name'], $paths);
		}
		elseif ($type === self::TypeDemo) {
			copy($file['tmp_name'],  WWW_ROOT.$paths['original']);
		}
		elseif ($type === self::TypeFile) {
			copy($file['tmp_name'],  WWW_ROOT.$paths['original']);
		}

		$result = array();

		foreach($paths as $type => $path){
			$result[$type]['path'] = $path;
		}
		if (isset($sizes)){
			foreach($paths as $type => $path){
				$result[$type]['size'] = $sizes[$type]['size'];
			}
		}

		//удаляем временный файл
		unlink($file['tmp_name']);

		return $result;
	}


	function beforeSave(){
		//debug($this->data);
//		debug($this->data);
//		debug($this->alias);
//		debug($this->isUploadedFile($this->data[$this->alias]['file']));

		if (isset($this->data[$this->alias]['file']) && $this->isUploadedFile($this->data[$this->alias]['file'])){

			$result = $this->UploadFile();

			if (empty($result)){
				return false;
			}
			//debug($result);
			$this->data[$this->alias]['file_size'] = filesize(substr($result['original']['path'], 1));
			$this->data[$this->alias]['file_name'] = $this->data[$this->alias]['file']['name'];
			$this->data[$this->alias]['file_info'] = serialize($result);
			$this->data[$this->alias]['path'] = $result['original']['path'];
			$this->data[$this->alias]['big_path'] = $result['big']['path'];
			$this->data[$this->alias]['thumb_path'] = $result['thumb']['path'];
			$this->data[$this->alias]['medium_path'] = $result['medium']['path'];
			$this->data[$this->alias]['small_path'] = $result['small']['path'];
		}

//	    if (isset($this->data[$this->alias]['deleted'])){
//	        die('change deleted value');
//	    }

		return true;
	}

	/**
	 * Чтение изображения
	 * @param type $path путь к файлу
	 * @param type $type расширение файла
	 * @return type дискриптор изображения
	 */
	private function open_image($path, $type=false){
		//debug($path);
		//debug($type);

		if(!is_readable($path)){
			return false;
		}

		$type=strtolower($type);

		switch ($type) {
			case 'jpg':
			case 'jpeg':
				return imagecreatefromjpeg($path);
				break;
			case 'gif':
				return imagecreatefromgif($path);
				break;

			case 'png':
				return imagecreatefrompng($path);
				break;
			default:
				return false;
				break;
		}
	}

	/**
	 * Сохранение из дискриптора в файл
	 * @param type $path целевой путь
	 * @param type $im дискриптор изображения
	 * @param type $type расширения
	 * @param type $jpg_quality Качество JPEG
	 * @return type успех сохранения
	 */
	private function save_image($path, $im,$type=false,$jpg_quality=80){
		if(!$type)
			$type=$this->get_extension($path);


		$type=strtolower($type);
		switch ($type) {
			case 'jpg':
			case 'jpeg':
				return imagejpeg($im,$path,(int)$jpg_quality);
				break;
			case 'gif':
				return imagegif($im,$path);
				break;
			case 'png':
				return imagepng($im,$path);
				break;
			default:
				return false;
				break;
		}
	}

	/**
	 * получение расширения файла
	 * @param type $path путь к файлу
	 * @return type расширение файла
	 */
	private function get_extension($path){
		$type=false;
		$pattern='/\.([a-z0-9]+)$/i';
		if(preg_match($pattern,$path,$matches)){
			$type=strtolower($matches[1]);
		}
		return $type;
	}


	/**
	 * Расчет размеров изображения
	 * @param type $size пожелания к размеру
	 * @param type $img_path1 путь к изначальному файлу
	 * @return array массив размеров
	 */
	//
	//$size['sx']    +---------------------------+                 ew
	//$size['sy']    |    (sx,sy)                |           +------------+
	//               |       +---------+         |           |            |
	//               |   sh  |         |         |   =>   eh |            |
	//               |       |         |         |           |            |
	//$size['ex']    |       +---------+         |           +------------+
	//$size['ey']    |          sw     (ex,ey)   |
	//$size['ew']    +---------------------------+
	//$size['eh']
	private function calculate_sizes($size,$img_path1){
		//debug($size);
		//die();
		extract($size);
		unset($size);

		if(!isset($type)){
			$type='aspect';
		}

		if(!isset($ew) || !isset($eh)) return 0;

		//не заданы начальные координаты
		if(!isset($sx))   $sx=0;
		if(!isset($sy))   $sy=0;

		list($iw, $ih) = GetImageSize($img_path1);
		//не заданы начальные ширина и высота - берем весь рисунок
		if(!isset($sw) || !isset($sh) || $sw==0 || $sh==0){
			list($sw,$sh)=GetImageSize($img_path1);
			if(!isset($ew))   $ew=$sw;
			if(!isset($eh))   $eh=$sh;
		}

		if($type=='aspect'){

			$ratio=$ew/$eh;

			// debug($ratio);
			if( $sw/$ratio > $sh){
				$sw=$sh*$ratio;
			}
			else{
				$sh=$sw/$ratio;
			}

		}
		else if($type=='square'){
			if($sh<$sw)
				$sw=$sh;
			else
				$sh=$sw;

			if($eh<$ew)
				$ew=$eh;
			else
				$eh=$ew;
			$sx = ($iw - $sw) / 2;
			$sy = ($ih - $sh) / 2;

		}else if($type == 'ratio'){
			//debug($sw);
			//debug($sh);
			if($sw > $ew || $sh > $eh){
				$ratio1=$sw/$sh;
				$ratio2=$ew/$eh;

				if( $ratio1 > $ratio2){
					$eh=$ew/$ratio1;
				}
				else{
					$ew=$eh*$ratio1;

				}
			}else{
				$ew = $sw;
				$eh = $sh;
			}

		}else if($type == 'klenov'){
			if($ew > $sw){
				$ew = $sw;
				$eh = $sh;
			} else {
				$ratio = $sw/$sh;
				$eh = $ew/$ratio;
			}
		}

		$resize = compact('sx','sy','sw','sh','ew','eh');
		foreach($resize as $k=>$v)
			$resize[$k]=(int)$v;

		$resize['type']=$type;

		//debug($resize);
		return $resize;
	}

	/**
	 * Ресайз изображений
	 * @param type $img_path1 откуда
	 * @param type $img_path2 куда
	 * @param type $size - конечные размеры из функции calculate_sizes
	 * @param type $jpg_quality качество JPEG
	 * @return type получилось ли сохранить
	 */
	private function resize($img_path1,$img_path2,$size=array(),$jpg_quality=90){
		$type1=$this->get_extension($img_path1);
		$type2=$this->get_extension($img_path2);

		if($type1==false && $type2)
			$type1=$type2;

		if(empty($size))
			$size=$this->calculate_sizes($size, $img_path1);

		extract($size);
		unset($size);

		if($type=='aspect'){
			if ($sw<=$ew && $sh<=$eh){
				copy($img_path1,$img_path2);
				return true;
			}
		}

		$im1 = $this->open_image($img_path1,$type1);
		$im2 = imagecreatetruecolor($ew, $eh);

		if($type2=='png'){
			imagealphablending($im2, false);
			imagesavealpha($im2,true);
			$transparent = imagecolorallocatealpha($im2, 255, 255, 255, 127);
			imagefilledrectangle($im2, 0, 0, $ew, $eh, $transparent);
		}

		imagecopyresampled($im2, $im1, 0, 0, $sx, $sy, $ew, $eh, $sw, $sh);
		return $this->save_image($img_path2,$im2,$type2,$jpg_quality);
	}

	function updateThumbs(){
		$this->contain();
		$mediaFiles = $this->find('all', array('conditions' => array('MediaFile.type' => 'photo')));
		$newFiles = array();
		foreach ($mediaFiles as $mediaFile){
			$img_path1 = substr($mediaFile['MediaFile']['path'], 1);
			$img_path2 = substr($mediaFile['MediaFile']['thumb_path'], 1);
			if (file_exists($img_path1)){
				$size = $this->calculate_sizes(array('ew'=>120, 'eh'=>120, 'type'=>'square'), $img_path1);
				$this->resize($img_path1, $img_path2, $size);
			}
		}
		return TRUE;
	}

	/**
	 * Заново создаёт миниатюры размера 30 х 30 для всех медиафайлов
	 * @return boolean
	 */
	function updateSmalls(){
		$this->contain();
		$mediaFiles = $this->find('all', array('conditions' => array('MediaFile.type' => 'photo')));
		foreach ($mediaFiles as $mediaFile){
			$img_path1 = $mediaFile['MediaFile']['path'];
			if (!$img_path1){
				continue;
			}
			$img_full_path1 = WWW_ROOT.substr($img_path1, 1);
			if (!file_exists($img_full_path1)){
				continue;
			}
			$img_path2 = '/files/small/'.substr($img_path1, 16);
			$img_full_path2 = WWW_ROOT.substr($img_path2, 1);
			$img_dir2 = WWW_ROOT.substr($img_path2, 1, 17);
			if(!is_dir($img_dir2)){
				if (!mkdir($img_dir2,0777,true)){
					return FALSE;
				}
			}
			$size = $this->calculate_sizes(array('ew'=>30, 'eh'=>30, 'type'=>'square'), $img_full_path1);
			if (!$this->resize($img_full_path1, $img_full_path2, $size)){
				return FALSE;
			}
			$this->id = $mediaFile['MediaFile']['id'];
			$this->saveField('small_path', $img_path2);
		}
		return TRUE;
	}

	/**
	 * Заново создаёт миниатюры размера 50 х 50 для всех медиафайлов
	 * @return boolean
	 */
	function updateMediums(){
		$this->contain();
		$mediaFiles = $this->find('all', array('conditions' => array('MediaFile.type' => 'photo')));
		foreach ($mediaFiles as $mediaFile){
			$img_path1 = $mediaFile['MediaFile']['path'];
			if (!$img_path1){
				continue;
			}
			$img_full_path1 = WWW_ROOT.substr($img_path1, 1);
			if (!file_exists($img_full_path1)){
				continue;
			}
			$img_path2 = '/files/medium/'.substr($img_path1, 16);
			$img_full_path2 = WWW_ROOT.substr($img_path2, 1);
			$img_dir2 = WWW_ROOT.substr($img_path2, 1, 18);
			if(!is_dir($img_dir2)){
				if (!mkdir($img_dir2,0777,true)){
					return FALSE;
				}
			}
			$size = $this->calculate_sizes(array('ew'=>50, 'eh'=>50, 'type'=>'square'), $img_full_path1);
			if (!$this->resize($img_full_path1, $img_full_path2, $size)){
				return FALSE;
			}
			$this->id = $mediaFile['MediaFile']['id'];
			$this->saveField('medium_path', $img_path2);
		}
		return TRUE;
	}

}
