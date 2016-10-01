<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/datosSistema'),'Usuarios'=>array('/usuarios'),'Areas'
);


$this->menu=array(
	array('label'=>'Crear Area', 'url'=>array('create')),
);
?>

<h1>Usuarios Areas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuarios-areas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombreArea',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>