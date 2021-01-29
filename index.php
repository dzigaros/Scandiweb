<?php

include_once 'loader.php';

$app = new misc\App($config);

$app->render('index', [
    'buttons' => [
            [
                'id' => 'add',
                'title' => 'Add',
                'action' => '',
                'href' => 'http://' . misc\App::$app_url . '/product.php?action=add'
            ],
            [
                'id' => 'delete',
                'title' => 'Delete',
                'action' => '',
                'href' => ''
            ]
        ],
    'products' => models\Product::all()
]);