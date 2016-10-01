<?php
$this->breadcrumbs=array(
	'Centro de Tareas'=>array('/tareas/centroTareas'),
	'Personal Tarea'
);


$this->menu=array(
	array('label'=>'Agregar Personal', 'url'=>array('create&idCliente='.$idCliente.'&cliente='.$cliente.'&idTarea='.$id)),
	array('label'=>'Mis Tareas', 'url'=>array('/tareas/verMisTareas')),
	array('label'=>'Listar Tareas', 'url'=>array('/tareas')),
);
?>

<h1>Personal Tarea</h1>
Se listan las personas involucradas en esta tarea:
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tareas-destinatarios-grid',
	'dataProvider'=>$usuarios,
	'columns'=>array(
		'nombreUsuario',
		array(
                  'name'=>'notificarArea',
                    'type'=>'html',
                    'value'=>'($data->notificarArea)?"si":"no"',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>