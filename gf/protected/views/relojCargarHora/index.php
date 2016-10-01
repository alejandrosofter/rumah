<?php
$this->breadcrumbs=array(
	'Reloj Cargar Horas',
);

$this->menu=array(
	array('label'=>'Create RelojCargarHora', 'url'=>array('create')),
	array('label'=>'Manage RelojCargarHora', 'url'=>array('admin')),
);
?>

<h1>Reloj Cargar Horas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
