<?php
$this->breadcrumbs=array(
	'Reloj Paroses',
);

$this->menu=array(
	array('label'=>'Create RelojParos', 'url'=>array('create')),
	array('label'=>'Manage RelojParos', 'url'=>array('admin')),
);
?>

<h1>Reloj Paroses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
