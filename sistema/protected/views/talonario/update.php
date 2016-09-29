<?php
$this->breadcrumbs=array(
	'Talonarios'=>array('index'),
	$model->idTalonario=>array('view','id'=>$model->idTalonario),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Talonarios', 'url'=>array('index','idPuntoVenta'=>$model->idPuntoVenta)),
	array('label'=>'Crear Talonario', 'url'=>array('create')),
);
?>

<h1>Actualizar Talonario <?php echo $model->idTalonario; ?></h1>
<h4>Proximo nro <?php echo $proximo; ?></h4>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>