<h4>Alertas </h4>
<?php
$alertas=Alertas::model()->search();
$longitud=50;
foreach($alertas->data as $item){
	$rutaFinalizar=getRutaFinalizar($item->area,$item->idElemento,$item->controlador,$item->idAlerta);
	$nivel=getTipoAlerta($item->nivelAlerta);
	$iconoArea=CHtml::image(getIconoArea($item->area),'Area',array('ALIGN'=>'left'));
	$iconoTerminar=CHtml::link(CHtml::image('images/iconos/famfam/accept.png','Terminar',array('ALIGN'=>'right')),
                    $rutaFinalizar);
	$link=CHtml::link(' ...ver mas',Yii::app()->createUrl($item->controlador.'/update',array("id"=>$item->idElemento)));
	$linkCerrar=CHtml::link(CHtml::image('images/iconos/famfam/0.png','Eliminar',array('ALIGN'=>'right')),Yii::app()->createUrl('alertas/delete',array("id"=>$item->idAlerta)));
	$mensaje= substr($item->titulo,0,$longitud); 
	//$verMas= strlen($item->titulo)>$longitud?$link:'';
	//$verMas= $item->titulo;
	$vencido='<b> (Vencido '.-(int)$item->diasVencidos.' días)</b>';
	$verMas=getRutaMas($item->area,$item->idElemento);
	echo '<div class="'.$nivel.'"><p>'.$iconoArea.' - '.$mensaje.$vencido.$verMas.$iconoTerminar.$linkCerrar.' </p></div>';
}
//$this->widget('ext.JuiButtonSet.JuiButtonSet', array(
//    'items' => array(
//        array(
//            'label'=>'Menu button 1',
//            'icon-position'=>'left',
//            'url'=>array('create') //urls like 'create', 'update' & 'delete' generates an icon beside the button
//        ),
//        array(
//            'label'=>'Menu button 2',
//            'icon-position'=>'left',
//            'icon'=>'folder-open', // This a CSS class starting with ".ui-icon-"
//            'url'=>array('action2')
//        ),
//        array(
//            'label'=>'Menu button 2',
//            'icon-position'=>'left',
//            'icon'=>'folder-open', // This a CSS class starting with ".ui-icon-"
//            'url'=>array('action2')
//        ),
//        array(
//            'label'=>'Menu button 2',
//            'icon-position'=>'left',
//            'icon'=>'folder-open', // This a CSS class starting with ".ui-icon-"
//            'url'=>array('action2')
//        ),
//        array(
//            'label'=>'Menu button 2',
//            'icon-position'=>'left',
//            'icon'=>'home', // This a CSS class starting with ".ui-icon-"
//            'url'=>array('action2')
//        ),
//    ),
//    'htmlOptions' => array('style' => 'clear: both;'),
//));
?>
<?php 
 function getRutaMas($area,$idElemento){
	$cad='';
		switch($area){
		case 'tareas':{
			$cad=CHtml::link(' ver!',Yii::app()->createUrl('tareas/update',array("id"=>$idElemento)));
			break;
		}
		case 'Ordenes':{
			$cad=CHtml::link(' ver!',Yii::app()->createUrl('impresiones/create',array('tipoImpresion'=>'orden',"idTipo"=>$idElemento)));
			break;
		}
		case 'Precios':{
			$cad=CHtml::link(' ver!',Yii::app()->createUrl('comprasItems',array("idFactura"=>$idElemento)));
			break;
		}
		
	}
		return $cad;
	}
function getIconoArea($area){
		switch($area){
		case 'tareas':{
			$cad='images/iconos/famfam/page_white_edit.png';
			break;
		}
		case 'Ordenes':{
			$cad='images/iconos/famfam/wrench.png';
			break;
		}
		case 'Precios':{
			$cad='images/iconos/famfam/medal_gold_add.png';
			break;
		}
		
	}
		return $cad;
	}
function getRutaFinalizar($area,$idElemento,$controlador,$idAlerta){
		switch($area){
		case 'tareas':{
			$cad='tareasEstados/create&id='.$idElemento;
			break;
		}
		case 'Ordenes':{
			$cad='ordenesTrabajoEstados/create&id='.$idElemento;
			break;
		}
		case 'Precios':{
			$cad=$controlador.'/asignarCompra&id='.$idElemento;
			break;
		}
		default:{
			$cad="/alertas/finalizar&id=".$idAlerta;
		}
	}
		return 'index.php?r='.$cad;
	}
function getTipoAlerta($alerta){
	
		switch($alerta){
		case 'Media':{
			$nivel='alert-message warning';
			break;
		}
		case 'Alta':{
			$nivel='alert-message error';
			break;
		}
		case 'Baja':{
			$nivel='alert-message success';
			break;
		}
	
	
	}
		return $nivel;
}      
     ?>