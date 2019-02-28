<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Amenity $amenity
 */

$params = [
    'form' => [
        'options' => [
            'type' => 'post',
            'novalidate' => true,
            'id' => 'editAmenityForm'
        ],
        'heading' => 'Edit Amenity'
    ],
    'fields' => [
        [
            'name' => 'category'],
        [
            'name'=>'empty',
        ],
        [
            'name' => 'name'
        ]
    ]
];

$this->AdminForm->create($params);
