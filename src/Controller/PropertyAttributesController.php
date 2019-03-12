<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PropertyAttributes Controller
 *
 * @property \App\Model\Table\PropertyAttributesTable $PropertyAttributes
 *
 * @method \App\Model\Entity\PropertyAttribute[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyAttributesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Properties']
        ];
        $propertyAttributes = $this->paginate($this->PropertyAttributes);

        $this->set(compact('propertyAttributes'));
    }

    /**
     * View method
     *
     * @param string|null $id Property Attribute id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyAttribute = $this->PropertyAttributes->get($id, [
            'contain' => ['Properties']
        ]);

        $this->set('propertyAttribute', $propertyAttribute);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertyAttribute = $this->PropertyAttributes->newEntity();
        if ($this->request->is('post')) {
            $propertyAttribute = $this->PropertyAttributes->patchEntity($propertyAttribute, $this->request->getData());
            if ($this->PropertyAttributes->save($propertyAttribute)) {
                $this->Flash->success(__('The property attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property attribute could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyAttributes->Properties->find('list', ['limit' => 200]);
        $this->set(compact('propertyAttribute', 'properties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Attribute id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertyAttribute = $this->PropertyAttributes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertyAttribute = $this->PropertyAttributes->patchEntity($propertyAttribute, $this->request->getData());
            if ($this->PropertyAttributes->save($propertyAttribute)) {
                $this->Flash->success(__('The property attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property attribute could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyAttributes->Properties->find('list', ['limit' => 200]);
        $this->set(compact('propertyAttribute', 'properties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Attribute id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertyAttribute = $this->PropertyAttributes->get($id);
        if ($this->PropertyAttributes->delete($propertyAttribute)) {
            $this->Flash->success(__('The property attribute has been deleted.'));
        } else {
            $this->Flash->error(__('The property attribute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
