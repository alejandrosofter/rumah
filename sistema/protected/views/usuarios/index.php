<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/settings'),'Usuarios'
);

$this->menu=array(
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Administrar Areas', 'url'=>array('/usuariosAreas')),
	array('label'=>'Administrar Tipo Usuarios', 'url'=>array('/usuariosTipoUsuarios')),
);
?>

<h1>Usuarios</h1>
Se listan los usuarios del sistema:
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		'nombre',
		'usuario_',
		'clave_',
		'email',
		'mobil',
		/*
		'idTipoUsuario',
		'idAreaUsuario',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 

?>
