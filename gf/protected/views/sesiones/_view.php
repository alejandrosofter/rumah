<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSesion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSesion), array('view', 'id'=>$data->idSesion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaIngresa')); ?>:</b>
	<?php echo CHtml::encode($data->fechaIngresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaEgresa')); ?>:</b>
	<?php echo CHtml::encode($data->fechaEgresa); ?>
	<br />


</div>