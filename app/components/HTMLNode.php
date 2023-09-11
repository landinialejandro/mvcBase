<?php

class HTMLNode {
    private $tag;
    private $attributes = [];
    private $content = '';
    private $children = [];

    public function __construct($tag) {
        $this->tag = $tag;
    }

    public function setAttribute($name, $value) {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function addChild(HTMLNode $child) {
        $this->children[] = $child;
        return $this;
    }

    public function render() {
        $html = "<{$this->tag}";

        foreach ($this->attributes as $name => $value) {
            $html .= " $name=\"$value\"";
        }

        $html .= ">{$this->content}";

        foreach ($this->children as $child) {
            $html .= $child->render();
        }

        $html .= "</{$this->tag}>";

        return $html;
    }
}

// Crear un nodo HTML
$root = new HTMLNode('html');

// Añadir atributos al nodo
$root->setAttribute('lang', 'es');

// Crear un nodo 'head' y añadirlo como hijo del nodo raíz
$head = new HTMLNode('head');
$root->addChild($head);

// Crear un nodo 'title' y añadirlo como hijo del nodo 'head'
$title = new HTMLNode('title');
$title->setContent('Título de la Página');
$head->addChild($title);

// Crear un nodo 'body' y añadirlo como hijo del nodo raíz
$body = new HTMLNode('body');
$root->addChild($body);

// Crear un nodo 'h1' y añadirlo como hijo del nodo 'body'
$h1 = new HTMLNode('h1');
$h1->setContent('Este es un título');
$body->addChild($h1);

// Crear un nodo 'p' y añadirlo como hijo del nodo 'body'
$p = new HTMLNode('p');
$p->setContent('Este es un párrafo.');
$body->addChild($p);

// Renderizar el árbol HTML
echo $root->render();
