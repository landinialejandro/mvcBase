<?php
namespace app\components;

class ComponentsAttributes{
    public $content = "";
    public $url = "";
    public $attributes = [];
    public $data = [];
    public $class = [];
    function __construct(string $content = "", string $url = "", array $attributes = [], array $data = [], array $class = []) {
        $this->content = $content;
        $this->url = $url;
        $this->attributes = $attributes;
        $this->data = $data;
        $this->class = $class;
    }
}

// class ExampleUse{
//     public function __construct(ComponentsAttributes $attr){
//         $a = $attr->content;

//     }
// }