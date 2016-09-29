<?php
$this->breadcrumbs=array(
	'Categorias de reloj'=>array('index'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar categoria de reloj', 'url'=>array('index')),
	array('label'=>'Crear categoria de reloj', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-categorias-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador de categorias de reloj</h1>



<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-categorias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idCateogria',
		'nombreCategoria',
		'content',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
