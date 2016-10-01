<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTareasCoordinaciones')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTareasCoordinaciones), array('view', 'id'=>$data->idTareasCoordinaciones)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTarea')); ?>:</b>
	<?php echo CHtml::encode($data->idTarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEvento')); ?>:</b>
	<?php echo CHtml::encode($data->idEvento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCalendario')); ?>:</b>
	<?php echo CHtml::encode($data->idCalendario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />


</div>