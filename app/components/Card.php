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
    protected $body;
    protected $footer;
    public $title;
    // public $dismiss;

    public function __construct() {
        parent::__construct(new ComponentsAttributes(tag: 'div', class: ["card"])); // Llama al constructor de la clase padre
    }


    private function addHeaderCard(string $title = "", bool $dismiss = false, Components $toolbox = null) {

        $header = new Components(new ComponentsAttributes( tag:'header', class: ["card-content"]));

        if ($title) {
            $header->addChild(new Components(new ComponentsAttributes(tag: 'p', content: $title, class: ["card-header-title"])));
        }

        if ($dismiss === true) {
            $header->addChild(new Button(new ComponentsAttributes(class: ["delete"])));
        }

        if (isset($this->header['toolbox'])) {
            //$this->addChild(new ComponentsAttributes(content: $this->renderText($this->header['toolbox']), class: ["toolbox"]));
        }

        // return $this->render(new ComponentsAttributes(
        //     class: ['card-header'],
        //     content: $this->renderText($html)
        // ));
    }

    private function renderBody() {
        return $this->render(new ComponentsAttributes(
            class: ["card-content"],
            content: $this->render(new ComponentsAttributes(
                content: $this->renderText($this->body)
            ))
        ));
    }

    private function renderFooter() {
        return $this->render(new ComponentsAttributes(
            class: ['card-footer'],
            content: $this->renderText($this->footer)
        ));
    }
}

?>
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
</div>