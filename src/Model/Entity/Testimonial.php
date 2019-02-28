<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Testimonial Entity
 *
 * @property int $id
 * @property string $user_name
 * @property int $image_id
 * @property string $testimonial
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Image $image
 */
class Testimonial extends Entity
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
        'user_name' => true,
        'image_id' => true,
        'testimonial' => true,
        'created' => true,
        'modified' => true,
        'image' => true
    ];
}
