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

    public function __construct($header = null, $body = null, $footer = null) {
        parent::__construct(new ComponentsAttributes()); // Llama al constructor de la clase padre

        $this->header = $header;
        $this->body = $body;
        $this->footer = $footer;
    }

    public function render() {
        if ($this->header) $html[] = $this->renderHeader();
        if ($this->body) $html[] = $this->renderBody();
        if ($this->footer) $html[] = $this->renderFooter();

        return $this->render_(new ComponentsAttributes(
            class: ['card'],
            content: $this->renderText($html)
        ));
    }

    private function renderHeader() {
        if (isset($this->header['title'])) {
            $html[] = (new Components(new ComponentsAttributes(tag: 'h3', content: $this->header['title'], class: ["card-title"])))->renderComponent();
        }

        if (isset($this->header['dismiss']) && $this->header['dismiss'] === true) {
            $html[] = (new Button(new ComponentsAttributes(class: ["delete"])))->render();
        }

        if (isset($this->header['toolbox'])) {
            $html[] = $this->render_(new ComponentsAttributes(content: $this->renderText($this->header['toolbox']), class: ["toolbox"]));
        }

        return $this->render_(new ComponentsAttributes(
            class: ['card-header'],
            content: $this->renderText($html)
        ));
    }

    private function renderBody() {
        return $this->render_(new ComponentsAttributes(
            class: ["card-content"],
            content: $this->render_(new ComponentsAttributes(
                content: $this->renderText($this->body)
            ))
        ));
    }

    private function renderFooter() {
        return $this->render_(new ComponentsAttributes(
            class: ['card-footer'],
            content: $this->renderText($this->footer)
        ));
    }

    private function render_(ComponentsAttributes $attr) {
        return (new Div($attr))->render();
    }
}
