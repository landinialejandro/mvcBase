<?php

namespace components;

class Components {
    private $text;
    private $attributes = [];

    public function setText(string $text) {
        $this->text = $text;
    }
    public function getText() {
        return $this->text;
    }

    public function setAttribute(string $attribute, string $value) {
        if (is_string($attribute) && is_string($value)) {
            $this->attributes[$attribute] = $value;
        } else {
            //throw new Error('Both attribute and value must be valid strings');
        }
    }

    public function setAttributes(array $attributes) {
        return $this->attributes = $attributes;
    }

    public function getAttributes() {
        return $this->renderAttribute();
    }

    private function renderAttribute(): string {
        $attributeHtml = "";
        foreach ($this->attributes as $attribute => $values) {
            if (is_array($values)) $values = implode(' ', $values);
            $attributeHtml .= " {$attribute}=\"{$values}\"";
        }
        return $attributeHtml;
    }
}
