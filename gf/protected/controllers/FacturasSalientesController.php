<?php

class FacturasSalientesController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
public $extra;
public $rutaFormulario;
public $formularioContenido;
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
				'actions'=>array('crearFacturaCompleta','FacturaRapida','generarFacturacionOrden','tesoreria','index','view','consultarLibroIva','centroVentas','buscarEstado',
				'saldoClientes','saldoEmpresa','crearFacturaCte','crearFactura',
				'generarFacturaCte','condicionPago','etiquetasPendientes','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
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
	public function actionEtiquetasPendientes()
	{
		$nombre = $_GET['term'];
		$data=FacturasEntrantes::model()->consultarEtiquetasPendientes($nombre, $_GET['idCliente']);
		foreach ($data as $m)
    	{
    		$nombre=$m['numeroFactura'].' | '.Yii::app()->numberFormatter->formatCurrency($m['importe'],"$").' | '.Yii::app()->dateFormatter->format("dd-M-y",$m['fecha']);
       	 	$results[] = array('idFacturaEntrante'=>$m['idFacturaEntrante'],'value' => $nombre,'precio' => $m['importe']);
    	}
    	echo CJSON::encode($results);
	}
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionCondicionPago($idFactura)
	{
		$itemsexiste=ItemsFacturaSaliente::model()->yaExiste($idFactura);
			if (count($itemsexiste)==0)
			{
				FacturasSalientesVencimiento::model()->ingresarVencimientos($idFactura);
			}
		
		$this->redirect(array('/facturasSalientes/'));
	}
	public function actionSaldoEmpresa()
	{
		if(isset($_POST['Balances']))
		{
			$this->redirect(array('impresiones/create','tipoImpresion'=>'saldoEmpresa','fechaFin'=>$_POST['Balances']['fechaFin'],'fechaInicio'=>$_POST['Balances']['fechaInicio']));			
		}
			
		$model=new Balances;
		$this->render('saldoEmpresa',array('model'=>$model
		));
	}
	public function actionSaldoClientes()
	{
		if(isset($_POST['Balances']))
		{
			$this->redirect(array('impresiones/create','tipoImpresion'=>'saldoCliente','fechaFin'=>$_POST['Balances']['fechaFin'],'fechaInicio'=>$_POST['Balances']['fechaInicio'],'idCliente'=>$_POST['Balances']['idCliente']));
			
		}
			
		$model=new Balances;
		$this->render('saldoClientes',array('model'=>$model
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionGenerarFacturacionOrden()
	{
		

		$this->render('generarFacturacionOrden',array('idOrdenTrabajo'=>$_GET['idOrdenTrabajo']
		));
	}
	
	
	
	private function ingresaPago($model,$items,$formaPago)
	{
		
		$importe=$this->getImporte($items);
		$this->creaOrdenCobro($model,$importe,$formaPago);
		//marcada como cancelada
		
		
	}
	private function getImporte($items)
	{
		$importe=0;
		foreach ($items as $item)
				$importe+=$item->importeItem*$item->cantidad;		
				//mas intereses	
            return $importe;
	}
	private function creaOrdenCobro($model,$importe,$formaPago)
	{
		$modeloCobro=new OrdenesCobro;
		$modeloCobro->fechaOrdenCobro=$model->fecha;
		$modeloCobro->idCliente=$model->idCliente;
                $modeloCobro->idFormaPago=$formaPago;
//		$modeloCobro->estado='CANC';
		$modeloCobro->save();
		
		$pendientes=FacturasSalientesVencimiento::model()->consultarPendientesPago('',$model->idFacturaSaliente);
		//ACA VER!!!!!!!!
		foreach($pendientes as $item)
		if($model->idFacturaSaliente==$item['idFacturaSaliente'])
			$this->imputarFactura($item['idFacturaSaliente'],
				$item['idFacturaVencimiento'],
				$item['importeFacturaSaliente'],$modeloCobro->idOrdenCobro);
				
	}
	private function imputarFactura($idFactura,
	$idVencimiento,
	$importe,$idOrdenPago)
	{
		//ordencobrovencimiento
//		$orden=new OrdenesPagoVencimientos;
		$orden=new OrdenesCobroFacturas;
		$orden->idFacturaSaliente=$idFactura;
		$orden->idFacturaVencimiento=$idVencimiento;
		$orden->importeCobroFactura=$importe;
		$orden->idOrdenCobro=$idOrdenPago;
		$orden->save();
	}
	private function getPagoContado()
	{
		$condiciones=CondicionesVentaItems::model()->consultarCondiciones();
		foreach($condiciones as $item)
			if($item['aVencerEnDias']==0)
				return $item['idCondicionVenta'];
		return false;
	}
	private function esVentaContado($idCondicionVenta)
	{
		$condiciones=CondicionesVentaItems::model()->consultarCondiciones2($idCondicionVenta);
		foreach($condiciones as $item)
			if(count($condiciones)==1 && $item['aVencerEnDias']==0)
				return true;
		return false;
	}
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FacturasSalientes']))
		{
			$model->attributes=$_POST['FacturasSalientes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idFacturaSaliente));
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
			FacturasSalientes::model()->bajarFactura($id);

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
//        1: Factura A
//2: Nota de Débito A
//3: Nota de Crédito A
//6: Factura B
//7: Nota de Débito B
//8: Nota de Crédito B 

        public function actionIngresarElectronica($idFacturaSaliente)
        {
            $cuit=Settings::model()->getValorSistema('DATOS_EMPRESA_CUIT')+0;
            FacturasSalientes::model()->ingresarFacturaElectronica($idFacturaSaliente,$cuit);
//            $this->enviarNotificacionMailCliente($idFacturaSaliente);
//            $this->redirect(array('/facturasSalientes'));
        }
        private function enviarNotificacionMailCliente($id)
        {
            $factura=FacturasSalientes::model()->findByPk($id);
            $cliente=Clientes::model()->findByPk($factura->idCliente);
            $texto=FacturasSalientes::model()->getTextoFactura($id,null,'elect');
            $titulo="FACTURA ELECTRONICA ".$factura->numeroFactura;
            $params['contacto']=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
            Mensajes::model()->enviarMail($cliente->emailContactoFinanzas, Settings::model()->getValorSistema('MAIL_FACTURAELECTRONICA',$params), $titulo, Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_FINANZAS'),array($this->getElectronicaAttach($texto,$factura->numeroFactura)));
        }
        private function getElectronicaAttach($texto,$nro)
        {
            $link=dirname(__FILE__)."/../../images/presupuestos/Factura$nro.pdf";
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($texto);
        $html2pdf->Output($link,EYiiPdf::OUTPUT_TO_FILE);
        
        return $link;
        }
        
        
	public function actionCentroVentas()
	{
		$this->render('centroVentas',array(
			'model'=>FacturasSalientes::model(),
			));
	}
	public function actionTesoreria()
	{
		$this->redirect(array('/acciones/verAcciones','tipo'=>'tesoreria','descripcion'=>"Vea las acciones disponibles sobre los movimientos financieros"));
	}
	public function actionBuscarEstado($estado)
	{
		
		$model=new FacturasSalientes;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['nombre']))
			$model->attributes=$_GET['nombre'];
		
		
		
		$this->render('porEstado',array(
			'model'=>FacturasSalientes::model(),'estado'=>$estado
		));
	}
	public function actionIndex()
	{
		$model=new FacturasSalientes;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasSalientes']))
			$model->attributes=$_GET['FacturasSalientes'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
        public function actionNotasCredito()
	{
		$model=new FacturasSalientes;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasSalientes']))
			$model->attributes=$_GET['FacturasSalientes'];

		$this->render('notasCredito',array(
			'model'=>$model,
		));
	}
	public function actionFacturaCredito()
        {
            $model=new FacturasSalientes; //FacturasEntrantes;
		$manager=new ItemsFacturaSalienteManager(); // CompraItemsManager();
		$model->fecha=Date('Y-m-d');
                $model->esFacturaCredito=1;
                
                $model->idCondicionVenta=strip_tags(Yii::app()->settings->getKey( 'ID_CONTADO'));
                if(isset($_GET['idPresupuestoFacturar']))
			$manager-> agregarPresupuesto($_GET['idPresupuestoFacturar']);
                $focus=array($model,'fecha');
                if(isset($_POST['FacturasSalientes'])) {
                    $model->attributes=$_POST['FacturasSalientes'];
                    $focus='#valorCodigoBarras';
                }

                if(isset($_POST['codigoBarras']))
		{
			
			
			$manager->manage(isset($_POST['ItemsFacturaSaliente'])?$_POST['ItemsFacturaSaliente']:null);
			
		
			$item=ItemsFacturaSaliente::model()->getElementoCodigo($_POST['valorCodigoBarras'],$_POST['cantidad']);
			
			
			
			
			if(isset($item))
				$manager->agregar($item);
			 $focus='#valorCodigoBarras';
		}
		else if(isset($_POST['FacturasSalientes']))    //($_POST['FacturasEntrantes']))
        {
        	
            $model->attributes=$_POST['FacturasSalientes']; //$_POST['FacturasEntrantes'];
            $manager->manage(isset($_POST['ItemsFacturaSaliente'])?$_POST['ItemsFacturaSaliente']:null);
            $focus='#valorCodigoBarras';
           
            
         	 if(isset($_POST['accion'])){
			$manager->agregarCarro();
			Yii::app()->user->setFlash('success',"Productos del carro agregados!");
			
			
		}
           
            if ( ((isset($_POST['noValidate'])) && ($_POST['noValidate']=='false')) && (count($manager->getItems())>0))
            {
                $error="";
                $error.=$this->consistir($model,'notaCredito');
                $valid=$model->validate();
//                if($this->hayElementosConPrecioCambiado($manager->items))
//                {
//                    $valid=false;
//                    $manager->setItems($this->checkCambioPrecios($manager->items));
////                    echo 'fdfdsfdsfsd<br><br><br><br><br><br><br><br>dsadas';
//                    $error="Se han enviado solicitudes de cambio de precio, aguarde a que sean aprobadas y luego acepte la factura";
//                }
//                $manager->items=$this->checkCambioPrecios($manager->items);
            
                $valid=$manager->validate($model) && $valid;
                $valid=$valid && ($error=="");
                
                if($valid)
                {
                	$model->estado='PEND';
                    $model->save();
                    $manager->save($model);
                     
                 
                    if(isset($_POST['imprime'])){
                     
                        $texto=FacturasSalientes::model()->getTextoNotaCredito($model->idFacturaSaliente,  Impresiones::model()-> getTipoImpresion("notaCredito"));
                    
                        $texto=str_replace("'", '"', $texto);
                        $puerto=$_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT'];
                        $link="http://".$_SERVER['SERVER_NAME'].$puerto.Yii::app()->createUrl('/facturasSalientes/notasCredito');
                        Impresiones::model()->imprimirJava($texto,'notaCredito',$link,Settings::model()->getValorSistema('IMPREISON_RECIBO_CANTIDAD_RAPIDAFAC'));
                   
                    }else{
                        $this->redirect(array('/facturasSalientes/notasCredito'));
                    }
                    // $this->redirect(array('/facturasSalientes/'));
                }else Yii::app()->user->setFlash('error',"Hay datos no consistidos! ".$error);
            }
        }
		$textoOrden='';
		if(isset($_GET['idOrdenTrabajo'])){
			$ordenes=explode(',',$_GET['idOrdenTrabajo']);
			$textoOrden='<b>ORDEN/ES procesadas :</b><br>';
			$i=0;
			foreach($ordenes as $orden){
				if($i>0){
				$ordenModel=OrdenesTrabajo::model()->findByPk($orden);
				$textoOrden.='<b>'. ($i).'- </b> Cerrando Orden nro '.$ordenModel->idOrdenTrabajo.' en concepto de '.$ordenModel->descripcionCliente;
				$textoOrden.='<br>';
				
			}
				$i++;
			}
			
				
			
		}
			
		$cliente=FacturasSalientes::model()->findByPk($model->idCliente);
		$condicionVenta=CondicionesVentaItems::model()->consultarCondiciones3($model->idCondicionVenta);
		$model->descripcion=$textoOrden;
		
		
		$formaPago=isset($_POST['pagado'])?  FormasDePago::model()->findByPk($_POST['idFormaPago']):false;
                if(isset($_POST['imprime']))
                $imp=$_POST['imprime']; else $imp=Settings::model()->getValorSistema('IMPRIME_FACTURA_RAPIDA_DEF');
		$this->render('crearFacturaCredito',array('focus'=>$focus,'textoOrden'=>$textoOrden,'imprime'=>$imp,
			'model'=>$model,'manager'=>$manager,'condicionVenta'=>$condicionVenta,'formaPago'=>$formaPago
		));
        }
        private function consistir($model,$tipo)
        {
            $error="";
            if($tipo=='notaCredito'){
                $talonario=Talonario::model()->findByPk($model->talonarioId);
                if($talonario->tipoTalonario!="Nota Credito"){
                   $error="Debe seleccionar un talonario que sea Nota de credito";
                   
                }
                    
            }
            if($tipo=='factura'){
                $talonario=Talonario::model()->findByPk($model->talonarioId);
                if($talonario->tipoTalonario!="Factura"){
                    $error="Debe seleccionar un talonario que sea un FACTURA";
                   
                }
            }
            return $error;
        }
        private function getInteres( $idCondicionVenta,$interes)
        {
            $con=CondicionesVenta::model()->findByPk($idCondicionVenta);
            $interes=0;
            
            if(isset ($_POST['idFormaPago'])){
                
                $fp=FormasDePago::model()->findByPk($_POST['idFormaPago']);
                if($fp->intereses>0)
                    $interes+=$fp->intereses;else $interes=$interes;
            }
            
            return $interes;
        }
        private function getBonificacion( $idCondicionVenta,$bon)
        {
            $con=CondicionesVenta::model()->findByPk($idCondicionVenta);
            $interes=0;
            
            if(isset ($_POST['idFormaPago'])){
                
               $fp=FormasDePago::model()->findByPk($_POST['idFormaPago']);
                if($fp->intereses<0)
                    $interes+=-$fp->intereses;else $interes=$bon;
            }
            
            return $interes;
        }
        private function iniciarFactura($manager)
        {
            $model=new FacturasSalientes; 
            $model->fecha=Date('Y-m-d h:i:s');
            $model->esFacturaCredito=0;
            $model->idCondicionVenta=strip_tags(Yii::app()->settings->getKey( 'ID_CONTADO'));
            
            return $model;
        }
        private function agregarItemsOrdenes($model,$manager)
        {
            if(isset($_GET['idOrdenTrabajo'])){
                if(!isset(Yii::app()->request->cookies['ordenes']))Yii::app()->request->cookies['ordenes']=new CHttpCookie('ordenes', 'para cargar');
                if(Yii::app()->request->cookies['ordenes']->value=="para cargar")
                    $manager->agregarOrdenes();
                $model->idCliente=$this->getIdClienteOrden($_GET['idOrdenTrabajo']);
            }else{
//                 if(!isset(Yii::app()->request->cookies['ordenesRealizadas']))Yii::app()->request->cookies['ordenesRealizadas']=new CHttpCookie('ordenesRealizadas', 'para cargar');
//                if(Yii::app()->request->cookies['ordenesRealizadas']->value=="para cargar")
//                $manager->agregarOrdenesRealizadas($model->idCliente);
            }
        }
        private function getIdClienteOrden($ids)
        {
            $ordenes=explode(',',$ids);
            $orden=OrdenesTrabajo::model()->findByPk($ordenes[1]);
            return  $orden->idCliente;
        }
        private function setTalonario($model)
        {
            
                
                if(($model->idTalonario=='')){
                    $talDefecto=  Talonario::model()->getPorDefecto();
                    if(isset ($talDefecto)){
                    $model->talonarioId=$talDefecto['idTalonario'].' '.$talDefecto['letraTalonario'].' '.$talDefecto['numeroSerie'].' '.$talDefecto['proximo'];
                    
                    $model->tipoFactura=$talDefecto['letraTalonario'];
                    $model->idTalonario=$talDefecto['idTalonario'];
                    $model->numeroFactura=$talDefecto['numeroSerie'].' - '.$talDefecto['proximo'];
                    }
                }
                    else{
                    $talDefecto=  Talonario::model()->findByPk($model->idTalonario);
                    $model->talonario=$talDefecto->idTalonario.' '.$talDefecto->letraTalonario.' '.$talDefecto->numeroSerie.' '.$talDefecto->proximo;
                    $model->tipoFactura=$talDefecto->letraTalonario;
                    $model->numeroFactura=$talDefecto->numeroSerie.' - '.$talDefecto->proximo;
                     
                    }
            
            return $model;
        }
        private function setImpresion()
        {
            if(isset($_POST['imprime']))
                $imp=$_POST['imprime']; else $imp=Settings::model()->getValorSistema('IMPRIME_FACTURA_RAPIDA_DEF');
                
           
            return $imp;
        }
        public function actionCrearFacturaCompleta()
	{
                $manager=new ItemsFacturaSalienteManager(); 
                $model=$this->iniciarFactura($manager);
                $this->agregarItemsOrdenes($model,$manager);
                
                $formaPago=true;
                $imp=$this->setImpresion();
                $model=$this->setTalonario($model);
                $focus=array($model,'fecha');
                
                if(isset($_POST['FacturasSalientes'])) {
                    $model->attributes=$_POST['FacturasSalientes'];
//                    $this->agregarItemsOrdenes($model,$manager);
                    $formaPago=isset($_POST['pagado'])?  true:false;
                    if(isset($_POST['imprime']))$imp=$_POST['imprime']; else $imp=false;
                    $model=$this->setTalonario($model);
                    $focus='#valorCodigoBarras';
                }
                //AGREGAR EL PRODUCTO DESDE EL CODIGO DE BARRAS
                if(isset($_POST['codigoBarras']))
		{
			$manager->manage(isset($_POST['ItemsFacturaSaliente'])?$_POST['ItemsFacturaSaliente']:null);
			$item=ItemsFacturaSaliente::model()->getElementoCodigo($_POST['valorCodigoBarras'],$_POST['cantidad']);
			if(isset($item))$manager->agregar($item,false);
			$focus='#valorCodigoBarras';
		}
		else if(isset($_POST['FacturasSalientes']))    //($_POST['FacturasEntrantes']))
                {

                    $model->attributes=$_POST['FacturasSalientes']; //$_POST['FacturasEntrantes'];
                    $manager->manage(isset($_POST['ItemsFacturaSaliente'])?$_POST['ItemsFacturaSaliente']:null);
                    $focus='#valorCodigoBarras';
           //VALIDO PARA INGRESAR LA FACTURA
            if ( ((isset($_POST['noValidate'])) && ($_POST['noValidate']=='false')) && (count($manager->getItems())>0))
            {
                $error="";
                
                $valid=$model->validate();
                $valid=$manager->validate($model) && $valid ;
                
                //INGRESO LA FACTURA SI LOS DATOS SON VALIDOS
                if($valid)
                {
                    $model->estado='PEND';
                    $model->save();
                    $manager=$this->ingresarInteresBonificacion($manager,$model);
                    $manager->save($model);
                    FacturasSalientesVencimiento::model()->ingresarVencimientos($model->idFacturaSaliente);
                    
                    //INGRESA PAGO (en caso de que este tildado en vista)
                    if(isset ($_POST['pagado'])) $this->ingresaPago($model,$manager->items,$_POST['idFormaPago']);
                   
                    //CHECK ORDENES
                    $this->checkOrdenes($model);
                    //envia factura ELECTRONICA
                    $this->_enviaFactura($model->idFacturaSaliente,$model->talonarioId);
                    //IMPRIME
                    $this->_imprimir($model,'/facturasSalientes/crearFacturaCompleta');
                     
                    
                    // $this->redirect(array('/facturasSalientes/'));
                }else Yii::app()->user->setFlash('error',"Hay datos no consistidos! ".$error);
            }
        }	
		$cliente=FacturasSalientes::model()->findByPk($model->idCliente);
		$condicionVenta=CondicionesVentaItems::model()->consultarCondiciones3($model->idCondicionVenta);
                
                //SETEO DE DATOS
               
//		$model->descripcion=$textoOrden;
               
		$model->interes=$this->getInteres( $model->idCondicionVenta,$model->interes);
                $model->bonificacion=$this->getBonificacion( $model->idCondicionVenta,$model->bonificacion);
                $intereses=$this->getIntereses($manager->items,$model->interes);
                $bonificacion=$this->getBonificaciones($manager->items,$model->bonificacion);
		$focus='#valorCodigoBarras';
                
		$this->render('crearFactura',array('focus'=>$focus,
                    'interes'=>$intereses,'bonificacion'=>$bonificacion,'imprime'=>$imp,
			'model'=>$model,'manager'=>$manager,'condicionVenta'=>$condicionVenta,'formaPago'=>$formaPago
		));
	}
        public function actionEnviarFacturaElectronica($id)
        {
                $this->enviarNotificacionMailCliente($id);
                $this->redirect(array('/facturasSalientes'));
            
        }
        private function _enviaFactura($id, $idTalonario)
        {
            $talonario=  Talonario::model()->findByPk($idTalonario);
            if($talonario!=null)
            if($talonario->esElectronica){
                $cuit=Settings::model()->getValorSistema('DATOS_EMPRESA_CUIT')+0;
                FacturasSalientes::model()->ingresarFacturaElectronica($id,$cuit);
                $this->enviarNotificacionMailCliente($id);
            }
        }
        public function actionCrearFactura()
	{
		$this->render('asistenteCrearFactura'
		);
	}
	
        public function actionFacturaRapida()
	{
		$manager=new ItemsFacturaSalienteManager(); 
                $model=$this->iniciarFactura($manager);
                
                $formaPago=true;
                $imp=$this->setImpresion();
                $model=$this->setTalonario($model);
                $focus=array($model,'fecha');
                
                if(isset($_POST['FacturasSalientes'])) {
                    $model->attributes=$_POST['FacturasSalientes'];
                    $formaPago=isset($_POST['pagado'])?  true:false;
                    if(isset($_POST['imprime']))$imp=$_POST['imprime']; else $imp=false;
                    $model=$this->setTalonario($model);
                    $focus='#valorCodigoBarras';
                }
                //AGREGAR EL PRODUCTO DESDE EL CODIGO DE BARRAS
                if(isset($_POST['codigoBarras']))
		{
			$manager->manage(isset($_POST['ItemsFacturaSaliente'])?$_POST['ItemsFacturaSaliente']:null);
			$item=ItemsFacturaSaliente::model()->getElementoCodigo($_POST['valorCodigoBarras'],$_POST['cantidad']);
			if(isset($item))$manager->agregar($item,false);
			$focus='#valorCodigoBarras';
		}
		else if(isset($_POST['FacturasSalientes']))    //($_POST['FacturasEntrantes']))
                {

                    $model->attributes=$_POST['FacturasSalientes']; //$_POST['FacturasEntrantes'];
                    $manager->manage(isset($_POST['ItemsFacturaSaliente'])?$_POST['ItemsFacturaSaliente']:null);
                    $focus='#valorCodigoBarras';
           //VALIDO PARA INGRESAR LA FACTURA
            if ( ((isset($_POST['noValidate'])) && ($_POST['noValidate']=='false')) && (count($manager->getItems())>0))
            {
                $error="";
                
                $valid=$model->validate();
                $valid=$manager->validate($model) && $valid && !(strtoupper($model->tipoFactura)=='A');
                
                if(strtoupper($model->tipoFactura)=='A') $error.="La factura no puede ser A! ";
                //INGRESO LA FACTURA SI LOS DATOS SON VALIDOS
                if($valid)
                {
                    $model->estado='PEND';
                    $model->save();
                    $manager=$this->ingresarInteresBonificacion($manager,$model);
                    $manager->save($model);
                    FacturasSalientesVencimiento::model()->ingresarVencimientos($model->idFacturaSaliente);
                    
                    //INGRESA PAGO (en caso de que este tildado en vista)
                    if(isset ($_POST['pagado'])) $this->ingresaPago($model,$manager->items,$_POST['idFormaPago']);
                   
                    //CHECK ORDENES
                    $this->checkOrdenes($model);
                    //envia factura ELECTRONICA
                    $this->_enviaFactura($model->idFacturaSaliente,$model->talonarioId);
                    //IMPRIME
                    $this->_imprimir($model);
                    
                    // $this->redirect(array('/facturasSalientes/'));
                }else Yii::app()->user->setFlash('error',"Hay datos no consistidos! ".$error);
            }
        }	
		$cliente=FacturasSalientes::model()->findByPk($model->idCliente);
		$condicionVenta=CondicionesVentaItems::model()->consultarCondiciones3($model->idCondicionVenta);
                
                //SETEO DE DATOS
               
//		$model->descripcion=$textoOrden;
               
		$model->idCliente=strip_tags(Yii::app()->settings->getKey( 'IDCLIENTE_CONSUMIDORFINAL'));
		$model->interes=$this->getInteres( $model->idCondicionVenta,$model->interes);
                $model->bonificacion=$this->getBonificacion( $model->idCondicionVenta,$model->bonificacion);
                $intereses=$this->getIntereses($manager->items,$model->interes);
                $bonificacion=$this->getBonificaciones($manager->items,$model->bonificacion);
		$focus='#valorCodigoBarras';
                
		$this->render('crearFacturaRapida',array('focus'=>$focus,'imprime'=>$imp,
                    'interes'=>$intereses,'bonificacion'=>$bonificacion,
			'model'=>$model,'manager'=>$manager,'condicionVenta'=>$condicionVenta,'formaPago'=>$formaPago
		));
	}
        private function _imprimir($model,$rutaDirige='/facturasSalientes/facturaRapida')
        {
            if(isset($_POST['imprime'])){
                     
                         $texto=FacturasSalientes::model()->getTextoFactura($model->idFacturaSaliente,  Impresiones::model()-> getTipoImpresion("factura".$model->tipoFactura));
                    
                        $texto=str_replace("'", '"', $texto);
                        $puerto=$_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT'];
                        $link="http://".$_SERVER['SERVER_NAME'].$puerto.Yii::app()->createUrl($rutaDirige);
                        Impresiones::model()->imprimirJava($texto,"factura".$model->tipoFactura,$link,Settings::model()->getValorSistema('IMPREISON_RECIBO_CANTIDAD_RAPIDAFAC'));
                   
                    }else{
                        if(isset($_GET['idOrdenTrabajo']))
                            $this->redirect(array('/ordenesTrabajo/porEstado&estado=Realizada'));
                        else $this->redirect(array($rutaDirige));
                    }
        }
        private function ingresarInteresBonificacion($manager,$model)
        {
            if($model->interes!=0)$manager->agregar($this->getItemModifica($this->getIntereses($manager->items,$model->interes),1));
            if($model->bonificacion!=0)$manager->agregar($this->getItemModifica($this->getBonificaciones ($manager->items,$model->bonificacion),0));
            
            return $manager;
        }
        private function getItemModifica($importe,$tipo)
        {
            $importe=$importe/1.21;
            if($tipo==0){
                $nombre="BONIFICACION";
                $importe=-$importe;
            }else{
                $nombre="INTERES";
            }
                $salida= new ItemsFacturaSaliente;
            	$salida->idElemento=0;
            	$salida->cantidad=1;
            	$salida->porcentajeIva=21;
            	$salida->importeItem=$importe;
            	$salida->importeItemLista=$importe;
          	$salida->importeItemMinimo=$importe;
             	$salida->nombreItem=$nombre;
            
            return $salida;
        }
        private function getTextoOrdenes($ordenes)
        {
            $textoOrden="";
            if($ordenes!=""){
			$ordenes=explode(',',$_GET['idOrdenTrabajo']);
			$items=array();
			foreach($ordenes as $orden){
                           $items= array_merge($items,OrdenesTrabajoStock::model()->search($orden,true));
				
			}
		}
                return $items;
        }
        private function checkOrdenes($model)
        {   if(isset ($_GET['idOrdenTrabajo'])){
            $ordenes=explode(',',$_GET['idOrdenTrabajo']);
            foreach($ordenes as $orden){
		OrdenesTrabajo::model()->finalizarOrden($orden,'Facturado');
		OrdenesTrabajo::model()->marcarOrdenFacturada($model->idFacturaSaliente,$orden);
            }
        }
        }
        private function getBonificaciones($items,$bonificacion)
        {
            $total=0;
            $bonificacion=($bonificacion/100);
            foreach ($items as $key => $item) {
                $iva=$item->porcentajeIva==0?1:(($item->porcentajeIva/100)+1);
                $total+=$item->importeItem*$item->cantidad*$iva;
            }
            return $total*$bonificacion;
        }
        private function getIntereses($items,$interes)
        {
            $total=0;
            $interes=($interes/100);
            foreach ($items as $key => $item) {
                $iva=$item->porcentajeIva==0?1:(($item->porcentajeIva/100)+1);
                $total+=$item->importeItem*$item->cantidad*$iva;
            }
            return $total*$interes;
        }
        private function hayElementosConPrecioCambiado($items)
        { 
            foreach ($items as $key => $item)
                if(isset($item->solicitudCambioPrecio)){
                $elem=explode(',', $item->solicitudCambioPrecio);
                
                if(count($elem)>1)
                    return true;
                
            }
               
            return false;
        }
        private function checkCambioPrecios($items)
        { 
//            echo '<br><br><br><br><br><br><br><br>';
            $aux=array();
            foreach ($items as $key => $item) 
               $aux[]=$this->checkItemPrecio($item);
            return $aux;
        }
        private function checkItemPrecio($item)
        {
             $elem=explode(',', $item->solicitudCambioPrecio);
             if(count($elem)>1){
                $idStock=$elem[0];
                $precioLista=$elem[1];
                $precioDescontado=$elem[2];
                $nroInterno=$elem[3]; 
                $idUsuario=$elem[4]; 
                $this->agregarSolicitud($idStock,$precioLista,$precioDescontado,$nroInterno,$idUsuario);
                $item=$this->checkAprobacion($item,$nroInterno);
             }
             return $item;
             
        }
        private function checkAprobacion($item,$nro)
        {
            $solicitud=SolicitudesCambioPrecioFacturacion::model()->getSolicitud($nro);
            if($solicitud!=false){
                if($solicitud['estado']=="APROBADO") $item->solicitudCambioPrecio="aprobado";
            }
            
            return $item;
        }
        private function agregarSolicitud($idStock,$precioLista,$precioDescontado,$nroInterno,$idUsuario)
        {
            if(!SolicitudesCambioPrecioFacturacion::model()->existe($nroInterno)){
                $s=new SolicitudesCambioPrecioFacturacion;
                $s->fecha=Date('Y-m-d');
                $s->idStock=$idStock;
                $s->idUsuario=$idUsuario;
                $s->importeDescontado=$precioDescontado;
                $s->importeLista=$precioLista;
                $s->nroInterno=$nroInterno;
                $s->estado="EN ESPERA";
                $s->save();
            }
        }
	public function actionConsultarLibroIva($tipoLibro,$mes,$ano)
	{
		$model=FacturasSalientes::model();
	
		
		$datosA=$model->consultarLibro('A',$mes,$ano);
		$datosB=$model->consultarLibro('B',$mes,$ano);
		
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
      Yii::app()->end();
	}

	/**
	 * Manages all models.
	 */
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
    	$neto105=$datos->data[$i]['iva105']-($datos->data[$i]['iva105']*0.105);
    	$neto21=$datos->data[$i]['iva21']-($datos->data[$i]['iva21']*0.21);
    	
    	$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B'.$fila, $datos->data[$i]['numeroFactura'])
            ->setCellValue('C'.$fila, Yii::app()->dateFormatter->format("dd-M-y",$datos->data[$i]['fecha']))
            ->setCellValue('D'.$fila, $datos->data[$i]['cliente'])
            ->setCellValue('E'.$fila, $datos->data[$i]['cuitCliente'])
            ->setCellValue('F'.$fila, Yii::app()->numberFormatter->formatCurrency($neto105,"$"))
            ->setCellValue('G'.$fila, Yii::app()->numberFormatter->formatCurrency($neto21,"$"))
            ->setCellValue('H'.$fila, Yii::app()->numberFormatter->formatCurrency(($datos->data[$i]['iva105']/1.105)*0.105,"$"))
            ->setCellValue('I'.$fila, Yii::app()->numberFormatter->formatCurrency(($datos->data[$i]['iva21']/1.21)*0.21,"$") )
            ->setCellValue('J'.$fila, Yii::app()->numberFormatter->formatCurrency($datos->data[$i]['importeFactura'],"$"));
    }

	
	$objPHPExcel->getActiveSheet()->setTitle($nombreHoja);
	return $objPHPExcel;
	}
	public function actionAdmin()
	{
		$model=new FacturasSalientes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasSalientes']))
			$model->attributes=$_GET['FacturasSalientes'];

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
		$model=FacturasSalientes::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='facturas-salientes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
