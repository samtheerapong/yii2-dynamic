<?php
use hoaaah\sbadmin2\widgets\Menu;

echo Menu::widget([
    'options' => [
        // 'ulClass' => "navbar-nav bg-gradient-primry sidebar sidebar-dark accordion",
        'ulClass' => "navbar-nav sidebar sidebar-dark accordion bg-custom-sidebar",
        'ulId' => "accordionSidebar"
    ], //  optional
    'brand' => [
        'url' => ['/'],
        'content' => <<<HTML
            <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-space-shuttle"></i> -->
            </div>
            <div class="sidebar-brand-text mx-3">NCR NOTTFY <i class="fas fa-bell"></i></div>        
HTML
    ],
    'items' => [
        [
            'label' => 'REQUEST',
            'icon' => 'fa fa-comment', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
            // 'subMenuTitle' => 'Menu 2 Item', // optional only when have submenutitle, if not exist will not have subMenuTitle
            'items' => [
                [
                    'label' => 'Index',
                    'url' => ['/sam/ncr/index'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'Create',
                    'url' => ['/sam/ncr/create'], //  Array format of Url to, will be not used if have an items
                ],
                
            ]
        ],
        [
            'label' => 'Action',
            'icon' => 'fa fa-code', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
            // 'subMenuTitle' => 'Menu 2 Item', // optional only when have submenutitle, if not exist will not have subMenuTitle
            'items' => [
                [
                    'label' => 'Index',
                    'url' => ['/ncr/action/index'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'Create',
                    'url' => ['/ncr/action/create'], //  Array format of Url to, will be not used if have an items
                ],
                
            ]
        ],
        [
            'label' => 'Protected',
            'icon' => 'fa fa-magnet', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
            // 'subMenuTitle' => 'Menu 2 Item', // optional only when have submenutitle, if not exist will not have subMenuTitle
            'items' => [
                [
                    'label' => 'Index',
                    'url' => ['/ncr/protected/index'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'Create',
                    'url' => ['/ncr/protected/create'], //  Array format of Url to, will be not used if have an items
                ],
            ]
        ],

        [
            'label' => 'Config',
            'icon' => 'fa fa-cogs', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
            // 'subMenuTitle' => 'Menu 2 Item', // optional only when have submenutitle, if not exist will not have subMenuTitle
            'items' => [
                [
                    'label' => 'Departments',
                    'icon' => 'fa fa-home', // optional, default to "fa fa-circle-o
                    'url' => ['/sam/department/index'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'Status',
                    'icon' => 'fa fa-home', // optional, default to "fa fa-circle-o
                    'url' => ['/sam/ncr-status/index'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'Uploads',
                    'icon' => 'fa fa-folder', // optional, default to "fa fa-circle-o
                    'url' => ['/ncr/uploads/index'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'User',
                    'icon' => 'fa fa-user', // optional, default to "fa fa-circle-o
                    'url' => ['/ncr/user/index'], //  Array format of Url to, will be not used if have an items
                ],
            ]
        ],
       
        // [
        //     'label' => 'Menu 1',
        //     'url' => ['/menu1'], //  Array format of Url to, will be not used if have an items
        //     'icon' => 'fas fa-fw fa-tachometer-alt', // optional, default to "fa fa-circle-o
        //     'visible' => true, // optional, default to true
        //     // 'options' => [
        //     //     'liClass' => 'nav-item',
        //     // ] // optional
        // ],
        // [
        //     'type' => 'divider', // divider or sidebar, if not set then link menu
        //     // 'label' => '', // if sidebar we will set this, if divider then no

        // ],
        // [
        //     'label' => 'Menu 2',
        //     // 'icon' => 'fa fa-menu', // optional, default to "fa fa-circle-o
        //     'visible' => true, // optional, default to true
        //     // 'subMenuTitle' => 'Menu 2 Item', // optional only when have submenutitle, if not exist will not have subMenuTitle
        //     'items' => [
        //         [
        //             'label' => 'Menu 2 Sub 1',
        //             'url' => ['/menu21'], //  Array format of Url to, will be not used if have an items
        //         ],
        //         [
        //             'label' => 'Menu 2 Sub 2',
        //             'url' => ['/menu22'], //  Array format of Url to, will be not used if have an items
        //         ],
        //     ]
        // ],
        
        
    ]
]);