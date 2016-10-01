<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/datosSistema'),'Usuarios'=>array('/usuarios'),'Areas'=>array('/usuariosAreas'),'Nueva Area'
);

$this->menu=array(
	array('label'=>'Listar Areas', 'url'=>array('index')),
);
?>

<h1>Nueva Area</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>