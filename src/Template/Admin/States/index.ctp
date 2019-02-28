<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State[]|\Cake\Collection\CollectionInterface $states
 */
$this->Heading->create('States');

$params = [
    'fields' => [
        ['name' => 'name'],
        ['name' => 'short_name'],
        [
            'name' => 'status',
            'type' => 'status',
            'model' => 'States'
        ]
    ]
];

$this->Listing->create($params, ['edit', 'delete']);
