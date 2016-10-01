<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'formularioOrden',
	'focus'=>array($model,isset($focus)?$focus:'idCliente'),
//	'action'=>isset($GET['idPresupuesto'])?Yii::app()->createUrl('ordenesTrabajo/generarOrdenNueva&idPresupuesto='.$model->idPresupuesto):Yii::app()->createUrl('ordenesTrabajo/create')
	//'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> con requeridos.</p>
<?php echo $form->textField($model,'idPresupuesto',array('TYPE'=>'hidden','rows'=>6, 'cols'=>50)); ?>
        <?php echo CHtml::textField('noValidate','',array('TYPE'=>'hidden','rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->textField($model,'idUsuario',array('TYPE'=>'hidden','rows'=>6, 'cols'=>50)); ?>

	<?php echo $form->errorSummary($model); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'idRutina'); ?>
		<?php echo  $form->dropDownList($model,'idRutina',CHtml::listData(RutinasOrdenesTrabajo::model()->findAll(), 'idOrdenTrabajoRutina', 'nombreRutina'),array ('onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_estado')",'onchange'=>'document.forms["formularioOrden"].noValidate.value= "true";
		document.forms["formularioOrden"].submit();'));?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'fechaIngreso'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaIngreso'))?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php $this->renderPartial('/clientes/buscadorClientes',array('model'=>$model,'campo'=>'idCliente','nombreModelo'=>'OrdenesTrabajo','form'=>$form))?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionCliente'); ?>
		<?php echo $form->textArea($model,'descripcionCliente',array('class'=>'span7', 'rows'=>4)); ?>
			<span class='help-block'><b>NOTA: </b>Datos relevantes que proporciona el cliente. </span>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionEncargado'); ?>
		<?php echo $form->textArea($model,'descripcionEncargado',array('rows'=>3, 'class'=>'span7')); ?>
		<span class='help-block'><b>NOTA: </b>Datos relevantes que le pueden servir al encargado. </span>
	
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'duracionDias'); ?>
		<?php echo $form->textField($model,'duracionDias',array('class'=>'span1')); ?>
			<span class='help-block'><b>NOTA: </b>Duracion del servicio en dias, en caso de no tener duracion poner en 0 (cero). </span>
	
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'prioridad'); ?>
		<?php echo  $form->dropDownList($model,'prioridad',$model->getPrioridades(),array ('prompt'=>'Seleccione una Prioridad...'));?>
	
	</div>

        <?php 
        //$this->widget( 'ext.EChosen.EChosen');
         
        echo $this->renderPartial('/rutinasImpresiones/_impresionesRutinas',array('esNuevo'=>$model->isNewRecord,'idRutina'=>$model->idRutina),true); 
       
        ?>
<?php

//    $cliente=Clientes::model()->findByPk($_GET['idCliente']);
//    echo $this->renderPartial('/clientes/_envioInformacion',array('cliente'=>$cliente),true);
//    
    
    ?>
<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn ')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->