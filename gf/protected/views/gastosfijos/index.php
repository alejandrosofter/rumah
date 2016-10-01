<?php
$this->breadcrumbs=array(
	'Gastosfijoses',
);

$this->menu=array(
	array('label'=>'Create Gastosfijos', 'url'=>array('create')),
	array('label'=>'Manage Gastosfijos', 'url'=>array('admin')),
);
?>

<h1>Gastosfijoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
