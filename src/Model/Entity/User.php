<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $reporting_name
 * @property string $email
 * @property string $password
 * @property string $forgot_password_token
 * @property int $image_id
 * @property string $phone
 * @property string $address
 * @property int $city_id
 * @property int $state_id
 * @property string $zip
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\State $state
 */
class User extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'reporting_name' => true,
        'email' => true,
        'password' => true,
        'forgot_password_token' => true,
        'image_id' => true,
        'phone' => true,
        'address' => true,
        'city_id' => true,
        'state_id' => true,
        'zip' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
        'image' => true,
        'city' => true,
        'state' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
