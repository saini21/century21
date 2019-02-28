<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->Heading->create('Amenities');

$params = [
    'fields' => [
        ['name' => 'name'],
        ['name' => 'category'],
        [
            'name' => 'status',
            'label' => 'Status',
            'type' => 'status',
            'model' => 'Users',
        ],
        ['name' => 'created']
    ]
];

$this->Listing->create($params);
