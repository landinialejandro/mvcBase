<?php 
require APP_ROOT."/views/inc/header.php"; ?>
<h1 class="title">
    <?php echo $data['title']; ?>
</h1>
<p class="subtitle" >MVC Model test</p>
<?php
$btn = new components\Button("Hola Mundo","index.php");
echo $btn->render();
?>

<?php require APP_ROOT."/views/inc/footer.php"; ?>