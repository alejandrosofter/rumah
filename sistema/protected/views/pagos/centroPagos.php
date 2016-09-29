<?php
$this->breadcrumbs=array(
	'Tesoreria',
);

?>
<div id="columna_izquierda">
	<?php
	echo CHtml::image('images/iconos/financieros/tesoreria.png');
	?>
</div>
<div id="columna_derecha">
	<h1>TESORERIA</h1>
	<i> A continuación tiene a disposición el menú para ejectar funciones sobre tesoreria. Dentro de TESORERIA puede encontrar funciones tales como PAGOS, GASTOS etc etc. </i><br><br>
</div>
<div id="abajo">
<?PHP

$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
        'Comprobantes'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'comprobantes','tipo'=>'tesoreria','model'=>Acciones::model()),true),
        'Cheques'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'cheques','tipo'=>'tesoreria','model'=>Acciones::model()),true),
     ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
    ),
));
?>
</div>
