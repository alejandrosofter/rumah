<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTarea')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTarea), array('view', 'id'=>$data->idTarea)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaTarea')); ?>:</b>
	<?php echo CHtml::encode($data->fechaTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prioridadTarea')); ?>:</b>
	<?php echo CHtml::encode($data->prioridadTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoTarea')); ?>:</b>
	<?php echo CHtml::encode($data->estadoTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionTarea')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoTarea')); ?>:</b>
	<?php echo CHtml::encode($data->tipoTarea); ?>
	<br />


</div>