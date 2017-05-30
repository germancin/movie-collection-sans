<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    // AppController.php
    public $helpers = [
        'Less.Less', // required for parsing less files
        'BootstrapUI.Form',
        'BootstrapUI.Html',
        'BootstrapUI.Flash',
        'BootstrapUI.Paginator'
    ];
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'password' => 'password',
                        'username' => 'email',
                    ]

                ]
            ],
            'loginRedirect' => [
                'controller' => 'Movies',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);
        
        $this->loadComponent('AkkaFacebook.Graph', [
                'app_id' => '204778506707999',
                'app_secret' => '5b52992789464d6117abff33dd987657',
                'default_graph_version' => 'v2.9',
                'app_scope' => 'email',
                'redirect_url' => 'https://german-movie-collection.herokuapp.com/users/oauth',
                'post_login_redirect' => Router::url(['controller' => 'Movies', 'action' => 'index'], TRUE),  
                'user_columns' => ['first_name' => 'name', 'last_name' => 'lastname'] //not required
        ]);
        
    }

    public function beforeFilter(Event $event) {
        $this->set('userAuth', $this->Auth->user());
        $this->set('isLoggin', true);

        if(!$this->Auth->user()){
            $this->set('userAuth', []);
            $this->set('isLoggin', false);
        }

        $this->Auth->allow(['display', 'index']);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
