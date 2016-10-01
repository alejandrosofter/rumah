<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo'=>array('/ordenesTrabajo'),'Estados'=>array('/ordenesTrabajoEstados'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estados', 'url'=>array('index')),

);
?>

<h1>Nuevo Estado Orden</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'idOrden'=>$_GET['id'],'idUsuario'=>5)); ?>