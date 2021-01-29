<?php

namespace models;

use misc\App;
use models\Product;

class Furniture extends Product
{
    public $unit = '';
    public $height;
    public $length;
    public $width;
    protected $type_id = 3;
    public $attrs = ['height', 'length', 'width'];

    public function render()
    {
        return App::renderPart('product_furniture', ['product' => $this]);
    }
}

