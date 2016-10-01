<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rol')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rol), array('view', 'id'=>$data->rol)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('panel')); ?>:</b>
	<?php echo CHtml::encode($data->panel); ?>
	<br />


</div>