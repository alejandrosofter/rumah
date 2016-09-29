<?php



?>

<h1>EXPORTACION DE DATOS</h1>
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
'action'=>'index.php?r=impresiones/exportar',
	'method'=>'post',
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar y selecciones el tipo de resumen a exportar. Dependiendo el tipo de resumen, depende tambien el formato del archivo.</p>
<b>RESUMEN</b>
<?php echo  CHtml::dropDownList('resumen','',  Impresiones::model()->getTipoExportaciones(),array ('prompt'=>'Seleccione...'));?>

<div class="row">	
    <b>FECHA DE INICIO</b>
<?php $this->renderPartial('/varios/campoFechaFormulario',array('nombre'=>'fechaInicio','valor'=>$fechaInicio))?>
</div>


<div class="row">
<b>FECHA DE FIN</b>
<?php $this->renderPartial('/varios/campoFechaFormulario',array('nombre'=>'fechaFin','valor'=>$fechaFin))?>
</div>
<div class="actions">
<?php echo CHtml::submitButton('Exportar',array('class'=>'btn primary')); ?>
</div>
</div>
<?php $this->endWidget(); ?> 