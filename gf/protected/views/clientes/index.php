<?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Nuevo Cliente', 'url'=>array('create')),
);
?>

<h1>CLIENTES</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clientes-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codCliente',
				array(
                        'header'=>'Cliente',
                        'name'=>'cliente',
                        'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
                        'value'=>'$data->cliente',
                		'type'=>'raw',
                ),
                array(
                        'header'=>'Tipo condicionIva',
                        'name'=>'condicionIva',
                        'filter'=>FacturasEntrantes::model()->getCondicionIva(),
                        'value'=>'$data->condicionIva',
                		'type'=>'raw',
                ),        
                
        'cuit',
		'direccion',
		'comunicacion',
//        'email',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
