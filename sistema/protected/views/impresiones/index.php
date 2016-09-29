<?php
$this->breadcrumbs=array(
	'Impresiones',
);

?>

<h1>Impresiones</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'impresiones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		'tipoImpresion',
		'fechaImpresion',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
