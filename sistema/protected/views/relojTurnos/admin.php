<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Turnos',
);

$this->menu=array(
	array('label'=>'Agregar turnos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-turnos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>TURNOS</h1>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-turnos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idTurno',
		'idTipoTurno',
		'ingresoInicio',
		'salidaInicio',
		'ingresoRegreso',
		'salidaRegreso',
		/*
		'semana',
		'diaNombre',
		'horas',
		'horas50',
		'horas100',
		'horas50Noct',
		'horas100Noct',
		'idCategoria',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
