<?php

/**
 *   $crd = new Card(
 *     header: [
 *         'title' => 'Mi tarjeta',
 *         'dismiss' => true,
 *         'toolbox' => [
 *             (new Button(content: 'Maximizar', class: ['button delete']))->render(),
 *             (new Button(content: 'Editar'))->render()
 *         ]
 *     ],
 *     body: "Body Content",
 *     footer: [
 *         (new Button(content: 'Salir'))->render(),
 *         (new Button(content: 'Gurdar', class: ['button is-danger']))->render()
 *     ]
 *   );
 */

namespace app\components;

class Card extends Components {
    protected $header;
    protected $footer;
    public $title;
    // public $dismiss;

    public function __construct() {
        parent::__construct(new ComponentsAttributes(tag: 'div', class: ["card"])); // Llama al constructor de la clase padre
    }

    public function addCardHeader(string $title = "", bool $dismiss = false, Components $toolbox = null): Components {

        $cardHeader = new Components(new ComponentsAttributes(tag: 'header', class: ["card-header"]));

        if ($title) {
            $cardHeader->addChild(new Components(new ComponentsAttributes(
                tag: 'p',
                content: $title,
                class: ["card-header-title"]
            )));
        }

        $dismiss && $cardHeader->addChild(new Button(new ComponentsAttributes(class: ["delete"])));

        if (is_null($toolbox)) {
            //todo: añadir código para toolbox
        }
        return $cardHeader;
    }
    public function addCardContent(Components $content = null): Components {
        $cardContent = new Div(new ComponentsAttributes(class: ["card-content"]));
        return $cardContent->addChild($content);
    }

    private function renderFooter() {
        return $this->render(new ComponentsAttributes(
            class: ['card-footer'],
            content: $this->renderText($this->footer)
        ));
    }
}

/* 
<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Forms
        </p>
    </header>
    <div class="card-content">
        <div class="field is-horizontal">
            <div class="field-label">
                <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-primary">
                                <span>Submit</span>
                            </button>
                        </div>
                        <div class="control">
                            <button type="button" class="button is-primary is-outlined">
                                <span>Reset</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> */