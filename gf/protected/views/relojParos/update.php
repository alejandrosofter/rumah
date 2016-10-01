<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Paros'=>array('admin'),
	$model->idParo=>array('view','id'=>$model->idParo),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Agregar paros', 'url'=>array('create')),
	array('label'=>'Ver paros', 'url'=>array('view', 'id'=>$model->idParo)),
	array('label'=>'Administrar paros', 'url'=>array('admin')),
);
?>

<h1>Actualizar paros <?php echo $model->idParo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>