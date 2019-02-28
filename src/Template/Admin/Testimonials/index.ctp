<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Testimonial[]|\Cake\Collection\CollectionInterface $testimonials
 */
$params = [
    'fields' => [
        [
            'name' => 'image_id',
            'type' => 'image',
            'sortable' => false,
            'label' => '<i class="fa fa-picture-o"></i>'
        ],
        ['name' => 'user_name'],
        ['name' => 'testimonial'],
    ],
    'search' => [
        'match' => [
            'Testimonials' => ['user_name', 'testimonial']
        ]
    ]
];

$this->Listing->create($params);
