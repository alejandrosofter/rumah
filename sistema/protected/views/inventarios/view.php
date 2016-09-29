<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),
	'Ver'
);

$this->menu=array(
	array('label'=>'Listar Inventarios', 'url'=>array('index')),
	array('label'=>'Crear Inventario', 'url'=>array('create')),
	array('label'=>'Actualizar Inventario', 'url'=>array('update', 'id'=>$model->idInventario)),
	array('label'=>'Quitar Inventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInventario),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Inventario #<?php echo $model->idInventario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idInventario',
		'fechaInventario',
		'descripcionInventario',
		'esPredeterminado',
	),
)); ?>
<br>
<h3><? echo CHtml::link("Cargar Productos",Yii::app()->createUrl("/inventariosProductos/create&idInventario=".$model->idInventario)); ?> </h3>
