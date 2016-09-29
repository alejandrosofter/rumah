<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Empleados',
);

$this->menu=array(
	array('label'=>'Cargar empleados', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reloj-empleados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>EMPLEADOS</h1>

<?php /* echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button'));*/ ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-empleados-grid',
	// 'dataProvider'=>$model->search(),
	'dataProvider'=>$model->buscarEmpleado($idsucursal),
	'filter'=>$model,
	'columns'=>array(
		 //'idEmpleado',
		// 'idLegajo',
		'nombreEmpleado',
		'idCuil',
		'FechaNacimiento',
		'domicilio',
		/*
		'telefono',
		'fechaIngreso',
		'regl',
		'notifEmergencia',
		'suaf',
		'afectacion',
		'presentacion',
		'obrasocial',
		'altaFirmada',
		'preocup',
		'copiaDNI',
		'cuil',
		'idsucursal',
		'dni',
		'idCategoria',
		'horasPactadas',
		*/
array(
			'class'=>'CButtonColumn','template' => '{verTarjeta}{update}{view}{delete}',
            'buttons' => array(
                            'verTarjeta' => array(
                    			'label'=>'Ver tarjeta',
                    			'url'=>'(Yii::app()->createUrl("RelojEmpladoTarjetas/admin",
                    			array("idEmpleado"=>$data->idEmpleado)))',
								'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/application_xp.png',
							   
		
			),),
			)))); ?>
