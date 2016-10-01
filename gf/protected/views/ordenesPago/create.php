<?php
$this->breadcrumbs=array(
	'Ordenes de Pago'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Pagos', 'url'=>array('index')),
);
?>

<h1>Nueva Orden de Pago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,array('width'=>"100%")));

?>

