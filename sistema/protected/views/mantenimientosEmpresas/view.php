<?php
$this->breadcrumbs=array(
	'Mantenimientos Empresas'=>array('index'),
	$model->idMantenimientoEmpresa,
);

$this->menu=array(
	array('label'=>'Nuevo Mantenimiento', 'url'=>array('create')),
	array('label'=>'Listar Mantenimientos', 'url'=>array('index')),
	array('label'=>'Actualizar Mantenimientos', 'url'=>array('update', 'id'=>$model->idMantenimientoEmpresa)),
	array('label'=>'Quitar Mantenimientos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idMantenimientoEmpresa),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver Mantenimiento #<?php echo $model->idMantenimientoEmpresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idMantenimientoEmpresa',
		'idClienteEmpresa',
		'fechaInicioEmpresa',
		'estadoMatenimiento',
		'cantidadVisitasMensuales',
		array(               // related city displayed as a link
            'label'=>'datosRelevantes',
            'type'=>'raw',
            'value'=>(htmlspecialchars($model->datosRelevantes)),
        ),
		'tipoMantenimiento',
	),
)); ?>
