<?php
$this->breadcrumbs=array(
	'Rutinas Estados Ordenes Trabajos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('/rutinasEstadosOrdenesTrabajo/index&id='.$_GET['id'])),
);
?>

<h1>Nuevo Estado de Rutina</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>