<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idClasificacionAfip')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idClasificacionAfip), array('view', 'id'=>$data->idClasificacionAfip)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreClasificacionAfip')); ?>:</b>
	<?php echo CHtml::encode($data->nombreClasificacionAfip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoClasificacion')); ?>:</b>
	<?php echo CHtml::encode($data->codigoClasificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />


</div>