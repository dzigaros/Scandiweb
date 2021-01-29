<?php

namespace models;

use models\Product;

class Book extends Product
{
    public $unit = 'KG';
    public $weight;
    protected $type_id = 1;
    public $attrs = ['weight'];
}