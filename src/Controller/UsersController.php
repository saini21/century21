<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow([
            'index',
            'register',
            'login',
            'home',
            'add',
            'forgotPassword',
            'forgotPasswordApi',
            'resetPassword',
            'resetPasswordApi',
            'privateCitizenApi',
            'getCitySuggestions',
            'getStateSuggestions',
            'getOptions',
            'getSuggestions',
            'isUniqueEmail'
        ]);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        if ($this->Auth->user()) {
            // return $this->redirect($this->Auth->redirectUrl());
        }
        
        $this->paginate = [
            'contain' => ['Images', 'Cities', 'States']
        ];
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
    }
    
    public function dashboard() {
        
        
        $totalActivities = 0;
        $processedActivities = 0;
        $pendingActivities = 0;
        
        $this->set(compact('totalActivities', 'processedActivities', 'pendingActivities'));
    }
    
    /**
     * logout method
     */
    public function logout() {
        $this->Cookie->delete('loggedInUser');
        $this->Flash->success(__('You are now logged out'));
        return $this->redirect($this->Auth->logout());
    }
    
    public function login() {
        //if already logged-in, redirect
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        
        if ($this->request->is('post') || $this->request->query('provider')) {
            
            $user = $this->Auth->identify();
            if ($user) {
                if (in_array($user['role'], ['Apartment', 'Realtor'])) {
                    if ($user['active']) {
                        if ($this->request->getData('remember_me')) {
                            $this->Cookie->write('loggedInUser', $user, true, '1 year');
                        }
                        $this->Auth->setUser($user);
                        return $this->checkSignUpSteps();
                    } else {
                        if ($user['registration_steps_done'] <= 2) {
                            $this->Flash->info(__('Your signup information will be reviewed by admin, we will contact you soon.'));
                        } else {
                            $this->Flash->error(__('Your account has been disabled, please contact admin.'));
                        }
                    }
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
                }
            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }
    
    /**
     * Register method
     *
     * @return \Cake\Http\Response|null Redirects to Auth Redirect URL.
     */
    public function register() {
        //if already logged-in, redirect
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $states = $this->Users->States->find('list')->where(['States.status' => true])->toArray();
        $cities = [];
        $marketPlaces = [];
        $this->set(compact('user', 'states', 'cities', 'marketPlaces'));
    }
    
    public function add() {
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'newUser']);
            $user->registration_steps_done = 1;
            if ($this->Users->save($user)) {
                
                $this->responseData = $user;
                //                $options = [
                //                    'template' => 'welcome',
                //                    'to' => $user->email,
                //                    'subject' => _('Welcome to ' . SITE_TITLE),
                //                    'viewVars' => [
                //                        'name' => $user->first_name,
                //                        'email' => $user->email
                //                    ]
                //                ];
                //
                //                $this->loadComponent('EmailManager');
                //                $this->EmailManager->sendEmail($options);
                //                $this->request->getSession()->write('new_user_id', $user->id);
                
                $this->responseCode = SUCCESS_CODE;
                $this->responseMessage = __('Successfully Registered.');
                
            } else {
                if ($user->hasErrors()) {
                    foreach ($user->getErrors() as $errors) {
                        foreach ($errors as $err) {
                            $error = $err;
                        }
                    }
                }
                
                if (empty($error)) {
                    $this->responseMessage = __('The user could not be saved. Please, try again.');
                } else {
                    $this->responseMessage = __($error);
                }
            }
        } else {
            $this->responseMessage = __('Something went wrong. Please, try again.');
        }
        
        echo $this->responseFormat();
        exit;
    }
    
    
    /**
     * Reset Password  method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function resetPassword($forgotPasswordToken) {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $this->viewBuilder()->setLayout('home');
        
        $user = $this->Users->findByForgotPasswordToken($forgotPasswordToken)->first();
        if (!empty($user)) {
            $this->set('forgotPasswordToken', $forgotPasswordToken);
        } else {
            $this->Flash->error(__('Forgot password token has been expired. Please, try again.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    
    public function resetPasswordApi() {
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->findByForgotPasswordToken($this->request->data['forgot_password_token'])->first();
            if ($user) {
                /*
                 * Restrict user to edit only while listed fields
                 */
                $editableFields = ['password', 'verify_password', 'forgot_password_token'];
                foreach ($this->request->data as $field => $val) {
                    if (!in_array($field, $editableFields)) {
                        unset($this->request->data[$field]);
                    }
                }
                $user['forgot_password_token'] = "";
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->responseMessage = __('Your password has been updated.');
                    $this->responseCode = SUCCESS_CODE;
                } else {
                    $this->responseMessage = __('Something went wrong. Please, try again.');
                }
            } else {
                $this->responseMessage = __('Forgot password token has been expired. Please, try again.');
            }
        }
        echo $this->responseFormat();
    }
    
    /**
     * Reset Password  method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function forgotPassword() {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->viewBuilder()->setLayout('home');
    }
    
    
    public function forgotPasswordApi() {
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->findByEmail($this->request->data['email'])->first();
            
            if (!empty($user)) {
                if (in_array($user['role'], ['Apartment', 'Realtor'])) {
                    if ($user->active) {
                        $user->forgot_password_token = md5(uniqid(rand(), true));
                        $resetUrl = SITE_URL . '/users/reset-password/' . $user->forgot_password_token;
                        if ($this->Users->save($user)) {
                            $options = [
                                'template' => 'forgot_password',
                                'to' => $this->request->data['email'],
                                'subject' => _('Reset Password'),
                                'viewVars' => [
                                    'name' => $user->first_name,
                                    'resetUrl' => $resetUrl,
                                ]
                            ];
                            
                            $this->loadComponent('EmailManager');
                            $this->EmailManager->sendEmail($options);
                            $this->responseCode = SUCCESS_CODE;
                            $this->responseMessage = __('A link to reset the password with the instruction has been sent to your inbox');
                        }
                    } else {
                        $this->responseCode = EMAIL_DOESNOT_REGISTERED;
                        if ($user['registration_steps_done'] <= 2) {
                            $this->responseMessage = __('Your account has been submitted for review, we will contact you soon');
                        } else {
                            $this->responseMessage = __('Your account has been disabled by administrator, please send a message from "Contact Us" page.');
                        }
                    }
                } else {
                    $this->responseCode = EMAIL_DOESNOT_REGISTERED;
                    $this->responseMessage = __('Email does not exists');
                }
            } else {
                $this->responseCode = EMAIL_DOESNOT_REGISTERED;
                $this->responseMessage = __('Email does not exists');
            }
        }
        
        echo $this->responseFormat();
    }
    
    /**
     * View Profile method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function profile() {
        
        $user = $this->Users->get($this->Auth->user('id'));
        
        $user['password'] = "";
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if (empty($this->request->data['password'])) {
                unset($this->request->data['password']);
            }
            
            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if (empty($this->request->data['password'])) {
                unset($user['password']);
            }
            
            
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Your profile has been updated.'));
                
                return $this->redirect(['action' => 'profile']);
            } else {
                //show errors
            }
            
            
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        $this->set(compact('user'));
    }
    
    
    public function changeProfileImage() {
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->findById($this->Auth->user('id'))->first();
            if ($user) {
                /*
                 * Restrict user to edit only while listed fields
                 */
                $editableFields = ['profile_image'];
                foreach ($this->request->data as $field => $val) {
                    if (!in_array($field, $editableFields)) {
                        unset($this->request->data[$field]);
                    }
                }
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Auth->setUser($user);
                    $this->responseMessage = __('Profile image has been saved.');
                    $this->responseCode = SUCCESS_CODE;
                } else {
                    $this->getErrorMessage($user->errors());
                }
            } else {
                $this->responseCode = RECORD_NOT_FOUND;
                $this->responseMessage = __('User not found.');
            }
        }
        echo $this->responseFormat();
    }
    
    public function getCitySuggestions() {
        $this->autoRender = false;
        $query = $this->request->getQuery('query');
        if (!empty($query)) {
            $this->loadModel('Cities');
            
            $cities = $this->Cities
                ->find('all')
                ->select(['Cities.id', 'value' => 'CONCAT( Cities.name, \', \', Cities.state_code)', 'Cities.state_code'])
                ->where(['Cities.name LIKE' => '%' . $query . '%'])
                ->where(['Cities.status' => true])
                ->toArray();
            echo json_encode(['suggestions' => $cities]);
        } else {
            echo json_encode(['suggestions' => []]);
        }
        
        exit;
    }
    
    public function getStateSuggestions() {
        $this->autoRender = false;
        $query = $this->request->getQuery('query');
        if (!empty($query)) {
            $this->loadModel('States');
            
            $cities = $this->States
                ->find('all')
                ->select(['States.id', 'value' => 'CONCAT( States.name, \' (\', States.short_name, \')\')', 'States.short_name'])
                ->where(['OR' => ['States.name LIKE' => '%' . $query . '%', 'States.short_name LIKE' => '%' . $query . '%']])
                ->where(['States.status' => true])
                ->contain([])
                ->toArray();
            echo json_encode(['suggestions' => $cities]);
        } else {
            echo json_encode(['suggestions' => []]);
        }
        
        exit;
    }
    
    public function isUniqueEmail($id = null) {
        $this->autoRender = false;
        if ($id === null) {
            $email = $this->request->getQuery('email');
            if ($this->Users->findByEmail($email)->count()) {
                $alreadyExists = "false";
            } else {
                $alreadyExists = "true";
            }
        } else {
            $count = $this->Users->find()
                ->where(['id !=' => $id, 'email' => $this->request->query['email']])
                ->count();
            if ($count) {
                $alreadyExists = "false";
            } else {
                $alreadyExists = "true";
            }
        }
        echo $alreadyExists;
        exit;
    }
    
    public function getOptions() {
        $this->autoRender = false;
        $query = $this->request->getData('query');
        if (!empty($query)) {
            
            $value = empty($this->request->getData('value')) ? "id" : $this->request->getData('value');
            $label = empty($this->request->getData('label')) ? "name" : $this->request->getData('label');
            $match = $this->request->getData('match');
            $model = $this->request->getData('find');
            
            $this->loadModel($model);
            
            $options = $this->{$model}
                ->find('all')
                ->select(['value' => $model . "." . $value, 'label' => $model . "." . $label])
                ->where([$model . "." . $match => $query])
                ->where([$model . '.status' => true])
                ->all()
                ->toArray();
            echo json_encode(['suggestions' => $options]);
        } else {
            echo json_encode(['suggestions' => []]);
        }
        
        exit;
    }
    
    public function getSuggestions() {
        $this->autoRender = false;
        $query = $this->request->getQuery('query');
        if (!empty($query)) {
            $model = $this->request->getQuery('find');
            $this->loadModel($model);
            $match = empty($this->request->getQuery('match')) ? "name" : $this->request->getQuery('match');
            
            $matches = explode(",", $match);
            foreach ($matches as $m) {
                $conditions['OR'][$model . '.' . $m . ' LIKE'] = '%' . $query . '%';
            }
            
            $select = empty($this->request->getQuery('select')) ? $model . ".name" : $this->request->getQuery('select');
            
            if (!empty($this->request->getQuery('conditions'))) {
                foreach ($this->request->getQuery('conditions') as $field => $value) {
                    $conditions[$field] = $value;
                }
            }
            
            $cities = $this->$model
                ->find('all')
                ->select([$model . '.id', 'value' => $select])
                ->where($conditions)
                ->contain([])
                ->toArray();
            echo json_encode(['suggestions' => $cities]);
        } else {
            echo json_encode(['suggestions' => []]);
        }
        
        exit;
    }
    
    
}
