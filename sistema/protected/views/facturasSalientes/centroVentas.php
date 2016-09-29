<?php
$this->breadcrumbs=array(
	'Centro de Ventas',
);

?>

<div id="columna_izquierda">
	<?php
	echo CHtml::image('images/iconos/financieros/cash-register-icon.png');
	?>
</div>
<div id="columna_derecha">
	<h1>VENTAS</h1>
	<i> A continuación tiene a disposición el menú para ejectar funciones sobre ventas. Dentro de VENTAS puede encontrar funciones tales como CLIENTES, CONDICIONES DE VENTA etc etc. </i>
</div>
<div id="abajo">
<?PHP

//$this->widget('zii.widgets.jui.CJuiTabs', array(
//     'tabs'=>array(
//     'Comprobantes'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'comprobantes','tipo'=>'ventas','model'=>Acciones::model()),true),
//        'Archivo'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'archivo','tipo'=>'ventas','model'=>Acciones::model()),true),
//        
// 'Precios'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'precios','tipo'=>'productos','model'=>Acciones::model()),true),        
//'Presupuestos'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'presupuestos','tipo'=>'ventas','model'=>Acciones::model()),true),
//        'Informes'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'informes','tipo'=>'ventas','model'=>Acciones::model()),true),
//    ),
//    // additional javascript options for the accordion plugin
//    'htmlOptions'=>array(
//     'style'=>'height:450px;',
//    //'height'=>500
//      //  'collapsible'=>true,
//    ),
//));
$this->renderPartial('/facturasSalientes/odometroCentro', array(),false);

?>
</div>
