<!-- Sidebar Nav u-side-nav-opened has-active active  -->
<?php
$menuItems = [
    [
        'label' => 'Dashboard',
        'controller' => 'Admins',
        'action' => 'dashboard',
        'icon_class' => 'fa fa-dashboard',
        'default_sub_menu' => false
    ],
    [
        'controller' => 'Properties',
        'icon_class' => 'fa fa-building-o',
        'custom_sub_menu' => [
            [
                'label' => 'List Amenities',
                'controller' => 'Amenities',
                'icon_class' => 'fa fa-list',
            ],
            [
                'label' => 'New Amenity',
                'controller' => 'Amenities',
                'action' => 'add',
                'icon_class' => 'fa fa-plus',
            ]
        ]
    ],
    [
        'controller' => 'Contacts',
        'icon_class' => 'fa fa-address-book',
    ],
    [
        'label' => 'Settings',
        'controller' => 'Options',
        'icon_class' => 'fa fa-gear fa-spin',
        'default_sub_menu' => false,
        'custom_sub_menu' => [
            [
                'label' => 'General Settings',
                'controller' => 'Options',
                'action' => 'general',
                'icon_class' => 'general',
            ]
        ]
    ],
    
    [
        'label' => 'Manage Pages',
        'controller' => 'Pages',
        'icon_class' => 'hs-admin-layers',
        'default_sub_menu' => false,
        'custom_sub_menu' => [
            [
                'label' => 'Home Header',
                'controller' => 'Pages',
                'action' => 'header',
                'icon_class' => 'hs-admin-layout-menu-separated',
            ],
            [
                'label' => 'Home Page Content',
                'controller' => 'Pages',
                'action' => 'home',
                'icon_class' => 'fa fa-file',
            ],
            [
                'label' => 'Home Footer',
                'controller' => 'Pages',
                'action' => 'footer',
                'icon_class' => 'hs-admin-layout-menu-separated',
            ],
            /*[
                'label' => 'Features',
                'controller' => 'Pages',
                'action' => 'features',
                'icon_class' => 'fa fa-file',
            ],
            [
                'label' => 'How it Works',
                'controller' => 'Pages',
                'action' => 'howItWorks',
                'icon_class' => 'fa fa-file',
            ],
            [
                'label' => 'Contact',
                'controller' => 'Pages',
                'action' => 'contact',
                'icon_class' => 'fa fa-file',
            ],
            */
        ]
    ],
    [
        'controller' => 'Faqs',
        'icon_class' => 'fa fa-question-circle',
    ],
    [
        'controller' => 'Testimonials',
        'icon_class' => 'fa fa-quote-left',
    ],
    [
        'controller' => 'States',
        'icon_class' => 'fa fa-flag-checkered',
    ],
    [
        'controller' => 'Cities',
        'icon_class' => 'fa fa-flag-o',
    ]

];
?>
<div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--dark">
    <!-- hr style="background-color: #7484a8" / -->
    <?php $this->Sidebar->create($menuItems); ?>
</div>
<!-- End Sidebar Nav -->
