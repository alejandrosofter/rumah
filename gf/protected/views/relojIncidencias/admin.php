<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Incidencias',
);

$this->menu=array(
	array('label'=>'Agregar incidencia', 'url'=>array('create')),
	array('label'=>'Ir a motivos', 'url'=>array('RelojMotivos/admin')),
	array('label'=>'Agregar motivos', 'url'=>array('RelojMotivos/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-incidencias-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador de incidencias</h1>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-incidencias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombreEmpleado',
		'fechaInicio',
		'fechaFin',
		'nombreMotivo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
