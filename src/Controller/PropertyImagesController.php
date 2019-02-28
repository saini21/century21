<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PropertyImages Controller
 *
 * @property \App\Model\Table\PropertyImagesTable $PropertyImages
 *
 * @method \App\Model\Entity\PropertyImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Properties', 'Images']
        ];
        $propertyImages = $this->paginate($this->PropertyImages);

        $this->set(compact('propertyImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Property Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyImage = $this->PropertyImages->get($id, [
            'contain' => ['Properties', 'Images']
        ]);

        $this->set('propertyImage', $propertyImage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertyImage = $this->PropertyImages->newEntity();
        if ($this->request->is('post')) {
            $propertyImage = $this->PropertyImages->patchEntity($propertyImage, $this->request->getData());
            if ($this->PropertyImages->save($propertyImage)) {
                $this->Flash->success(__('The property image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property image could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyImages->Properties->find('list', ['limit' => 200]);
        $images = $this->PropertyImages->Images->find('list', ['limit' => 200]);
        $this->set(compact('propertyImage', 'properties', 'images'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertyImage = $this->PropertyImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertyImage = $this->PropertyImages->patchEntity($propertyImage, $this->request->getData());
            if ($this->PropertyImages->save($propertyImage)) {
                $this->Flash->success(__('The property image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property image could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyImages->Properties->find('list', ['limit' => 200]);
        $images = $this->PropertyImages->Images->find('list', ['limit' => 200]);
        $this->set(compact('propertyImage', 'properties', 'images'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertyImage = $this->PropertyImages->get($id);
        if ($this->PropertyImages->delete($propertyImage)) {
            $this->Flash->success(__('The property image has been deleted.'));
        } else {
            $this->Flash->error(__('The property image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
