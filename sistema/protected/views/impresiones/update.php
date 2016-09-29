<?php
$this->breadcrumbs=array(
	'Impresiones'=>array('index'),
	$model->idImpresion=>array('view','id'=>$model->idImpresion),
	'ACtualizar',
);

$this->menu=array(
	array('label'=>'Listar Impresiones', 'url'=>array('index')),
	array('label'=>'Nueva Impresión', 'url'=>array('create')),
	array('label'=>'Ver Impresión', 'url'=>array('view', 'id'=>$model->idImpresion)),
);
?>

<h1>Actualizar Impresión <?php echo $model->idImpresion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>