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

namespace components;

use components\{Div, Button};

class Card extends Components {
    private $header;
    private $body;
    private $footer;

    public function __construct($header = null, $body, $footer = null) {
        $this->header = $header;
        $this->body = $body;
        $this->footer = $footer;
    }

    public function render() {

        if ($this->header) $html[] = $this->renderHeader();

        if ($this->body) $html[] = $this->renderBody();

        if ($this->footer) $html[] = $this->renderFooter();

        return (new Div(
            class: ['card'],
            content: $this->renderText($html)
        ))->render();
    }

    private function renderHeader() {

        if (isset($this->header['title'])) {
            $html[] = (new Components(content: $this->header['title'], class: ["card-title"]))->renderComponent("h3");
        }

        if (isset($this->header['dismiss'])) {
            $html[] = (new Button(class: ["delete"]))->render();
        }

        if (isset($this->header['toolbox'])) {
            $html[] = (new Div(content: $this->renderText($this->header['toolbox']), class: ["toolbox"]))->render();
        }

        return (new Div(
            class: ['card-header'],
            content: $this->renderText($html)
        ))->render();
    }

    private function renderBody() {

        return (new Div(
            class: ["card-content"],
            content: (new Div(
                content: $this->renderText($this->body)
            ))->render()
        ))->render();
    }

    private function renderFooter() {
        return (new Div(
            class: ['card-footer'],
            content: $this->renderText($this->footer)
        ))->render();
    }
}

