<?php

return [
    'cms' =>[
// icon can use themify icon or fontawesome
        [
            'title'=>'Dashboard',
            'url'=>'/cms/dashboard',
            'icon'=>'icon-grid menu-icon',
            'permission'=>'',
            'childern'=>[]
        ],
        [
            'title'=>'Admins',
            'url'=>'',
            'icon'=>'fa-solid fa-people-group',
            'permission'=>'cms.admins.viewAny|cms.roles.viewAny',
            'childern'=>[
                [
                'title'=>'Admin',
                'url'=>'/cms/admin',
                'icon'=>'fa-solid fa-people-group',
                'permission'=>'cms.admins.viewAny',
                'childern'=>[]
                ],
                [
                'title'=>'Role',
                'url'=>'/cms/roles',
                'icon'=>'fa-solid fa-people-group',
                'permission'=>'cms.roles.viewAny',
                'childern'=>[]
                ]
            ]
        ],
    ]
];
