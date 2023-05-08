<?php

/**
 * Example $btn = new Button(
*              text: "Hola Mundo", 
*              data:  ["id" => 1, "name" => "MyData"],
*              url: "index.php", 
*              attributes: ['class' => ["button is-primary", "is-medium"]]
*              );
*          echo $btn->render();
 */

namespace components;

class Button extends Components {

    public function __construct(string $text, string $url = "", array $attributes = [], array $data = []) {
        $this->setText($text);
        !empty(trim($url)) && $this->setAttribute('href', $url);
        $this->setAttributes($attributes);
        $this->setDataAttributes($data);
    }

    public function render(): string {
        return "<button{$this->getAttributes()}>{$this->getText()}</button>";
    }
}
