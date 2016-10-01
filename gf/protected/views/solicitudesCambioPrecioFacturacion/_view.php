<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSolicitudPrecio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSolicitudPrecio), array('view', 'id'=>$data->idSolicitudPrecio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::encode($data->idStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeLista')); ?>:</b>
	<?php echo CHtml::encode($data->importeLista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeDescontado')); ?>:</b>
	<?php echo CHtml::encode($data->importeDescontado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nroInterno')); ?>:</b>
	<?php echo CHtml::encode($data->nroInterno); ?>
	<br />


</div>