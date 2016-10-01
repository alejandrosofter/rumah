<?php
$this->breadcrumbs=array(
	'Events',
);

$this->menu=array(
	array('label'=>'Create Events', 'url'=>array('create')),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>Agenda</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->consultarProximasVencer(),

	'columns'=>array(

		'title',

		'start',
		'end',
		'dias',

		
	),
)); ?>
