<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios') ,'Ordenes Trabajo Facturadas',
);

$this->menu=array(
	array('label'=>"Ordenes(".($model->search()->getTotalItemCount()).")", 'url'=>array('index')),
	array('label'=>"Para Realizar(".($model->paraRealizar()->getTotalItemCount()).")", 'url'=>array('paraRealizar')),
	array('label'=>"Finalizadas(".($model->realizadas()->getTotalItemCount()).")", 'url'=>array('realizadas')),
	array('label'=>"Facturadas(".($model->facturadas()->getTotalItemCount()).")"),
	array('label'=>'Crear Orden', 'url'=>array('create')),
	
);
?>
<?php echo $form->textField($model,'selecciones',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<input type="hidden" name="paraCargar" >
            <script type="text/javascript">
            function setVars(target_id) {
            	
            idsel=	$.fn.yiiGridView.getChecked('ordenes-trabajo-grid','chk');
             $('#OrdenesTrabajo_selecciones').val(idsel);
             //alert('seleccion: '+idsel);
        }

</script>
<h1>ORDENES DE TRABAJO (FACTURADAS)</h1>
Estas son las ordenes que se encuentran ya FACTURADAS:
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-trabajo-grid',
	 'selectionChanged'=>'setVars',
	'dataProvider'=>$model->facturadas(),
	'filter'=>$model,
	'columns'=>array(
	
		'idOrdenTrabajo',
		array(
                  'name'=>'fechaIngreso',
                    'type'=>'html',
                    'value'=>'($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);',
                ),
		'cliente',
		'descripcionCliente',
		
		'estadoOrden',
		/*
		'prioridad',
		'tipoOrden',
		'observaciones',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
