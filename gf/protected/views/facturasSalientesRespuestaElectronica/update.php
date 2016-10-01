<?php
$this->breadcrumbs=array(
	'Facturas Salientes Respuesta Electronicas'=>array('index'),
	$model->idFacturaRespuesta=>array('view','id'=>$model->idFacturaRespuesta),
	'Update',
);

$this->menu=array(
	array('label'=>'List FacturasSalientesRespuestaElectronica', 'url'=>array('index')),
	array('label'=>'Create FacturasSalientesRespuestaElectronica', 'url'=>array('create')),
	array('label'=>'View FacturasSalientesRespuestaElectronica', 'url'=>array('view', 'id'=>$model->idFacturaRespuesta)),
	array('label'=>'Manage FacturasSalientesRespuestaElectronica', 'url'=>array('admin')),
);
?>

<h1>Update FacturasSalientesRespuestaElectronica <?php echo $model->idFacturaRespuesta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>