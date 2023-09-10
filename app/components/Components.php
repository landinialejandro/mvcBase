<?php

namespace app\components;

use Error;

class Components {
    private ComponentsAttributes $attr;
    private $html;

    public function __construct(ComponentsAttributes $attr) {
        $this->attr = $attr;
    }

    public function setContent(string $content = "") {
        $this->attr->content = $content;
    }

    public function getContent() {
        return $this->attr->content;
    }

    public function setAttribute(string $attribute, string $value) {
        if (is_string($attribute) && is_string($value)) {
            $this->attr->attributes[$attribute] = $value;
        } else {
            throw new Error('Both attribute and value must be valid strings, attr: ' . $attribute . ", value: " . $value);
        }
    }

    /* $attributes = ['class' => ["button is-primary", "is-medium"]]  */
    public function setAttributes(array $attributes): array {
        return $this->attr->attributes = array_merge($attributes, $this->attr->attributes);
    }

    /* $data = ['id'=>1,'name'=>'John Doe']  */
    public function setDataAttributes(array $data) {
        foreach ($data as $k => $v) {
            $this->setAttribute("data-" . $k, $v);
        }
    }

    /* $data = ['btn','prymary','btn large']  */
    public function setClassAttributes(array $data) {
        $this->setAttribute("class",  $this->renderText($data, " "));
    }

    public function getAttributes(): string {
        return $this->renderAttribute();
    }

    public function renderComponent(string $component): string {
        return "<{$component}{$this->getAttributes()}>{$this->getContent()}</{$component}>";
    }

    private function renderAttribute(): string {
        $attributeHtml = "";
        !empty(trim($this->attr->url)) && $this->setAttribute('href', $this->attr->url);
        $this->setDataAttributes($this->attr->data);
        $this->setClassAttributes($this->attr->class);
        foreach ($this->attr->attributes as $attribute => $values) {
            $values = $this->renderText($values, " ");
            $attributeHtml .= " {$attribute}=\"{$values}\"";
        }
        return $attributeHtml;
    }

    /** regresa un texto plano si se ingresa un array o un texto vacio si es nulo o no es un string */
    public function renderText($text, $separador = ""): string {
        if (is_array($text)) {
            return implode($separador, $text);
        } else if (is_null($text) || !is_string($text)) {
            return '';
        } else {
            return $text;
        }
    }

    public function addHtml($text, $clearFirst = false) {
        $clearFirst && $this->resetHtml();
        $this->html []= $text;
    }

    public function resetHtml(){
        $this->html = [];
    }

    public function renderHtml() {
        $render = $this->renderText($this->html);
        $this->resetHtml();
        return $render;
    }
}
