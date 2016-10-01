<?php



?>

<h1>LIBROS IVA</h1>
<?php
//$this->breadcrumbs=array(
//	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente,'Tareas'
//);
//
//$this->menu=array(
//	array('label'=>'Listar Tareas', 'url'=>array('cliente&idCliente='.$idCliente.'&cliente='.$cliente)),
//	array('label'=>'Listar Pendientes', 'url'=>array('pendientes&idCliente='.$idCliente.'&cliente='.$cliente)),
//	array('label'=>'Nueva Tarea', 'url'=>array('create&idCliente='.$idCliente.'&cliente='.$cliente)),
//);
?>

	
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>'index.php?r=impresiones/ivalibro',
	'method'=>'post',
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar y selecciones el tipo de libro.</p>
<?php echo $form->textField($model,'tipoLibro',array('TYPE'=>'hidden','maxlength'=>40)); ?>

<div class="row">	
<?php echo $form->labelEx($model,'fechaInicio'); ?>
<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaInicio'))?>
</div>


<div class="row">
<?php echo $form->labelEx($model,'fechaFin'); ?>
<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaFin'))?>
</div>
<div class="row buttons">
<?php echo CHtml::submitButton('Libro Iva'); ?>
</div>
</div>
<?php $this->endWidget(); ?> 