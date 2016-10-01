<?php
$this->breadcrumbs=array(
	'Juridicciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Juridicciones', 'url'=>array('index')),
	
);
?>

<h1>Create Juridicciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>