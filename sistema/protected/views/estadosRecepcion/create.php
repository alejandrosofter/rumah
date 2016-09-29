<?php
$this->breadcrumbs=array(
	'Estados Recepcions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EstadosRecepcion', 'url'=>array('index')),
	array('label'=>'Manage EstadosRecepcion', 'url'=>array('admin')),
);
?>

<h1>Create EstadosRecepcion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>