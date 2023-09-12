<?php


namespace app\components;

use app\components\{Components, Div};

class CardWidget extends Card {
    private $subTitle;
    private $value = [];
    private $icon = [];

    public function __construct(string $subTitle = "", string $value = "", string $icon = "") {
        parent::__construct(new ComponentsAttributes());
        $this->subTitle = $subTitle;
        $this->value = $value;
        $this->icon = $icon;
    }

    public function render(): string {


        $level = new Div(new ComponentsAttributes(class: ["level is-mobile"]));

        $label = new Div(new ComponentsAttributes(class: ["level-item"]));
        $lw = new Div(new ComponentsAttributes(class: ["is-widget-label"]));
        $lw->addChild(new Components(new ComponentsAttributes(tag: 'h3', content: $this->subTitle, class: ["subtitle is-spaced"])));
        $lw->addChild(new Components(new ComponentsAttributes(tag: 'h1', content: $this->value, class: ["title"])));

        $label->addChild($lw);

        $icon = new Div(new ComponentsAttributes(class: ["level-item has-widget-icon"]));
        $iw = new Div(new ComponentsAttributes(class: ["is-widget-icon"]));
        $iw->addChild((new Components(new ComponentsAttributes(tag: 'span', class: ["icon has-text-primary is-large"])))
            ->addChild(new Components(new ComponentsAttributes(tag: 'i', class: [$this->icon]))));

        $icon->addChild($iw);
        $level->addChild($label);
        $level->addChild($icon);
        //todo: agregar childs al redenr del card
        // $card = new Card(header: [], body: $level->render());
        $card = new Card();
        $card->addChild($level);

        return $card->render();
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

