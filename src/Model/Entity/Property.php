<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string $tour_url
 * @property string $ad_text
 * @property string $extras
 * @property string $Legal_desc
 * @property string $community
 * @property string $idx_date
 * @property string $pix_update
 * @property string $sql_timestamp
 * @property string $bedroom
 * @property string $bedroom_plus
 * @property string $bath_total
 * @property string $realtor
 * @property string $class_type
 * @property string $ml_num
 * @property string $lp_dol
 * @property string $address
 * @property string $area
 * @property string $county
 * @property string $zip
 * @property string $municipality_district
 * @property string $municipality
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $property_json
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\PropertyAmenity[] $property_amenities
 * @property \App\Model\Entity\PropertyImage[] $property_images
 */
class Property extends Entity {
    
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
        's_r' => true,
        'tour_url' => true,
        'ad_text' => true,
        'extras' => true,
        'Legal_desc' => true,
        'community' => true,
        'idx_date' => true,
        'pix_update' => true,
        'sql_timestamp' => true,
        'bedroom' => true,
        'bedroom_plus' => true,
        'bath_total' => true,
        'realtor' => true,
        'class_type' => true,
        'ml_num' => true,
        'lp_dol' => true,
        'address' => true,
        'area' => true,
        'county' => true,
        'zip' => true,
        'municipality_district' => true,
        'municipality' => true,
        'lat' => true,
        'lng' => true,
        'created' => true,
        'modified' => true,
        'property_json' => true,
        'city' => true,
        'state' => true,
        'image' => true,
        'property_amenities' => true,
        'property_images' => true
    ];
    
    protected $_hidden = [
        'property_json'
    ];
}
