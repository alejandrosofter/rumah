<?php
$this->breadcrumbs=array(
	'Empresas',
);

$this->menu=array(
	array('label'=>'Nueva Empresa', 'url'=>array('create')),
);
?>

<h1>Empresas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empresas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idEmpresa',
		'nombreEmpresa',
		'esDefault',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>