<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idComponente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idComponente), array('view', 'id'=>$data->idComponente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::encode($data->idStock); ?>
	<br />


</div>