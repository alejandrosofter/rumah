<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios') ,'Ordenes Trabajo'=>array('index'),
	$model->idOrdenTrabajo,
);

$this->menu=array(
	array('label'=>'Listar Orden', 'url'=>array('index')),
	array('label'=>'Crear Orden', 'url'=>array('create')),
	array('label'=>'Actualizar Orden', 'url'=>array('update', 'id'=>$model->idOrdenTrabajo)),
	array('label'=>'Quitar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenTrabajo),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Orden #<?php echo $model->idOrdenTrabajo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenTrabajo',
		'idCliente',
		'descripcionCliente',
		'descripcionEncargado',
		'estadoOrden',
		'fechaIngreso',
		'prioridad',
		'tipoOrden',
		'observaciones',
	),
)); ?>
<br>
<?php $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'aFacturar',
		'buttonType'=>'link','url'=>Yii::app()->createUrl("/impresiones/create",array("idTipo"=>$model->idOrdenTrabajo,'tipoImpresion'=>'orden')),
		'caption'=>('Imprimir'),
		'options'=>array(
        ),
));?>
<?php $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'planilla',
		'buttonType'=>'link','url'=>Yii::app()->createUrl("/impresiones/create",array("idTipo"=>$model->idOrdenTrabajo,'tipoImpresion'=>'ordenPlanilla')),
		'caption'=>('Imprimir Planilla'),
		'options'=>array(
        ),
));?>