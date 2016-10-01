<?php

class ImpresionesController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','imprimeExcel','librosiva','ivalibro'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        public function actionCierreATF()
        {
            $texto="@PONEENCABEZADO||5|CIERRE Z,@CIERREX";
            $impresora=Impresiones::model()->getNombreImpresora("TicketF");
            $puerto=$_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT'];
            $link="http://".$_SERVER['SERVER_NAME'].$puerto.Yii::app()->createUrl('/facturasSalientes');
            Impresiones::model()->ejecutaAppletFiscal($impresora,$texto,$link);
        }
        public function actionCierreZTF()
        {
            $texto="@PONEENCABEZADO||5|CIERRE Z,@CIERREZ";
            $impresora=Impresiones::model()->getNombreImpresora("TicketF");
            $puerto=$_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT'];
            $link="http://".$_SERVER['SERVER_NAME'].$puerto.Yii::app()->createUrl('/facturasSalientes');
            Impresiones::model()->ejecutaAppletFiscal($impresora,$texto,$link);
        }
        public function actionImprimirAlgo()
        {
             if(isset($_POST['yt1'])){
                 switch ($_GET['tipo']) {
                     case 'facturaX':
                         $this->redirect(array('/impresiones/create&idTipo','idTipo'=>$_GET['idTipo'],'tipoImpresion'=>'factura'));
                         break;
                     case 'facturaA':
                         $this->redirect(array('/impresiones/create&idTipo','idTipo'=>$_GET['idTipo'],'tipoImpresion'=>'factura'));
                         break;
                     case 'facturaA-e':
                         $this->redirect(array('/impresiones/create&idTipo','idTipo'=>$_GET['idTipo'],'tipoImpresion'=>'factura'));
                         break;
                     case 'facturaB-e':
                         $this->redirect(array('/impresiones/create&idTipo','idTipo'=>$_GET['idTipo'],'tipoImpresion'=>'factura'));
                         break;
                     case 'facturaB':
                         $this->redirect(array('/impresiones/create&idTipo','idTipo'=>$_GET['idTipo'],'tipoImpresion'=>'factura'));
                         break;
                     case 'presupuesto':
                         $this->redirect(array('/impresiones/create&idTipo','idTipo'=>$_GET['idTipo'],'tipoImpresion'=>'presupuesto'));
                         break;

                     default:
                         break;
                 }
                
                   // Impresiones::model()->redirectPagina("index.php?r=impresiones/create&idTipo=".$_GET['idTipo']."&tipoImpresion=factura");
                }
            if(isset($_POST['yt0'])){
                $texto="";
                switch ($_GET['tipo']) {
                    case 'presupuesto':{
                        $texto= Presupuestos::model()->getTextoPresupuesto($_GET['idTipo']);
                        $url=Yii::app()->createUrl('presupuestos');
                    }
                    break;
                case 'notaCredito':{
                    $tipoImpresion=Impresiones::model()->getTipoImpresion('notaCredito');
                        $texto=  FacturasSalientes::model()->getTextoNotaCredito($_GET['idTipo'],$tipoImpresion);
                        $url=Yii::app()->createUrl('facturasSalientes/notasCredito');
                    }
                    break;
                    case 'facturaX':{
                        $texto=  FacturasSalientes::model()->getTextoFactura($_GET['idTipo']);
                        $url=Yii::app()->createUrl('facturasSalientes');
                    }
                    
                        break;
                    case 'facturaA':{
                        $fact=  FacturasSalientes::model()->findByPk($_GET['idTipo']);
                        $tal=  Talonario::model()->findByPk($fact->talonarioId);
                        $tipoImpresion=Impresiones::model()->getTipoImpresion('facturaA');
                  
                        $texto=  FacturasSalientes::model()->getTextoFactura($_GET['idTipo'],$tipoImpresion,$tal->esElectronica?1:null);
                        $url=Yii::app()->createUrl('facturasSalientes');
                    }
                        break;
                    case 'facturaB':{
                        $fact=  FacturasSalientes::model()->findByPk($_GET['idTipo']);
                        $tal=  Talonario::model()->findByPk($fact->talonarioId);
                        $tipoImpresion=Impresiones::model()->getTipoImpresion('facturaB');
                     
                        $texto=  FacturasSalientes::model()->getTextoFactura($_GET['idTipo'],$tipoImpresion,$tal->esElectronica?1:null);
                        $url=Yii::app()->createUrl('facturasSalientes');
                    }
                        break;
                    default:
                        break;
                }
                    
                    $puerto=$_SERVER['SERVER_PORT']=='80'?'':':'.$_SERVER['SERVER_PORT'];
                    $host='http://'.$_SERVER['SERVER_NAME'].$puerto;
                  
                    echo 'Enviando impresion! .. aguarde un momento, en segundos sera redirigido';
                    Impresiones::model()->imprimirJava($texto, $_GET['tipo'], $host.$url, 1);
                    
            }else{
                                   $this->renderPartial('/impresiones/_vistaImpresion', array(
                                   'model'=>OrdenesTrabajo::model(),'id'=>$_GET['id'],'tipo'=>$_GET['tipo'],
                                 ),
                          false,true);
                                   Yii::app()->end();
            }

            
        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
        
	public function actionLibrosiva()
	{
		$model=new Impresiones;
		$model->tipoLibro=$_GET['tipo'];
		$this->render('librosiva',array(
			'model'=>$model,
		));
	}
private function imprimirLibroIvaventas($fechaInicio,$fechaFin)
	{
    $fechaInicio= $fechaInicio." 00:00:00";
    $fechaFin= $fechaFin." 23:59:59";
		$model=Facturas::model();
		Yii::import('application.vendors.PHPExcel',true);
		$objPHPExcel = new PHPExcel();

		$i=0;
		
		foreach(Talonario::model()->findAll() as $talonario){
			$datos=$model->consultarLibro($talonario->idTalonario,$fechaInicio,$fechaFin);
			$objPHPExcel=$this->setHojaLibroventas($objPHPExcel,$datos,$talonario->tipoTalonario.' '.$talonario->letraTalonario.' '.$talonario->descripcion,$i,$fechaInicio,$fechaFin,$talonario);
			$i++;
			$objPHPExcel->createSheet();
		}
		
		
                
        $nombreArchivo=$fechaInicio.'@'.$fechaFin;
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$nombreArchivo.'.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
      	Yii::app()->end();
	}

	/**
	 * Manages all models.
	 */
        public function actionExportar()
        {
            if(isset($_POST['fechaInicio']))
            switch ($_POST['resumen']) {
                case 'citiVentas':{
                    $resumen=FacturasSalientes::model()->getTextoCitiVentas($_POST['fechaInicio'],$_POST['fechaFin']);
                    $this->exportar($resumen,'citiVentas'.$_POST['fechaInicio'].'_'.$_POST['fechaFin'].'.txt');
                }break;
                case 'alicuotasCitiVentas':{
                    $resumen=FacturasSalientes::model()->getTextoAlicuotaVentas($_POST['fechaInicio'],$_POST['fechaFin']);
                    $this->exportar($resumen,'alicuotasCitiVentas'.$_POST['fechaInicio'].'_'.$_POST['fechaFin'].'.txt');
                }break;
                case 'alicuotasCitiCompras':{
                    $resumen=FacturasEntrantes::model()->getTextoAlicuotaCompras($_POST['fechaInicio'],$_POST['fechaFin']);
                    $this->exportar($resumen,'alicuotasCitiCompras'.$_POST['fechaInicio'].'_'.$_POST['fechaFin'].'.txt');
                }break;
                case 'citiCompras':{
                    $resumen=FacturasEntrantes::model()->getTextoCitiCompras($_POST['fechaInicio'],$_POST['fechaFin']);
                    $this->exportar($resumen,'citiCompras'.$_POST['fechaInicio'].'_'.$_POST['fechaFin'].'.txt');
                }break;

                default:
                    break;
            }
            $resumen=isset($_POST['resumen'])?$_POST['resumen']:'';
            $fechaInicio=isset($_POST['fechaInicio'])?$_POST['fechaInicio']:'';
            $fechaFin=isset($_POST['fechaFin'])?$_POST['fechaInicio']:'';
            $this->render('exportar',array('resumen'=>$resumen,'fechaInicio'=>$fechaInicio,'fechaFin'=>$fechaFin
		));
        }
        
        private function exportar($datos,$archivo)
        {
            $path=dirname(__FILE__).'/../../images/presupuestos/'.$archivo;
            $salida='';
            $puerto=$_SERVER['SERVER_PORT']=="80"?"":":".$_SERVER['SERVER_PORT'];
            $nombreServidor=$_SERVER['SERVER_NAME'].$puerto;
             $fp = fopen($path,"w+");
fwrite($fp, $datos. PHP_EOL);
fclose($fp);

             $direccionDest='images/presupuestos/'.$archivo;
          
            $this->redirect($direccionDest);
        }
	private function setHojaLibroventas($objPHPExcel,$datos,$nombreHoja,$nroHoja,$fechaDesde,$fechaHasta,$talonario)
	{
         
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
		$numeroIndiceHoja=count($datos)>0 ? Facturas::model()->getNroHoja($datos[0]):0;
		$apartirDe=count($datos)>0 ? Facturas::model()->aPartir($datos[0]):1;
		$numeroIndiceHoja++;

		$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('L1', 'Nro Hoja');
            $objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('M1', $numeroIndiceHoja);
		$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B1', 'Nro Fact.')
            ->setCellValue('C1', 'Fecha')
            ->setCellValue('D1', 'Razón Social')
            ->setCellValue('E1', 'Cuit')
            ->setCellValue('F1', 'NETO Iva 10.5')
            ->setCellValue('G1', 'NETO Iva 21')
            ->setCellValue('H1', 'I.V.A 10.5')
            ->setCellValue('I1', 'I.V.A 21')
            ->setCellValue('J1', 'Total');
            
    $fila=2;
    $sumIva=0;
    $sumNeto=0;
    $sumTotal=0;

    $indexCantidad=58;
    for($i=0;$i<count($datos);$i++){
    	$item=$datos[$i];
        $estado=$item->estado=="ANULADA"?"(A)":"";
        $razonSocial=$item->cliente->razonSocial.$estado;

        $iva=$item->importe/1.21;
        $importe=$item->importe ;
        $iva21=$item->importe-($item->importe/1.21);
        if($item->estado=="ANULADA"){
            $iva=0;
            $importe=0;
            $iva21=0;
        }
    	
    	$nroFactura='0001-'.str_pad($item->nroFactura,8,"0",STR_PAD_LEFT);
    	$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B'.$fila, $nroFactura)
            ->setCellValue('C'.$fila, Yii::app()->dateFormatter->format("dd-M-y",$item->fecha))
            ->setCellValue('D'.$fila, $razonSocial)
            ->setCellValue('E'.$fila, $item->cliente->cuit)
            ->setCellValue('F'.$fila, '0.00')
            ->setCellValue('G'.$fila,$iva)
            ->setCellValue('H'.$fila, "0.00")
            ->setCellValue('I'.$fila, $iva21 )
            ->setCellValue('J'.$fila, $importe)
           ;
        $sumIva+=$iva21;
        $sumNeto+=$iva;
        $sumTotal+=$importe;

          $indexCantidad--;
           if($indexCantidad==0){
           	 $numeroIndiceHoja++;
        	$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('L'.$fila, 'Nro Hoja');
            $objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('M'.$fila, $numeroIndiceHoja);
           
            $indexCantidad=58;

        }
         $fila++;
    }
    $fila++;
 $objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('G'.$fila,$sumNeto)
            ->setCellValue('I'.$fila, $sumIva)
            ->setCellValue('J'.$fila, $sumTotal );
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

$filamasuno=$fila+1;

 $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader($talonario->tipoTalonario.' '.$talonario->letraTalonario.'         FECHA DESDE: '.$fechaDesde.' FECHA HASTA: '.$fechaHasta.'				RAZON SOCIAL: IÑIGUEZ GUILLERMO Y BOGUNOVIC PABLO SH 			CUIT: 30 - 71211725 - 30 ');
 
//$objPHPExcel->getActiveSheet()->setCellValue('F'.$filamasuno, '=SUM(F6:F'.$fila.')');
//$objPHPExcel->getActiveSheet()->setCellValue('G'.$filamasuno, '=SUM(G6:G'.$fila.')');
//$objPHPExcel->getActiveSheet()->setCellValue('H'.$filamasuno, '=SUM(H6:H'.$fila.')');
//$objPHPExcel->getActiveSheet()->setCellValue('I'.$filamasuno, '=SUM(I6:I'.$fila.')');
//$objPHPExcel->getActiveSheet()->setCellValue('J'.$filamasuno, '=SUM(J6:J'.$fila.')');
// 

$objPHPExcel->getActiveSheet()->getStyle('F1:J'.$filamasuno)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
	
//seteo del encabezado de la tabla
$styleArray = array(
	'font' => array(
		'bold' => true,
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	),
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
		),
	),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => 'BDC61C',
		),
		'endcolor' => array(
			'argb' => 'ACFFA9',
		),
	),
);

