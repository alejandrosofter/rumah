<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idItemPresupuesto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idItemPresupuesto), array('view', 'id'=>$data->idItemPresupuesto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPresupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->idPresupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::encode($data->idStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioVenta')); ?>:</b>
	<?php echo CHtml::encode($data->precioVenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreStock')); ?>:</b>
	<?php echo CHtml::encode($data->nombreStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadItems')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadItems); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentajeIva')); ?>:</b>
	<?php echo CHtml::encode($data->porcentajeIva); ?>
	<br />


</div>