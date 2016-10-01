<?php
$this->breadcrumbs=array(
	'Auth Item Panels',
);

$this->menu=array(
	array('label'=>'Create AuthItemPanel', 'url'=>array('create')),
	array('label'=>'Manage AuthItemPanel', 'url'=>array('admin')),
);
?>

<h1>Auth Item Panels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
