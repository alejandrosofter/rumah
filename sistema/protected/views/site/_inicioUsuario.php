
<?php 

$usuario=Usuarios::model()->findByPk(Yii::app()->user->id);
$panel=$usuario->panelDeControl;
$indicadores='';
$indicadorPago='';
$indicadorVentas='';
$indicadorTareas='';
$indicadorCompras='';
$indicadorCobros='';
$alertas='';
$movimientos='';
$buscadorProductos='';
$menu='';
$anotador='';
$usuario=Yii::app()->user->nombre;
if(strstr($panel, '%indicadores')!='')
	$indicadores=$this->renderPartial('panelesInicio/_indicadores',array(),true);
	
if(strstr($panel, '%indicadorPagos')!='')
	$indicadorPago=$this->renderPartial('panelesInicio/_indicadorPagos',array(),true);

if(strstr($panel, '%indicadorVentas')!='')
	$indicadorVentas=$this->renderPartial('panelesInicio/_indicadorVentas',array(),true);

if(strstr($panel, '%indicadorTareas')!='')
	$indicadorTareas=$this->renderPartial('panelesInicio/_indicadorTareas',array(),true);
	
if(strstr($panel, '%indicadorCobros')!='')
	$indicadorCobros=$this->renderPartial('panelesInicio/_indicadorCobros',array(),true);

if(strstr($panel, '%indicadorCompras')!='')
	$indicadorCompras=$this->renderPartial('panelesInicio/_indicadorCompras',array(),true);
	
if(strstr($panel, '%alertas')!='')
	$alertas=$this->renderPartial('/alertas/verAlertasUsuario',array(),true);

if(strstr($panel, '%movimientos')!='')
	$movimientos=$this->renderPartial('panelesInicio/_ultimosMovimientos',array(),true);
	
if(strstr($panel, '%buscadorProductos')!='')
	$buscadorProductos=$this->renderPartial('/varios/buscadorVario', array(),true);
	
if(strstr($panel, '%menuHorizontal')!=''){
	$posIni=stripos($panel,'%menuHorizontal')+16;
	$posFin=strrpos($panel,'%finMenuHorizontal');

	$cade=substr($panel, $posIni,$posFin-$posIni);
	$items=explode(',',$cade);
	$this->renderPartial('panelesInicio/_accesosDirectos2', array('items'=>$items),false);
	
	$panel = str_replace("%menuHorizontal",  '',$panel);
	$panel = str_replace("%finMenuHorizontal",  '',$panel);
	$panel = str_replace($cade,  '',$panel);
}
//
	
	
if(strstr($panel, '%anotador')!='')
	$anotador=$this->renderPartial('/usuarios/anotador', array('idUsuario'=>Yii::app()->user->id),true);

if(strstr($panel, '%menu')!='')
	$menu= $this->widget('ext.emenu.EMenu', array(//'theme'=>'vimeo',
				'items'=>Yii::app()->params['menuPrincipal'],'id'=>'menuLateral','vertical'=>true
				//'htmlOptions'=>array('id'=>'menu'),
			),TRUE);

			
			
$panel = str_replace("%fechaActual",   date('d-m-Y'),$panel); 
$panel = str_replace("%indicadores",  $indicadores,$panel);
$panel = str_replace("%indicadorPagos",  $indicadorPago,$panel);
$panel = str_replace("%indicadorCobros",  $indicadorCobros,$panel);
$panel = str_replace("%indicadorTareas",  $indicadorTareas,$panel);
$panel = str_replace("%indicadorVentas",  $indicadorVentas,$panel);
$panel = str_replace("%indicadorCompras",  $indicadorCompras,$panel); 
$panel = str_replace("%alertas",  $alertas,$panel); 

$panel = str_replace("%buscadorProductos",  $buscadorProductos,$panel); 
$panel = str_replace("%usuario",  $usuario,$panel); 
$panel = str_replace("%menu",  $menu,$panel); 
$panel = str_replace("%anotador",  $anotador,$panel); 
$panel = str_replace("%movimientos",  $movimientos,$panel); 
//$panel = str_replace("%menuHor",  $menuHorizontal,$panel); 
echo $panel;
?>
