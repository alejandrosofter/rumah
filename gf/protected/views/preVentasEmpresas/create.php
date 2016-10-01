<?php
$this->breadcrumbs=array(
	'Pre Ventas Empresases'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Empresas', 'url'=>array('index')),
);
?>

<h1>Nueva Empresa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>