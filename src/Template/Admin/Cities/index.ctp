<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City[]|\Cake\Collection\CollectionInterface $cities
 */
$this->Heading->create('Cities');

$params = [
    'fields' => [
        ['name' => 'name'],
        ['name' => 'state_code'],
        [
            'name' => 'status',
            'type' => 'status',
            'model' => 'Cities'
        ]
    ]
];

$this->Listing->create($params, ['edit', 'delete']);
