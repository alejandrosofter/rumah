<?php
$this->breadcrumbs=array(
	'Ordenes Trabajos'=>array('/ordenesTrabajo/paraRealizar'),'Finalizar Orden'
);

$this->menu=array(
	array('label'=>"Listar Ordenes(".($model->search()->getTotalItemCount()).")", 'url'=>array('index')),
	array('label'=>"Ordenes Para Realizar(".($model->paraRealizar()->getTotalItemCount()).")", 'url'=>array('paraRealizar')),
	array('label'=>"Ordenes Finalizadas(".($model->realizadas()->getTotalItemCount()).")", 'url'=>array('realizadas')),
	array('label'=>"Ordenes Facturadas(".($model->facturadas()->getTotalItemCount()).")", 'url'=>array('facturadas')),
	array('label'=>'Crear Orden', 'url'=>array('create')),
	
);
?>

<h1>Finalizando ORDEN</h1>
A continuación se muestran los datos de la orden a finalizar:
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$vista,
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
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl("ordenesTrabajo/finalizar",array("id"=>$idOrden)),
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Finalizar Orden'); ?>
	</div>

<?php $this->endWidget(); ?>
