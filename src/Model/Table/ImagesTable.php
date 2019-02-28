<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Images Model
 *
 * @property \App\Model\Table\AdminsTable|\Cake\ORM\Association\HasMany $Admins
 * @property \App\Model\Table\ApartmentImagesTable|\Cake\ORM\Association\HasMany $ApartmentImages
 * @property \App\Model\Table\PropertiesTable|\Cake\ORM\Association\HasMany $Properties
 * @property \App\Model\Table\TestimonialsTable|\Cake\ORM\Association\HasMany $Testimonials
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Image get($primaryKey, $options = [])
 * @method \App\Model\Entity\Image newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Image[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Image|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Image[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Image findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ImagesTable extends Table {
    
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        
        $this->setTable('images');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
        
        $this->hasMany('Admins', [
            'foreignKey' => 'image_id'
        ]);
        $this->hasMany('ApartmentImages', [
            'foreignKey' => 'image_id'
        ]);
        $this->hasMany('Properties', [
            'foreignKey' => 'image_id'
        ]);
        $this->hasMany('Testimonials', [
            'foreignKey' => 'image_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'image_id'
        ]);
    }
    
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');
        
        $validator
            ->scalar('category')
            ->maxLength('category', 255)
            ->requirePresence('category', 'create')
            ->allowEmptyString('category', false);
        
        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', false);
        
        $validator
            ->scalar('small_thumb')
            ->maxLength('small_thumb', 255)
            ->requirePresence('small_thumb', 'create')
            ->allowEmptyString('small_thumb', false);
        
        $validator
            ->scalar('medium_thumb')
            ->maxLength('medium_thumb', 255)
            ->requirePresence('medium_thumb', 'create')
            ->allowEmptyString('medium_thumb', false);
        
        $validator
            ->scalar('large_thumb')
            ->maxLength('large_thumb', 255)
            ->requirePresence('large_thumb', 'create')
            ->allowEmptyString('large_thumb', false);
        
        return $validator;
    }
}
