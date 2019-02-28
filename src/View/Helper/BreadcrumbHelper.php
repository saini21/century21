<?php

namespace App\View\Helper;


use Cake\View\Helper;
use Cake\Routing\Router;
use Cake\Utility\Inflector;

class BreadcrumbHelper extends Helper {
    
    public function create($menuItems = null) {
        if (in_array($this->getView()->getRequest()->getParam('action'), ['index', 'add', 'edit', 'view'])) {
            ?>
            <nav class="large-3 medium-4 columns" id="topBreadcrumb">
                <ul class="breadcrumb">
                    <li class="heading g-mr-10"><?= __('Actions') ?></li>
                    <?php $this->getDefaultItems(); ?>
                    <?php
                    if (!empty($menuItems)) {
                        foreach ($menuItems as $index => $menuItem) {
                            $this->menuItem($menuItem, $index);
                        }
                    }
                    ?>
                </ul>
            </nav>
            <?php
        }
        
    }
    
    public function getDefaultItems() {
        $controller = $this->getView()->getRequest()->getParam('controller');
        $action = $this->getView()->getRequest()->getParam('action');
        $pass = $this->getView()->getRequest()->getParam('pass');
        
        $plural = Inflector::humanize(Inflector::underscore($controller));
        $singular = Inflector::singularize($plural);
        
        $defaultActions = [
            'index' => ['add'],
            'add' => ['index'],
            'edit' => ['index', 'add', 'delete'],
            'view' => ['index', 'add', 'edit', 'delete'],
        ];
        
        
        if (!empty($defaultActions[$action])) {
            foreach ($defaultActions[$action] as $item) {
                $urlArray = ['controller' => $controller, 'action' => $item];
                if (!empty($pass) && !in_array($item, ['add', 'index'])) {
                    foreach ($pass as $p) {
                        $urlArray[] = $p;
                    }
                }
                $url = Router::url($urlArray);
                switch ($item) {
                    case 'index':
                        {
                            $label = "List " . $plural;
                            $faClass = 'list';
                            break;
                        }
                    case 'add':
                        {
                            $label = "New " . $singular;
                            $faClass = 'plus';
                            break;
                        }
                    case 'edit':
                        {
                            $label = "Edit " . $singular;
                            $faClass = 'pencil';
                            break;
                        }
                    case 'delete':
                        {
                            $label = "Delete " . $singular;
                            $faClass = 'times';
                            break;
                        }
                    
                }
                ?>
                <li class="g-mr-10">|</li>
                <li class="g-mr-10">
                    <a href="<?= $url; ?>">
                        <i class="fa fa-<?= $faClass; ?>"></i>&nbsp;<?= $label; ?>
                    </a>
                </li>
                <?php
                
            }
        }
    }
}
