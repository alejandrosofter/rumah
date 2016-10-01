<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idImpresion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idImpresion), array('view', 'id'=>$data->idImpresion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoImpresion')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoImpresion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoImpresion')); ?>:</b>
	<?php echo CHtml::encode($data->tipoImpresion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaImpresion')); ?>:</b>
	<?php echo CHtml::encode($data->fechaImpresion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('textoImpresion')); ?>:</b>
	<?php echo CHtml::encode($data->textoImpresion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaLastModifico')); ?>:</b>
	<?php echo CHtml::encode($data->fechaLastModifico); ?>
	<br />


</div>