<?php
$this->breadcrumbs=array('Ordenes '=>array('/ordenesTrabajo'),
	'Estados'=>array('/ordenesTrabajoEstados')
);

$this->menu=array(
	array('label'=>'Listar Estados', 'url'=>array('index')),
);
?>

<h1>Estados de Ordenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
