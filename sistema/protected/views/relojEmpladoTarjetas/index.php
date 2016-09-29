<?php
$this->breadcrumbs=array(
	'Reloj Emplado Tarjetases',
);

$this->menu=array(
	array('label'=>'Create RelojEmpladoTarjetas', 'url'=>array('create')),
	array('label'=>'Manage RelojEmpladoTarjetas', 'url'=>array('admin')),
);
?>

<h1>Reloj Emplado Tarjetases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
