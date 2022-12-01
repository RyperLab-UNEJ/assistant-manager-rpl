<?php

return [
    'cms' =>[
// icon can use themify icon or fontawesome
        [
            'title'=>'Daftar Kompetisi',
            'url'=>'',
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