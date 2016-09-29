<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPanelUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPanelUsuario), array('view', 'id'=>$data->idPanelUsuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrePanel')); ?>:</b>
	<?php echo CHtml::encode($data->nombrePanel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionPanel')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionPanel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ayuda')); ?>:</b>
	<?php echo CHtml::encode($data->ayuda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkAyuda')); ?>:</b>
	<?php echo CHtml::encode($data->linkAyuda); ?>
	<br />


</div>