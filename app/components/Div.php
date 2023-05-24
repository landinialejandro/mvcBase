<?php

/**
 * Example $div = new Button(
 *              text: "Hola Mundo", 
 *              data:  ["id" => 1, "name" => "MyData"],
 *              url: "index.php", 
 *              attributes: ['class' => ["button is-primary", "is-medium"]]
 *              );
 *          echo $div->render();
 */

namespace components;

class Div extends Components {

    public function __construct(string $text = "", string $url = "", array $attributes = [], array $data = [], array $class = []) {
        parent::__construct(text: $text,  url: $url, attributes: $attributes, data: $data, class: $class);
    }

    public function render(): string {
        return parent::renderComponent('div');
    }

}
