<?php
$this->breadcrumbs=array(
	'Valor Moneda Tiposes'=>array('index'),
	$model->idValorMonedaTipo=>array('view','id'=>$model->idValorMonedaTipo),
	'Update',
);

$this->menu=array(
	array('label'=>'List ValorMonedaTipos', 'url'=>array('index')),
	array('label'=>'Create ValorMonedaTipos', 'url'=>array('create')),
	array('label'=>'View ValorMonedaTipos', 'url'=>array('view', 'id'=>$model->idValorMonedaTipo)),
	array('label'=>'Manage ValorMonedaTipos', 'url'=>array('admin')),
);
?>

<h1>Update ValorMonedaTipos <?php echo $model->idValorMonedaTipo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>