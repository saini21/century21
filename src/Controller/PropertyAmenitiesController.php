<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PropertyAmenities Controller
 *
 * @property \App\Model\Table\PropertyAmenitiesTable $PropertyAmenities
 *
 * @method \App\Model\Entity\PropertyAmenity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyAmenitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Properties', 'Amenities']
        ];
        $propertyAmenities = $this->paginate($this->PropertyAmenities);

        $this->set(compact('propertyAmenities'));
    }

    /**
     * View method
     *
     * @param string|null $id Property Amenity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyAmenity = $this->PropertyAmenities->get($id, [
            'contain' => ['Properties', 'Amenities']
        ]);

        $this->set('propertyAmenity', $propertyAmenity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertyAmenity = $this->PropertyAmenities->newEntity();
        if ($this->request->is('post')) {
            $propertyAmenity = $this->PropertyAmenities->patchEntity($propertyAmenity, $this->request->getData());
            if ($this->PropertyAmenities->save($propertyAmenity)) {
                $this->Flash->success(__('The property amenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property amenity could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyAmenities->Properties->find('list', ['limit' => 200]);
        $amenities = $this->PropertyAmenities->Amenities->find('list', ['limit' => 200]);
        $this->set(compact('propertyAmenity', 'properties', 'amenities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Amenity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertyAmenity = $this->PropertyAmenities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertyAmenity = $this->PropertyAmenities->patchEntity($propertyAmenity, $this->request->getData());
            if ($this->PropertyAmenities->save($propertyAmenity)) {
                $this->Flash->success(__('The property amenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property amenity could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyAmenities->Properties->find('list', ['limit' => 200]);
        $amenities = $this->PropertyAmenities->Amenities->find('list', ['limit' => 200]);
        $this->set(compact('propertyAmenity', 'properties', 'amenities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Amenity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertyAmenity = $this->PropertyAmenities->get($id);
        if ($this->PropertyAmenities->delete($propertyAmenity)) {
            $this->Flash->success(__('The property amenity has been deleted.'));
        } else {
            $this->Flash->error(__('The property amenity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
