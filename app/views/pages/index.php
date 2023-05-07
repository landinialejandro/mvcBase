<?php 
require APP_ROOT."/views/inc/header.php"; ?>
<h1 class="title">
    <?php echo $data['title']; ?>
</h1>
<p class="subtitle" >MVC Model test</p>
<?php
$btn = new components\Button("Hola Mundo","",['class'=>["button is-primary","is-medium"]]);
echo $btn->render();
$crd = new components\Card(array(
    'title' => 'Mi tarjeta',
    'dismiss' => true,
    'toolbox' => array(
        new components\Button('Maximizar',""),
        new components\Button('Editar',"")
    )
),"body",array(
    new components\Button('Salir',""),
    new components\Button('salvar',"")
));
echo $crd->render();
?>

<?php require APP_ROOT."/views/inc/footer.php"; ?>