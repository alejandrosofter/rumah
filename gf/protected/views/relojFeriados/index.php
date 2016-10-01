<?php
$this->breadcrumbs=array(
	'Reloj Feriadoses',
);

$this->menu=array(
	array('label'=>'Create RelojFeriados', 'url'=>array('create')),
	array('label'=>'Manage RelojFeriados', 'url'=>array('admin')),
);
?>

<h1>Reloj Feriadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
