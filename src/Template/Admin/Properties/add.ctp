<?php
$params = [
    'form' => [
        'options' => [
            'type' => 'post',
            'novalidate' => true,
            'id' => 'addApartmentForm'
        ],
        'heading'=>'New Apartment'
    ],
    'fields' => [
        [
            'name' => 'name'
        ],
        [
            'name' => 'address'
        ],
        [
            'name' => 'state_id',
            'type' => 'select',
            'options' => $states,
            'id' => 'StateId'
        ],
        [
            'name' => 'city_id',
            'type' => 'select',
            'options' => [],
            'depend' => [
                'id' => 'StateId',
                'model' => 'Cities',
                'match' => 'state_id'
            ]
        ],
        [
            'name' => 'zip'
        ]
        
    ]
];

$this->AdminForm->create($params);
