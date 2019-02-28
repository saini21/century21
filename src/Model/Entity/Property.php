<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int $city_id
 * @property int $state_id
 * @property string $zip
 * @property float $lat
 * @property float $lng
 * @property int $image_id
 * @property bool $status
 * @property bool $is_premium
 * @property bool $is_featured
 * @property \Cake\I18n\FrozenTime $last_searched_at
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\PropertyAmenity[] $property_amenities
 * @property \App\Model\Entity\PropertyImage[] $property_images
 */
class Property extends Entity
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
        'name' => true,
        'address' => true,
        'city_id' => true,
        'state_id' => true,
        'zip' => true,
        'lat' => true,
        'lng' => true,
        'image_id' => true,
        'status' => true,
        'is_premium' => true,
        'is_featured' => true,
        'last_searched_at' => true,
        'created' => true,
        'modified' => true,
        'city' => true,
        'state' => true,
        'image' => true,
        'property_amenities' => true,
        'property_images' => true
    ];
}
