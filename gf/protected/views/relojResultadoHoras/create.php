<?php
$this->breadcrumbs=array(
	'Reloj Resultado Horases'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar RelojResultadoHoras', 'url'=>array('admin')),
);
?>

<h1>Nuevo RelojResultadoHoras</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>