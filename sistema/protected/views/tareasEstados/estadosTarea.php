<?php
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente=>array('tareas/cliente&idCliente='.$idCliente.'&cliente='.$cliente),'Estados Tarea'
);

$this->menu=array(
	array('label'=>'Nuevo Estado', 'url'=>array('create&cliente='.$cliente.'&idCliente='.$idCliente.'&id='.$id)),
);
?>

<h1>Seguimiento de Tarea</h1>
A continuación ud puede realizar un seguimiento de los estados que ha tenido la tarea:

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tareas-estados-grid',
	'dataProvider'=>$estados,

	'columns'=>array(

		'fechaEstadoTarea',
		'detalleEstadoTarea',
		'nombreEstado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
