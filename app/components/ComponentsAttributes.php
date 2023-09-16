<?php
namespace app\components;
class ComponentsAttributes {
    public $tag = "";
    public $content = null; //String, array de textos: ["Hola Mundo", "512"] ó "textos, separados, por, coma"
    public $url = "";
    public $attributes = [];
    public $data = [];
    public $class = [];
    public $wrapContent = false;
    public $wraperElement = "span";

    function __construct(string $tag = "", $content = null, string $url = "", array $attributes = [], array $data = [], array $class = [], bool $wrapContent = false) {
        $this->content = $content;
        $this->url = $url;
        $this->attributes = $attributes;
        $this->data = $data;
        $this->class = $class;
        $this->tag = $tag;
        $this->wrapContent = $wrapContent;
    }
}