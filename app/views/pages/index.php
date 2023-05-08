<?php

use components\{Button, Card};

require APP_ROOT . "/views/inc/header.php";
?>
<h1 class="title">
    <?php echo $data['title']; ?>
</h1>
<p class="subtitle">MVC Model test</p>
<?php


$btn = new Button(
    text: "Hola Mundo",
    url: URL_ROOT . "/index.php",
    data: ["id" => 1, "name" => "Ale"],
    attributes: ['class' => ["button is-primary", "is-medium"]]
);
echo $btn->render();

$crd = new Card(
    header: [
        'title' => 'Mi tarjeta',
        'dismiss' => true,
        'toolbox' => [
            new Button('Maximizar', ""),
            new Button('Editar', "")
        ]
    ],
    body: "body",
    footer: [
        new Button('Salir', ""),
        new Button('salvar', "")
    ]
);

echo $crd->render();
?>

<?php require APP_ROOT . "/views/inc/footer.php"; ?>