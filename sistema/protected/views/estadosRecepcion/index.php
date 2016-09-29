<?php
$this->breadcrumbs=array(
	'Estados Recepcions',
);

$this->menu=array(
	array('label'=>'Create EstadosRecepcion', 'url'=>array('create')),
	array('label'=>'Manage EstadosRecepcion', 'url'=>array('admin')),
);
?>

<h1>Estados Recepcions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
