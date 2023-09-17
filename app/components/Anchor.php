<?php

namespace app\components;

class Anchor extends Components {

    public function __construct(ComponentsAttributes $attr = null) {
        parent::__construct($attr);
        $this->setTag('a');
    }

}
