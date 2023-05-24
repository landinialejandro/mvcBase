<?php

namespace components;

use Error;

class Components {
    private $text;
    private $attributes = [];

    public function __construct(string $text = "", string $url = "", array $attributes = [], array $data = [], array $class = []) {
        $this->setText($text);
        !empty(trim($url)) && $this->setAttribute('href', $url);
        $this->setAttributes($attributes);
        $this->setDataAttributes($data);
        $this->setClassAttributes($class);
    }

    public function setText(string $text = "") {
        $this->text = $text;
    }

    public function getText() {
        return $this->text;
    }

    public function setAttribute(string $attribute, string $value) {
        if (is_string($attribute) && is_string($value) && !empty(trim($value))) {
            $this->attributes[$attribute] = $value;
        } else {
            throw new Error('Both attribute and value must be valid strings, attr: ' . $attribute . ", value: " . $value);
        }
    }

    public function setAttributes(array $attributes) {
        return $this->attributes = array_merge($attributes, $this->attributes);
    }
    public function setDataAttributes(array $data) {
        foreach ($data as $k => $v) {
            $this->setAttribute("data-" . $k, $v);
        }
    }
    public function setClassAttributes(array $data) {
        if (!empty($data)) {
            $this->setAttribute("class", implode(" ", $data));
        }
    }

    public function getAttributes() {
        return $this->renderAttribute();
    }

    public function renderComponent($component) {

        return "<{$component}{$this->getAttributes()}>{$this->getText()}</{$component}>";
    }

    private function renderAttribute(): string {
        $attributeHtml = "";
        foreach ($this->attributes as $attribute => $values) {
            if (is_array($values)) $values = implode(' ', $values);
            $attributeHtml .= " {$attribute}=\"{$values}\"";
        }
        return $attributeHtml;
    }

    public function renderText($text, $separador = "") {
        if (is_array($text)) {
            return implode($separador, $text);
        } else if (is_null($text) || !is_string($text)) {
            return '';
        } else {
            return $text;
        }
    }
}
