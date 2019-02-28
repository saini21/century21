<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pages Model
 *
 * @method \App\Model\Entity\Page get($primaryKey, $options = [])
 * @method \App\Model\Entity\Page newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Page[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Page|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Page[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Page findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagesTable extends Table {
    
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        
        $this->setTable('pages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
    
        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'LEFT'
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
            ->scalar('page')
            ->maxLength('page', 255)
            ->requirePresence('page', 'create')
            ->allowEmptyString('page', false);
        
        $validator
            ->scalar('section_name')
            ->maxLength('section_name', 255)
            ->requirePresence('section_name', 'create')
            ->allowEmptyString('section_name', false);
        
        $validator
            ->scalar('section_heading')
            ->maxLength('section_heading', 255)
            ->allowEmptyString('section_heading', true);
        
        $validator
            ->scalar('section_tag_line')
            ->maxLength('section_tag_line', 255)
            ->allowEmptyString('section_tag_line', true);
        
        $validator
            ->scalar('section_text')
            ->allowEmptyString('section_text', true);
        
        return $validator;
    }
}
