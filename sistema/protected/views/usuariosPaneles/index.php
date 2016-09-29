<?php
$this->breadcrumbs=array(
	'Usuarios Paneles',
);

$this->menu=array(
	array('label'=>'Create UsuariosPaneles', 'url'=>array('create')),
	array('label'=>'Manage UsuariosPaneles', 'url'=>array('admin')),
);
?>

<h1>Usuarios Paneles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
