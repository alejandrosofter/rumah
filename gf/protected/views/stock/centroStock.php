<?php
$this->breadcrumbs=array(
	'Centro de Productos',
);

?>
<div id="columna_izquierda">
	<?php
	echo CHtml::image('images/iconos/financieros/stock.png');
	?>
</div>
<div id="columna_derecha">
	<h1>PRODUCTOS</h1>
	<i> A continuación tiene a disposición el menú para ejectar funciones sobre productos. Dentro de PRODUCTOS puede encontrar funciones tales como STOCK DE VENTA, TIPO DE PRODUCTOS etc etc. </i><br><br>

</div>
<div id="abajo">
<?PHP

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Archivo'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'archivo','tipo'=>'productos','model'=>Acciones::model()),true),
        'Consultas'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'comprobantes','tipo'=>'productos','model'=>Acciones::model()),true),
       
        'Informes'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'informes','tipo'=>'productos','model'=>Acciones::model()),true),
    ),
    // additional javascript options for the accordion plugin
   'htmlOptions'=>array(
     'style'=>'height:280px;',
    //'height'=>500
      //  'collapsible'=>true,
    ),
));
?>
</div>
