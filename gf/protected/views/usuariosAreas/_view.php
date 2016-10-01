<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuarioArea')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUsuarioArea), array('view', 'id'=>$data->idUsuarioArea)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreArea')); ?>:</b>
	<?php echo CHtml::encode($data->nombreArea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('centroCosto')); ?>:</b>
	<?php echo CHtml::encode($data->centroCosto); ?>
	<br />


</div>