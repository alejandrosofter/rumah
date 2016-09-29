<?php
$this->breadcrumbs=array(
	'Centro de Servicios',
);

?>
<div id="columna_izquierda">
	<?php
	echo CHtml::image('images/iconos/financieros/servicios.png');
	?>
</div>
<div id="columna_derecha">
	<h1>SERVICIOS</h1>
	<i> A continuación tiene a disposición el menú para ejectar funciones sobre servicios. Dentro de SERVICIOS puede encontrar funciones tales como ORDENES DE TRABAJO, SERVICIOS DISPONIBLES etc etc. </i><br><br>
</div>
<div id="abajo">
<?PHP

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Archivo'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'archivo','tipo'=>'servicios','model'=>Acciones::model()),true),
        'Ordenes de Trabajo'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'comprobantes','tipo'=>'servicios','model'=>Acciones::model()),true),
        'Tareas & Mantenimiento'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'mantenimientos','tipo'=>'servicios','model'=>Acciones::model()),true),
       // 'Precios'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'precios','tipo'=>'servicios','model'=>Acciones::model()),true),
        'Informes'=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'informes','tipo'=>'servicios','model'=>Acciones::model()),true),
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