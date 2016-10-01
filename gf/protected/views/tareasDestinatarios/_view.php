<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTareaDestinantario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTareaDestinantario), array('view', 'id'=>$data->idTareaDestinantario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTarea')); ?>:</b>
	<?php echo CHtml::encode($data->idTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notificarArea')); ?>:</b>
	<?php echo CHtml::encode($data->notificarArea); ?>
	<br />


</div>