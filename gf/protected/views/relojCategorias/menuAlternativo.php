<h1> MODULO DE RELOJ </h1>

<?php
$this->breadcrumbs=array(
	'Reloj',
);
?>

<table style="text-align: left; width: 100%;" border="0" cellpadding="0"
cellspacing="0">
<tbody>
<tr>
<td style="vertical-align: top;">
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/001_20.png', 'User');
echo '<b>'.CHtml::link(' Feriados',array('RelojFeriados/admin')).'</b>'.'<br>'; ?>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/001_54.png', 'User');
echo '<b>'.CHtml::link(' Turnos',array('RelojTurnos/admin')).'</b>'.'<br>'; ?>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/001_30.png', 'User');
echo '<b>'.CHtml::link(' Paros',array('RelojParos/admin')).'</b>'.'<br>'; ?>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/proveedor.png', 'User');
echo '<b>'.CHtml::link(' Empleados',array('RelojEmpleados/admin')).'</b>'.'<br>'; ?>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/cliente.png', 'User');
echo '<b>'.CHtml::link(' Incidencias',array('RelojIncidencias/admin')).'</b>'.'<br>'; ?>
</td>
<td style="vertical-align: top;">
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/001_40.png', 'User');
echo '<b>'.CHtml::link(' Sucursales',array('RelojSucursales/admin')).'</b>'.'<br>'; ?>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/001_35.png', 'User');
echo '<b>'.CHtml::link(' Categorias',array('RelojCategorias/admin')).'</b>'.'<br>'; ?>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/001_44.png', 'User');
echo '<b>'.CHtml::link(' Cargar horas',array('RelojCargarHora/admin')).'</b>'.'<br>'; ?>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/001_39.png', 'User');
echo '<b>'.CHtml::link(' Relojes',array('relojRelojes/admin')).'</b>'.'<br>'; ?>
    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/iconos/stan/001_37.png', 'User');
echo '<b>'.CHtml::link(' Resultado de Horas',array('RelojResultadoHoras/index')).'</b>'.'<br>'; ?>
</td>
</tr>
</tbody>
</table>