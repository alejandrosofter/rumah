<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAlertaUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idAlertaUsuario), array('view', 'id'=>$data->idAlertaUsuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAlerta')); ?>:</b>
	<?php echo CHtml::encode($data->idAlerta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />


</div>