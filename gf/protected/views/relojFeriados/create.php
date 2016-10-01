<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Feriados'=>array('admin'),
	'Agregar feriado',
);

$this->menu=array(
	array('label'=>'Volver a feriados', 'url'=>array('admin')),
);
?>

<h1>Agregar feriado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>