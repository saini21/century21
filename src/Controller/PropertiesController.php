<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 *
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController {
    
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow([
            'search',
            'searchProperties',
        ]);
    }
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Cities', 'States', 'Images']
        ];
        $properties = $this->paginate($this->Properties);
        
        $this->set(compact('properties'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $property = $this->Properties->get($id, [
            'contain' => ['Cities', 'States', 'Images', 'PropertyAmenities', 'PropertyImages']
        ]);
        
        $this->set('property', $property);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $property = $this->Properties->newEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $cities = $this->Properties->Cities->find('list', ['limit' => 200]);
        $states = $this->Properties->States->find('list', ['limit' => 200]);
        $images = $this->Properties->Images->find('list', ['limit' => 200]);
        $this->set(compact('property', 'cities', 'states', 'images'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $property = $this->Properties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $cities = $this->Properties->Cities->find('list', ['limit' => 200]);
        $states = $this->Properties->States->find('list', ['limit' => 200]);
        $images = $this->Properties->Images->find('list', ['limit' => 200]);
        $this->set(compact('property', 'cities', 'states', 'images'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    public function search() {
        $this->viewBuilder()->setLayout('search');
        $key = "";
        if ($this->request->is(['patch', 'post', 'put'])) {
            $key = $this->getRequest()->getData('key');
        }
        
        $this->set('key', $key);
    }
    
    public function searchProperties() {
        
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is('post')) {
            $searchKeys = $this->getRequest()->getData();
            $conditions = [];
            foreach ($searchKeys as $searchKey => $searchValue) {
                if (!empty($searchValue)) {
                    switch ($searchKey) {
                        case 'for' :
                            {
                                $conditions[] = ['LOWER(Properties.s_r)' => strtolower($searchValue)];
                                
                                break;
                            }
                        case 'address' :
                            {
                                $conditions['OR'][] = ['Properties.address LIKE' => "'%" . $searchValue . "%'"];
                                $conditions['OR'][] = ['Properties.zip LIKE' => "'%" . $searchValue . "%'"];
                                break;
                            }
                        case 'bedrooms' :
                            {
                                $conditions[] = ($searchValue == "5+") ? ['Properties.bedroom >=' => $searchValue] : ['Properties.bedroom' => $searchValue];
                                break;
                            }
                        case 'bathrooms' :
                            {
                                $conditions[] = ($searchValue == "5+") ? ['Properties.bath_total >=' => $searchValue] : ['Properties.bath_total' => $searchValue];
                                break;
                            }
                    }
                }
            }
            
            $conditions[] = ['Properties.lat !=' => 0];
            
            if (empty($conditions)) {
                $properties = $this->Properties->find('all')
                    ->contain(['PropertyImages' => ['Images']])
                    ->where($conditions)
                    ->limit(rand(100, 200))
                    ->all()->toArray();
            } else {
                
                $properties = $this->Properties->find('all')
                    ->contain(['PropertyImages' => ['Images']])
                    ->where($conditions)
                    ->group('Properties.id')
                    ->limit(rand(100, 200))
                    ->all()->toArray();
            }
            
            $this->responseData['properties'] = $this->formattedProperties($properties);
            $this->responseCode = SUCCESS_CODE;
            
        } else {
            $this->responseMessage = __('Something went wrong. Please, try again.');
        }
        
        echo $this->responseFormat();
        exit;
    }
    
    
}
