
	<div class="row">
		<?php echo $form->labelEx($model,'idClienteEmpresa'); ?>
		<?php $this->renderPartial('/clientes/buscadorClientes',array('model'=>$model,'form'=>$form,'campo'=>'idClienteEmpresa','nombreModelo'=>'MantenimientosEmpresas'))?>
		
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'fechaInicioEmpresa'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaInicioEmpresa'))?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'fechaFin'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaFin'))?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoMatenimiento'); ?>
		<?php echo  $form->dropDownList($model,'estadoMatenimiento',$model->getEstados(),array ('prompt'=>'Seleccione un Estado...'));?>
		
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'cantidadDiasFacturar'); ?>
		<?php echo $form->textField($model,'cantidadDiasFacturar',array('class'=>'span1'))?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'idRutinaEscucha'); ?>
		<?php echo  $form->dropDownList($model,'idRutinaEscucha',CHtml::listData(RutinasOrdenesTrabajo::model()->findAll(), 'idOrdenTrabajoRutina', 'nombreRutina'),array ('prompt'=>'Seleccione ...'));?>
		<?php echo $form->textField($model,'cantidadEscucha',array('class'=>'span1'))?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'idRutinaEscucha2'); ?>
		<?php echo  $form->dropDownList($model,'idRutinaEscucha2',CHtml::listData(RutinasOrdenesTrabajo::model()->findAll(), 'idOrdenTrabajoRutina', 'nombreRutina'),array ('prompt'=>'Seleccione ...'));?>
		<?php echo $form->textField($model,'cantidadEscucha2',array('class'=>'span1'))?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'idRutinaEscucha3'); ?>
		<?php echo  $form->dropDownList($model,'idRutinaEscucha3',CHtml::listData(RutinasOrdenesTrabajo::model()->findAll(), 'idOrdenTrabajoRutina', 'nombreRutina'),array ('prompt'=>'Seleccione ...'));?>
		<?php echo $form->textField($model,'cantidadEscucha3',array('class'=>'span1'))?>
	</div>