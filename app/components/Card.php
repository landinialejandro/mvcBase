<?php

namespace components;

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
        $html = '<div class="card">';

        if ($this->header) {
            $html .= $this->renderHeader();
        }

        if ($this->body) {
            $html .= $this->renderBody();
        }

        if ($this->footer) {
            $html .= $this->renderFooter();
        }

        $html .= '</div>';

        return $html;
    }

    private function renderHeader() {
        $html = '<header class="card-header">';

        if (isset($this->header['title'])) {
            $html .= '<h3 class="card-title">' . $this->header['title'] . '</h3>';
        }

        if (isset($this->header['dismiss'])) {
            $html .= '<button class="delete"></button>';
        }

        if (isset($this->header['toolbox'])) {
            $html .= '<div class="toolbox">';
            foreach ($this->header['toolbox'] as $tool) {
                $html .= $tool->render();
            }
            $html .= '</div>';
        }

        $html .= '</header>';

        return $html;
    }

    private function renderBody() {
        $html = '<div class="card-content"><div class="content">' . $this->body . '</div></div>';
        return $html;
    }

    private function renderFooter() {
        $html = '<footer class="card-footer">';

        foreach ($this->footer as $button) {
            $html .= $button->render();
        }

        $html .= '</footer>';

        return $html;
    }
}
