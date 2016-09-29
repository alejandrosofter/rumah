<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idImagen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idImagen), array('view', 'id'=>$data->idImagen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipo')); ?>:</b>
	<?php echo CHtml::encode($data->idTipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreImagen')); ?>:</b>
	<?php echo CHtml::encode($data->nombreImagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ext')); ?>:</b>
	<?php echo CHtml::encode($data->ext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path')); ?>:</b>
	<?php echo CHtml::encode($data->path); ?>
	<br />


</div>