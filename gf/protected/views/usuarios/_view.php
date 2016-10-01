<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUsuario), array('view', 'id'=>$data->idUsuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clave_')); ?>:</b>
	<?php echo CHtml::encode($data->clave_); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rutaImagen')); ?>:</b>
	<?php echo CHtml::encode($data->rutaImagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoUsuario); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idAreaUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idAreaUsuario); ?>
	<br />

	*/ ?>

</div>