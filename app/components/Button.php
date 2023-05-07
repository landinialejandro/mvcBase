<?php
/**
 * Example $btn = new components\Button("Hola Mundo","",['class'=>["button is-primary","is-medium"]]);
 */
namespace components;

class Button extends Components {

    public function __construct(string $text, string $url, array $attributes = []) {
        $this->setText($text);
        $this->setAttributes($attributes);
        $this->setAttribute('href', $url);
    }

    public function render(): string {
        return "<button{$this->getAttributes()}>{$this->getText()}</button>";
    }
}
