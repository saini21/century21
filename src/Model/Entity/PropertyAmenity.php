<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertyAmenity Entity
 *
 * @property int $id
 * @property int $property_id
 * @property int $amenity_id
 * @property string $amenity_value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\Amenity $amenity
 */
class PropertyAmenity extends Entity
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
        'amenity_id' => true,
        'amenity_value' => true,
        'created' => true,
        'modified' => true,
        'property' => true,
        'amenity' => true
    ];
}
