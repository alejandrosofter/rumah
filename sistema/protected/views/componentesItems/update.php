<?php
$this->breadcrumbs=array(
	'Componentes Items'=>array('index'),
	$model->idItemComponente=>array('view','id'=>$model->idItemComponente),
	'Update',
);

$this->menu=array(
	array('label'=>'List ComponentesItems', 'url'=>array('index')),
	array('label'=>'Create ComponentesItems', 'url'=>array('create')),
	array('label'=>'View ComponentesItems', 'url'=>array('view', 'id'=>$model->idItemComponente)),
	array('label'=>'Manage ComponentesItems', 'url'=>array('admin')),
);
?>

<h1>Update ComponentesItems <?php echo $model->idItemComponente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>