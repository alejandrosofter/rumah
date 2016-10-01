<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/settings'),'Valores Moneda'=>array('/valorMoneda'),
	'Nuevo Valor'
);

$this->menu=array(
	array('label'=>'Listar Valor Moneda', 'url'=>array('index')),
	array('label'=>'Nuevo Valor'),
);
?>

<h1>Nuevo Valor de Moneda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>