<?php
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente=>array('tareas/cliente&idCliente='.$idCliente.'&cliente='.$cliente),'Estados Tarea'
);


?>

<h1>Nuevo Estado de Tarea</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>