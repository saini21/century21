<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page[]|\Cake\Collection\CollectionInterface $pages
 */
$this->Heading->create($heading);

$params =['fields' => [
    [
        'name' => 'image_id',
        'type' => 'image',
        'sortable' => false,
        'label' => '<i class="fa fa-picture-o"></i>'
    ],
    ['name' => 'section_name'],
    ['name' => 'section_text'],
    ],
    'search'=>[
        'match'=>[
            'Pages'=>['section_name', 'section_type', 'section_text']
        ]
    ]
];

$this->Listing->create($params, ['view', 'edit']);
