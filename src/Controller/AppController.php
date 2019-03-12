<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    
    public $responseCode = SUCCESS_CODE;
    public $responseMessage = "";
    public $responseData = [];
    public $currentPage = 0;
    public $authUserId = 0;
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();
        
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        
        $this->loadComponent('Auth', [
                'userModel' => 'Users',
                'authenticate' => [
                    'Form' => [
                        'fields' => [
                            'username' => 'email',
                            'password' => 'password',
                        ]
                    ]
                ],
                'loginAction' => ['controller' => 'Users', 'action' => 'login'],
                'loginRedirect' => ['controller' => 'Users', 'action' => 'dashboard'],
                'logoutRedirect' => ['controller' => 'Pages', 'action' => 'home'],
            ]
        );
        
        $loggedInUser = $this->Cookie->read('loggedInUser');
        
        if (!empty($loggedInUser) && !$this->Auth->user()) {
            $this->Auth->setUser($loggedInUser);
            //$this->checkSignUpSteps();
        }
        
        if ($this->Auth->user()) {
            $this->set('authUser', $this->Auth->user());
        } else {
            $this->viewBuilder()->setLayout('home');
            $header = $this->getContent('Home Header');
			$this->set('header', $header);
            $footer = $this->getContent('Home Footer');
            $this->set('footer', $footer);
        }
        
        
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        
    }
    
    public function beforeFilter(Event $event) {
        /*
         * This is used to redirect the user if admin is login and want to access the user site
         */
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'Admin') {
            return $this->redirect(['controller' => 'Admins', 'action' => 'dashboard', 'prefix' => 'admin']);
        }
    }
    
    
    public function responseFormat() {
        $returnArray = ["code" => $this->responseCode, "message" => $this->responseMessage,];
        if ($this->currentPage > 0) {
            $this->responseData['currentPage'] = $this->currentPage;
        }
        
        if (isset($this->responseData['total'])) {
            $this->responseData['pages'] = ceil($this->responseData['total'] / PAGE_LIMIT);
        }
        
        $returnArray['data'] = !empty($this->responseData) ? $this->responseData : ['message' => 'Data not found'];
        
        return json_encode($returnArray);
    }
    
    public function getErrorMessage($errors, $show = false, $field = []) {
        if (is_array($errors)) {
            foreach ($errors as $key => $error) {
                $field[$key] = "[" . $key . "]";
                $this->getErrorMessage($error, $show, $field);
                break;
            }
        } else {
            $this->responseMessage = ($show) ? implode(" >> ", $field) . " >> " . $errors : $errors;
        }
    }
    
    public function getCurrentPage() {
        $this->currentPage = (!empty($this->request->query['page']) && $this->request->query['page'] > 0) ? $this->request->query['page'] : 1;
        return $this->currentPage;
    }
    
    public function getOption($name) {
        $this->loadModel('Options');
        
        $option = $this->Options->find('all')->where(['option_name' => $name])->first();
        
        return (empty($option)) ? "Not Found" : (empty($option->option_value)) ? $option->default_value : $option->option_value;
    }
    
    public function setOptions() {
        $this->loadModel('Options');
        
        $optionsQuery = $this->Options->find('all')->where(['category' => 'General'])->all();
        
        $options = [];
        
        foreach ($optionsQuery as $o) {
            $options[$o->option_name] = (empty($o->option_value)) ? $o->default_value : $o->option_value;
        }
        
        $this->set('options', $options);
    }
    
    public function checkSignUpSteps() {
        $user = $this->Auth->user();
        $url = [];
        if ($user['role'] == "Apartment") {
            switch ($user['registration_steps_done']) {
                case 1:
                    {
                        $this->request->getSession()->write('new_user_id', $user['id']);
                        $url = ['controller' => 'Apartments', 'action' => 'info'];
                        break;
                    }
                case 2:
                    {
                        $url = ($user['active']) ? ['controller' => 'Comps', 'action' => 'info'] : ['controller' => 'Apartments', 'action' => 'thankYou'];
                        break;
                    }
                case 3:
                    {
                        $url = ['controller' => 'FloorPlans', 'action' => 'add'];
                        break;
                    }
                case 4:
                    {
                        $url = $this->Auth->redirectUrl();
                        break;
                    }
            }
        } else {
            switch ($user['registration_steps_done']) {
                case 1:
                    {
                        $url = ['controller' => 'Realtors', 'action' => 'info'];
                        break;
                    }
                case 2:
                    {
                        $url = ($user['active']) ? ['controller' => 'Comps', 'action' => 'info'] : $this->Auth->redirectUrl();
                        break;
                    }
            }
        }
        return $this->redirect($url);
    }
    
    public function getContent($page , $nl2br = false) {
		$this->loadModel('Pages');
        $sections = $this->Pages->find()->contain(['Images'])->where(['page' => $page])->all();
        $content = [];
        if (!empty($sections)) {
            foreach ($sections as $section) {
                if($section->section_type == "image") {
                    $content[$section->section_name] = empty($section->image) ? "NA" : $section->image->image;
                } else {
                    $content[$section->section_name] = $nl2br ? nl2br($section->section_text) : $section->section_text;
                }
            }
        }
        return $content;
    }
    
    public function isIE(){
		return (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) ? true: false;
	}
}
