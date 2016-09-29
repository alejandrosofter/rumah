<?php
$this->breadcrumbs=array(
	'Recursos Tipo Recursos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Recursos', 'url'=>array('index')),
);
?>

<h1>Nuevo Tipo de Recurso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>