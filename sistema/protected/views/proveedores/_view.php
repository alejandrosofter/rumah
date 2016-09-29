<div class="view">

	
	<h3><?php echo CHtml::link(CHtml::encode($data->nombre), array('view', 'id'=>$data->idProveedor)); ?></h3>



	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
	<?php echo CHtml::encode($data->celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('localidad')); ?>:</b>
	<?php echo CHtml::encode($data->localidad); ?>
	<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('idJuridiccion')); ?>:</b>
	<?php echo CHtml::encode($data->idJuridiccion); ?>
	<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('provincia')); ?>:</b>
	<?php echo CHtml::encode($data->provincia); ?>
	<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('letraHabitual')); ?>:</b>
	<?php echo CHtml::encode($data->letraHabitual); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cuit')); ?>:</b>
	<?php echo CHtml::encode($data->cuit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuenta')); ?>:</b>
	<?php echo CHtml::encode($data->idCuenta); ?>
	<br />

	*/ ?>

</div>