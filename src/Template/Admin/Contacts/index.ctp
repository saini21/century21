<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact[]|\Cake\Collection\CollectionInterface $contacts
 */

$this->Heading->create('Contacts');

$params = [
    'fields' => [
        [
            'name' => 'type',
            'label' => 'Contact Type'
        ],
        ['name' => 'name'],
        ['name' => 'email'],
        ['name' => 'phone'],
    ]
];

$this->Listing->create($params);
