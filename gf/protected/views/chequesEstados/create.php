<?php
$this->breadcrumbs=array(
	'Cheques',
);

$this->menu=array(
	array('label'=>'Nuevo Cheque', 'url'=>array('create')),
);
?>

<h1>Nuevo Estado de Cheque</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>