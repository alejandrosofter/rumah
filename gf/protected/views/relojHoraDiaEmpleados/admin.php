<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Horas dia empados',
);

$this->menu=array(
	array('label'=>'Agregar horas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-hora-dia-empleados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<!-- manejador de dia horas empleado -->

<h1>HORAS DÍA EMPLEADOS</h1>



<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-hora-dia-empleados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idHoraDiaEmpleado',
		//'idEmpleado',
		'fechaDia',
		//'estadoFecha',
		//'comentario',
		'entradaUno',
		'salidaUno',
		'entradaDos',
		'salidaDos',
		'entradaTres',
		'salidaTres',
		//'modificacion',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