$objPHPExcel->getActiveSheet()->getStyle('B1:J1')->applyFromArray($styleArray);


$styleArray2 = array(

	
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
		),
	),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => 'BDC61C',
		),
		'endcolor' => array(
			'argb' => 'ACFFA9',
		),
	),
);

$objPHPExcel->getActiveSheet()->getStyle('B1:J'.$filamasuno)->applyFromArray($styleArray2);

// Seteo del tamanio de la pagina
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
// tambien reducirla para que se vea completa en la hoja tipo LEGAL
$objPHPExcel->getActiveSheet()->getPageSetup()->setScale(68);

// Decirle a excel que centre la pagina en la vista preliminar
$objPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setVerticalCentered(false);





	
	$objPHPExcel->getActiveSheet()->setTitle($nombreHoja);
	return $objPHPExcel;
	}
	public function actionIvalibro()
	{
		$model=new Impresiones;
		
		if($_POST['Impresiones']['tipoLibro']=='Compras')
		{
			//compras
			$this->imprimirIvaCompras
		($_POST['Impresiones']['fechaInicio'],$_POST['Impresiones']['fechaFin']);
		}
		
		if($_POST['Impresiones']['tipoLibro']=='Ventas') {
			//ventas
			$this->imprimirLibroIvaventas
		($_POST['Impresiones']['fechaInicio'],$_POST['Impresiones']['fechaFin']);
		}
		
		
		
		
	}
