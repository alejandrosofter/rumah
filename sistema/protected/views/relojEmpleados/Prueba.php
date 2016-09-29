<?php
$this->breadcrumbs=array(
	'Reloj Empleados'=>array('index'),
	'Prueba',
);

$this->menu=array(
	array('label'=>'Nuevo empleado', 'url'=>array('create')),
);

?>

<h1>Vista de prueba</h1>

<?php

echo 'Testeo de vista ';
echo '<br>'.$texto;
echo '<br>'.$NumeroUno;
$cont_a=0;

foreach ($dato as $value) {
	$nombreEmpleado_Buscado=$value['nombreEmpleado'];
	$con=$value['idEmpleado'];
	$cont_a=$cont_a+1;
	$ruta="http://localhost/plataformaYii/GfoxV3/index.php?r=relojEmpleados/update&id=$con";
	echo '<br>'.$cont_a.' '.CHtml::link ($nombreEmpleado_Buscado,$ruta).' '.$value['dni'].' '.RelojEmpleados::cadenaDavid($value['idEmpleado']);
	
}
?>
