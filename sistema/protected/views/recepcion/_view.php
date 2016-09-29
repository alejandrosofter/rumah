<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRecepcion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRecepcion), array('view', 'id'=>$data->idRecepcion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionRecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionRecepcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaRecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->fechaRecepcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoRecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->tipoRecepcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRecepcionPadre')); ?>:</b>
	<?php echo CHtml::encode($data->idRecepcionPadre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoRecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->estadoRecepcion); ?>
	<br />


</div>