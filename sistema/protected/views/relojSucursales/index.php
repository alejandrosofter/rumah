<?php
$this->breadcrumbs=array(
	'Reloj Sucursales'=>array('index'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Generar sucursales', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-sucursales-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador de sucursales</h1>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-sucursales-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idSucursal',
		'nombreSucursal',
		'direccionSucursal',
		'telefonoSucursal',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
