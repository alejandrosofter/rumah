<?php
$this->breadcrumbs=array(
	'Reloj Resultado Horases',
);

$this->menu=array(
	array('label'=>'Nuevo RelojResultadoHoras', 'url'=>array('create')),
	array('label'=>'Listar RelojResultadoHoras', 'url'=>array('admin')),
);
?>

<h1>Reloj Resultado Horases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
