<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTareaEstado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTareaEstado), array('view', 'id'=>$data->idTareaEstado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTarea')); ?>:</b>
	<?php echo CHtml::encode($data->idTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaEstadoTarea')); ?>:</b>
	<?php echo CHtml::encode($data->fechaEstadoTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalleEstadoTarea')); ?>:</b>
	<?php echo CHtml::encode($data->detalleEstadoTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreEstado')); ?>:</b>
	<?php echo CHtml::encode($data->nombreEstado); ?>
	<br />


</div>