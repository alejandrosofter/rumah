<?php
$this->breadcrumbs=array(
	'Facturas Salientes Respuesta Electronicas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FacturasSalientesRespuestaElectronica', 'url'=>array('index')),
	array('label'=>'Manage FacturasSalientesRespuestaElectronica', 'url'=>array('admin')),
);
?>

<h1>Create FacturasSalientesRespuestaElectronica</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>