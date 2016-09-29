<?php
$this->breadcrumbs=array(
	'Cheques'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Cheques', 'url'=>array('index')),
);
?>

<h1>Nuevo Cheque</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>