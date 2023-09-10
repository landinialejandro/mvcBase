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
    private $header;
    private $body;
    private $footer;

    public function __construct($header = null, $body = null, $footer = null) {
        $this->setHeader($header);
        $this->setBody($body);
        $this->setFooter($footer);
    }

    public function setHeader($text) {
        $this->header = $text;
    }
    public function setBody($text) {
        $this->body = $text;
    }
    public function setFooter($text) {
        $this->footer = $text;
    }

    public function render() {

        if ($this->header) $html[] = $this->renderHeader();

        if ($this->body) $html[] = $this->renderBody();

        if ($this->footer) $html[] = $this->renderFooter();

        return (new Div(new ComponentsAttributes(
            class: ['card'],
            content: $this->renderText($html)
        )))->render();
    }

    private function renderHeader() {

        if (isset($this->header['title'])) {
            $html[] = (new Components(new ComponentsAttributes(content: $this->header['title'], class: ["card-title"])))->renderComponent("h3");

        }

        if (isset($this->header['dismiss'])) {
            $html[] = (new Button(new ComponentsAttributes(class: ["delete"])))->render();
        }

        if (isset($this->header['toolbox'])) {
            $html[] = (new Div(new ComponentsAttributes(content: $this->renderText($this->header['toolbox']), class: ["toolbox"])))->render();
        }

        return (new Div( new ComponentsAttributes(
            class: ['card-header'],
            content: $this->renderText($html)
        )))->render();
    }

    private function renderBody() {

        return (new Div( new ComponentsAttributes(
            class: ["card-content"],
            content: (new Div(new ComponentsAttributes(
                content: $this->renderText($this->body)
            )))->render()
        )))->render();
    }

    private function renderFooter() {
        return (new Div(new ComponentsAttributes(
            class: ['card-footer'],
            content: $this->renderText($this->footer)
        )))->render();
    }
}
