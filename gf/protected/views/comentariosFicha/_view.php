<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idComentarioFicha')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idComentarioFicha), array('view', 'id'=>$data->idComentarioFicha)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipo')); ?>:</b>
	<?php echo CHtml::encode($data->idTipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaComentario')); ?>:</b>
	<?php echo CHtml::encode($data->fechaComentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalleComentario')); ?>:</b>
	<?php echo CHtml::encode($data->detalleComentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />


</div>