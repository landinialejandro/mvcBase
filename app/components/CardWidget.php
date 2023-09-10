<?php


namespace app\components;

use app\components\{Components, Div};

class CardWidget extends Card {
    private $subTitle;
    private $value = [];
    private $icon = [];

    public function __construct(string $subTitle = "", string $value = "", string $icon = "") {
        $this->subTitle = $subTitle;
        $this->value = $value;
        $this->icon = $icon;
    }

    public function render(): string {


        $label = (new Components(new ComponentsAttributes(content: $this->subTitle, class: ["subtitle is-spaced"])))->renderComponent("h3");
        $label .= (new Components(new ComponentsAttributes(content: $this->value, class: ["title"])))->renderComponent("h1");

        $label = (new Div(new ComponentsAttributes(content: $this->renderText($label), class: ["is-widget-label"])))->render();
        $label = (new Div(new ComponentsAttributes(content: $this->renderText($label), class: ["level-item"])))->render();

        $icon = (new Components(new ComponentsAttributes(class: [$this->icon])))->renderComponent("i");
        $icon = (new Components(new ComponentsAttributes(content: $icon, class: ["icon has-text-primary is-large"])))->renderComponent("span");
        $icon = (new Div(new ComponentsAttributes(content: $this->renderText($icon), class: ["is-widget-icon"])))->render();
        $icon = (new Div(new ComponentsAttributes(content: $this->renderText($icon), class: ["level-item has-widget-icon"])))->render();

        $html = (new Div(new ComponentsAttributes(content: $label . $icon, class: ["level is-mobile"])))->render();

        $this->header = [];
        $this->body = $html;

        // return parent::render();
        return (new Card(header: [], body: $html))->render();
    }
}

/**
 *            <div class="card-content">
 *              <div class="level is-mobile">
 *                <div class="level-item">
 *                  <div class="is-widget-label">
 *                    <h3 class="subtitle is-spaced">Clients</h3>
 *                    <h1 class="title">512</h1>
 *                  </div>
 *                </div>
 *                <div class="level-item has-widget-icon">
 *                  <div class="is-widget-icon">
 *                    <span class="icon has-text-primary is-large">
 *                      <i class="mdi mdi-account-multiple mdi-48px"></i>
 *                    </span>
 *                  </div>
 *                </div>
 *              </div>
 *            </div>
 */
