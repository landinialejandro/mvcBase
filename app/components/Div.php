<?php

/**
 * Example $div = new Button(
 *              content: "Hola Mundo", 
 *              data:  ["id" => 1, "name" => "MyData"],
 *              url: "index.php", 
 *              attributes: ['class' => ["button is-primary", "is-medium"]]
 *              );
 *          echo $div->render();
 */

namespace app\components;

class Div extends Components {

    public function __construct(ComponentsAttributes $attr = null) {
        parent::__construct($attr);
        $this->setTag('div');
    }

}
