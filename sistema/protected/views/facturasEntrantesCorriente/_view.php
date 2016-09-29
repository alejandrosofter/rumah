<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaEntranteCorriente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFacturaEntranteCorriente), array('view', 'id'=>$data->idFacturaEntranteCorriente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaEntrante')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaEntrante); ?>
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