<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMantenimientoEmpresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idMantenimientoEmpresa), array('view', 'id'=>$data->idMantenimientoEmpresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idClienteEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->idClienteEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaInicioEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->fechaInicioEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoMatenimiento')); ?>:</b>
	<?php echo CHtml::encode($data->estadoMatenimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadVisitasMensuales')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadVisitasMensuales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datosRelevantes')); ?>:</b>
	<?php echo CHtml::encode($data->datosRelevantes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoMantenimiento')); ?>:</b>
	<?php echo CHtml::encode($data->tipoMantenimiento); ?>
	<br />


</div>