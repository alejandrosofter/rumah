<?php
$this->breadcrumbs=array(
	'Componentes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Componentes', 'url'=>array('index')),
	array('label'=>'Manage Componentes', 'url'=>array('admin')),
);
?>

<h1>Create Componentes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>