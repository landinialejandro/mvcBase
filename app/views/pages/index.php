<?php

namespace app\components;

require APP_ROOT . "/app/views/inc/header.php";
?>
<h1 class="title">
    <?php echo $data['title']; ?>
</h1>
<p class="subtitle">MVC Model test</p>
<?php
$btn = (new Button(
    new ComponentsAttributes(
        url: URL_ROOT . "/index.php",
        data: ["id" => 1, "name" => "John Doe"],
        class: ["button is-primary", "is-medium"],
        wrapContent: true
    )
))
    ->addChild(new Icon(new ComponentsAttributes(class: ["mdi mdi-upload"])))
    ->addChild(new Text("Hola Mundo!!"));

$btn1 = new Button(new ComponentsAttributes(
    class: ["button is-success"],
));
$btn1->addChild(new Text("save"));

$crd1 = new Card();
$crd1->addCardHeader("Mi titulo", true);
$crd1->addCardFooter($btn1);
$crd1->addCardContent(new Text("Hola"));

$text = new Components(new ComponentsAttributes(content: "texto como objeto"));

$crdWidget = new CardWidget("Empleados", "1000", "mdi mdi-finance mdi-48px");
$div = new Div();
$div->addChild($btn);
// $div->addChild($btn1);
$div->addChild($crd1);
$div->addChild($text);
$div->addChild($crdWidget);
echo $div->render();

?>

<?php require APP_ROOT . "/app/views/inc/footer.php"; ?>