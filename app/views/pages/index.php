<?php

namespace components;

require APP_ROOT . "/views/inc/header.php";
?>
<h1 class="title">
    <?php echo $data['title']; ?>
</h1>
<p class="subtitle">MVC Model test</p>
<?php

$btn = new Button(
    text: "Hola Mundo!",
    url: URL_ROOT . "/index.php",
    data: ["id" => 1, "name" => "Ale"],
    class: ["button is-primary", "is-medium"]
);
// $btn->title("hola");
echo $btn->render();



$crd = new Card(
    header: [
        'title' => 'Mi tarjeta',
        'dismiss' => true,
        'toolbox' => [
            (new Button(text: 'Maximizar', class: ['button delete']))->render(),
            (new Button(text: 'Editar'))->render()
        ]
    ],
    body: "body",
    footer: [
        (new Button(text: 'Salir'))->render(),
        (new Button(text: 'Gurdar', class: ['button is-danger']))->render()
    ]
);


echo $crd->render();
?>

<?php require APP_ROOT . "/views/inc/footer.php"; ?>