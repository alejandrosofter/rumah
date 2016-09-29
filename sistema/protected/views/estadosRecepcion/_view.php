<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstadoRecepcion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEstadoRecepcion), array('view', 'id'=>$data->idEstadoRecepcion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->idRecepcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaEstadoRecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->fechaEstadoRecepcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionEstadoRecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionEstadoRecepcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuarioEstado')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuarioEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoEstadoRecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->estadoEstadoRecepcion); ?>
	<br />


</div>