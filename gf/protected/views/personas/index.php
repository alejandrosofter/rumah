<?php
$this->breadcrumbs=array(
	'Personas',
);

$this->menu=array(
	array('label'=>'Crear Persona', 'url'=>array('create')),
	array('label'=>'Listar Personas', 'url'=>array('index')),
);
?>

<h1>Personas</h1>
A continuación se detallan los datos de las empresas, para mas información haga click en el detalle o 
bien realize un filtro sobre algún campo.
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'apellido',
		'telefono',
		'celular',

		'email',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
