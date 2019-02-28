<?php

namespace App\Controller\Admin;


/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 *
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController {
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate['contain'] = [
            'Images',
            'Cities',
            'States'
        ];
        $Properties = $this->paginate($this->Properties);
        
        $this->set(compact('Properties'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Propert id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $apartment = $this->Properties->get($id, [
            'contain' => [
                'Cities',
                'States',
                'Images',
                'PropertyAmenities',
                'PropertyImages'
            ]
        ]);
        
        $this->set('apartment', $apartment);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $apartment = $this->Properties->newEntity();
        if ($this->request->is('post')) {
            $apartment = $this->Properties->patchEntity($apartment, $this->request->getData());
            if ($this->Properties->save($apartment)) {
                $this->Flash->success(__('The apartment has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apartment could not be saved. Please, try again.'));
        }
        $states = $this->Properties->States->find('list')->where(['States.status' => true])->toArray();
        $cities = [];
        $marketPlaces = [];
        $this->set(compact('apartment', 'users', 'cities', 'states', 'marketPlaces', 'images'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Propert id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $apartment = $this->Properties->get($id, [
            'contain' => ['Images', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apartment = $this->Properties->patchEntity($apartment, $this->request->getData());
            if ($this->Properties->save($apartment)) {
                $this->Flash->success(__('The apartment has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The apartment could not be saved. Please, try again.'));
            }
        }
        
        $states = $this->Properties->States->find('list')->where(['States.status' => true])->toArray();
        $cities = $this->Properties->Cities->find('list')->where(['Cities.state_id' => $apartment->state_id, 'Cities.status' => true])->toArray();
        $marketPlaces = $this->Properties->MarketPlaces->find('list')->where(['MarketPlaces.state_id' => $apartment->state_id, 'MarketPlaces.status' => true])->toArray();;
        $this->set(compact('apartment', 'cities', 'states', 'marketPlaces'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Propert id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $apartment = $this->Properties->get($id);
        if ($this->Properties->delete($apartment)) {
            $this->Flash->success(__('The apartment has been deleted.'));
        } else {
            $this->Flash->error(__('The apartment could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
