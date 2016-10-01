<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/settings'),'Valores Moneda'=>array('/valorMoneda'),
	'Actualizar'
);

$this->menu=array(
	array('label'=>'Listar Valores', 'url'=>array('index')),
	array('label'=>'Nuevo Valor', 'url'=>array('create')),
	array('label'=>'Ver Valores de Moneda', 'url'=>array('view', 'id'=>$model->idValorMoneda)),
);
?>

<h1>Update ValorMoneda <?php echo $model->idValorMoneda; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>