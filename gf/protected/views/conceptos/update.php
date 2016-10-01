<?php
$this->breadcrumbs=array(
	'Conceptoses'=>array('index'),
	$model->idConcepto=>array('view','id'=>$model->idConcepto),
	'Update',
);

$this->menu=array(
	array('label'=>'List Conceptos', 'url'=>array('index')),
	array('label'=>'Create Conceptos', 'url'=>array('create')),
	array('label'=>'View Conceptos', 'url'=>array('view', 'id'=>$model->idConcepto)),
	array('label'=>'Manage Conceptos', 'url'=>array('admin')),
);
?>

<h1>Update Conceptos <?php echo $model->idConcepto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>