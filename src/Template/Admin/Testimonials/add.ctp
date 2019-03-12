<?php
$params = [
    'form' => [
        'options' => [
            'type' => 'post',
            'novalidate' => true,
            'id' => 'editTestimonialForm'
        ],
        'heading' => 'New Testimonial'
    ],
    'fields' => [
        [
            'name' => 'image_id',
            'type' => 'image',
            'columns' => 8,
            'model' => 'Testimonials',
            'category' => 'Testimonial'
        ],
        [
            'name' => 'user_name',
            'columns' => 8,
        ],
        [
            'name' => 'testimonial',
            'type' => 'textarea',
            'columns' => 8,
        ],
    
    ]
];

$this->AdminForm->create($params);
