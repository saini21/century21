<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 * @property \App\Model\Table\PropertyAmenitiesTable|\Cake\ORM\Association\HasMany $PropertyAmenities
 * @property |\Cake\ORM\Association\HasMany $PropertyAttributes
 * @property \App\Model\Table\PropertyImagesTable|\Cake\ORM\Association\HasMany $PropertyImages
 *
 * @method \App\Model\Entity\Property get($primaryKey, $options = [])
 * @method \App\Model\Entity\Property newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Property[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Property|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Property[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Property findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PropertiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('properties');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PropertyAmenities', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('PropertyAttributes', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('PropertyImages', [
            'foreignKey' => 'property_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('tour_url')
            ->requirePresence('tour_url', 'create')
            ->allowEmptyString('tour_url', false);

        $validator
            ->scalar('ad_text')
            ->maxLength('ad_text', 4294967295)
            ->requirePresence('ad_text', 'create')
            ->allowEmptyString('ad_text', false);

        $validator
            ->scalar('extras')
            ->maxLength('extras', 4294967295)
            ->requirePresence('extras', 'create')
            ->allowEmptyString('extras', false);

        $validator
            ->scalar('Legal_desc')
            ->maxLength('Legal_desc', 4294967295)
            ->requirePresence('Legal_desc', 'create')
            ->allowEmptyString('Legal_desc', false);

        $validator
            ->scalar('community')
            ->maxLength('community', 255)
            ->requirePresence('community', 'create')
            ->allowEmptyString('community', false);

        $validator
            ->scalar('idx_date')
            ->maxLength('idx_date', 255)
            ->requirePresence('idx_date', 'create')
            ->allowEmptyString('idx_date', false);

        $validator
            ->scalar('pix_update')
            ->maxLength('pix_update', 255)
            ->requirePresence('pix_update', 'create')
            ->allowEmptyString('pix_update', false);

        $validator
            ->scalar('sql_timestamp')
            ->maxLength('sql_timestamp', 255)
            ->requirePresence('sql_timestamp', 'create')
            ->allowEmptyString('sql_timestamp', false);

        $validator
            ->scalar('bedroom')
            ->maxLength('bedroom', 255)
            ->requirePresence('bedroom', 'create')
            ->allowEmptyString('bedroom', false);

        $validator
            ->scalar('bedroom_plus')
            ->maxLength('bedroom_plus', 255)
            ->requirePresence('bedroom_plus', 'create')
            ->allowEmptyString('bedroom_plus', false);

        $validator
            ->scalar('bath_total')
            ->maxLength('bath_total', 255)
            ->requirePresence('bath_total', 'create')
            ->allowEmptyString('bath_total', false);

        $validator
            ->scalar('realtor')
            ->maxLength('realtor', 255)
            ->requirePresence('realtor', 'create')
            ->allowEmptyString('realtor', false);

        $validator
            ->scalar('class_type')
            ->maxLength('class_type', 255)
            ->requirePresence('class_type', 'create')
            ->allowEmptyString('class_type', false);

        $validator
            ->scalar('ml_num')
            ->maxLength('ml_num', 255)
            ->requirePresence('ml_num', 'create')
            ->allowEmptyString('ml_num', false);

        $validator
            ->scalar('lp_dol')
            ->maxLength('lp_dol', 255)
            ->requirePresence('lp_dol', 'create')
            ->allowEmptyString('lp_dol', false);

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->scalar('area')
            ->maxLength('area', 255)
            ->requirePresence('area', 'create')
            ->allowEmptyString('area', false);

        $validator
            ->scalar('county')
            ->maxLength('county', 255)
            ->requirePresence('county', 'create')
            ->allowEmptyString('county', false);

        $validator
            ->scalar('zip')
            ->maxLength('zip', 255)
            ->requirePresence('zip', 'create')
            ->allowEmptyString('zip', false);

        $validator
            ->scalar('municipality_district')
            ->maxLength('municipality_district', 255)
            ->requirePresence('municipality_district', 'create')
            ->allowEmptyString('municipality_district', false);

        $validator
            ->scalar('municipality')
            ->maxLength('municipality', 255)
            ->requirePresence('municipality', 'create')
            ->allowEmptyString('municipality', false);

        $validator
            ->scalar('property_json')
            ->maxLength('property_json', 4294967295)
            ->requirePresence('property_json', 'create')
            ->allowEmptyString('property_json', false);

        return $validator;
    }
}
