<?php 
use components\{Button, Card};
require APP_ROOT."/views/inc/header.php"; ?>
<h1 class="title">
    <?php echo $data['title']; ?>
</h1>
<p class="subtitle">MVC Model test</p>
<?php
$btn = new Button("Hola Mundo","",['class'=>["button is-primary","is-medium"]]);
echo $btn->render();
$crd = new Card(array(
    'title' => 'Mi tarjeta',
    'dismiss' => true,
    'toolbox' => array(
        new Button('Maximizar',"",['class'=>['button','delete','is-primary']]),
        new Button('Editar',"")
    )
),"body",array(
    new Button('Salir',""),
    new Button('Guardar',"")
));
echo $crd->render();
?>

<?php require APP_ROOT . "/views/inc/footer.php"; ?>