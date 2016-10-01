<?php
$this->breadcrumbs=array(
	'Cheques'=>array('index'),
	$model->idCheque,
);

$this->menu=array(
	array('label'=>'Listar Cheques', 'url'=>array('index')),
	array('label'=>'Nuevo Cheques', 'url'=>array('create')),
	array('label'=>'Actualizar Cheques', 'url'=>array('update', 'id'=>$model->idCheque)),
	array('label'=>'Quitar Cheques', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCheque),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver Cheque #<?php echo $model->idCheque; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'fechaEmision',
		'fechaCobro',
		'idCliente',
		'paguese',
		'importe',
		'esCruzado',
		'idCuenta',
		'numeroCheque',
	),
)); ?>
