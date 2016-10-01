<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Horas empleados',
);

$this->menu=array(
	array('label'=>'Agregar hora empleado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-hora-empleados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<!-- Manage Reloj Hora Empleadoses -->

<h1>HORAS EMPLEADOS</h1>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-hora-empleados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idHora',
		'idEmpleado',
		'justificado',
		'estadoHora',
		'fechaHoraTrabajo',
		'entradaSalida',
		/*
		'comentarioHora',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
