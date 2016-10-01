<?php
$this->breadcrumbs=array(
	'Alertas Usuarios',
);

$this->menu=array(
	array('label'=>'Create AlertasUsuario', 'url'=>array('create')),
	array('label'=>'Manage AlertasUsuario', 'url'=>array('admin')),
);
?>

<h1>Alertas Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
