<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    var $components = array(
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'authError' => 'Did you really think you are allowed to see that?',
            'authenticate' => array(
                'Form' => array(
//                    'passwordHasher' => array(
//                        'className' => 'Simple',
//                        'hashType' => 'sha256'
//                    ),
                    'fields' => array(
                        'username' => 'email', //Default is 'username' in the userModel
                        'password' => 'password'  //Default is 'password' in the userModel
                    )
                )
            ),
        ),
        'Session',
    );

    public function beforeFilter(){
        if (isset($this->params['prefix']) && 'admin' == $this->params['prefix']){
            $this->layout = 'bootstrap';
        }
        $AuthUser = $this->Auth->user();
        $this->set('AuthUser', $AuthUser);
    }

    public function moveUploadedFile($file){

        // Initialize filename-variable
        $filename = null;

        if (
            !empty($file['tmp_name'])
            && is_uploaded_file($file['tmp_name'])
        ) {
            // Strip path information
            $filename = basename($file['name']);
            move_uploaded_file(
                $file['tmp_name'],
                WWW_ROOT . DS . 'files' . DS . $filename
            );
        }

        // Set the file-name only to save in the database
        return $filename;
    }

}
