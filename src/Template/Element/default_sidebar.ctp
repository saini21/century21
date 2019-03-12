<!-- Sidebar Nav -->
<div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--dark">
    <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu g-min-height-100vh mb-0">
        <?php
        $menuItems = [
            [
                'label' => 'Dashboard',
                'controller' => 'Users',
                'action' => 'dashboard',
                'icon_class' => 'fa fa-dashboard',
            ],
            [
                'controller' => 'Apartments',
                'icon_class' => 'building',
            ],
            [
                'controller' => 'Memos',
                'icon_class' => 'money',
            ],
            [
                'controller' => 'Activities',
                'icon_class' => 'hand-pointer-o',
            ],
            [
                'label' => 'Activity Templates',
                'controller' => 'ActivityTemplates',
                'icon_class' => 'sticky-note-o',
            ],
            [
                'label' => 'Ecommerce Orders',
                'controller' => 'EcommerceOrders',
                'icon_class' => 'hand-pointer-o',
            ],
            [
                'label' => 'Ecommerce Order Log',
                'controller' => 'EcommerceOrderLogs',
                'icon_class' => 'hand-pointer-o',
            ],
            [
                'label' => 'Settings',
                'controller' => 'Options',
                'icon_class' => 'gear',
                'sub_menu' => [
                    [
                        'label' => 'General Settings',
                        'controller' => 'Options',
                        'icon_class' => 'gear',
                    ]
                ]
            ],
    
        ];
        ?>
        <?php $this->Sidebar->create($menuItems); ?>
    
    </ul>
</div>
<!-- End Sidebar Nav -->
