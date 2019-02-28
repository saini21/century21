<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Options Model
 *
 * @method \App\Model\Entity\Option get($primaryKey, $options = [])
 * @method \App\Model\Entity\Option newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Option[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Option|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Option|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Option patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Option[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Option findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OptionsTable extends Table
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

        $this->setTable('options');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('option_category')
            ->maxLength('option_category', 255)
            ->requirePresence('option_category', 'create')
            ->allowEmptyString('option_category', false);

        $validator
            ->scalar('option_name')
            ->maxLength('option_name', 255)
            ->requirePresence('option_name', 'create')
            ->allowEmptyString('option_name', false);

        $validator
            ->scalar('option_value')
            ->requirePresence('option_value', 'create')
            ->allowEmptyString('option_value', false);

        $validator
            ->scalar('default_value')
            ->maxLength('default_value', 255)
            ->requirePresence('default_value', 'create')
            ->allowEmptyString('default_value', false);

        $validator
            ->scalar('modifieds')
            ->maxLength('modifieds', 255)
            ->requirePresence('modifieds', 'create')
            ->allowEmptyString('modifieds', false);

        return $validator;
    }
}
