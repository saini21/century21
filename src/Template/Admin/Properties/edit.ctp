<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apartment $apartment
 */
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
            'name' => 'image_id',
            'type' => 'image',
            'model'=>'Apartments',
            'category'=>'Apartment'
        ],
        [
            'name' => 'user_id',
            'type' => 'suggestions',
            'value' => $apartment->user->first_name .' '. $apartment->user->last_name,
            'suggestions' => [
                'model' => 'Users',
                'select' => "CONCAT(Users.first_name, ' ', Users.last_name)",
                'match' => ['name', 'first_name', 'last_name', 'email'],
                'conditions' => [
                    'role' => 'Apartment'
                ],
            ],
            'validate' => [
                'rules' => [
                    'required' => true
                ]
            ]
        ],
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
            'options' => $cities,
            'depend' => [
                'id' => 'StateId',
                'model' => 'Cities',
                'match' => 'state_id'
            ]
        ],
        [
            'name' => 'zip'
        ],
        [
            'name' => 'market_place_id',
            'type' => 'select',
            'options' => $marketPlaces,
            'validate' => [
                'rules' => [
                    'required' => false
                ]
            ]
        ]
    ]
];

$this->AdminForm->create($params);
