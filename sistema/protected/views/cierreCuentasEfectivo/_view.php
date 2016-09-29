<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCierreCuenta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCierreCuenta), array('view', 'id'=>$data->idCierreCuenta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaCierreCuenta')); ?>:</b>
	<?php echo CHtml::encode($data->fechaCierreCuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuentaEfectivo')); ?>:</b>
	<?php echo CHtml::encode($data->idCuentaEfectivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeDineroSistema')); ?>:</b>
	<?php echo CHtml::encode($data->importeDineroSistema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeDineroExistente')); ?>:</b>
	<?php echo CHtml::encode($data->importeDineroExistente); ?>
	<br />


</div>