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

    public function __construct(string $text = "", string $url = "", array $attributes = [], array $data = [], array $class = []) {
        parent::__construct(text: $text,  url: $url, attributes: $attributes, data: $data, class: $class);
    }

    public function render(): string {
        return parent::renderComponent('button');
    }

    public function title($title) {
        parent::setText($title);
    }
}
