<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVendedor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idVendedor), array('view', 'id'=>$data->idVendedor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nroLegajo')); ?>:</b>
	<?php echo CHtml::encode($data->nroLegajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentajeGanancia')); ?>:</b>
	<?php echo CHtml::encode($data->porcentajeGanancia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->fechaInicio); ?>
	<br />


</div>