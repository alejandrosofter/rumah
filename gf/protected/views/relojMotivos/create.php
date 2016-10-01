<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Motivos'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a motivos', 'url'=>array('admin')),
);
?>

<h1>Crear motivos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>