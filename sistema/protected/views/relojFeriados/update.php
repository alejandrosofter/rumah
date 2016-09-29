<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Feriados'=>array('admin'),
	$model->idFeriado=>array('view','id'=>$model->idFeriado),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Agregar feriados', 'url'=>array('create')),
	array('label'=>'Ver feriados', 'url'=>array('view', 'id'=>$model->idFeriado)),
	array('label'=>'Administrar feriados', 'url'=>array('admin')),
);
?>

<h1>Actualizar feriados <?php echo $model->idFeriado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>