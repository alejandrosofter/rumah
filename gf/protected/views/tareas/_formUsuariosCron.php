<div class="form">

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'idClienteTarea'); ?>
		<?php $this->renderPartial('/clientes/buscadorClientes',array('model'=>$model,'campo'=>'idClienteTarea','nombreModelo'=>'Tareas'))?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaTarea'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaTarea'))?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prioridadTarea'); ?>
		<?php echo  $form->dropDownList($model,'prioridadTarea',$model->getPrioridades(),array ('separator'=>'   ','prompt'=>'Seleccione una Prioridad...'));?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoTarea'); ?>
		<?php echo  $form->dropDownList($model,'estadoTarea',$model->getEstados(),array ('prompt'=>'Seleccione un Estado...'));?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionTarea'); ?>
		<?php echo $form->textArea($model,'descripcionTarea',array('rows'=>5, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoTarea'); ?>
		<?php echo  $form->dropDownList($model,'tipoTarea',$model->getTipos(),array ('prompt'=>'Seleccione un Tipo de Tarea...'));?>
	
	</div>




</div><!-- form -->