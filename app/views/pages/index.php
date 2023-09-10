<?php

namespace app\components;

require APP_ROOT . "/app/views/inc/header.php";
?>
<h1 class="title">
    <?php echo $data['title']; ?>
</h1>
<p class="subtitle">MVC Model test</p>
<?php

$btn = new Button(new ComponentsAttributes(
    content: "Hola Mundo!!",
    url: URL_ROOT . "/index.php",
    data: ["id" => 1, "name" => "John Doe"],
    class: ["button is-primary", "is-medium"]
));

echo $btn->render();

$crd = new Card(
    header: [
        'title' => 'Mi tarjeta',
        'dismiss' => true,
        'toolbox' => [
            (new Button(new ComponentsAttributes(content: 'Maximizar', class: ['button delete'])))->render(),
            (new Button(new ComponentsAttributes(content: 'Editar')))->render()
        ]
    ],
    body: "body Content",
    footer: [
        (new Button(new ComponentsAttributes(content: 'Salir')))->render(),
        (new Button(new ComponentsAttributes(content: 'Gurdar', class: ['button is-danger'])))->render()
    ]
);


echo $crd->render();

$crdWidget = new CardWidget("Empleados","1000","mdi mdi-finance mdi-48px");
echo $crdWidget->render();

?>

<?php require APP_ROOT . "/app/views/inc/footer.php"; ?>