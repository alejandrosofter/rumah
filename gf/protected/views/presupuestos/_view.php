<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPresupuesto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPresupuesto), array('view', 'id'=>$data->idPresupuesto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaPresupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->fechaPresupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionPresupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionPresupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asuntoPresupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->asuntoPresupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idClientePresupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->idClientePresupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaVencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fechaVencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioEspecial')); ?>:</b>
	<?php echo CHtml::encode($data->precioEspecial); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('formaPago')); ?>:</b>
	<?php echo CHtml::encode($data->formaPago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaentrega')); ?>:</b>
	<?php echo CHtml::encode($data->fechaentrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentajeIva')); ?>:</b>
	<?php echo CHtml::encode($data->porcentajeIva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoPresupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->tipoPresupuesto); ?>
	<br />

	*/ ?>

</div>