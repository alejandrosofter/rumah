<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Tarjetas empleados',
);

$this->menu=array(
	array('label'=>'Crear tarjeta', 'url'=>array('create'.'&idEmpleado='.$idEmpleado)),
	array('label'=>'Volver a empleados', 'url'=>array('RelojEmpleados/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-emplado-tarjetas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>TARJETAS DE EMPLEADOS</h1>



<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-emplado-tarjetas-grid',
	'dataProvider'=>$model->busquedaTarjeta($idEmpleado),
	'filter'=>$model,
	'columns'=>array(
		'idEmpleadoTarjeta',
		'idTarjeta',
		'fechaTarjeta',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
 ?>
