<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idHora')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idHora), array('view', 'id'=>$data->idHora)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEmpleado')); ?>:</b>
	<?php echo CHtml::encode($data->idEmpleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('justificado')); ?>:</b>
	<?php echo CHtml::encode($data->justificado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoHora')); ?>:</b>
	<?php echo CHtml::encode($data->estadoHora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaHoraTrabajo')); ?>:</b>
	<?php echo CHtml::encode($data->fechaHoraTrabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entradaSalida')); ?>:</b>
	<?php echo CHtml::encode($data->entradaSalida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarioHora')); ?>:</b>
	<?php echo CHtml::encode($data->comentarioHora); ?>
	<br />


</div>