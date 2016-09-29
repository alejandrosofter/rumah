<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCondicionCompraItem')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCondicionCompraItem), array('view', 'id'=>$data->idCondicionCompraItem)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCondicionCompra')); ?>:</b>
	<?php echo CHtml::encode($data->idCondicionCompra); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadDiasMeses')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadDiasMeses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidadCantidad')); ?>:</b>
	<?php echo CHtml::encode($data->unidadCantidad); ?>
	<br />


</div>