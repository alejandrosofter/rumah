<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->idCliente=>array('view','id'=>$model->idCliente),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Clientes', 'url'=>array('create')),
	array('label'=>'Ver Clientes', 'url'=>array('view', 'id'=>$model->idCliente)),
	
);
?>

<h1>Modificar Clientes <?php echo $model->idCliente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>