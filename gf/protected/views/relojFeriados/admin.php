<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Feriados',
);

$this->menu=array(
	array('label'=>'Agregar feriado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-feriados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>FERIADOS</h1>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-feriados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idFeriado',
		'fechaFeriado',
		'comentarioFeriado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
