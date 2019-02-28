<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Amenities Controller
 *
 * @property \App\Model\Table\AmenitiesTable $Amenities
 *
 * @method \App\Model\Entity\Amenity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AmenitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $amenities = $this->paginate($this->Amenities);

        $this->set(compact('amenities'));
    }

    /**
     * View method
     *
     * @param string|null $id Amenity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $amenity = $this->Amenities->get($id, [
            'contain' => ['PropertyAmenities']
        ]);

        $this->set('amenity', $amenity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $amenity = $this->Amenities->newEntity();
        if ($this->request->is('post')) {
            $amenity = $this->Amenities->patchEntity($amenity, $this->request->getData());
            if ($this->Amenities->save($amenity)) {
                $this->Flash->success(__('The amenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The amenity could not be saved. Please, try again.'));
        }
        $this->set(compact('amenity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Amenity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $amenity = $this->Amenities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $amenity = $this->Amenities->patchEntity($amenity, $this->request->getData());
            if ($this->Amenities->save($amenity)) {
                $this->Flash->success(__('The amenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The amenity could not be saved. Please, try again.'));
        }
        $this->set(compact('amenity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Amenity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $amenity = $this->Amenities->get($id);
        if ($this->Amenities->delete($amenity)) {
            $this->Flash->success(__('The amenity has been deleted.'));
        } else {
            $this->Flash->error(__('The amenity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
