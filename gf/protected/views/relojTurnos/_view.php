<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTurno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTurno), array('view', 'id'=>$data->idTurno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoTurno')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoTurno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingresoInicio')); ?>:</b>
	<?php echo CHtml::encode($data->ingresoInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salidaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->salidaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingresoRegreso')); ?>:</b>
	<?php echo CHtml::encode($data->ingresoRegreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salidaRegreso')); ?>:</b>
	<?php echo CHtml::encode($data->salidaRegreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semana')); ?>:</b>
	<?php echo CHtml::encode($data->semana); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('diaNombre')); ?>:</b>
	<?php echo CHtml::encode($data->diaNombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horas')); ?>:</b>
	<?php echo CHtml::encode($data->horas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horas50')); ?>:</b>
	<?php echo CHtml::encode($data->horas50); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horas100')); ?>:</b>
	<?php echo CHtml::encode($data->horas100); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horas50Noct')); ?>:</b>
	<?php echo CHtml::encode($data->horas50Noct); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horas100Noct')); ?>:</b>
	<?php echo CHtml::encode($data->horas100Noct); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idCategoria); ?>
	<br />

	*/ ?>

</div>