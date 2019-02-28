<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$params = [
    'form' => [
        'options' => [
            'type' => 'post',
            'novalidate' => true,
            'id' => 'addPageForm'
        ],
        'heading' => 'New Page Section'
    ],
    'fields' => [
        [
            'name' => 'page',
            'columns' => 8,
        ],
        [
            'name' => 'section_name',
            'columns' => 8,
        ],
        [
            'name' => 'section_type',
            'columns' => 8,
            'validate' => [
                'rules' => [
                    'required' => false
                ]
            ]
        ],
        [
            'name' => 'section_text',
            'type' => 'textarea',
            'columns' => 8,
            'validate' => [
                'rules' => [
                    'required' => false
                ]
            ]
        ],
        [
            'name' => 'image_id',
            'type' => 'image',
            'columns' => 12,
            'model' => 'Pages',
            'category' => 'Image',
            'validate' => [
                'rules' => [
                    'required' => false
                ]
            ]
        ],
    ]
];

$this->AdminForm->create($params);

