<?php

namespace components;

use Error;

class Components {
    private $content;
    private $attributes = [];

    public function __construct(string $content = "", string $url = "", array $attributes = [], array $data = [], array $class = []) {
        $this->setContent($content);
        !empty(trim($url)) && $this->setAttribute('href', $url);
        $this->setAttributes($attributes);
        $this->setDataAttributes($data);
        $this->setClassAttributes($class);
    }

    public function setContent(string $content = "") {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }

    public function setAttribute(string $attribute, string $value) {
        if (is_string($attribute) && is_string($value)) {
            $this->attributes[$attribute] = $value;
        } else {
            throw new Error('Both attribute and value must be valid strings, attr: ' . $attribute . ", value: " . $value);
        }
    }

    /* $attributes = ['class' => ["button is-primary", "is-medium"]]  */
    public function setAttributes(array $attributes): array {
        return $this->attributes = array_merge($attributes, $this->attributes);
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

    public function getAttributes() {
        return $this->renderAttribute();
    }

    public function renderComponent(string $component): string {
        return "<{$component}{$this->getAttributes()}>{$this->getContent()}</{$component}>";
    }

    private function renderAttribute(): string {
        $attributeHtml = "";
        foreach ($this->attributes as $attribute => $values) {
            $values = $this->renderText($values, " ");
            $attributeHtml .= " {$attribute}=\"{$values}\"";
        }
        return $attributeHtml;
    }

    public function renderText($text, $separador = ""): string {
        if (is_array($text)) {
            return implode($separador, $text);
        } else if (is_null($text) || !is_string($text)) {
            return '';
        } else {
            return $text;
        }
    }
}
