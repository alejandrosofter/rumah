<?php
$this->breadcrumbs=array(
	'Cheques'=>array('index'),
	$model->idCheque=>array('view','id'=>$model->idCheque),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Cheques', 'url'=>array('index')),
	array('label'=>'Nuevo Cheque', 'url'=>array('create')),
	array('label'=>'Ver Cheque', 'url'=>array('view', 'id'=>$model->idCheque)),
);
?>

<h1>Actualizar Cheque <?php echo $model->idCheque; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>