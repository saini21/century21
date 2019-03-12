<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property int $id
 * @property string $category
 * @property string $image
 * @property string $small_thumb
 * @property string $medium_thumb
 * @property string $large_thumb
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Admin[] $admins
 * @property \App\Model\Entity\ApartmentImage[] $apartment_images
 * @property \App\Model\Entity\Property[] $properties
 * @property \App\Model\Entity\Testimonial[] $testimonials
 * @property \App\Model\Entity\User[] $users
 */
class Image extends Entity {
    
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
        'user_id' => true,
        'category' => true,
        'image' => true,
        'small_thumb' => true,
        'medium_thumb' => true,
        'large_thumb' => true,
        'created' => true,
        'modified' => true,
        'admins' => true,
        'apartment_images' => true,
        'properties' => true,
        'testimonials' => true,
        'users' => true
    ];
}
