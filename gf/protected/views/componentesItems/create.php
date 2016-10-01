<?php
$this->breadcrumbs=array(
	'Componentes'=>array('/componentes/index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Componentes', 'url'=>array('/componentes/index')),
);
?>

<h1>Nuevo Item del Componente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>