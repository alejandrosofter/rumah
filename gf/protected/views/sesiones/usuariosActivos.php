<?php
$this->breadcrumbs=array(
	'Chat',
);
?>

<h1>Acceso al sistema</h1>
Vea los movimientos de los usuarios
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sesiones-grid',
	'dataProvider'=>$usuarios,

	'columns'=>array(
		  array(
                'header'=>'Usuario',
                  'name'=>'nombreUsuario',
                   'type'=>'html',
                     'value'=>'CHtml::link("$data->nombreUsuario", "javascript:void(0)", array( "onclick"=>"javascript:chatWith($data->nombreUsuario)" ))'
                ),
array(
				'header'=>'Ingreso',
                  'name'=>'fechaIngreso',
                    'value'=>'Date("H:i:s (d-m-Y)",$data->fechaIngresa)',
                ),
                array(
                'header'=>'Estado',
                  'name'=>'fechaEgreso',
                    'value'=>'($data->fechaEgresa==0)?"conectado":"desconetado".Date("H:i:s (d-m-Y)",$data->fechaEgresa)',
                ),
	),
	
)); ?>


