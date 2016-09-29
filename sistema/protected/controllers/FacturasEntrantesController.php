<?php

class FacturasEntrantesController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $put;
	private $pasosNuevaFactura=array('Datos Factura','Items','Finaliza');
	
	public function actionNuevaFactura($step=null) {
		$this->pageTitle = 'Asistente de Carga Factura';
		$this->process($step);
	}
		

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
				'actions'=>array('consultarCompraStock','crearFactura','CrearParaStock','CrearParaConceptos','asistenteNuevaFactura','finalizarCarga','EtiquetasPendientes','index','view','facturas','consultarEnDeuda','consultarParaPagar','saldoEmpresa','saldoProveedores','saldoProveedor','verItems',
				'nuevaFactura','imprimirIvaCompras'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionAsistenteNuevaFactura()
	{
		$items=$this->getItemsToUpdate();
    if(isset($_POST['Item']))
    {
        $valid=true;
        foreach($items as $i=>$item)
        {
            if(isset($_POST['Item'][$i]))
                $item->attributes=$_POST['Item'][$i];
            $valid=$item->validate() && $valid;
        }}
        
    // displays the view to collect tabular input
    $this->render('asistenteNuevaFactura',array('items'=>$items));
//		$this->render('asistenteNuevaFactura',array(
//			'model'=>FacturasEntrantes::model(),'modelItems'=>ComprasItems::model(),
//		));
//		$paso=$_GET['step'];
//		switch($paso){
//			case 'factura':{
//				$model=new FacturasEntrantes;
//		
//		if(isset($_POST['FacturasEntrantes']))
//		{
//			$model->attributes=$_POST['FacturasEntrantes'];
//			Yii::app()->session->add('factura',$_POST['FacturasEntrantes']);
//			if($model->condicion=='Stock')
//				$this->redirect(array('/facturasEntrantes/asistenteNuevaFactura&step=items&tipo=stock','idFactura'=>$model->idFacturaEntrante));
//					else
//					$this->redirect(array('/facturasEntrantes/asistenteNuevaFactura&step=items&tipo=conceptos','idFactura'=>$model->idFacturaEntrante));
//		
//			
//				
//		}
//				$model->estado='PEND';
//				$model->importeFlete=0;
//				$model->importeDescuentos=0;
//				$model->importeRecargos=0;
//				$model->importeImpuestos=0;
//				
//				$vista='/facturasEntrantes/_form';
//				$this->render('formu_',array(
//				'model'=>$model,'vista'=>$vista,'step'=>'PASO 1 de 3: Datos de la Factura'
//		));
//				break;
//			}
//			case 'items':{
//				if($_GET['tipo']=='stock'){
//					$model=new ComprasItems;
//					$model->idFacturaEntrante=$_GET['idFactura'];
//					$idFactura=$_GET['idFactura'];
//					
//					
//					$vista='/comprasItems/items';
//					$this->render('formu_',array('per'=>array(), 'model'=>$model,'vista'=>$vista,'step'=>'PASO 2 de 3: Datos de la Factura'));
//				}else{
//					
//				}
//				break;
//			}
//			case 'finaliza':{
//				
//				break;
//			}
//		}
	}
	public function actionVerItems($idFactura)
	{
		$factura=FacturasEntrantes::model()->findByPk($idFactura);
		if($factura->condicion=='Stock'){
			$this->redirect(array('/comprasItems/','idFactura'=>$factura->idFacturaEntrante));
		}else{
			$this->redirect(array('/facturasEntrantesConcepto/consultarPorFactura','idFactura'=>$factura->idFacturaEntrante));
		}
	}
	public function actionEtiquetasPendientes()
	{
		$nombre = $_GET['term'];
		$data=FacturasEntrantes::model()->consultarEtiquetasPendientes($nombre, $_GET['idProveedor']);
		foreach ($data as $m)
    	{
    		$nombre=$m['numeroFactura'].' | '.Yii::app()->numberFormatter->formatCurrency($m['importe'],"$").' | '.Yii::app()->dateFormatter->format("dd-M-y",$m['fecha']);
       	 	$results[] = array('idFacturaEntrante'=>$m['idFacturaEntrante'],'value' => $nombre,'precio' => $m['importe']);
    	}
    	echo CJSON::encode($results);
	}
        public function actionUpdateConcepto($id)
	{
		$model=FacturasEntrantes::model()->findByPk($id);
		$manager=new ConceptosManager();
		$manager->agregarItems($id);
		$model->importeFlete=0;
		$model->importeDescuentos=0;
		$model->importeRecargos=0;
		$model->importeImpuestos=0;
		if(isset($_POST['FacturasEntrantes']))
        {
            $model->attributes=$_POST['FacturasEntrantes'];
            $manager->manage($_POST['FacturasEntrantesConcepto']);
            
            if (!isset($_POST['noValidate']))
            {
            	
                $valid=$model->validate();
             	
                $valid=$manager->validate($model) && $valid;
 		$valid = $valid && (count($manager->getItems())>0);
                if($valid)
                {
                    $model->save();
                    $manager->save($model);
                    FacturasEntrantesVencimientos::model()->quitarVencimientos($model->idFacturaEntrante);
                    $this->quitarPagos($model->idFacturaEntrante);
                    
                    FacturasEntrantesVencimientos::model()->ingresarVencimientos($model->idFacturaEntrante);
                    if(isset ($_POST['pagado'])) $this->ingresaPago($model,$manager->items,$_POST['idFormaPago']);
                    $this->redirect(array('/facturasEntrantesConcepto/consultarPorFactura','idFactura'=>$model->idFacturaEntrante));
                }
            }
        }

		
		$proveedor=FacturasEntrantes::model()->findByPk($model->idProveedor);
		

		$this->render('crearConceptos',array(
			'model'=>$model,'manager'=>$manager
		));
	}
	public function actionCrearParaConceptos()
	{
		$model=new FacturasEntrantes;
		$manager=new ConceptosManager();
		
		$model->importeFlete=0;
		$model->importeDescuentos=0;
		$model->importeRecargos=0;
		$model->importeImpuestos=0;
                $model->condicion='Servicios/Insumos';
		$model->estado='PEND';
		if(isset($_POST['FacturasEntrantes']))
        {
            $model->attributes=$_POST['FacturasEntrantes'];
            $manager->manage(isset($_POST['FacturasEntrantesConcepto'])?$_POST['FacturasEntrantesConcepto']:null);
            if (!isset($_POST['noValidate']))
            {
            	
                $valid=$model->validate();
             	
                $valid=$manager->validate($model) && $valid;
 		$valid = $valid && (count($manager->getItems())>0);
                if($valid)
                {
                    $model->save();
                    $manager->save($model);
                    FacturasEntrantesVencimientos::model()->ingresarVencimientos($model->idFacturaEntrante);
                    
                    if(isset ($_POST['pagado'])) $this->ingresaPago($model,$manager->items,$_POST['idFormaPago']);
                    $this->redirect(array('/facturasEntrantesConcepto/consultarPorFactura','idFactura'=>$model->idFacturaEntrante));
                }
            }
        }
       
		
//		$model->fecha=isset ($_GET['fecha'])?$_GET['fecha']:'';
//		$model->idProveedor=isset ($_GET['idProveedor'])?$_GET['idProveedor']:'';
//		$model->fechaVencimiento=isset ($_GET['fecha'])?$_GET['fecha']:'';
//		$model->idCondicionCompra=isset ($_GET['idCondicionCompra'])?$_GET['idCondicionCompra']:'';
		

		
		$proveedor=FacturasEntrantes::model()->findByPk($model->idProveedor);
		

		$this->render('crearConceptos',array(
			'model'=>$model,'manager'=>$manager
		));
	}
	public function actionCrearParaStock()
	{
		$model=new FacturasEntrantes;
		$manager=new CompraItemsManager();
		
		$model->importeFlete=0;
		$model->importeDescuentos=0;
		$model->importeRecargos=0;
		$model->importeImpuestos=0;
                $model->condicion='Stock';
		$model->estado='PEND';
		
		$valorFocus=array($model,'idProveedor');
		if(isset($_POST['FacturasEntrantes'])) {
			$model->attributes=$_POST['FacturasEntrantes'];
			$focus='#valorCodigoBarras';
}
		if(isset($_POST['codigoBarras']))
		{
			$model->attributes=$_POST['FacturasEntrantes'];
			$manager->manage(isset($_POST['ComprasItems'])?$_POST['ComprasItems']:null);
			$item=ComprasItems::model()->getElementoCodigo($_POST['valorCodigoBarras']);
                        $item->importeCompra=isset ($_POST['importeBuscador'])?$_POST['importeBuscador']:0;
                         $item->cantidad=isset ($_POST['cantidad'])?$_POST['cantidad']:1;
			if(isset($item))
				$manager->agregar($item);
			
			$valorFocus="#valorCodigoBarras";
			//agregar
		}else
		if(isset($_POST['FacturasEntrantes']))
        {
            $model->attributes=$_POST['FacturasEntrantes'];
            if(isset($_POST['ComprasItems']))
                $manager->manage($_POST['ComprasItems']);
            else Yii::app()->user->setFlash('error',"Agregue por lo menos un item a la factura!");
            $valorFocus="#valorCodigoBarras";
            if (!isset($_POST['noValidate'])&& isset($_POST['ComprasItems']))
            {
                $valid=$model->validate();
                $valid=$manager->validate($model) && $valid;
                $valid = $valid && (count($manager->getItems())>0);
                
                if($valid )
                {
                    $model->save();
                    $manager->save($model);
                    FacturasEntrantesVencimientos::model()->ingresarVencimientos($model->idFacturaEntrante);
                    if(isset ($_POST['pagado'])&&isset ($_POST['idFormaPago'])) $this->ingresaPago($model,$manager->items,  $_POST['idFormaPago']);
                    $this->redirect(array('/comprasItems/index','idFactura'=>$model->idFacturaEntrante));
                }
            }
        }
        
//		$model->fecha=isset ($_GET['fecha'])?$_GET['fecha']:'';
//		$model->idProveedor=isset ($_GET['idProveedor'])?$_GET['idProveedor']:'';
//		$model->fechaVencimiento=isset ($_GET['fecha'])?$_GET['fecha']:'';
//		$model->idCondicionCompra=isset ($_GET['idCondicionCompra'])?$_GET['idCondicionCompra']:'';
//		

		
		$proveedor=FacturasEntrantes::model()->findByPk($model->idProveedor);
		
		
		$focus=$valorFocus;
		$this->render('crearStock',array(
			'model'=>$model,'manager'=>$manager,'focus'=>$focus
		));
	}
        private function quitarPagos($id)
	{
		$sql="DELETE from ordenesPago_vencimientos WHERE idFacturaEntrante='$id'";
            $connection=Yii::app()->getDb();
            $command=$connection->createCommand($sql);
            
            return $command->query();
		
	}
	private function ingresaPago($model,$items,$formaPago)
	{
		
			if($model->condicion=='Stock')
			$importe=$this->getImporteStock($items,$model->tipoFactura,$model);
			else $importe=$this->getImporteConceptos($items,$model->tipoFactura,$model);
		
		$this->creaOrdenContado($model,$importe,$formaPago);
		
		
	}
	private function creaOrdenContado($model,$importe,$formaPago)
	{
		$modeloOrden=new OrdenesPago;
		$modeloOrden->fechaOrden=$model->fecha;
		$modeloOrden->idProveedor=$model->idProveedor;
                $modeloOrden->idFormaPago=$formaPago;
		$modeloOrden->estado='CANC';
		$modeloOrden->save();
		
		$pendientes=FacturasEntrantesVencimientos::model()->consultarEtiquetasPendientes('',$model->idFacturaEntrante);
		
		foreach($pendientes as $item)
			if($model->idFacturaEntrante==$item['idFacturaEntrante'])
				$this->imputarFactura($item['idFacturaEntrante'],$item['idFacturaVencimiento'],$item['importe'],$modeloOrden->idOrdenPago);
		
	}
	private function imputarFactura($idFactura,$idVencimiento,$importe,$idOrdenPago)
	{
		$orden=new OrdenesPagoVencimientos;
		$orden->idFacturaEntrante=$idFactura;
		$orden->idFacturaEntranteVencimiento=$idVencimiento;
		$orden->importe=$importe;
		$orden->idOrdenPago=$idOrdenPago;
		$orden->save();
	}
	private function getImporteConceptos($items,$tipoFactura,$model=null)
	{
            $extra=0;
            if($model!=null)
                $extra= (- $model->importeDescuentos*1.21)+($model->importeFlete*1.21)+($model->importeRecargos*1.21);
		$importe=0;
		foreach ($items as $item)
			if(strtoupper($tipoFactura)=='A')
				$importe+=($item->importe*(($item->alicuotaIva/100)+1));
				else $importe+=$item->importe;
		return $importe+$extra;
	}
	private function getImporteStock($items,$tipoFactura,$model=null)
	{
            $extra=0;
            if($model!=null)
                $extra= (- $model->importeDescuentos*1.21)+($model->importeFlete*1.21)+($model->importeRecargos*1.21);
		$importe=0;
		foreach ($items as $item)
			if(strtoupper($tipoFactura)=='A')
				$importe+=($item->importeCompra*$item->cantidad*(($item->alicuotaIva/100)+1));
				else $importe+=$item->importeCompra*$item->cantidad;
		return $importe+$extra;
	}
	//ASISTENTE PARA CREAR FACTURAS
	public function actionCrearFactura()
	{
		$model=new FacturasEntrantes;
		if(isset($_POST['FacturasEntrantes']))
		{
			$model->attributes=$_POST['FacturasEntrantes'];
			$valido=$model->validate();
			if($valido)
					if($model->condicion=='Stock')
						$this->redirect(array('/facturasEntrantes/crearParaStock'.$this->getValores($_POST['FacturasEntrantes'])));
							else $this->redirect(array('/facturasEntrantes/crearParaConceptos'.$this->getValores($_POST['FacturasEntrantes'])));
				
		
		}
		$model->numeroFactura=0000000;
		$model->tipoFactura='A';
		$this->render('crearFactura',array('model'=>$model));
		
	}
	private function getValores($datos)
	{	
		$valores='&';
		foreach($datos as $indice=>$valor)
			$valores.=$indice.'='.$valor.'&';
		return $valores;
	}
	private function esCompraContado($idCondicionCompra)
	{
		$condiciones=CondicionesCompraItems::model()->consultarCondiciones2($idCondicionCompra);
		foreach($condiciones as $item)
			if(count($condiciones)==1 && $item['cantidadCuotas']==0)
				return true;
		return false;
	}
	public function actionCreate()
	{
		$model=new FacturasEntrantes;
		
		if(isset($_POST['FacturasEntrantes']))
		{
			
			$model->attributes=$_POST['FacturasEntrantes'];
			if($model->save()){
				
				if($model->condicion=='Stock')
			$this->redirect(array('/comprasItems/','idFactura'=>$model->idFacturaEntrante));
		else
			$this->redirect(array('/facturasEntrantesConcepto/consultarPorFactura','idFactura'=>$model->idFacturaEntrante));
		
			}
				
		}
		$model->estado='PEND';
		$model->importeFlete=0;
				$model->importeDescuentos=0;
				$model->importeRecargos=0;
				$model->importeImpuestos=0;

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionFinalizarCarga($idFactura)
	{
		FacturasEntrantesVencimientos::model()->ingresarVencimientos($idFactura);
		$this->redirect(array('/facturasEntrantes/'));
	}
	public function actionSaldoEmpresa()
	{
		if(isset($_POST['Balances']))
		{
			$this->redirect(array('impresiones/create','tipoImpresion'=>'saldoProveedoresEmpresa','fechaFin'=>$_POST['Balances']['fechaFin'],'fechaInicio'=>$_POST['Balances']['fechaInicio']));
			
		}
			
		$model=new Balances;
		$this->render('saldoEmpresa',array('model'=>$model
		));
	}
	public function actionSaldoProveedores()
	{
		if(isset($_POST['Balances']))
		{
			$this->redirect(array('impresiones/create','tipoImpresion'=>'saldoProveedores','fechaFin'=>$_POST['Balances']['fechaFin'],'fechaInicio'=>$_POST['Balances']['fechaInicio']));
			
		}
			
		$model=new Balances;
		$this->render('saldoProveedores',array('model'=>$model
		));
	}
	public function actionSaldoProveedor()
	{
		if(isset($_POST['Balances']))
		{
			$this->redirect(array('impresiones/create','tipoImpresion'=>'saldoProveedor','fechaFin'=>$_POST['Balances']['fechaFin'],'fechaInicio'=>$_POST['Balances']['fechaInicio'],'idProveedor'=>$_POST['Balances']['idProveedor']));
			
		}
			
		$model=new Balances;
		$this->render('saldoProveedor',array('model'=>$model
		));
	}
	
	public function actionConsultarEnDeuda()
	{
		$model=new FacturasEntrantes('consultarEnDeuda');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantes']))
			$model->attributes=$_GET['FacturasEntrantes'];
		
		$this->render('consultarEnDeuda',array(
			'model'=>$model,'modelo'=>$model
		));
	}
        public function actionGastoRapido($factura)
        {
            $model=new FacturasEntrantes;
            $model->fecha=Date('Y-m-d');
            $model->fechaVencimiento=Date('Y-m-d');
            $model->idCondicionCompra=CondicionesCompra::model()-> getIdCondicionContado();
            $model->numeroFactura='0000 - 00000000';
            $model->condicion='Servicios/Insumos';
            $model->importeFlete=0;
            $model->estado='PEND';
            $model->importeDescuentos=0;
	    $model->importeRecargos=0;
            $model->importeImpuestos=0;
            $model2= new FacturasEntrantesConcepto;
		
		
		if(isset($_POST['FacturasEntrantes'])){
                    $model->attributes=$_POST['FacturasEntrantes'];
                    
                        $model2->attributes=$_POST['FacturasEntrantesConcepto'];
                        
                        $model2->idFacturaEntrante=0;
                        $valid=$model->validate();
                        $valid2=$model2->validate();
                    if($valid && $valid2){
                        
                        $model->save();
                        $model2->idFacturaEntrante=$model->idFacturaEntrante;
                        $model2->save();
                        FacturasEntrantesVencimientos::model()->ingresarVencimientos($model->idFacturaEntrante);
                        $sal[]=$model2;
                        if(isset ($_POST['pagado'])) $this->ingresaPago($model,$sal,$_POST['idFormaPago']);
                        $this->redirect(array('/facturasEntrantes/index'));
                    }
                    
                }
			

		$this->render('gastoRapido',array(
			'model'=>$model,'modelo'=>$model,'model2'=>$model2,'tipoFactura'=>$factura
		));
        }
	public function actionIndex()
	{
           
        
		$model=new FacturasEntrantes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantes']))
			$model->attributes=$_GET['FacturasEntrantes'];

		$this->render('index',array(
			'model'=>$model,'modelo'=>$model
		));
	}
	public function actionConsultarCompraStock()
	{
		$model=new FacturasEntrantes;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantes']))
			$model->attributes=$_GET['FacturasEntrantes'];
		$model->condicion='Stock';
		$this->render('facturasCompraStock',array(
			'model'=>$model,'modelo'=>$model
		));
	}
	public function actionConsultarParaPagar()
	{
		$model=new FacturasEntrantes('consultarParaPagar');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantes']))
			$model->attributes=$_GET['FacturasEntrantes'];
			
		
		
		$this->render('consultarParaPagar',array(
			'model'=>$model,'modelo'=>$model
		));
	}
	public function actionFacturas()
	{
		//$this->redirect(array('/acciones/verAcciones','tipo'=>'facturas_Compra','descripcion'=>"Vea las acciones disponibles"));
		$this->render('facturas',array(
			'model'=>FacturasEntrantes::model(),
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateStock($id)
	{
            $manager=new CompraItemsManager();
            $manager->agregarItems($id);
            $valorFocus="#valorCodigoBarras";
		$model=$this->loadModel($id);

		if(isset($_POST['FacturasEntrantes'])) {
			$model->attributes=$_POST['FacturasEntrantes'];
			$focus='#valorCodigoBarras';
}
		if(isset($_POST['codigoBarras']))
		{
			$model->attributes=$_POST['FacturasEntrantes'];
			$manager->manage(isset($_POST['ComprasItems'])?$_POST['ComprasItems']:null);
			$item=ComprasItems::model()->getElementoCodigo($_POST['valorCodigoBarras']);
			if(isset($item))
				$manager->agregar($item);
			
			$valorFocus="#valorCodigoBarras";
			//agregar
		}else
		if(isset($_POST['FacturasEntrantes']))
        {
            $model->attributes=$_POST['FacturasEntrantes'];
            $manager->manage($_POST['ComprasItems']);
            $valorFocus="#valorCodigoBarras";
            if (!isset($_POST['noValidate']))
            {
                $valid=$model->validate();
                $valid=$manager->validate($model) && $valid;
                
                if($valid)
                {
                    $model->save();
                    FacturasEntrantes::model()->resetItemsFactura($model->idFacturaEntrante);
                    $manager->save($model);
                    FacturasEntrantesVencimientos::model()->quitarVencimientos($model->idFacturaEntrante);
                    $this->quitarPagos($model->idFacturaEntrante);
                    
                    FacturasEntrantesVencimientos::model()->ingresarVencimientos($model->idFacturaEntrante);
                    
                    if(isset ($_POST['pagado'])) $this->ingresaPago($model,$manager->items,$_POST['idFormaPago']);
                    $this->redirect(array('/comprasItems/index','idFactura'=>$model->idFacturaEntrante));
                }
            }
        }

		$proveedor=FacturasEntrantes::model()->findByPk($model->idProveedor);
		
		
		$focus=$valorFocus;
		$this->render('update',array(
			'model'=>$model,'manager'=>$manager,'focus'=>$focus
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

	public function actionImprimirIvaCompras()
	{
		$model=FacturasEntrantes::model();
	
		
		$datosA=$model->consultarLibro('A',5,2011);
		$datosB=$model->consultarLibro('B',5,2011);
		
		Yii::import('application.vendors.PHPExcel',true);
        $objPHPExcel = new PHPExcel();
             
		$objPHPExcel=$this->setHojaLibro($objPHPExcel,$datosA,'FACTURAS A',0);
		$objPHPExcel->createSheet();
		$objPHPExcel=$this->setHojaLibro($objPHPExcel,$datosB,'FACTURAS B',1);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="libroIva.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}
	private function setHojaLibro($objPHPExcel,$datos,$nombreHoja,$nroHoja)
	{
		$objPHPExcel->setActiveSheetIndex($nroHoja);
		$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B5', 'Nro Fact.')
            ->setCellValue('C5', 'Fecha')
            ->setCellValue('D5', 'Razón Social')
            ->setCellValue('E5', 'Cuit')
            ->setCellValue('F5', 'NETO Iva 10.5')
            ->setCellValue('G5', 'NETO Iva 21')
            ->setCellValue('H5', 'I.V.A 10.5')
            ->setCellValue('I5', 'I.V.A 21')
            ->setCellValue('J5', 'Bruto');
            
    for($i=0;$i<count($datos->data);$i++){
    	$fila=$i+6;
    	$neto105=$datos->data[$i]['iva105'];
    	$neto21=$datos->data[$i]['iva21'];
    	
    	$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B'.$fila, $datos->data[$i]['numeroFactura'])
            ->setCellValue('C'.$fila, $datos->data[$i]['fecha'])
            ->setCellValue('D'.$fila, $datos->data[$i]['nombreProveedor'])
            ->setCellValue('E'.$fila, $datos->data[$i]['cuitProveedor'])
            ->setCellValue('F'.$fila, Yii::app()->numberFormatter->formatCurrency($neto105,"$"))
            ->setCellValue('G'.$fila, Yii::app()->numberFormatter->formatCurrency($neto21,"$"))
            ->setCellValue('H'.$fila, Yii::app()->numberFormatter->formatCurrency(($datos->data[$i]['iva105'])*0.105,"$"))
            ->setCellValue('I'.$fila, Yii::app()->numberFormatter->formatCurrency(($datos->data[$i]['iva21'])*0.21,"$") )
            ->setCellValue('J'.$fila, Yii::app()->numberFormatter->formatCurrency($datos->data[$i]['precio'],"$"));
    }

	
	$objPHPExcel->getActiveSheet()->setTitle($nombreHoja);
	return $objPHPExcel;
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FacturasEntrantes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantes']))
			$model->attributes=$_GET['FacturasEntrantes'];

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
		$model=FacturasEntrantes::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='facturas-entrantes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
