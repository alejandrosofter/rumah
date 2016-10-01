<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFeriado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFeriado), array('view', 'id'=>$data->idFeriado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaFeriado')); ?>:</b>
	<?php echo CHtml::encode($data->fechaFeriado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarioFeriado')); ?>:</b>
	<?php echo CHtml::encode($data->comentarioFeriado); ?>
	<br />


</div>