<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idCategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->diaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diaFin')); ?>:</b>
	<?php echo CHtml::encode($data->diaFin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nroDiaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->nroDiaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nroDiaFin')); ?>:</b>
	<?php echo CHtml::encode($data->nroDiaFin); ?>
	<br />


</div>