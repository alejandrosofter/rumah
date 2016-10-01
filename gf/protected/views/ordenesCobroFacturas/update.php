<?php
$this->breadcrumbs=array(
	'Ordenes Cobro Facturas'=>array('index'),
	$model->idOrdenCobroFacturas=>array('view','id'=>$model->idOrdenCobroFacturas),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar OrdenesCobroFacturas', 'url'=>array('index')),
	array('label'=>'Crear OrdenesCobroFacturas', 'url'=>array('create')),
	array('label'=>'Ver OrdenesCobroFacturas', 'url'=>array('view', 'id'=>$model->idOrdenCobroFacturas)),
	
);
?>

<h1>Actualizar Orden de Cobro Facturas <?php echo $model->idOrdenCobroFacturas; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>