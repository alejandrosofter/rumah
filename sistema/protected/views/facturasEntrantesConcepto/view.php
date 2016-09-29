<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Conceptos'=>array('index'),
	$model->idFacturaConcepto,
);

$this->menu=array(
	array('label'=>'List FacturasEntrantesConcepto', 'url'=>array('index')),
	array('label'=>'Create FacturasEntrantesConcepto', 'url'=>array('create')),
	array('label'=>'Update FacturasEntrantesConcepto', 'url'=>array('update', 'id'=>$model->idFacturaConcepto)),
	array('label'=>'Delete FacturasEntrantesConcepto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaConcepto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FacturasEntrantesConcepto', 'url'=>array('admin')),
);
?>

<h1>View FacturasEntrantesConcepto #<?php echo $model->idFacturaConcepto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaConcepto',
		'idFacturaEntrante',
		'idConcepto',
	),
)); ?>
