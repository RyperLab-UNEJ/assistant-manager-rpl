<?php

return [
    'cms' =>[
// icon can use themify icon or fontawesome
        [
            'title'=>'Dashboard',
            'url'=>'/cms/index',
            'icon'=>'icon-grid menu-icon',
            'permission'=>'',
            'childern'=>[]
        ],
        [
            'title'=>'Daftar Kompetisi',
            'url'=>'/cms/competition',
            'icon'=>'fa-solid fa-list',
            'permission'=>'',
            'childern'=>[]
        ],
        [
            'title'=>'Tim',
            'url'=>'',
            'icon'=>'fa-solid fa-people-group',
            'permission'=>'',
            'childern'=>[
                [
                    'title'=>'Daftar Submission',
                    'url'=>'',
                    'icon'=>'fa-light fa-file-pen',
                    'permission'=>'',
                    'childern'=>[]
                ],
            ]
        ],

    ]
];