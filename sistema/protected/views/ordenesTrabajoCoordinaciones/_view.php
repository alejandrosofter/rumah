<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenesCoordinaciones')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenesCoordinaciones), array('view', 'id'=>$data->idOrdenesCoordinaciones)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenes')); ?>:</b>
	<?php echo CHtml::encode($data->idOrdenes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEvento')); ?>:</b>
	<?php echo CHtml::encode($data->idEvento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCalendario')); ?>:</b>
	<?php echo CHtml::encode($data->idCalendario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />


</div>