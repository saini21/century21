<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow([
            'home',
            'about',
            'contact',
            'privacyPolicy',
            'termsAndConditions',
            'howItWorks',
            'products',
            'faqs',
            'features'
        ]);
        
        $this->viewBuilder()->setLayout('home');
    }
    
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path) {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;
        
        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));
        
        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
    
    public function home() {
        $this->loadModel('Properties');
        $properties = $this->Properties->find('all')
            ->contain(['PropertyImages' => ['Images']])
            ->where(['Properties.lat !=' => 0])
            ->group('Properties.id')
            ->limit(10)
            ->all()->toArray();
        
        $content = $this->getContent('Home');
        $this->set('content', $content);
        $this->set('properties', $this->formattedProperties($properties));
    }
    
    public function about() {
        $content = $this->getContent('About');
        $this->set('content', $content);
    }
    
    public function contact() {
        $content = $this->getContent('Contact');
        $this->set('content', $content);
    }
    
    public function howItWorks() {
        $content = $this->getContent('How It Works');
        $this->set('content', $content);
    }
    
    public function privacyPolicy() {
        $content = $this->getContent('Privacy Policy');
        $this->set('content', $content);
    }
    
    public function termsAndConditions() {
        $content = $this->getContent('Terms And Conditions');
        $this->set('content', $content);
    }
    
    public function features() {
        $content = $this->getContent('Features', true);
        $this->set('content', $content);
    }
    
    public function faqs() {
        $this->viewBuilder()->setLayout('home');
        $this->loadModel('Faqs');
        $faqs = $this->paginate($this->Faqs);
        
        $this->set(compact('faqs'));
    }
    
    
}
