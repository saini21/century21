<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apartment[]|\Cake\Collection\CollectionInterface $apartments
 */
$this->Heading->create('Apartments');

$params = [
    'fields' => [
        [
            'name' => 'image_id',
            'type' => 'image',
            'sortable' => false,
            'label' => '<i class="fa fa-picture-o"></i>'
        ],
        [
            'name' => 'user_id',
            'related_model_fields' => ['first_name', 'last_name']
        ],
        ['name' => 'name'],
        ['name' => 'address'],
        ['name' => 'city_id'],
        ['name' => 'state_id'],
        ['name' => 'zip'],
        ['name' => 'market_place_id'],
        [
            'name' => 'status',
            'type'=>'status',
            'model' => 'Apartments',
        ],
        [
            'name' => 'is_premium',
            'label' => 'Plan',
            'type' => 'status',
            'model' => 'Apartments',
            'active_text' => 'Premium',
            'inactive_text' => 'NA',
            'readonly' => true,
        ],
        [
            'name' => 'is_available',
            'label' => 'Availability',
            'type' => 'status',
            'model' => 'Apartments',
            'active_text' => 'Available',
            'inactive_text' => 'Occupied'
        ]
    ],
    'search'=>[
        'match'=>[
            'Apartments'=>['name', 'zip'],
            'Users'=>['first_name','last_name'],
            'Cities'=>['name'],
            'States'=>['name'],
        ]
    ]
];

$this->Listing->create($params);


