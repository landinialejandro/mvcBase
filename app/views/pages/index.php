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
    content: "Hola Mundo!",
    url: URL_ROOT . "/index.php",
    data: ["id" => 1, "name" => "John Doe"],
    class: ["button is-primary", "is-medium"]
);
// $btn->title("hola");
echo $btn->render();



$crd = new Card(
    header: [
        'title' => 'Mi tarjeta',
        'dismiss' => true,
        'toolbox' => [
            (new Button(content: 'Maximizar', class: ['button delete']))->render(),
            (new Button(content: 'Editar'))->render()
        ]
    ],
    body: "body",
    footer: [
        (new Button(content: 'Salir'))->render(),
        (new Button(content: 'Gurdar', class: ['button is-danger']))->render()
    ]
);


echo $crd->render();
?>

<?php require APP_ROOT . "/views/inc/footer.php"; ?>