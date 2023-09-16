<?php

/**
 * Example $i = new Icon( new ComponentsAttributes(
 *              content: "Hola Mundo", 
 *              data:  ["id" => 1, "name" => "MyData"],
 *              attributes: ['class' => ["button is-primary", "is-medium"]]
 *              ));
 *          echo $i->render();
 */

namespace app\components;

class Icon extends Components {

    public function __construct(ComponentsAttributes $attr) {
        parent::__construct($attr);
        $this->setTag('i');
    }
}
