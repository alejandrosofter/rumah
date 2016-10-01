<?php
$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	'Nuevo',
);


?>

<h1>Nuevo Mensaje</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>