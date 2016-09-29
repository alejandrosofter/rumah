<?php
$this->breadcrumbs=array(
	'Talonarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Talonarios', 'url'=>array('index','idPuntoVenta'=>$model->idPuntoVenta)),
	array('label'=>'Puntos de Venta', 'url'=>array('/puntoVenta')),
);
?>

<h1>Crear Talonario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>