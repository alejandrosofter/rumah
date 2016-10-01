<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/datosSistema'),'Usuarios'=>array('/usuarios'),'Tipo Usuarios'
);

$this->menu=array(
	array('label'=>'Crear Tipo Usuario', 'url'=>array('create')),
);
?>

<h1>Listado de tipos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuarios-tipo-usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>