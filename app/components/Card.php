<?php

namespace components;
use components\{Div, Button};

class Card extends Components {
    private $header;
    private $body;
    private $footer;

    public function __construct($header, $body, $footer = null) {
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
            text: $this->renderText($html)
        ))->render();
    }

    private function renderHeader() {

        if (isset($this->header['title'])) {
            $html[] = (new Components(text: $this->header['title'], class: ["card-title"]))->renderComponent("h3");
        }

        if (isset($this->header['dismiss'])) {
            $html[] = (new Button(class: ["delete"]))->render();
        }

        if (isset($this->header['toolbox'])) {
            $html[] = (new Div(text: $this->renderText($this->header['toolbox']), class: ["toolbox"]))->render();
        }

        return (new Div(
            class: ['card-header'],
            text: $this->renderText($html)
        ))->render();
    }

    private function renderBody() {
        return (new Div(
            class: ["card-content"],
            text: (new Div(
                class: ['content'],
                text: $this->renderText($this->body)
            )
            )->render()
        )
        )->render();
    }

    private function renderFooter() {
        return (new Div(
            class: ['card-footer'],
            text: $this->renderText($this->footer)
        ))->render();
    }
}
