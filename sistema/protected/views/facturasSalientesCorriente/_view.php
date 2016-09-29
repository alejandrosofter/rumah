<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSalienteCorriente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFacturaSalienteCorriente), array('view', 'id'=>$data->idFacturaSalienteCorriente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaSaliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaDesde')); ?>:</b>
	<?php echo CHtml::encode($data->fechaDesde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaHasta')); ?>:</b>
	<?php echo CHtml::encode($data->fechaHasta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoFactura')); ?>:</b>
	<?php echo CHtml::encode($data->estadoFactura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />


</div>