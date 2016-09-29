<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuentaEfectivo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCuentaEfectivo), array('view', 'id'=>$data->idCuentaEfectivo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moneda')); ?>:</b>
	<?php echo CHtml::encode($data->moneda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acuerdo')); ?>:</b>
	<?php echo CHtml::encode($data->acuerdo); ?>
	<br />


</div>