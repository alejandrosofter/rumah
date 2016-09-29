<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInventario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInventario), array('view', 'id'=>$data->idInventario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaInventario')); ?>:</b>
	<?php echo CHtml::encode($data->fechaInventario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionInventario')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionInventario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esPredeterminado')); ?>:</b>
	<?php echo CHtml::encode($data->esPredeterminado); ?>
	<br />


</div>