private function imprimirIvaCompras($fechaInicio,$fechaFin)
	{
		$model=FacturasEntrantes::model();
	
		
		$datosA=$model->consultarLibro('A',$fechaInicio,$fechaFin);
		$datosB=$model->consultarLibro('B',$fechaInicio,$fechaFin);
		
		Yii::import('application.vendors.PHPExcel',true);
        $objPHPExcel = new PHPExcel();
             
		$objPHPExcel=$this->setHojaLibroCompras($objPHPExcel,$datosA,'FACTURAS A',0,$fechaInicio,$fechaFin);
		$objPHPExcel->createSheet();
		$objPHPExcel=$this->setHojaLibroCompras($objPHPExcel,$datosB,'FACTURAS B',1,$fechaInicio,$fechaFin);
    $nombreArchivo=$fechaInicio.'@'.$fechaFin;
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$nombreArchivo.'.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}
	private function setHojaLibroCompras($objPHPExcel,$datos,$nombreHoja,$nroHoja,$fechaInicio,$fechaFin)
	{
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
		$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B1', 'Nro Fact.')
            ->setCellValue('C1', 'Fecha')
            ->setCellValue('D1', 'Razón Social')
            ->setCellValue('E1', 'Cuit')
            ->setCellValue('F1', 'NETO Iva 10.5')
            ->setCellValue('G1', 'NETO Iva 21')
            ->setCellValue('H1', 'NETO Iva 27')
            ->setCellValue('I1', 'I.V.A 10.5')
            ->setCellValue('J1', 'I.V.A 21')
            ->setCellValue('K1', 'I.V.A 27')
            ->setCellValue('L1', 'Bruto')
              
;
            
            
$fil=2;
$total=0;

$importeTotal_105=0;
              $importeTotal_21=0;
              $importeTotal_27=0;
              $ivaTotal_105=0;
              $ivaTotal_21=0;
              $ivaTotal_27=0;
    for($i=0;$i<count($datos);$i++){

    	$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B'.$fil, $datos[$i]['numeroFactura'])
            ->setCellValue('C'.$fil, $datos[$i]['fecha'])
            ->setCellValue('D'.$fil, $datos[$i]['nombreProveedor'])
            ->setCellValue('E'.$fil, $datos[$i]['cuitProveedor'])
            
            ;
            //print_r($peto);exit;
            $alicuotas=FacturasEntrantes::model()->getAlicuotas($datos[$i]['idFacturaEntrante']);
            $importe_21=0;
              $importe_105=0;
              $importe_27=0;
              $iva_105=0;
              $iva_21=0;
              $iva_27=0;
              $totalLinea=0;
            foreach($alicuotas as $key=>$val){
               $val=$val-$datos[$i]['importeDescuentos']+$datos[$i]['importeRecargos']+$datos[$i]['importeImpuestos'];
           
              $arrAlic=explode('_',$key);
              $porcentaje= $arrAlic[1]/100;
              $labPorcentaje=(str_replace('.', '', ($arrAlic[1])/100));
              $labPorcentaje=$labPorcentaje*1;
              $nomVarImporte='importe_'.$labPorcentaje;
              $nomVarIva='iva_'.$labPorcentaje;
              $nomVarImporteTotal='importeTotal_'.$labPorcentaje;
              $nomVarIvaTotal='ivaTotal_'.$labPorcentaje;
              

              $$nomVarIva=$val*$porcentaje;
              $$nomVarImporte=$val;
             
              $$nomVarImporteTotal+=$$nomVarImporte;
              $$nomVarIvaTotal+=$$nomVarIva;

              $totalLinea= $$nomVarIva+$$nomVarImporte;
            }
            $objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('F'.$fil, number_format($importe_105,2))
            ->setCellValue('G'.$fil, number_format($importe_21,2))
            ->setCellValue('H'.$fil, number_format($importe_27,2))
            ->setCellValue('I'.$fil, number_format($iva_105,2))
            ->setCellValue('J'.$fil, number_format($iva_21,2))
            ->setCellValue('K'.$fil, number_format($iva_27,2))
            ->setCellValue('L'.$fil, number_format($totalLinea,2));
            $total+=$totalLinea;

           
            $fil++;
    }
    $objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('F'.$fil, number_format($importeTotal_105,2))
            ->setCellValue('G'.$fil, number_format($importeTotal_21,2))
            ->setCellValue('H'.$fil, number_format($importeTotal_27,2))
            ->setCellValue('I'.$fil, number_format($ivaTotal_105,2))
            ->setCellValue('J'.$fil, number_format($ivaTotal_21,2))
            ->setCellValue('K'.$fil, number_format($ivaTotal_27,2))
            ->setCellValue('L'.$fil, number_format($total,2))
            ;
$objPHPExcel->getActiveSheet()->getStyle('F1:L'.$fil+1)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
  $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

  $styleArray = array(
  'font' => array(
    'bold' => true,
  ),
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
  ),
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),         
  ),
);
  $styleArray2 = array(
  'font' => array(
  ),
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
  ),
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),
  ),
);
$styleArray3 = array(
  'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'F28A8C'
        ),
  'font' => array(
  ),
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
  ),
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),
  ),
);
$objPHPExcel->getActiveSheet()->getStyle('B1:L1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('B1:L'.$fil)->applyFromArray($styleArray2);
$objPHPExcel->getActiveSheet()
    ->getStyle('I2:I'.$fil)
    ->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '85B8E4')
            )
        )
    );
    $objPHPExcel->getActiveSheet()
    ->getStyle('J2:J'.$fil)
    ->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '85B8E4')
            )
        )
    );
    $objPHPExcel->getActiveSheet()
    ->getStyle('K2:K'.$fil)
    ->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '85B8E4')
            )
        )
    );

// Seteo del tamanio de la pagina
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
// tambien reducirla para que se vea completa en la hoja tipo LEGAL
$objPHPExcel->getActiveSheet()->getPageSetup()->setScale(68);

