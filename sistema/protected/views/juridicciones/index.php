<?php
$this->breadcrumbs=array(
	'Juridicciones',
);

$this->menu=array(
	array('label'=>'Crear Juridicciones', 'url'=>array('create')),
);
?>

<h1>Juridicciones</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'juridicciones-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'idJuridiccion',
		'nombreJuridiccion',
		'codigoJuridiccion',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>