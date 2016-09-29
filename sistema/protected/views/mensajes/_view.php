<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMensaje')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idMensaje), array('view', 'id'=>$data->idMensaje)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuerpoMensaje')); ?>:</b>
	<?php echo CHtml::encode($data->cuerpoMensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tituloMensaje')); ?>:</b>
	<?php echo CHtml::encode($data->tituloMensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoMensaje')); ?>:</b>
	<?php echo CHtml::encode($data->tipoMensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaMensaje')); ?>:</b>
	<?php echo CHtml::encode($data->fechaMensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destinatario')); ?>:</b>
	<?php echo CHtml::encode($data->destinatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remitente')); ?>:</b>
	<?php echo CHtml::encode($data->remitente); ?>
	<br />


</div>