// Decirle a excel que centre la pagina en la vista preliminar
$objPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('         FECHA DESDE: '.$fechaInicio.' FECHA HASTA: '.$fechaFin.'        RAZON SOCIAL: IÑIGUEZ GUILLERMO Y BOGUNOVIC PABLO SH      CUIT: 30 - 71211725 - 30 ');
 




	$objPHPExcel->getActiveSheet()->setTitle($nombreHoja);
	return $objPHPExcel;
	}
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Impresiones;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Impresiones']))
		{
			$model->attributes=$_POST['Impresiones'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idImpresion));
		}
		$model->idTipoImpresion=isset($_GET['idTipo'])?$_GET['idTipo']:0;
		$model->tipoImpresion=$_GET['tipoImpresion'];
		$model->fechaImpresion=date('Y-m-d');
		
		$parametro['idCliente']=isset($_GET['idCliente'])?$_GET['idCliente']:'';
		$parametro['fechaInicio']=isset($_GET['fechaInicio'])?$_GET['fechaInicio']:'';
		$parametro['fechaFin']=isset($_GET['fechaFin'])?$_GET['fechaFin']:''; 
		$parametro['idPago']=isset($_GET['idPago'])?$_GET['idPago']:''; 
		$parametro['idProveedor']=isset($_GET['idProveedor'])?$_GET['idProveedor']:''; 
                $parametro['cantidadExtra']=isset($_GET['cantidadExtra'])?$_GET['cantidadExtra']:''; 
                $parametro['cantidadCliente']=isset($_GET['cantidadCliente'])?$_GET['cantidadCliente']:''; 
		
		$model->textoImpresion=$this->getTextoImpresion($model->tipoImpresion,$model->idTipoImpresion,$parametro);
		
		$this->renderPartial('verImpresion',array(
			'model'=>$model,false
		));
	}
	private function fechaRip($fecha)
	{
		
	}
	private function getTextoImpresion($tipo,$idTipo,$parametros=null)
	{
		switch ($tipo) {
		case 'facturasCompra':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_FACTURASCOMPRA');
        	$items=FacturasEntrantes::model()->consultarComprasMes($idTipo);

			$texto = str_replace("%items", $this->getFacturasCompra($items),$texto);
			return $texto;
			}
		case 'tareasPendientes':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_MANTENIMIENTO_PEND');
        	$tareas=Tareas::model()->consultarTareasPendientes($idTipo);
			$cliente=Clientes::model()->findByPk($idTipo);
			$nombreCliente=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
        	$texto = str_replace("%cliente",   $nombreCliente,$texto);
        	$texto = str_replace("%fechaActual",   date('d-m-Y'),$texto);        	

			$texto = str_replace("%tareas", $this->getInformeTareas($tareas),$texto);
			return $texto;
			}
		case 'stock':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_STOCK');
				$modelo=Balances::model();
				
				$informe=$modelo->consultarStockServicio("STOCK");

				$texto = str_replace("%stock", $this->getStock($informe),$texto);
				return $texto;
			}
		case 'servicios':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_SERVICIO');
				$modelo=Balances::model();
				
				$informe=$modelo->consultarStockServicio("SERVICIO");

				$texto = str_replace("%servicio", $this->getServicio($informe),$texto);
				return $texto;
			}
		case 'proveedores':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_PROVEEDOR');
				$modelo=Balances::model();
				
				$informe=$modelo->consultarProveedores();

				$texto = str_replace("%proveedores", $this->getProveedores($informe),$texto);
				return $texto;
			}
			case 'clientes':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_CLIENTES');
				$modelo=Balances::model();
				
				$informe=$modelo->consultarClientes();

				$texto = str_replace("%clientes", $this->getClientes($informe),$texto);
				return $texto;
			}
			case 'resumenMorosos':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_MOROSOS');
				$modelo=Balances::model();
				
				$informe=$modelo->consultarMorosos();

				$texto = str_replace("%informe", $this->getMorosos($informe),$texto);
				return $texto;
			}
			case 'resumenDeudores':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_DEUDORES');
				$modelo=Balances::model();
				
				$informe=$modelo->consultarDeudores();

				$texto = str_replace("%informe", $this->getDEudores($informe),$texto);
				return $texto;
			}
			case 'resumenOrdenes':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_ORDENES');
				$modelo=Balances::model();
				
				$informe=$modelo->consultarInformeOrdenes($parametros['fechaInicio'],$parametros['fechaFin']);
				$detalle=$modelo->consultarDetalleOrdenes($parametros['fechaInicio'],$parametros['fechaFin']);
				
				$texto = str_replace("%fechaInicio",$parametros['fechaInicio'],$texto);
				$texto = str_replace("%fechaFin", $parametros['fechaFin'],$texto);
				$texto = str_replace("%informe", $this->getInformeOrdenes($informe),$texto);
				$texto = str_replace("%detalle", $this->getDetalleOrdenes($detalle),$texto);
				return $texto;
			}
			case 'informeVentas':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_INFORME_VENTAS');
				$modelo=Balances::model();
				
				$informe=$modelo->consultarInformeVentas($parametros['fechaInicio'],$parametros['fechaFin']);
				$detalle=$modelo->consultarDetalleVentas($parametros['fechaInicio'],$parametros['fechaFin']);
				$informePagos=$modelo->consultarInformePagos($parametros['fechaInicio'],$parametros['fechaFin']);
				
				$texto = str_replace("%fechaInicio", $parametros['fechaInicio'],$texto);
				$texto = str_replace("%fechaFin", $parametros['fechaFin'],$texto);
				$texto = str_replace("%informe", $this->getInformeVentas($informe),$texto);
                $texto = str_replace("%pagos", $this->getInformePagos($informePagos),$texto);
				$texto = str_replace("%detalle", $this->getDetalleVentas($detalle),$texto);
				//$texto = str_replace("%tipoProducto", $this->getInformeVentas($tipoProducto),$texto);
				return $texto;
			}
			case 'facturacionContable':
			{
        		$texto=Yii::app()->settings->getKey( 'IMPRESION_FACTURACION_CONTABLE');
				$modelo=Balances::model();
				
				$facturacionSaliente=$modelo->consultarFacturacionSalienteContable($parametros['fechaInicio'],$parametros['fechaFin']);
				$facturacionEntrante=$modelo->consultarFacturacionEntranteContable($parametros['fechaInicio'],$parametros['fechaFin']);
				$facturacion=$modelo->consultarFacturacion($parametros['fechaInicio'],$parametros['fechaFin']);
				
				$texto = str_replace("%fechaInicio", $parametros['fechaInicio'],$texto);
				$texto = str_replace("%fechaFin", $parametros['fechaFin'],$texto);
				$texto = str_replace("%facturacionEntrante", $this->getFacturacion($facturacionSaliente),$texto);
				$texto = str_replace("%facturacionSaliente", $this->getFacturacion($facturacionEntrante),$texto);
				$texto = str_replace("%facturacion",  $this->getFacturacionResultado($facturacion),$texto);
				
				
				return $texto;
			}
			case 'presupuesto':
			{
			$texto=Presupuestos::model()->getTextoPresupuesto($idTipo);
			
			return $texto;
			}
			case 'saldoProveedores':
			{
        	$texto=Yii::app()->settings->getKey( 'SALDO_PROVEEDORES');
        	
        	
			$modelo=new FacturasEntrantes;
			$detalleSaldo=$modelo->consultarSaldoProveedores($parametros['fechaInicio'],$parametros['fechaFin']);
			
			$texto = str_replace("%fechaInicio",  $parametros['fechaInicio'], $texto);
			$texto = str_replace("%fechaFin", $parametros['fechaFin'],$texto);
			
			$texto = str_replace("%detalle",$this->getSaldoProveedores($detalleSaldo),$texto);	
			
			return $texto;
			}
			case 'saldoProveedor':
			{
        	$texto=Yii::app()->settings->getKey( 'SALDO_PROVEEDOR');
        	
        	
			$modelo=new FacturasEntrantes;
			$detalleSaldo=$modelo->consultarSaldoProveedor($parametros['fechaInicio'],$parametros['fechaFin'],$parametros['idProveedor']);
			
        	$proveedor= Proveedores::model()->findByPk($parametros['idProveedor']);
        	$nombreProveedor=$proveedor->nombre;
        	
			$texto = str_replace("%proveedor", $nombreProveedor,$texto);
			$texto = str_replace("%fechaInicio",  $parametros['fechaInicio'], $texto);
			$texto = str_replace("%fechaFin", $parametros['fechaFin'],$texto);
			
			$texto = str_replace("%detalle",$this->getSaldoProveedor($detalleSaldo),$texto);	
			
			return $texto;
			}
			case 'saldoEmpresa':
			{
        	$texto=Yii::app()->settings->getKey( 'SALDO_EMPRESA');
        	
        	
			$modelo=new FacturasSalientes;
			$detalleSaldo=$modelo->consultarSaldoEmpresa($parametros['fechaInicio'],$parametros['fechaFin']);
			$saldoAnterior=$modelo->consultarSaldoAnteriorEmpresa($parametros['fechaInicio']);
			$porCuenta=$modelo->consultarSaldoPorCuenta($parametros['fechaInicio'],$parametros['fechaFin']);
			
			$texto = str_replace("%saldoAnterior",  Yii::app()->numberFormatter->formatCurrency($saldoAnterior,"$"), $texto);
			$texto = str_replace("%fechaInicio",  $parametros['fechaInicio'], $texto);
			$texto = str_replace("%fechaFin", $parametros['fechaFin'],$texto);
			
			$texto = str_replace("%detalle",$this->getSaldoEmpresa($detalleSaldo),$texto);	
			
			return $texto;
			}
			case 'saldoCliente':
			{
        	$texto=Yii::app()->settings->getKey( 'SALDO_CLIENTE');
        	
        	
			$modelo=new FacturasSalientes;
			$saldoAnterior=$modelo->consultarSaldoAnteriorCliente($parametros['fechaInicio'],$parametros['idCliente']);
			
			$detalleSaldo=$modelo->consultarSaldoCliente($parametros['fechaInicio'],$parametros['fechaFin'],$parametros['idCliente']);
			
        	$cliente= Clientes::model()->findByPk($parametros['idCliente']);
        	$nombreCliente=$cliente->razonSocial.' '.$cliente->apellido.' '.$cliente->nombre;
        	
        	$texto = str_replace("%saldoAnterior", Yii::app()->numberFormatter->formatCurrency($saldoAnterior,"$"),$texto);
			$texto = str_replace("%cliente", $nombreCliente,$texto);
			$texto = str_replace("%fechaInicio",  $parametros['fechaInicio'], $texto);
			$texto = str_replace("%fechaFin", $parametros['fechaFin'],$texto);
			
			$texto = str_replace("%telefono", $cliente->telefono,$texto);
			$texto = str_replace("%celular", $cliente->celular,$texto);
			$texto = str_replace("%detalle",$this->getSaldo($detalleSaldo),$texto);	
			
			return $texto;
			}
			case 'recibopago':
			{
        	$texto=Yii::app()->settings->getKey( 'IMPRESION_RECIBOPAGO');
        	
        	
			
        	$cliente= Clientes::model()->findByPk($parametros['idCliente']);
        	$nombreCliente=$cliente->razonSocial.' '.$cliente->apellido.' '.$cliente->nombre;
        	
			$texto = str_replace("%cliente", $nombreCliente,$texto);
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$texto = str_replace("%fecha", Yii::app()->dateFormatter->format("dd-M-y",date('Y-m-d')),$texto);
			$texto = str_replace("%domicilio", $cliente->direccion,$texto);
			$texto = str_replace("%localidad", 'Comodoro Rivadavia',$texto);
			$texto = str_replace("%condicionIva", $cliente->condicionIva,$texto);
			$texto = str_replace("%telefono", $cliente->telefono,$texto);
			$texto = str_replace("%celular", $cliente->celular,$texto);
			$texto = str_replace("%cuit", $cliente->cuit,$texto);
			$texto = str_replace("%condicionVenta", $cliente->condicionVenta,$texto);	
			
			$pago = Pagos::model()->findByPk($parametros['idPago']);

			$texto = str_replace("%importe", $pago->importeDinero,$texto);	
			$texto = str_replace("%detalle", $pago->detalle,$texto);	
			
			return $texto;
			}
			//nuevo case para tareasclientes!!!
		case 'informeTareas':
        {
        	$texto=Yii::app()->settings->getKey( 'IMPRESION_MANTENIMIENTO');
        	$tareas=Tareas::model()->consultarInformeTareas
        	($parametros['idCliente'],$parametros['fechaInicio'],$parametros['fechaFin']);

        	$texto = str_replace("%cliente",   $tareas[0]['cliente'],$texto);
        	$texto = str_replace("%fechaActual",   date('d-m-Y'),$texto);        	
        	$texto = str_replace("%fechaInicio",  $parametros['fechaInicio'],$texto);
        	$texto = str_replace("%fechaFin", $parametros['fechaFin'],$texto);
			$texto = str_replace("%tareas", $this->getInformeTareas($tareas),$texto);
			return $texto;
        }
		case 'misTareas':
        {
        	$texto=Yii::app()->settings->getKey( 'MIS_TAREAS');
        	$tareas=Tareas::model()->consultarMisTareas(1000);
        	
			$texto = str_replace("%fecha", date('Y-m-d'),$texto);
			$texto = str_replace("%usuario", Yii::app()->user->nombre,$texto);
			$texto = str_replace("%tareas", $this->getMisTareas($tareas),$texto);
			return $texto;
        }
        case 'tareasMiArea':
        {
        	$texto=Yii::app()->settings->getKey( 'TAREAS_MI_AREA');
        	$tareas=Tareas::model()->consultarMiArea(1000);
        	
			$texto = str_replace("%fecha", date('Y-m-d'),$texto);
			$texto = str_replace("%usuario", Yii::app()->user->nombre,$texto);
			$texto = str_replace("%tareas", $this->getMisTareas($tareas),$texto);
			return $texto;
        }
    	case 'factura':
        {
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->WriteHTML( FacturasSalientes::model()->getTextoFactura($idTipo));
            $content_PDF = $html2pdf->Output('file.pdf');
            return  FacturasSalientes::model()->getTextoFactura($idTipo);
			
        }
        break;
    	case 'orden':
        {
            $extras='';
            $fCliente='';
            if($parametros['cantidadExtra']>0)
                for ($index = 0; $index < $parametros['cantidadExtra']; $index++) 
                    $extras.=OrdenesTrabajo::model ()->getFormaOrden ($idTipo);
                
            if($parametros['cantidadCliente']>0)
                for ($index = 0; $index < $parametros['cantidadCliente']; $index++) 
                    $fCliente.=OrdenesTrabajo::model ()->getFormaOrdenExtra ($idTipo);
                
            
			return $extras.'<br>'.$fCliente;
        }
        break;
    	case 'ordenPlanilla':
        {
        	$orden=OrdenesTrabajo::model()->findByPk($idTipo);
        	$cliente= Clientes::model()->findByPk($orden->idCliente);
                $nombreCliente=$cliente->razonSocial.' '.$cliente->apellido.' '.$cliente->nombre;
        	$val=Yii::app()->settings->getKey( 'ORDEN_TRABAJO_PLANILLA');
			$val = str_replace("%cliente", $nombreCliente);
			$val = str_replace("%motivo", $orden->descripcionCliente,$val);
			$val = str_replace("%descripcionEncargado", $orden->descripcionEncargado,$val);
			$val = str_replace("%descripcionCliente", $orden->descripcionCliente,$val);
			$val = str_replace("%telefono", $cliente->telefono."/".$cliente->celular,$val);
			
			$val = str_replace("%prioridad", $orden->prioridad,$val);
			$val = str_replace("%nroOrden", $orden->idOrdenTrabajo,$val);
			$val = str_replace("%fechaOrden", $orden->fechaIngreso,$val);
			return $val;
        }
        break;
    	case 'Factura':
       	{
       		
       	}
        	break;
	}
	}
	private function getInformeTareas($tareas)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					
					"	<th>    Fecha     </th>".
					"	<th><small>Prioridad<br>Tipo</small></th>".
					"	<th>Descripción</th>".
					
					"	<th>Estado</th>".
					"</tr>";
		$items=$tareas;
		for($i=0;$i<count($items);$i++){
			$salida.="<tr>" .

					"	<td>".Yii::app()->dateFormatter->format("dd/M/y",$items[$i]['fechaTarea'])."</td>".
					"	<td><small>".$items[$i]['prioridadTarea']."<br>".$items[$i]['tipoTarea']."<small></td>".
					"	<td>".$items[$i]['descripcionTarea']."<br><small><i>".$items[$i]['groupEstados']."</small></i></td>".
				
					"	<td>".$items[$i]['estadoTarea']."</td>".
					"</tr>";
		}
		$salida.="</table>";
		return $salida;		
	}
	private function getDeudores($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
		"	<th>Tipo Fact</th>".
					"	<th>Proveedor</th>".
					"	<th>Fecha</th>".
					"	<th>Detalle</th>".
					"	<th>Debe</th>".
					"	<th>Haber</th>".
					"	<th>Saldo</th>".
					"</tr>";

		$saldo=0;
		$total=0;
		foreach($items as $items){
		$saldo=$items['precio']-$items['importePagado'];
		$total+=$saldo;
			$salida.="<tr>" .
			"	<td>".$items['tipoFactura']."</td>".
					"	<td>".$items['proveedor']."</td>".
					"	<td>".$items['fecha']."</td>".
					"	<td>".$items['descripcion']."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($items['precio'],'$')."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($items['importePagado'],'$')."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</td>".
				
					"</tr>";
		}
		$salida.="<tr>" .
		"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<th>TOTAL</th>".
					"	<th>".Yii::app()->numberFormatter->formatCurrency($total,'$')."</th>".
				
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
	private function getInformeOrdenes($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .

					"	<th>Cantidad de Ordenes</th>".
					"	<th>Promedio</th>".

					"</tr>";

		foreach($items as $items){

			$salida.="<tr>" .
					"	<td>".$items['cantidadOrdenes']." Ordenes </td>".
					"	<td>".$items['promedioDias']." %</td>".

					"</tr>";
		}
		$salida.="</table>";
		return $salida;
	}
	
private function getServicio($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Producto</th>".
					"	<th>Detalle</th>".
					



					"	<th>Importe Sin IVA</th>".
					"	<th>Precio Lista</th>".
					"	<th>Precio Min.</th>".
		

		"	<th>% Iva</th>".
		
					"</tr>";

		foreach($items as $items){
//			$items['cantidadDisponible']=($items['tipoProducto']=='STOCK')?$items['cantidadDisponible']:"-";

			$salida.="<tr>" .
					"	<td>".$items['nombreStock']."</td>".
					"	<td>".$items['detalle']."</td>".

			"	<td>".Yii::app()->numberFormatter->formatCurrency($items['importeSinIva'],"$")."</td>".
			"	<td>".Yii::app()->numberFormatter->formatCurrency($items['precioLista'],"$")."</td>".
			"	<td>".Yii::app()->numberFormatter->formatCurrency($items['precioMinimo'],"$")."</td>".

			"	<td>".$items['porcentajeIva']."</td>".
			
				
					"</tr>";
		}
		$salida.="</table>";
		return $salida;
	}
private function getStock($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
				"	<th>Marca</th>".
					"	<th>Producto</th>".
					"	<th>Detalle</th>".
					"	<th>Tipo Producto</th>".
		"	<th>Disp.</th>".
					"	<th>Min</th>".
					"	<th>Max</th>".

					"	<th>Importe Sin IVA</th>".
					"	<th>Precio Lista</th>".
					"	<th>Precio Min.</th>".
		
					"	<th>% Gan. lista</th>".
					"	<th>% Gan. Min</th>".
					"	<th>Cod Barra</th>".
		"	<th>% Iva</th>".
		
					"</tr>";

		foreach($items as $items){
//			$items['cantidadDisponible']=($items['tipoProducto']=='STOCK')?$items['cantidadDisponible']:"-";

			$salida.="<tr>" .
					"	<td>".$items['nombreMarca']."</td>".
					"	<td>".$items['nombreStock']."</td>".
					"	<td>".$items['detalle']."</td>".
					"	<td>".$items['nombreTipoProducto']."</td>".
			"	<td>".$items['cantidadDisponible']."</td>".
					"	<td>".$items['min']."</td>".
					"	<td>".$items['max']."</td>".
			"	<td>".Yii::app()->numberFormatter->formatCurrency($items['importeSinIva'],"$")."</td>".
			"	<td>".Yii::app()->numberFormatter->formatCurrency($items['precioLista'],"$")."</td>".
			"	<td>".Yii::app()->numberFormatter->formatCurrency($items['precioMinimo'],"$")."</td>".

			
					"	<td>".$items['porcentajeGananciaLista']."</td>".
					"	<td>".$items['porcentajeGananciaMin']."</td>".
					"	<td>".$items['codigoBarra']."</td>".
			"	<td>".$items['porcentajeIva']."</td>".
			
				
					"</tr>";
		}
		$salida.="</table>";
		return $salida;
	}
	private function getDetalleOrdenes($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .

					"	<th>Cliente</th>".
					"	<th>Fecha Ingreso</th>".
					"	<th>Detalle</th>".
					"	<th>Fecha Ultimo Estado</th>".
					"	<th>Cant. Dias</th>".
					"	<th>Estado</th>".
					"</tr>";

		$saldo=0;
		$total=0;
		foreach($items as $items){

			$salida.="<tr>" .

					"	<td>".$items['cliente']."</td>".
					"	<td>".$items['fechaIngreso']."</td>".
					"	<td>".$items['descripcionCliente']."</td>".
					"	<td>".$items['fechaUltima']."</td>".
					"	<td>".$items['dias']."</td>".
					"	<td>".$items['ultimoEstado']."</td>".
				
					"</tr>";
		}
		$salida.="</table>";
		return $salida;
	}
	
private function getProveedores($items)
	{
		//impresion listado de clientes!!
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
		
					"	<th>Cod Proveedor</th>".
					"	<th>Nombre</th>".
					"	<th>Email</th>".
					"	<th>Rubro</th>".
					"	<th>Direccion</th>".
					"	<th>Telefono<br>celular</th>".
					"	<th>cuit</th>".
					"	<th>Localidad</th>".
					"	<th>Direccion</th>".
					"	<th>nro</th>".
					"</tr>";

		foreach($items as $items){
	$items['codigoProveedor']=isset($items['codigoProveedor'])?$items['codigoProveedor']:" ";
//		isset($_GET['idTipo'])?$_GET['idTipo']:0;
			$salida.="<tr>" .
			"	<td>".$items['codigoProveedor']."</td>".
			"	<td>".$items['nombre']."</td>".
					"	<td>".$items['email']."</td>".
					"	<td>".$items['rubro']."</td>".
					"	<td>".$items['direccion']."</td>".
					"	<td>".$items['celular']."<br>".$items['telefono']."</td>".
					"	<td>".$items['cuit']."</td>".
					"	<td>".$items['localidad']."</td>".
					"	<td>".$items['direccion']."</td>".
					"	<td>".$items['nro']."</td>".
				
					"</tr>";
		}

		$salida.="</table>";
		return $salida;
	}
private function getClientes($items)
	{
		//impresion listado de clientes!!
		$salida="<table class='sinFormato'>";
		$salida.="<tr>" .
		
					"	<td>Cod</td>".
					"	<td>Cliente</td>".
					"	<td>Nombre<br> Fantasia</td>".
					"	<td>Cond. Iva -".
					"	Cuit</td>".
					"	<td>Telefono</td>".
					"	<td>Juridiccion</td>".
					"	<td>Localidad</td>".
					"	<td>Direccion</td>".
					"	<td>Limite<br> Credito</td>".
					"</tr>";

		foreach($items as $items){

			$salida.="<tr>" .
			"	<td>".$items['codigoCliente']=isset($items['codigoCliente'])?$items['codigoCliente']:""."</td>".
			"	<td>".$items['cliente']."</td>".
					"	<td>".$items['nombreFantasia']."</td>".
					"	<td>".$items['condicionIva']."<br>".$items['cuit']."</td>".
//					"	<td>".$items['cuit']."</td>".
					"	<td>".$items['telefono']."</td>".
					"	<td>".$items['nombreJuridiccion']."</td>".
					"	<td>".$items['localidad']."</td>".
					"	<td>".$items['direccion']."</td>".
					"	<td>".$items['limiteCredito']."</td>".
				
					"</tr>";
		}
		

		$salida.="</table>";
		return $salida;
	}
	private function getMorosos($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
		"	<th>Nro Fact</th>".
					"	<th>Estado</th>".
					"	<th>Cliente</th>".
					"	<th>Fecha</th>".
					"	<th>Detalle</th>".
					"	<th>Debe</th>".
					"	<th>Haber</th>".
					"	<th>Saldo</th>".
					"</tr>";

		$saldo=0;
		$total=0;
		foreach($items as $items){
		$saldo=$items['importeFactura']-$items['pagos'];
		$total+=$saldo;
			$salida.="<tr>" .
			"	<td>".$items['estado']."</td>".
			"	<td>".$items['numeroFactura']."</td>".
					"	<td>".$items['cliente']."</td>".
					"	<td>".$items['fecha']."</td>".
					"	<td>".$items['descripcion']."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],'$')."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($items['pagos'],'$')."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</td>".
				
					"</tr>";
		}
		$salida.="<tr>" .
		"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<th>TOTAL</th>".
					"	<th>".Yii::app()->numberFormatter->formatCurrency($total,'$')."</th>".
				
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
	private function getSaldoProveedores($saldos)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Proveeedor</th>".
					"	<th>Fecha</th>".
					"	<th>Detalle</th>".
					"	<th>Debe</th>".
					"	<th>Haber</th>".
					"	<th>Saldo</th>".
					"</tr>";
		$items=$saldos;
		$saldo=0;
		$debeTotal=0;
		$haberTotal=0;
		foreach($items as $items){
			if($items['tipo']=='haber'){
				$debe='-';
				$haber=Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],"$");
				$saldo-=$items['importeFactura'];
				$haberTotal+=$items['importeFactura'];
			}else{
				$haber='-';
				$debe=Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],"$");
				$saldo+=$items['importeFactura'];
				$debeTotal+=$items['importeFactura'];
			}
			
			$salida.="<tr>" .
					"	<td>".$items['nombreProveedor']."</td>".
					"	<td>".$items['fecha']."</td>".
					"	<td>".$items['nombreFactura']."</td>".
					"	<td>".$debe."</td>".
					"	<td>".$haber."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</td>".
				
					"</tr>";
		}
		$salida.="<tr>" .
					"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($debeTotal,'$')."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($haberTotal,'$')."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</b></td>".
				
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
	
	private function getSaldoProveedor($saldos)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Fecha</th>".
					"	<th>Detalle</th>".
					"	<th>Debe</th>".
					"	<th>Haber</th>".
					"	<th>Saldo</th>".
					"</tr>";
		$items=$saldos;
		$saldo=0;
		$debeTotal=0;
		$haberTotal=0;
		foreach($items as $items){
			if($items['tipo']=='haber'){
				$debe='-';
				$haber=Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],"$");
				$saldo-=$items['importeFactura'];
				$haberTotal+=$items['importeFactura'];
			}else{
				$haber='-';
				$debe=Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],"$");
				$saldo+=$items['importeFactura'];
				$debeTotal+=$items['importeFactura'];
			}
			
			$salida.="<tr>" .
					"	<td>".$items['fecha']."</td>".
					"	<td>".$items['nombreFactura']."</td>".
					"	<td>".$debe."</td>".
					"	<td>".$haber."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</td>".
				
					"</tr>";
		}
		$salida.="<tr>" .
					"	<td></td>".
					"	<td></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($debeTotal,'$')."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($haberTotal,'$')."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</b></td>".
				
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
	private function getSaldo($saldos)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Fecha</th>".
					"	<th>Detalle</th>".
					"	<th>Debe</th>".
					"	<th>Haber</th>".
					"	<th>Saldo</th>".
					"</tr>";
		$items=$saldos;
		$saldo=0;
		foreach($items as $items){
			if($items['tipo']=='haber'){
				$debe='-';
				$haber=Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],"$");
				$saldo-=$items['importeFactura'];
			}else{
				$haber='-';
				$debe=Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],"$");
				$saldo+=$items['importeFactura'];
			}
			
			$salida.="<tr>" .
					"	<td>".$items['fecha']."</td>".
					"	<td>".$items['nombreFactura']."</td>".
					"	<td>".$debe."</td>".
					"	<td>".$haber."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</td>".
				
					"</tr>";
		}
		$salida.="</table>";
		return $salida;
	}
	private function getDetalleVentas($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Cantidad</th>".
					"	<th>$ venta</th>".
                                        "	<th>TOTAL</th>".
					"	<th>Producto</th>".

					"</tr>";
                $saldo=0;
		foreach($items as $item){
					$importeFinal=($item['importe']*$item['cantidadTotal'])+$item['interes']-$item['descuentos'];
                    $saldo+=$importeFinal;
			$salida.="<tr>" .
					"	<td>".$item['cantidadTotal']."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($item['importe'],'$')."</td>".
                                        "	<td>".Yii::app()->numberFormatter->formatCurrency($importeFinal,'$')."</td>".
					"	<td>".$item['nombreItem']."</td>".
					"</tr>";
		}
                $salida.="<tr>" .
					"	<td></td>".
					"	<td>TOTAL</td>".
                                        "	<td><b>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</b></td>".
					"	<td></td>".
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
	private function getInformeVentas($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Talonario</th>".
					"	<th>Importe</th>".
					//"	<th>Porcentaje</th>".

					"</tr>";

		$saldo=0;
		foreach($items as $item){
                    $saldo+=$item['importe'];
                    $nom=$item['tipo'];
			$salida.="<tr>" .
					"	<td>".$nom."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($item['importe'],'$')."</td>".
					//"	<td>".Yii::app()->numberFormatter->formatCurrency($item['porcentaje'],'%')."</td>".
					"</tr>";
		}
                $salida.="<tr>" .
					"	<td>TOTAL</td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</b></td>".
					//"	<td>".Yii::app()->numberFormatter->formatCurrency($item['porcentaje'],'%')."</td>".
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
        private function getInformePagos($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Forma de Pago</th>".
					"	<th>Importe</th>".
					//"	<th>Porcentaje</th>".

					"</tr>";

		$saldo=0;
		foreach($items as $item){
                        $saldo+=$item['importe'];
			$salida.="<tr>" .
					"	<td>".$item['nombreForma']."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($item['importe'],'$')."</td>".
					//"	<td>".Yii::app()->numberFormatter->formatCurrency($item['porcentaje'],'%')."</td>".
					"</tr>";
		}
                $salida.="<tr>" .
					"	<td>TOTAL</td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</b></td>".
					//"	<td>".Yii::app()->numberFormatter->formatCurrency($item['porcentaje'],'%')."</td>".
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
	private function getFacturacionResultado($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th></th>".
					"	<th>Importe</th>".
					"	<th>I.V.A 10.5 %</th>".
					"	<th>I.V.A 21 %</th>".
					"	<th></th>".
				
					"</tr>";
		
		$saldo=0;
		$importe=0;
		$importe105=0;
		$importe21=0;
		$importex=0;
		$importe105x=0;
		$importe21x=0;
		foreach($items as $item){
			$importe=($item['tipo']=='debito')?$importe+$item['importe']:$importe-$item['importe'];
			$importe105=($item['tipo']=='debito')?$importe105+$item['importe105']:$importe105-$item['importe105'];
			$importe21=($item['tipo']=='debito')?$importe21+$item['importe21']:$importe21-$item['importe21'];
			
			if($item['tipoFactura']!='X'){
				$importex=($item['tipo']=='debito')?$importex+$item['importe']:$importex-$item['importe'];
				$importe105x=($item['tipo']=='debito')?$importe105x+$item['importe105']:$importe105x-$item['importe105'];
				$importe21x=($item['tipo']=='debito')?$importe21x+$item['importe21']:$importe21x-$item['importe21'];
			}
			

			
		}
		$salida.="<tr>" .
					"	<td>GANANCIA (dif. compras y ventas)</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($importe,"$")."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($importe105,"$")."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($importe21,"$")."</td>".
					"	<td>TOTAL de IVA a PAGAR ".Yii::app()->numberFormatter->formatCurrency($importe21+$importe105,"$")."</td>".
				
					"</tr>";
//		$salida.="<tr>" .
//					"	<td>DIFERENCIA sin X</td>".
//					"	<td>".Yii::app()->numberFormatter->formatCurrency($importex,"$")."</td>".
//					"	<td>".Yii::app()->numberFormatter->formatCurrency($importe105x,"$")."</td>".
//					"	<td>".Yii::app()->numberFormatter->formatCurrency($importe21x,"$")."</td>".
//					"	<td>TOTAL ".Yii::app()->numberFormatter->formatCurrency($importe21x+$importe105x,"$")."</td>".
//				
//					"</tr>";
//		$salida.="<tr>" .
//					"	<th>GANANCIA (con facturas X)</th>".
//					"	<td><b>".Yii::app()->numberFormatter->formatCurrency(-$importe-($importe21+$importe105),"$")."</b></td>".
//					"	<td><b></b></td>".
//					"	<td><b></b></td>".
//					"	<td></td>".
//				
//					"</tr>";
		$salida.="</table>";
		return $salida;
	}
	private function getFacturacion($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Cantidad</th>".
					"	<th>Importe</th>".
					"	<th>I.V.A 10.5 %</th>".
					"	<th>I.V.A 21 %</th>".
					"	<th>Tipo Factura</th>".
				
					"</tr>";
		
		$saldo=0;
		$importe=0;
		$importe105=0;
		$importe21=0;
		$importex=0;
		$importe105x=0;
		$importe21x=0;
		foreach($items as $item){
			
			$importe+=$item['importe'];
			$importe105+=$item['importe105'];
			$importe21+=$item['importe21'];
			
			if($item['tipoFactura']!='X'){
				$importex+=$item['importe'];
				$importe105x+=$item['importe105'];
				$importe21x+=$item['importe21'];
			}
			$salida.="<tr>" .
					"	<td>".$item['cantidadFacturas']."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($item['importe'],"$")."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($item['importe105'],"$")."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($item['importe21'],"$")."</td>".
					"	<td>".$item['tipoFactura']."</td>".
				
					"</tr>";
		}
		$salida.="<tr>" .
					"	<th>TOTAL</th>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($importe,"$")."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($importe105,"$")."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($importe21,"$")."</b></td>".
					"	<td> TOTAL ".Yii::app()->numberFormatter->formatCurrency($importe21+$importe105,"$")."</td>".
				
					"</tr>";
		$salida.="<tr>" .
					"	<th>TOTAL SIN X</th>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($importex,"$")."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($importe105x,"$")."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($importe21x,"$")."</b></td>".
					"	<td> TOTAL ".Yii::app()->numberFormatter->formatCurrency($importe21x+$importe105x,"$")."</td>".
				
					"</tr>";
	
		$salida.="</table>";
		return $salida;
	}
	private function getSaldoEmpresa($saldos)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Fecha</th>".
					"	<th>Cliente</th>".
					"	<th>Detalle</th>".
					"	<th>Debe</th>".
					"	<th>Haber</th>".
					"	<th>Saldo</th>".
					"</tr>";
		$items=$saldos;
		$saldo=0;
		$debeTotal=0;
		$haberTotal=0;
		foreach($items as $items){
			if($items['tipo']=='haber'){
				$debe='-';
				$haber=Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],"$");
				$saldo-=$items['importeFactura'];
				$haberTotal+=$items['importeFactura'];
			}else{
				$haber='-';
				$debe=Yii::app()->numberFormatter->formatCurrency($items['importeFactura'],"$");
				$saldo+=$items['importeFactura'];
				$debeTotal+=$items['importeFactura'];
			}
			
			$salida.="<tr>" .
					"	<td>".$items['fecha']."</td>".
					"	<td>".$items['cliente']."</td>".
					"	<td>".$items['nombreFactura']."</td>".
					"	<td>".$debe."</td>".
					"	<td>".$haber."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</td>".
				
					"</tr>";
		}
		$salida.="<tr>" .
					"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($debeTotal,'$')."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($haberTotal,'$')."</b></td>".
					"	<td><b>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</b></td>".
				
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
	private function getMisTareas($tareas)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<th>Cliente</th>".
					"	<th>Fecha</th>".
					"	<th>Prioridad</th>".
					"	<th>Descripción</th>".
					"	<th>Tipo</th>".
					"	<th>Comentarios</th>".
					"</tr>";
		$items=$tareas;
		for($i=0;$i<count($items->data);$i++){
			$salida.="<tr>" .
					"	<td>".$items->data[$i]['cliente']."</td>".
					"	<td>".$items->data[$i]['fechaTarea']."</td>".
					"	<td>".$items->data[$i]['prioridadTarea']."</td>".
					"	<td>".$items->data[$i]['descripcionTarea']."</td>".
					"	<td>".$items->data[$i]['tipoTarea']."</td>".
					"	<td> </td>".
					"</tr>";
		}
		$salida.="</table>";
		return $salida;
	}
	private function getDetalleFactura_B($fact)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<td>Cant.</td>".
					"	<td>Detalle</td>".
					"	<td>Unitario</td>".
					"	<td>Final</td>".
					"</tr>";
		$itemsFactura=ItemsFacturaSaliente::model()->itemsFacturaImpresion($fact->idFacturaSaliente);
		$items=$itemsFactura;
		foreach($items as $item){
			$importe=($item['importeItem']);
			$importeNeto=($item['importeItem']==0)?'0':$importe;
			$salida.="<tr>" .
					"	<td>".$item['cantidad']."</td>".
					"	<td>".$item['nombreItem']."</td>".
					"	<td>".number_format($importeNeto,2)."</td>".
					"	<td>".number_format($item['importeItem']*$item['cantidad'],2)."</td>".
					"</tr>";
		}
		$salida.="</table>";
		return $salida;		
	}
	private function getFacturasCompra($items)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<td>Nro</td>".
					"	<td>Proveedor</td>".
					"	<td>Detalle</td>".
					"	<td>Importe</td>".
					"</tr>";

		foreach($items as $item){
			$salida.="<tr>" .
					"	<td>".$item['numeroFactura']."</td>".
					"	<td>".$item['nombreProveedor']."</td>".
					"	<td>".$item['detalle']."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($item['importe'],'$')."</td>".
					"</tr>";
		}
		$salida.="</table>";
		return $salida;
	}
	private function getDetalleFactura($fact)
	{
		$salida="<table class='sinFormato' width='822'>";
		$salida.="<tr>" .
					"	<td>Cant.</td>".
					"	<td>Detalle</td>".
					"	<td>%I.v.a</td>".
					"	<td>Unitario</td>".
					"	<td>Neto</td>".
					"	<td>Final</td>".
					"</tr>";
		$itemsFactura=ItemsFacturaSaliente::model()->itemsFacturaImpresion($fact->idFacturaSaliente);
		$items=$itemsFactura;
		foreach($items as $item){
			$importe=($item['importeItem'])/(($item['porcentajeIva']/100)+1);
			$importeNeto=($item['importeItem']==0)?'0':$importe;
			$salida.="<tr>" .
					"	<td>".$item['cantidad']."</td>".
					"	<td>".$item['nombreItem']."</td>".
					"	<td>".$item['porcentajeIva']."</td>".
					"	<td>".number_format($importeNeto,2)."</td>".
					"	<td>".number_format($importeNeto*$item['cantidad'],2)."</td>".
					"	<td>".number_format($item['importeItem']*$item['cantidad'],2)."</td>".
					"</tr>";
		}
		$salida.="</table>";
		return $salida;
	}
	private function getPieFactura($val,$fa)
	{
		$model=FacturasSalientes::model();
		$model->idFacturaSaliente=$fa->idFacturaSaliente;
		$datos=$model->search()->getData();
		
			$val = str_replace("%iva21", number_format(($datos[0]->iva21/1.21)*0.21,2),$val);
			$val = str_replace("%iva105", number_format(($datos[0]->iva105/1.105)*0.105,2),$val);
			$val = str_replace("%subTotal", number_format(($datos[0]->iva21/1.21)+($datos[0]->iva105/1.105),2),$val);
			$val = str_replace("%total", number_format($datos[0]->importeFactura,2),$val);
		return $val;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Impresiones']))
		{
			$model->attributes=$_POST['Impresiones'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idImpresion));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function loactionImprimeExcel($idTipoImpresion,$tipoImpresion)
	{
			Yii::import('application.vendors.PHPExcel',true);
             $objPHPExcel = new PHPExcel();
               $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("PDF Test Document")
    ->setSubject("PDF Test Document")
    ->setDescription("Test document for PDF, generated using PHP classes.")
    ->setKeywords("pdf php")
    ->setCategory("Test result file");
 
 
     // Add some data
     $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');
 
      // Miscellaneous glyphs, UTF-8
     $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
 
      // Rename sheet
      $objPHPExcel->getActiveSheet()->setTitle('Simple');
 
      // Set active sheet index to the first sheet, 
      // so Excel opens this as the first sheet
     $objPHPExcel->setActiveSheetIndex(0);
 
      // Redirect output to a client’s web browser (Excel2007)
      header('Content-Type: application/pdf');
      header('Content-Disposition: attachment;filename="01simple.pdf"');
      header('Cache-Control: max-age=0');
 
      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
      $objWriter->save('php://output');
      Yii::app()->end();
 
       // 
       // Once we have finished using the library, give back the 
       // power to Yii... 
       spl_autoload_register(array('YiiBase','autoload'));
         
	}
	public function actionIndex()
	{
		$model=new Impresiones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Impresiones']))
			$model->attributes=$_GET['Impresiones'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Impresiones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Impresiones']))
			$model->attributes=$_GET['Impresiones'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Impresiones::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='impresiones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
