<?php

namespace App\View\Helper;


use Cake\View\Helper;
use Cake\Routing\Router;

class TopMenuHelper extends Helper {
    
    public $singleLiClasses = "nav-item g-mx-20--lg";
    public $singleAnchorClasses = "nav-link px-0 g-color-white font-bold";
    
    
    public function create($menuItems = null) {
        if (!empty($menuItems)) {
            
            foreach ($menuItems as $menuItem) {
                $this->menuItem($menuItem);
            }
            
            ?>
            <script>
                $(function () {
                    var _this = $('.topNav_<?= $this->getView()->getRequest()->getParam('controller') . $this->getView()->getRequest()->getParam('action'); ?>');
                    _this.children('a').addClass('active');
                });
            </script>
            <?php
        }
    }
    
    public function menuItem($item) {
        $item = $this->buildItem($item);
        $id = 'topNav_' . $item['controller'] . $item['action'];
        $url = Router::url(['controller' => $item['controller'], 'action' => $item['action']]);
        ?>
        <li class="<?= $this->singleLiClasses; ?> <?= $id; ?>">
            <a class="<?= $this->singleAnchorClasses; ?>" href="<?= $url; ?>"><?= $item['label']; ?></a>
        </li>
        <?php
    }
    
    public function buildItem($item) {
        return [
            'label' => empty($item['label']) ? $item['controller'] : $item['label'],
            'controller' => $item['controller'],
            'action' => empty($item['action']) ? 'index' : $item['action']
        ];
    }
}
