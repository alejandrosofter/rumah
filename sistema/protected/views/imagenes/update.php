<?php
$this->breadcrumbs=array(
	'Imagenes'=>array('index'),
	$model->idImagen=>array('view','id'=>$model->idImagen),
	'Update',
);

$this->menu=array(
	array('label'=>'List Imagenes', 'url'=>array('index')),
	array('label'=>'Create Imagenes', 'url'=>array('create')),
	array('label'=>'View Imagenes', 'url'=>array('view', 'id'=>$model->idImagen)),
	array('label'=>'Manage Imagenes', 'url'=>array('admin')),
);
?>

<h1>Update Imagenes <?php echo $model->idImagen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>