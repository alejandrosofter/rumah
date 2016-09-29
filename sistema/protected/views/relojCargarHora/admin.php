<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Generar carga de horas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-cargar-hora-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Carga de horas</h1>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-cargar-hora-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'fecha',
		'fechaDesde',
		'fechaHasta',
		'archivo',
		//'idUsuario',
		'nombreSucursal',
		//'nombreArchivo',
		array(
			'class'=>'CButtonColumn','template' => '{aplicarHoras}{update}{view}{delete}',
            'buttons' => array(
                            'aplicarHoras' => array(
                    			'label'=>'Aplicar horas',
                    			'url'=>'(Yii::app()->createUrl("RelojCargarHora/AplicarHoras",
                    			array("id"=>$data->id)))',
								'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/time_add.png',
							   
		
			),),
		),
	),
)); ?>
