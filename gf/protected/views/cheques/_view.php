<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCheque')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCheque), array('view', 'id'=>$data->idCheque)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaEmision')); ?>:</b>
	<?php echo CHtml::encode($data->fechaEmision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaCobro')); ?>:</b>
	<?php echo CHtml::encode($data->fechaCobro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paguese')); ?>:</b>
	<?php echo CHtml::encode($data->paguese); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esCruzado')); ?>:</b>
	<?php echo CHtml::encode($data->esCruzado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuenta')); ?>:</b>
	<?php echo CHtml::encode($data->idCuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroCheque')); ?>:</b>
	<?php echo CHtml::encode($data->numeroCheque); ?>
	<br />

	*/ ?>

</div>