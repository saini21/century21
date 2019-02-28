<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Images', 'Cities', 'States']
        ];
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
    }
    
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Images', 'Cities', 'States', 'Apartments', 'Customers', 'EmailTemplates', 'RealtorMarketPlaces']
        ]);
        
        $this->set('user', $user);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $images = $this->Users->Images->find('list', ['limit' => 200]);
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $this->set(compact('user', 'images', 'cities', 'states'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $images = $this->Users->Images->find('list', ['limit' => 200]);
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $this->set(compact('user', 'images', 'cities', 'states'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    public function changeProfileImage($id) {
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is('post')) {
            $user = $this->Users->get($id);
            $user->image_id = $this->request->getData('image_id');
            if ($this->Users->save($user)) {
                $this->responseCode = SUCCESS_CODE;
                $this->responseMessage = __('Successfully Updated.');
            }
        }
        echo $this->responseFormat();
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
}
