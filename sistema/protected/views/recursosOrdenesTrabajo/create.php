<?php
$this->breadcrumbs=array(
	'Recursos Ordenes Trabajos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Recursos', 'url'=>array('index')),
);
?>

<h1>Nuevo Recurso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>