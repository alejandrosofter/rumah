<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPuntoVenta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPuntoVenta), array('view', 'id'=>$data->idPuntoVenta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrePuntoVenta')); ?>:</b>
	<?php echo CHtml::encode($data->nombrePuntoVenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionPuntoVenta')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionPuntoVenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('electronica')); ?>:</b>
	<?php echo CHtml::encode($data->electronica); ?>
	<br />


</div>