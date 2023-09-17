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
    private Components $cardContent;
    private Components $cardHeader;
    private Components $cardFooter;

    public function __construct() {
        parent::__construct(new ComponentsAttributes(tag: 'div', class: ["card"])); // Llama al constructor de la clase padre
        $this->cardContent = new Div(new ComponentsAttributes(class: ["card-content"]));
        $this->cardHeader = new Components(new ComponentsAttributes(tag: 'header', class: ["card-header"]));
        $this->cardFooter = new Div(new ComponentsAttributes(tag: "footer", class: ["card-footer"]));

        $this->addChild($this->cardHeader);
        $this->addChild($this->cardContent);
        $this->addChild($this->cardFooter);
    }

    public function addCardHeader(string $title = "", bool $dismiss = false, Components $toolbox = null): Components {

        if ($title) {
            $this->cardHeader->addChild((new Components(new ComponentsAttributes(
                tag: 'p',
                class: ["card-header-title"]
            )))->addChild(new Text($title)));
        }

        $dismiss && $this->cardHeader->addChild(new button(new ComponentsAttributes(class: ["card-header-icon delete"], attributes: ["aria-label" => "more options"])));

        if (is_null($toolbox)) {
            //todo: añadir código para toolbox
        }
        return $this;
    }
    public function addCardContent(Components $content = null): Components {
        $this->cardContent->addChild($content);
        return $this;
    }

    public function addCardFooter(Components $content = null): Components {
        $this->cardFooter->addChild($content);
        return $this;
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