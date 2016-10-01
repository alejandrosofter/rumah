<?php
$this->breadcrumbs=array(
	'Pre Ventas Empresas',
);

$this->menu=array(
	array('label'=>'Nueva Empresa', 'url'=>array('create')),
);

?>

<h1>Pre Ventas Empresas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pre-ventas-empresas-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                  'name'=>'fecha',
                    'type'=>'html',
                'filter'=>CHtml::textField('fecha',(isset($_GET['fecha']) ? $_GET['fecha'] : "")),
                       'value'=>'$data->fecha', 
                
                ),
		'empresa',
		'telefono',
//		'email',
		
		array(
                  'name'=>'contacto',
                    'type'=>'html',
                'filter'=>CHtml::textField('contacto',(isset($_GET['contacto']) ? $_GET['contacto'] : "")),
                       'value'=>'$data->contacto', 
                
                ),
            array(
                  'name'=>'responsable',
                    'type'=>'html',
                'filter'=>CHtml::textField('responsable',(isset($_GET['responsable']) ? $_GET['responsable'] : "")),
                       'value'=>'$data->responsable', 
                
                ),
		'interes',
         
//            'usuario',
            array(
                  'name'=>'nombreEstado',
                    'type'=>'html',
                'filter'=>CHtml::textField('nombreEstado',(isset($_GET['nombreEstado']) ? $_GET['nombreEstado'] : "")),
                       'value'=>'CHtml::link($data->nombreEstado,Yii::app()->createUrl("preVentasEstados/index",array("id"=>$data->idPreventaEmpresa)))', 
                
                ),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
