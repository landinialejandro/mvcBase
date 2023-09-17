<?php

/**
 * Example $btn = new Button( new ComponentsAttributes(
 *              content: "Hola Mundo", 
 *              data:  ["id" => 1, "name" => "MyData"],
 *              url: "index.php", 
 *              attributes: ['class' => ["button is-primary", "is-medium"]]
 *              ));
 *          echo $btn->render();
 */

namespace app\components;

class Button extends Components {

    public function __construct(ComponentsAttributes $attr) {
        parent::__construct($attr);
        $this->setTag('button');
    }
}
