<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idHoraDiaEmpleado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idHoraDiaEmpleado), array('view', 'id'=>$data->idHoraDiaEmpleado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEmpleado')); ?>:</b>
	<?php echo CHtml::encode($data->idEmpleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaDia')); ?>:</b>
	<?php echo CHtml::encode($data->fechaDia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoFecha')); ?>:</b>
	<?php echo CHtml::encode($data->estadoFecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entradaUno')); ?>:</b>
	<?php echo CHtml::encode($data->entradaUno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salidaUno')); ?>:</b>
	<?php echo CHtml::encode($data->salidaUno); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('entradaDos')); ?>:</b>
	<?php echo CHtml::encode($data->entradaDos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salidaDos')); ?>:</b>
	<?php echo CHtml::encode($data->salidaDos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entradaTres')); ?>:</b>
	<?php echo CHtml::encode($data->entradaTres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salidaTres')); ?>:</b>
	<?php echo CHtml::encode($data->salidaTres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->modificacion); ?>
	<br />

	*/ ?>

</div>