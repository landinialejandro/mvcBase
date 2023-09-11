<?php

namespace app\components;

class ComponentsAttributes {
    public $tag = "";
    public $content = "";
    public $url = "";
    public $attributes = [];
    public $data = [];
    public $class = [];
    function __construct(string $tag = "",string $content = "", string $url = "", array $attributes = [], array $data = [], array $class = []) {
        $this->content = $content;
        $this->url = $url;
        $this->attributes = $attributes;
        $this->data = $data;
        $this->class = $class;
        $this->tag = $tag;
    }
}

// class ExampleUse{
//     public function __construct(ComponentsAttributes $attr){
//         $a = $attr->content;

//     }
// }