<?php
$this->breadcrumbs=array(
    'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Modelo empleado',
);

$this->menu=array(
	array('label'=>'Agregar modelo de empleado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-modelo-empleado-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Modelo de empleado</h1>


<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-modelo-empleado-grid',
	'dataProvider'=>$model->buscarModeloEmpleado($idCategoria),
	//'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'idCategoria',
		'diaInicio',
		'diaFin',
		'nroDiaInicio',
		'nroDiaFin',
		array(
		
			'class'=>'CButtonColumn',
		),
	),
)); ?>
