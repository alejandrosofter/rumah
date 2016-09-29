<?php
$this->breadcrumbs=array(
	'Permisos'=>array('/rights'),
	'Panel de Inicio para '.$model->rol,
);
?>

<h1>Panel de inicio para <?php echo $model->rol?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>