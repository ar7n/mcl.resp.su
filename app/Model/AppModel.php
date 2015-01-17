<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    /**
     * Отправка email
     *
     * @param  string $email
     * @param  string $template
     * @param  array  $data
     * @return boolean
     */
    function sendEmail($email, $template, $title, $data = NULL, $options = NULL) {
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail();
        $Email->from(array(Configure::read('App.Mail') => 'МКЛ'));
        $Email->to($email);
        $Email->subject($title);
        $Email->template($template);
        $Email->emailFormat('text'); //Send as 'html', 'text' or 'both' (default is 'text')
        $Email->viewVars($data);
        return $Email->send();
        
//        $emailComponent = new EmailComponent;
//        $controller = new Controller;
//        $emailComponent->initialize($controller);
//		$emailComponent->startup($controller);
//        $controller->set($data);
//        $emailComponent->to = $email;
//        $emailComponent->template = $template;
//        $emailComponent->subject = $title;
//        $emailComponent->from = Configure::read('App.Mail');
//        $emailComponent->sendAs = 'text';
//        if (!empty($options)) {
//            foreach ($options as $key => $option) {
//                $emailComponent->$key = $option;
//            }
//        }
//        if (!$emailComponent->send(NULL)) {
//            return FALSE;
//        }
//        return TRUE;
    }

}
