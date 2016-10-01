<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCron')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCron), array('view', 'id'=>$data->idCron)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minutos')); ?>:</b>
	<?php echo CHtml::encode($data->minutos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horas')); ?>:</b>
	<?php echo CHtml::encode($data->horas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dias')); ?>:</b>
	<?php echo CHtml::encode($data->dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meses')); ?>:</b>
	<?php echo CHtml::encode($data->meses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diasSemana')); ?>:</b>
	<?php echo CHtml::encode($data->diasSemana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('script')); ?>:</b>
	<?php echo CHtml::encode($data->script); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('parametros')); ?>:</b>
	<?php echo CHtml::encode($data->parametros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	*/ ?>

</div>