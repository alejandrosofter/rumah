<?php
$this->breadcrumbs=array(
	'Reloj'=>array('menuAlternativo'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Crear categoria', 'url'=>array('create')),
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

<h1>CATEGORIAS</h1>



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
			'class'=>'CButtonColumn','template' => '{modeloEmpleado}{update}{view}{delete}',
            'buttons' => array(
                            'modeloEmpleado' => array(
                    			'label'=>'Ver modelos empleado',
                    			'url'=>'(Yii::app()->createUrl("RelojModeloEmpleado/admin",
                    			array("idCategoria"=>$data->idCateogria)))',
								'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/user_green.png',
							   
		
			),),
			
		),
	),
	
)); 
?>
