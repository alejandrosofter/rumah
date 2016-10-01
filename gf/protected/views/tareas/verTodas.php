<?php
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),'Tareas'
);

$this->menu=array(
	array('label'=>'Listar Tareas', 'url'=>array('index')),
	array('label'=>'Nueva Tarea', 'url'=>array('create')),
);
?>

<h1>TAREAS</h1>
A continuación se muestran todas las tareas que HAY para realizar.
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tareas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cliente',
		//		'fechaTarea',
		array(
                  'name'=>'fechaTarea',
                    'type'=>'html',
                    'value'=>'($data->fechaTarea=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaTarea);',
                ),
		'prioridadTarea',
		'estadoTarea',
		'descripcionTarea',
		'tipoTarea',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
