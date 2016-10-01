<?php
$this->breadcrumbs=array(
'Cheques'=>array('/cheques'),
	'Estado de Cheque',
);

$this->menu=array(
	array('label'=>'Nuevo Estado', 'url'=>array('create&idCheque='.$model->idCheque)),
);
?>
<h1>Estado de cheques</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cheques-estados-grid',
	'dataProvider'=>$model->search(),

	'columns'=>array(
		'fecha',
		'nombreEstado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

