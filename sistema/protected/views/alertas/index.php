<?php
$this->breadcrumbs=array(
	'Alertases',
);

$this->menu=array(
	array('label'=>'Create Alertas', 'url'=>array('create')),
	array('label'=>'Manage Alertas', 'url'=>array('admin')),
);
?>

<h1>Alertases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
