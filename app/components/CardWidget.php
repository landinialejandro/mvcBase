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
        return ((new Card())
            ->addChild((new Div(new ComponentsAttributes(class: ["card-content"])))
                    ->addChild((new Div(new ComponentsAttributes(class: ["level is-mobile"])))
                            ->addChild((new Div(new ComponentsAttributes(class: ["level-item"])))
                                    ->addChild((new Div(new ComponentsAttributes(class: ["is-widget-label"])))
                                            ->addChild((new Components(new ComponentsAttributes(tag: 'h3', class: ["subtitle is-spaced"])))
                                                ->addChild(new Text($this->subTitle)))
                                            ->addChild((new Components(new ComponentsAttributes(tag: 'h1', class: ["title"])))
                                                ->addChild(new Text($this->value)))
                                    )
                            )
                            ->addChild((new Div(new ComponentsAttributes(class: ["level-item has-widget-icon"])))
                                    ->addChild((new Div(new ComponentsAttributes(class: ["is-widget-icon"])))
                                            ->addChild((new Components(new ComponentsAttributes(tag: 'span', class: ["icon has-text-primary is-large"])))
                                                    ->addChild(new Icon(new ComponentsAttributes(class: [$this->icon])))
                                            )
                                    )
                            )
                    )
            )
        )->render();
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
