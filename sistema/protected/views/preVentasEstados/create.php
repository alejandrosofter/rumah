<?php
$this->breadcrumbs=array(
	'Pre Ventas Estadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Estados', 'url'=>array('index&id='.$_GET['id'])),
);
?>

<h1>Nuevo estado de EMPRESA</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>