<?php
$this->breadcrumbs=array(
	'Valor Moneda Tiposes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Tipos', 'url'=>array('index')),
	array('label'=>'Nuevo Tipo'),
);
?>

<h1>Nuevo Tipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>