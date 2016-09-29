<?php
$this->breadcrumbs=array(
	'Contratos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Nuevo Contrato', 'url'=>array('create')),
	array('label'=>'Listar Contratos', 'url'=>array('index')),
);
?>

<h1>Nuevo Contrato</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>