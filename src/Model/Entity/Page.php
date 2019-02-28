<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property string $page
 * @property string $section_name
 * @property string $section_heading
 * @property string $section_tag_line
 * @property string $section_text
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Page extends Entity {
    
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
        'page' => true,
        'section_name' => true,
        'section_type' => true,
        'section_text' => true,
        'image_id' => true,
        'created' => true,
        'modified' => true
    ];
}
