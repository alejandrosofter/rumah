<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios') ,'Ordenes Trabajo'=>array('index'),
	'Crear',
);

$this->menu=array(
	
	array('label'=>"Sin Asignar(".($model->buscarPorEstado('')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=')),
	array('label'=>"Trabajando(".($model->buscarPorEstado('Trabajando')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Trabajando')),
	array('label'=>"Stand-By(".($model->buscarPorEstado('Stand-By')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Stand-By')),
	array('label'=>"Tercero(".($model->buscarPorEstado('Tercero')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=tercero')),
	array('label'=>"Realizadas(".($model->buscarPorEstado('Finzalizado')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Finalizada')),
	
	array('label'=>"Todas(".($model->search()->getTotalItemCount()).")", 'url'=>array('index')),
	array('label'=>'Crear Orden'),
);
?>

<h1>Seleccion de la orden</h1>
A continuacion se muestran las ordenes generadas al cliente del presupuesto, por favor seleccione una y luego presione aceptar ...


<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('ordenesTrabajo/GenerarOrdenExistente'),
	'method'=>'post',
)); ?>
<div class="form">


<div class="row buttons">
<?php echo CHtml::submitButton('Aceptar'); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	
