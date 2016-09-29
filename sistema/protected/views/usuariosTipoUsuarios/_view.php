<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuarioTipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUsuarioTipo), array('view', 'id'=>$data->idUsuarioTipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>