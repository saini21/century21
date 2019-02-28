<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */


switch ($page->section_type) {
    case "image":
        {
            $fields[] = [
                'name' => 'image_id',
                'type' => 'image',
                'columns' => 6,
                'model' => 'Pages',
                'category' => 'Image',
                'validate' => [
                    'rules' => [
                        'required' => false
                    ]
                ]
            ];
            break;
        }
    case "video":
        {
            $fields[] = [
                'name' => 'section_text',
                'columns' => 8,
            ];
            break;
        }
    case "heading":
        {
            $fields[] = [
                'name' => 'section_text',
                'columns' => 8,
            ];
            break;
        }
    case "content":
        {
            $fields[] = [
                'name' => 'section_text',
                'type' => 'textarea',
                'columns' => 8,
            ];
            break;
        }
    
}

$fields[] = [
    'name' => 'page',
    'columns' => 8,
    'readonly' => true
];
$fields[] = [
    'name' => 'section_name',
    'columns' => 8,
    'readonly' => true
];


$params = [
    'form' => [
        'options' => [
            'type' => 'post',
            'novalidate' => true,
            'id' => 'addPageForm'
        ],
        'heading' => 'New Page Section'
    ],
    'fields' => $fields
];

$this->AdminForm->create($params);
?>
<script>
    $(function () {
        $('#topBreadcrumb').hide();
    });
</script>
