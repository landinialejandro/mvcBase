<?php
namespace components;
class Button {
    private $text;
    private $url;
    private $attributes;

    public function __construct($text, $url, $attributes = []) {
        $this->text = $text;
        $this->url = $url;
        $this->attributes = $attributes;
    }

    public function setText(string $text) {
        $this->text = $text;
    }

    public function setUrl(string $url) {
        $this->url = $url;
    }

    public function setAttribute(string $attribute, string $value) {
        if (is_string($attribute) && is_string($value)) {
            $this->attributes[$attribute] = $value;
        } else {
            //throw new Error('Both attribute and value must be valid strings');
        }
    }

    private function renderAttribute(): string {
        $attributeHtml = "";
        foreach ($this->attributes as $attribute => $value) {
            $attributeHtml .= " {$attribute}=\"{$value}\"";
        }
        return $attributeHtml;
    }

    public function render(): string {
        $hrefHtml = "";
        if (!empty($this->url)) {
            $hrefHtml = " href=\"{$this->url}\"";
        }

        return "<a{$hrefHtml}{$this->renderAttribute()}><button>{$this->text}</button></a>";
    }
}
