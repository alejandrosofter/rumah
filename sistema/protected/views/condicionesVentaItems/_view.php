<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCondicionVentaItem')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCondicionVentaItem), array('view', 'id'=>$data->idCondicionVentaItem)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCondicionVenta')); ?>:</b>
	<?php echo CHtml::encode($data->idCondicionVenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentajeTotalFacturado')); ?>:</b>
	<?php echo CHtml::encode($data->porcentajeTotalFacturado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadCuotas')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadCuotas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aVencerEnDias')); ?>:</b>
	<?php echo CHtml::encode($data->aVencerEnDias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CantidadDiasMesesCuotas')); ?>:</b>
	<?php echo CHtml::encode($data->CantidadDiasMesesCuotas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentajeInteres')); ?>:</b>
	<?php echo CHtml::encode($data->porcentajeInteres); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaVencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fechaVencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calculo')); ?>:</b>
	<?php echo CHtml::encode($data->calculo); ?>
	<br />

	*/ ?>

</div>