<?php

namespace App\Controller\Admin;


/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController {
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate['contain'] = [
            'Images'
        ];
        $pages = $this->paginate($this->Pages);
        
        $this->set(compact('pages'));
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function home() {
        $this->getRequest()->getSession()->write('edit_redirect_action', 'home');
        $pages = $this->paginate($this->Pages->find()->contain(['Images'])->where(['page' => 'Home']));
        $heading = "Home Page Sections";
        $this->set(compact('pages', 'heading'));
        $this->render('index');
    }
    
    public function features() {
        $this->getRequest()->getSession()->write('edit_redirect_action', 'features');
        $pages = $this->paginate($this->Pages->find()->where(['page' => 'Features']));
        
        $heading = "Features Page Sections";
        $this->set(compact('pages', 'heading'));
        $this->render('index');
    }
    
    public function howItWorks() {
        $this->getRequest()->getSession()->write('edit_redirect_action', 'howItWorks');
        $pages = $this->paginate($this->Pages->find()->where(['page' => 'How It Works']));
        
        $heading = "How It Works Page Sections";
        $this->set(compact('pages', 'heading'));
        $this->render('index');
    }
    
    public function contact() {
        $this->getRequest()->getSession()->write('edit_redirect_action', 'contact');
        $pages = $this->paginate($this->Pages->find()->where(['page' => 'Contact']));
        
        $heading = "Contact Page Sections";
        $this->set(compact('pages', 'heading'));
        $this->render('index');
    }
    
    public function header() {
        $this->getRequest()->getSession()->write('edit_redirect_action', 'header');
        $pages = $this->paginate($this->Pages->find()->contain(['Images'])->where(['page' => 'Home Header']));
        
        $heading = "Home Page Header Sections";
        $this->set(compact('pages', 'heading'));
        $this->render('index');
    }
    
    public function footer() {
        $this->getRequest()->getSession()->write('edit_redirect_action', 'footer');
        $pages = $this->paginate($this->Pages->find()->contain(['Images'])->where(['page' => 'Home Footer']));
        
        $heading = "Home Page Footer Sections";
        $this->set(compact('pages', 'heading'));
        $this->render('index');
    }
    
    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        
        $this->set('page', $page);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The page could not be saved. Please, try again.'));
        }
        $this->set(compact('page'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $page = $this->Pages->get($id, [
            'contain' => ['Images']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));
                
                return $this->redirect(['action' => $this->getRequest()->getSession()->read('edit_redirect_action')]);
            }
            $this->Flash->error(__('The page could not be saved. Please, try again.'));
        }
        $this->set(compact('page'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
