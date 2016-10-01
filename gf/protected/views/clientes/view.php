<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->idCliente,
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Clientes', 'url'=>array('create')),
	array('label'=>'Modificar Clientes', 'url'=>array('update', 'id'=>$model->idCliente)),
	array('label'=>'Eliminar Clientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCliente),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver Clientes #<?php echo $model->idCliente; ?></h1>
<table style="vertical-align: top;  width: 100%;">
<td style="vertical-align: top; width: 50%;"  >
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'apellido',
		'razonSocial',
		'nombreFantasia',
		'cuit',
		'letraHabitual',
		'condicionIva',
		'condicionVenta',
		'localidad',
		'direccion',
		'nro',
		'idJuridiccion',
		'nombreJuridiccion',
		
		
		
		
		
	),
)); ?>
</td>
<td style="vertical-align: top; width: 50%;" >
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'telefono',
		'celular',
		'email',
		'codCliente',
		'limiteCredito',
		'fechaAlta',
		

		
		
		
	),
)); ?>
</td>

</table>

