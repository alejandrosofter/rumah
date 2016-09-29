<?php
$this->breadcrumbs=array(
	'Alertas'=>array('index'),
	'Nueva Alerta',
);


?>

<h1>Nueva Alerta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>