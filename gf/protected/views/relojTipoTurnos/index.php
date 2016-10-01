<?php
$this->breadcrumbs=array(
	'Reloj Tipo Turnoses',
);

$this->menu=array(
	array('label'=>'Create RelojTipoTurnos', 'url'=>array('create')),
	array('label'=>'Manage RelojTipoTurnos', 'url'=>array('admin')),
);
?>

<h1>Reloj Tipo Turnoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
