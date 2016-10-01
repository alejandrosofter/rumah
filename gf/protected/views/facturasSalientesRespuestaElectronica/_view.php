<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaRespuesta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFacturaRespuesta), array('view', 'id'=>$data->idFacturaRespuesta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaSaliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cae')); ?>:</b>
	<?php echo CHtml::encode($data->cae); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaVence')); ?>:</b>
	<?php echo CHtml::encode($data->fechaVence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eventos')); ?>:</b>
	<?php echo CHtml::encode($data->eventos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('errores')); ?>:</b>
	<?php echo CHtml::encode($data->errores); ?>
	<br />


</div>