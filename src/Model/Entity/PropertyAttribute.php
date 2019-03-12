<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertyAttribute Entity
 *
 * @property int $id
 * @property int $property_id
 * @property string $attribute
 * @property string $attribute_value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Property $property
 */
class PropertyAttribute extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'property_id' => true,
        'attribute' => true,
        'attribute_value' => true,
        'created' => true,
        'modified' => true,
        'property' => true
    ];
}
