<?php
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente=>array('/tareas/cliente&idCliente='.$idCliente.'&cliente='.$cliente),'Finalizando Tarea'
);

$this->menu=array(
	array('label'=>'Actualizar Tarea', 'url'=>array('update', 'id'=>$vista->idTarea)),
	array('label'=>'Quitar Tarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$vista->idTarea),'confirm'=>'Esta seguro de quitar esta tarea?')),

);
?>

<h1>Finalizar TAREA</h1>
Se detallan los datos de la tarea a Finalizar:
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$vista,
	'attributes'=>array(

		//		'fechaTarea',
		array(
                  'name'=>'fechaTarea',
                    'type'=>'html',
                    'value'=>'($data->fechaTarea=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaTarea);',
                ),
		'prioridadTarea',
		'estadoTarea',
		'descripcionTarea',
		'tipoTarea',
		'idClienteTarea',
	),
	
)); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl("tareas/finalizar",array("id"=>$vista->idTarea,"idCliente"=>$idCliente,"cliente"=>$cliente)),
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Finalizar Tarea'); ?>
	</div>

<?php $this->endWidget(); ?>
