<?php
$this->breadcrumbs=array(
	'Pre Ventas Estados de EMPRESA',
);

$this->menu=array(
	array('label'=>'Nuevo Estado', 'url'=>array('create&id='.$_GET['id'])),
    array('label'=>'Volver Empresas', 'url'=>array('/PreVentasEmpresas')),
);

?>

<h1>Estados de EMPRESA</h1>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pre-ventas-estados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fecha',
		
		'comentario',
            
		array(
                  'name'=>'nombreEstado',
                    'type'=>'html',
                     'filter'=>CHtml::textField('nombreEstado',(isset($_GET['nombreEstado']) ? $_GET['nombreEstado'] : "")),
                    'value'=>'$data->nombreEstado',
                ),
             array(
                  'name'=>'usuario',
                    'type'=>'html',
                     'filter'=>CHtml::textField('usuario2',(isset($_GET['usuario2']) ? $_GET['usuario2'] : "")),
                    'value'=>'$data->usuario',
                ),
		array(
			'class'=>'CButtonColumn',
		),
           
	),
)); ?>
