<?php


namespace app\components;

class CardWidget extends Components {
    private $subTitle;
    private $value = [];
    private $icon = [];

    public function __construct(string $subTitle = "", string $value = "", string $icon = "") {
        $this->subTitle = $subTitle;
        $this->value = $value;
        $this->icon = $icon;
    }

    public function render(): string {

        $this->setContent($this->subTitle);
        $this->setClassAttributes(["subtitle is-spaced"]);
        $this->addHtml($this->renderComponent("h3"), true);

        $this->setContent($this->value);
        $this->setClassAttributes(["title"]);
        $this->addHtml($this->renderComponent("h1"));

        // $label = (new Components(content: $this->subTitle, class: ["subtitle is-spaced"]))->renderComponent("h3");
        // $label .= (new Components(content: $this->value, class: ["title"]))->renderComponent("h1");
        $text = $this->renderHtml();
        $label = (new Div(content: $this->renderText($text), class: ["is-widget-label"]))->render();
        $label = (new Div(content: $this->renderText($label), class: ["level-item"]))->render();

        $icon = (new Components(class: [$this->icon]))->renderComponent("i");
        $icon = (new Components(content: $icon, class: ["icon has-text-primary is-large"]))->renderComponent("span");
        $icon = (new Div(content: $this->renderText($icon), class: ["is-widget-icon"]))->render();
        $icon = (new Div(content: $this->renderText($icon), class: ["level-item has-widget-icon"]))->render();

        $html = (new Div(content: $label . $icon, class: ["level is-mobile"]))->render();

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
