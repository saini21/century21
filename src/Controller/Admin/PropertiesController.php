<?php

namespace App\Controller\Admin;

use PHRETS\Configuration;
use PHRETS\Session;


/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 *
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController {


    public function test() {
        //Do something here

    }


    public function phretsInsert($propertyClass = "ResidentialProperty") {

        $this->loadModel('Properties');
        $this->loadModel('PropertyAttributes');

        $login = 'http://rets.torontomls.net:6103/rets-treb3pv/server/login';
        $un = 'D18ctc';
        $pw = 'E64$m38';

        $config = new Configuration();

        $config->setLoginUrl($login)->setUsername($un)->setPassword($pw)->setRetsVersion('1.5');

        $rets = new Session($config);

        $connect = $rets->Login();

        if ($connect) {

            $results = $rets->Search('Property', $propertyClass, "(Status=A)");

            if ($results) {

                $propertyTableFields = ['ml_num' => 'Ml_num', 'tour_url' => 'Tour_url', 'ad_text' => 'Ad_text', 'extras' => 'Extras', 'legal_desc' => 'Legal_desc', 'Community' => 'Community', 'idx_date' => 'idx_dt', 'pix_update' => 'Pix_updt', 'sql_timestamp' => 'Timestamp_sql', 'bedroom' => 'Br', 'Br_plus', 'Bath_tot', 'badroo_plus', 'lp_dol' => 'Lp_dol', 'address' => 'Addr', 'area' => 'Area', 'county' => 'County', 'zip' => 'Zip', 'municipality_district' => 'Municipality_district', 'municipality' => 'Municipality'

                ];

                foreach ($results as $result) {
                    $fields = $result->getFields();
                    $allPropertyAttributes = [];
                    $propertyAttributeFields = [];

                    $property = $this->Properties->find()->where(['ml_num' => $result->get('Ml_num')])->first();
                    if (empty($property)) {
                        $property = $this->Properties->newEntity();

                        foreach ($fields as $field) {
                            $allPropertyAttributes[$field] = $result->get($field);
                            if (!empty($result->get($field))) {
                                if (in_array($field, $propertyTableFields)) {
                                    $tableKey = array_search($field, $propertyTableFields);
                                    $property->{$tableKey} = $result->get($field);
                                } else {
                                    $propertyAttributeFields[$field] = $result->get($field);
                                }
                            }
                        }

                        $property->class_type = 'ResidentialProperty';
                        $property->property_json = json_encode($allPropertyAttributes);

                        if ($this->Properties->save($property)) {

                            $propertyAttrinuteValues = [];

                            foreach ($propertyAttributeFields as $field => $value) {
                                $propertyAttrinuteValues[] = ['property_id' => $property->id, 'attribute' => $field, 'attribute_value' => $value,];
                            }

                            $propertyAttrinutes = $this->PropertyAttributes->newEntities($propertyAttrinuteValues);
                            $this->PropertyAttributes->saveMany($propertyAttrinutes);
                        }
                    }
                }
            }
        }

        echo "here";
        die;
    }


    public function phretsUpdate($propertyClass = "ResidentialProperty") {

        $this->loadModel('Properties');
        $this->loadModel('PropertyAttributes');

        $login = 'http://rets.torontomls.net:6103/rets-treb3pv/server/login';
        $un = 'D18ctc';
        $pw = 'E64$m38';

        $config = new Configuration();

        $config->setLoginUrl($login)->setUsername($un)->setPassword($pw)->setRetsVersion('1.5');

        $rets = new Session($config);

        $connect = $rets->Login();

        if ($connect) {

            $results = $rets->Search('Property', $propertyClass, "(Status=A)");

            if ($results) {

                $propertyTableFields = ['ml_num' => 'Ml_num', 'tour_url' => 'Tour_url', 'ad_text' => 'Ad_text', 'extras' => 'Extras', 'legal_desc' => 'Legal_desc', 'Community' => 'Community', 'idx_date' => 'idx_dt', 'pix_update' => 'Pix_updt', 'sql_timestamp' => 'Timestamp_sql', 'bedroom' => 'Br', 'Br_plus', 'Bath_tot', 'badroo_plus', 'lp_dol' => 'Lp_dol', 'address' => 'Addr', 'area' => 'Area', 'county' => 'County', 'zip' => 'Zip', 'municipality_district' => 'Municipality_district', 'municipality' => 'Municipality'

                ];

                foreach ($results as $result) {
                    $fields = $result->getFields();
                    $allPropertyAttributes = [];
                    $propertyAttributeFields = [];

                    $property = $this->Properties->find()->where(['ml_num' => $result->get('Ml_num')])->first();

                    if (empty($property)) {
                        $property = $this->Properties->newEntity();
                    }

                    foreach ($fields as $field) {
                        $allPropertyAttributes[$field] = $result->get($field);
                        if (!empty($result->get($field))) {
                            if (in_array($field, $propertyTableFields)) {
                                $tableKey = array_search($field, $propertyTableFields);
                                $property->{$tableKey} = $result->get($field);
                            } else {
                                $propertyAttributeFields[$field] = $result->get($field);
                            }
                        }
                    }

                    $property->class_type = 'ResidentialProperty';
                    $property->property_json = json_encode($allPropertyAttributes);

                    if ($this->Properties->save($property)) {

                        foreach ($propertyAttributeFields as $field => $value) {
                            $propertyAttrinute = $this->PropertyAttributes->find()->where(['property_id' => $property->id, 'attribute' => $field])->first();
                            if (empty($propertyAttrinute)) {
                                $propertyAttrinute = $this->PropertyAttributes->newEntity();
                            }

                            $propertyAttrinute->property_id = $property->id;
                            $propertyAttrinute->attribute = $field;
                            $propertyAttrinute->attribute_value = $value;
                            $this->PropertyAttributes->save($propertyAttrinute);
                        }
                    }
                }
            }
        }

        echo "here";
        die;
    }


    public function phretsPhotos() {

        $this->loadModel('PropertyImages');
        $this->loadModel('Images');

        $login = 'http://rets.torontomls.net:6103/rets-treb3pv/server/login';
        $un = 'D18ctc';
        $pw = 'E64$m38';

        $config = new Configuration();

        $config->setLoginUrl($login)->setUsername($un)->setPassword($pw)->setRetsVersion('1.5');

        $rets = new Session($config);

        $connect = $rets->Login();

        if ($connect) {

            $properties = $this->Properties->find()->where(['no_of_images' => 0])->limit(1);
            $this->loadComponent('Thumb');
            foreach ($properties as $property) {
                $photos = $rets->GetObject('Property', 'Photo', $property->ml_num);
                foreach ($photos as $photo) {
                    $ext = explode("/", $photo->getContentType())[1];
                    $fileName = uniqid() . "." . $ext;
                    $image = $this->writeImage(base64_encode($photo->getContent()), $fileName);


                    list($actualWidth, $actualHeight) = getimagesize($image);

                    $newWidth = 200;
                    $newHeight = $newWidth * ($actualHeight / $actualWidth);

                    $options = ['destinationPath' => WWW_ROOT . "files/images/thumbs/", 'image' => ['type' => "image/jpeg"], 'tmpname' => $image, 'name' => "small_" . $fileName, 'width' => $newWidth, 'argHeight' => $newHeight];

                    $this->Thumb->create($options);

                    $newWidth = 500;
                    $newHeight = $newWidth * ($actualHeight / $actualWidth);

                    $options = ['destinationPath' => WWW_ROOT . "files/images/thumbs/", 'image' => ['type' => "image/jpeg"], 'tmpname' => $image, 'name' => "medium_" . $fileName, 'width' => $newWidth, 'argHeight' => $newHeight];

                    $this->Thumb->create($options);

                    $newWidth = 900;
                    $newHeight = $newWidth * ($actualHeight / $actualWidth);

                    $options = ['destinationPath' => WWW_ROOT . "files/images/thumbs/", 'image' => ['type' => "image/jpeg"], 'tmpname' => $image, 'name' => "large_" . $fileName, 'width' => $newWidth, 'argHeight' => $newHeight];

                    $this->Thumb->create($options);

                    $newImage = $this->Images->newEntity();

                    $newImage->category = "Property";
                    $newImage->image = $image;
                    $newImage->small_thumb = "small_" . $fileName;
                    $newImage->medium_thumb = "medium_" . $fileName;
                    $newImage->large_thumb = "large_" . $fileName;

                    if ($this->Images->save($newImage)) {
                        $propertyImage = $this->PropertyImages->newEntity();

                        $propertyImage->image_id = $newImage->id;
                        $propertyImage->property_id = $property->id;

                        $this->PropertyImages->save($propertyImage);
                    }
                }

                die;
            }
        }

        echo "here";
        die;
    }

    public function writeImage($base64Str, $fileName) {
        $ifp = fopen(WWW_ROOT . "files/images/" . $fileName, 'wb');

        // we could add validation here with ensuring count( $data ) > 1
        fwrite($ifp, base64_decode($base64Str));

        // clean up the file resource
        fclose($ifp);

        return SITE_URL . "files/images/" . $fileName;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate['contain'] = [];
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
        $apartment = $this->Properties->get($id, ['contain' => ['Cities', 'States', 'Images', 'PropertyAmenities', 'PropertyImages']]);

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
        $apartment = $this->Properties->get($id, ['contain' => ['Images', 'Users']]);
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


