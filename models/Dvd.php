<?php

namespace models;

use models\Product;

class Dvd extends Product
{
    public $unit = 'MB';
    public $size;
    protected $type_id = 2;
    public $attrs = ['size'];
}