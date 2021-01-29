<?php

namespace models;

use misc\App;

abstract class Product
{
    protected static $table = 'products';
    public $id;
    public $sku;
    public $price;
    public $name;
    public $type;
    protected $type_id = 0;
    public $attrs = [];

    public function __construct($data)
    {
        $this->fill($data);
        if (is_null($this->id)) {
            // New object
        } else {
            $attrs = $this->get_attributes();
            foreach ($attrs as $a) {
                $values = App::$db->query("SELECT * FROM product_attribute WHERE product_id = " . $data['id'] . " AND attribute_id = " . $a['id']);
                foreach ($values as $value) {
                    $this->{$a['title']} = is_null($value['value_vc']) ? $value['value_int'] : $value['value_vc'];
                }
            }
        }
        return $this;
    }

    protected function get_attributes()
    {
        $attrs = App::$db->query('SELECT id, title FROM `attributes` WHERE type_id = ' . $this->type_id);
        return $attrs;
    }

    public static function make($type, $data)
    {
        $product_type = 'models\\' . $type;
        $product = new $product_type($data);
        return $product;
    }

    public static function all()
    {
        $product_ids = \misc\App::$db->query('SELECT id FROM `products`');
        $products = [];
        foreach ($product_ids as $product_id) {
            $products[] = self::get($product_id['id']);
        }
        return $products;
    }

    public static function get($id)
    {
        $data = \misc\App::$db->find(self::$table, $id);
        $type_data = \misc\App::$db->find('types', $data['type']);
        $product_type = 'models\\' . $type_data['title'];
        $product = new $product_type($data);
        return $product;
    }

    public function fill($data = [])
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
        return $this;
    }

    public function save()
    {
        if (is_null($this->id)) {
            $type = App::$db->find('types', $this->type, 'title');
            $product_id = App::$db->insert('products', ['sku', 'price', 'name', 'type'], [
                'sku' => $this->sku,
                'price' => $this->price,
                'name' => $this->name,
                'type' => $type['id']
            ]);
            $attributes = App::$db->query('SELECT * FROM `attributes` WHERE type_id = ' . $type['id']);
            foreach ($attributes as $attr) {
                $attr_name = $attr['title'];
                $value = $this->{$attr_name};
                App::$db->insert('product_attribute', ['product_id', 'attribute_id', 'value_vc', 'value_int'], [
                    'product_id' => $product_id,
                    'attribute_id' => $attr['id'],
                    'value_vc' => (is_string($value) ? $value : null),
                    'value_int' => (is_int($value) ? $value : null)
                ]);
            }
            return $product_id;
        }
    }

    public static function delete($id)
    {
        App::$db->delete('product_attribute', 'product_id', $id);
        App::$db->delete('products', 'id', $id);
        return true;
    }

    public function render()
    {
        return App::renderPart('product_card', ['product' => $this]);

    }

}