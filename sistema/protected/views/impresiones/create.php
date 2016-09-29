<?php
$this->breadcrumbs=array(
	'Impresiones'=>array('index'),
	'Nueva Impresión',
);

?>

<h1>Nueva Impresión</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
