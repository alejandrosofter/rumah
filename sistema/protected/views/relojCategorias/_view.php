<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCateogria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCateogria), array('view', 'id'=>$data->idCateogria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->nombreCategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />


</div>