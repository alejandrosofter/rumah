<?php
$this->breadcrumbs=array(
	'Componentes Items',
);

$this->menu=array(
	array('label'=>'Create ComponentesItems', 'url'=>array('create')),
	array('label'=>'Manage ComponentesItems', 'url'=>array('admin')),
);
?>

<h1>Componentes Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
