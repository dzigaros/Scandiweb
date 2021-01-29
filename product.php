<?php

include_once 'loader.php';

$app = new misc\App($config);


// product add
if (array_key_exists('action', $_GET) && $_GET['action'] === 'add') {

    $buttons = [
        [
            'title' => 'Save',
            'action' => '',
            'id' => 'save',
            'href' => '#'
        ],
        [
            'title' => 'Cancel',
            'action' => '',
            'id' => 'cancel',
            'href' => ''
        ]
    ];

    $app->render('form', ['buttons' => $buttons]);
}

// product save
if (array_key_exists('action', $_GET) && $_GET['action'] == 'save') {
    $product = models\Product::make($_POST['type'], $_POST);
    $product->save();
    // Relocate to index.php
    header('Location: http://' . misc\App::$app_url);
    die;
}

// product delete
if (array_key_exists('action', $_GET) && $_GET['action'] == 'delete') {
    // Get product ids
    if (array_key_exists('product_ids', $_GET)) {
        $product_ids = explode(',', $_GET['product_ids']);
        foreach ($product_ids as $pid) {
            $pid = trim($pid);
            models\Product::delete($pid);
        }
    }
    return true;
}

// product type view
if (array_key_exists('type_form', $_GET) && $_GET['type_form']) {
    echo misc\App::renderPart('type' . DIRECTORY_SEPARATOR . $_GET['type_form'], []);
}