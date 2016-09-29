<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Relojes'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Volver a relojes', 'url'=>array('admin')),
);
?>

<h1>Generar relojes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>