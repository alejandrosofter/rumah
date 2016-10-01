<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	
);
?>

<h1>Crear Clientes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>