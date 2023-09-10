<?php

/**
 * Example $btn = new Button(
 *              content: "Hola Mundo", 
 *              data:  ["id" => 1, "name" => "MyData"],
 *              url: "index.php", 
 *              attributes: ['class' => ["button is-primary", "is-medium"]]
 *              );
 *          echo $btn->render();
 */

namespace app\components;

class Button extends Components {

    public function __construct(ComponentsAttributes $attr) {
        parent::__construct($attr);
    }

    public function render(): string {
        return parent::renderComponent('button');
    }

    public function title($title) {
        parent::setContent($title);
    }
}
