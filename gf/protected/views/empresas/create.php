<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Listar Empresas', 'url'=>array('index')),
);
?>

<h1>Nueva Empresa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>