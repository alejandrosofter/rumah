<?php
$this->breadcrumbs=array(
	'Rutinas Impresiones'=>array('index'),
	$model->idRutinaImpresion=>array('view','id'=>$model->idRutinaImpresion),
	'ACtualizar',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('index&id='.$_GET['id'])),
);
?>

<h1>Actualizar <?php echo $model->idRutinaImpresion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>