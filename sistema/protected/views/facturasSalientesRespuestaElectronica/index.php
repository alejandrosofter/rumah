<?php
$this->breadcrumbs=array(
	'Facturas Salientes Respuesta Electronicas',
);

$this->menu=array(
	array('label'=>'Create FacturasSalientesRespuestaElectronica', 'url'=>array('create')),
	array('label'=>'Manage FacturasSalientesRespuestaElectronica', 'url'=>array('admin')),
);
?>

<h1>Facturas Salientes Respuesta Electronicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
