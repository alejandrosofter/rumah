<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idParo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idParo), array('view', 'id'=>$data->idParo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaParo')); ?>:</b>
	<?php echo CHtml::encode($data->fechaParo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarioParo')); ?>:</b>
	<?php echo CHtml::encode($data->comentarioParo); ?>
	<br />


</div>