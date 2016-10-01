<?php

class StockController extends RController

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
				'actions'=>array('patientCard','vaciarCarro','cambiarPrecios','quitarProductoCarro','consultarCarro','agregarCarro','estadisticaProducto','index','view','centroStock','stockReal','etiquetas' ,'AplicarPreciosServicios', 'aplicarPreciosCompra','aplicarStockInventario','AplicarPreciosInventario','aplicarPreciosCategoria'),
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
        
        public function actionImprimirCodigo($id)
        {
             if(isset($_POST['yt0'])){
                $this->imprimeCodigo("/stock",$_POST['cantidad'],$id);
                 }
                $this->renderPartial('/stock/_vistaImpresionCodigos', array(
                   'model'=>OrdenesTrabajo::model(),'id'=>$id,
                                 ),false,true);
                     Yii::app()->end();
            

            
        }
        private function imprimeCodigo($urlLink,$cantidad,$id)
        {
            $puerto=$_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT'];
            $host='http://'.$_SERVER['SERVER_NAME'].$puerto;
                    $url=$host.Yii::app()->createUrl($urlLink);
                    
                    $arr=Stock::model()->getTextoEtiquetas($id,array(),$cantidad);
                    $texto=Impresiones::model()->imprimeCodigos($arr);
                    echo 'Enviando impresion! .. aguarde un momento, en segundos sera redirigido';
                    Impresiones::model()->imprimirJava($texto, 'codigoBarrasProducto', $url, 1,0,0,'no','no',0,0);
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
        public function ean13_checksum ($message) {
  $checksum = 0;
  foreach (str_split(strrev($message)) as $pos => $val) {
    $checksum += $val * (3 - 2 * ($pos % 2));
  }
  return ((10 - ($checksum % 10)) % 10);
}
 public function actionInformeStock()
 {
            $params['stockAlertas']= Stock::model()->consultarStockMinimos();
            $params['importeMercaderia']= Stock::model()->getImporteMercaderia();
            
            $forma=Settings::model()->getValorSistema('INFORME_STOCK', $params, 'impresiones');
            
                $model=new Impresiones;
                $model->idTipoImpresion=0;
		$model->tipoImpresion='stock';
		$model->fechaImpresion=date('Y-m-d');
		$model->textoImpresion=$forma;
		
		$this->renderPartial('/impresiones/verImpresion',array(
			'model'=>$model,false
		));
 }
// Valor de prueba (sin dígito de control)
public function actionCreateDeInventario()
	{
		$model=new Stock;
                $modelInventario=$this->getInventarioCargaStock($_GET['idInventario'],0,0);
                $modelPrecio=$this->getPrecioCargaStock('', 0);
                
                $ean=str_pad (Stock::model()->pais.Stock::model()->empresa.($this->getUltimoIdCargado()), 12, "15", STR_PAD_LEFT);
                $model->codigoBarra=$ean.$this->ean13_checksum($ean);
                $model->codigoProducto='L'.$this->getUltimoIdCargado();
                $model->unidadMedida="Unidad";
                $model->estado="Alta";
                $model->min=0;
                $model->max=0;
                $model->porcentajeIva=21;
                $idInventario=$_GET['idInventario'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
                        $modelInventario->attributes=$_POST['InventariosProductos'];
                        $modelPrecio->attributes=$_POST['stockPreciosItems'];
                        $valid=$model->validate();
                        $valid=$valid&&$modelPrecio->validate();
                        $valid=$valid&&$modelInventario->validate();
//                        $existe=$this->existeProducto($model);
//                        if($existe==false){
                            if($valid){
                                $model->save();
                                $modelInventario->idStockInventario=$model->idStock;
                                 $modelInventario->save();
                                  $modelPrecio->idStock=$model->idStock;
                                  
                                  $modelPrecio->save();
                                  
                                  $rutaVuelve='/stock/createDeInventario&idInventario='.$idInventario;
                                  if(isset($_POST['imprime']))$this->imprimeCodigo($rutaVuelve,$modelInventario->cantidadInventario,$model->idStock);
                                else if(isset($_POST['vuelve']))  $this->redirect(array($rutaVuelve)); else  $this->redirect(array('/stock'));
                                
//                                $this->redirect(array('/stock'));
                            }
                               
//                             else{
//                             Yii::app()->user->setFlash('error',$existe);
                          
                        
                            
			
		}

		$this->render('crearProductoInventario',array('modelPrecio'=>$modelPrecio,
			'model'=>$model,'modelInventario'=>$modelInventario,'ultimoCargado'=>$this->getUltimoIdCargado()
		));
	}
        private function getInventarioCargaStock($idInventario,$cantidad,$idStock)
        {
            $pv=new InventariosProductos;
            $pv->idInventario=$idInventario;
            $pv->fechaProductoInventario=Date('Y-m-d');
            $pv->cantidadInventario=$cantidad;
            $pv->idStockInventario=$idStock;
            return $pv;
        }
        public function getPrecioCargaStock($importe,$idStock)
        {
            $sp=new stockPreciosItems;
                            $sp->idStockPrecio=1;
                            $sp->idStock=$idStock;
                            $sp->importePesosStock=$importe;
                            
                            $sp->importePesosStockMin=0;
             return $sp;
        }
	public function actionCreate()
	{
		$model=new Stock;
                $ean=str_pad (Stock::model()->pais.Stock::model()->empresa.($this->getUltimoIdCargado()), 12, "15", STR_PAD_LEFT);
                $model->codigoBarra=$ean.$this->ean13_checksum($ean);
                $model->codigoProducto='L'.$this->getUltimoIdCargado();
                $model->unidadMedida="Unidad";
                $model->estado="Alta";
                $model->min=0;
                $model->max=0;
                $model->porcentajeIva=21;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
//                        $existe=$this->existeProducto($model);
//                        if($existe==false){
                            if($model->save()){
                                if(isset($_POST['vuelve']))  $this->redirect(array('/stock/create'));
                                $this->redirect(array('/stock'));
                            }
                               
//                             else{
//                             Yii::app()->user->setFlash('error',$existe);
                          
                        
                            
			
		}

		$this->render('create',array(
			'model'=>$model,'ultimoCargado'=>$this->getUltimoIdCargado()
		));
	}
        private function existeProducto($model)
        {
            $s=new stock;
            $s->nombre=$model->nombre;
            $s->codigoBarra=$model->codigoBarra;
            $s->codigoProducto=$model->codigoProducto;
          
           
            return $s->existe();
        }
	public function actionPatientCard($data)
        {
//                $patient = $this->loadPatient($data);
                // set card
                require_once 'Image/Barcode.php';
				$im = Image_Barcode::draw($data, 'code128', 'png',false);
				
				header('Content-type: image/png'); 
				imagepng($im,'images/codigosBarras/cod.png'); 
                                imagepng($im); 
				imagedestroy($im); 
        }
	private function getUltimoIdCargado()
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("SELECT * from stock order by idStock desc limit 1");
         $res= $command->queryAll();
	return isset($res[0])?$res[0]['idStock']:0; 
	}
	public function actionAplicarPreciosCompra()
	{
		$model=new Compras;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Compras']))
		{
			
			Stock::model()->aplicarPreciosCompra($_POST['Compras']['idCompra'],$_POST['Compras']['formulaPrecios']);
			$this->redirect(array('/compras'));
		}
		$model->idCompra=$_GET['idCompra'];
		$model->formulaPrecios='%UP * %PIVA * %PG * %PPG';
		$this->render('aplicarPreciosCompra',array(
			'model'=>$model,
		));
	}
	public function actionAplicarPreciosServicios()
	{
		$model=new Servicios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Servicios']))
		{
			
			Stock::model()->aplicarPreciosServicios($_POST['Servicios']['formulaPrecios']);
			$this->redirect(array('/servicios'));
		}
		
		$model->formulaPrecios='%USP';
		$this->render('aplicarPreciosServicios',array(
			'model'=>$model,
		));
	}
	public function actionAplicarPreciosCategoria()
	{
		$model=new StockTipoProducto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StockTipoProducto']))
		{
			
			Stock::model()->aplicarPreciosCategoria($_POST['StockTipoProducto']['idStockTipo'],$_POST['StockTipoProducto']['formulaPrecios']);
			$this->redirect(array('/stockTipoProducto'));
		}
		$model->idStockTipo=$_GET['idTipoProducto'];
		$model->formulaPrecios='%UP * %PIVA * %PG * %PPG';
		$this->render('aplicarPreciosCategoria',array(
			'model'=>$model,
		));
	}
	public function actionAplicarPreciosInventario()
	{
		$model=new Inventarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventarios']))
		{
			
			Stock::model()->aplicarPreciosInventario($_POST['Inventarios']['idInventario'],$_POST['Inventarios']['formulaInventarioPrecios']);
			$this->redirect(array('/inventarios'));
		}
		$model->idInventario=$_GET['idInventario'];
		$model->formulaInventarioPrecios='%UP * %PIVA * %PG * %PPG';
		$this->render('aplicarPreciosInventario',array(
			'model'=>$model,
		));
	}
        public function actionConsultaPrecios()
        {
            $model=new Stock;
            $importe='';
            $nombre='';
            if(isset ($_POST['Stock'])){
                $model->attributes=$_POST['Stock'];
                $item=ItemsFacturaSaliente::model()->getElementoCodigo($model->idTipoProducto,1);
                if(isset($item)){
                     $importe=$item->importeItemLista;
                     $st=  Stock::model()->findByPk($item->idElemento);
                     $nombre=$st->nombre;
                }else {
                    $importe=0;
                }
                
                $fp=FormasDePago::model()->findByPk($_POST['Stock']['idStock']);
                $interes=($fp->intereses/100)+1;
                $importe=round($importe*$interes,2);
                
//                $importe=;
            }
		$this->render('consultaPrecio',array(
			'model'=>$model,'importe'=>$importe,'nombre'=>$nombre
		));
        }
	public function actionAplicarStockInventario()
	{
		$model=new Inventarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventarios']))
		{
			Stock::model()->aplicarInventarioStock($_POST['Inventarios']['idInventario'],$_POST['aplicarPreciosMasIva'],$_POST['sumarDisponibilidades']);
			$this->redirect(array('/inventarios'));
		}
		$model->idInventario=$_GET['idInventario'];

		$this->render('aplicarStock',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
			if($model->save())
				$this->redirect(array('/stock'));
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
	public function actionGetPrecios()
	{
		$data['precioLista']=Stock::model()->getPrecioVenta($_GET['idStock']);
		$data['precioMinimo']=Stock::model()->getPrecioVentaMin($_GET['idStock']);
		$data['precioCompra']=Stock::model()->getPrecioVenta($_GET['idStock'],true);
		echo CJSON::encode($data);
	}
	public function actionCambiarPrecios()
	{
		$model=Stock::model()->cambiarPrecios();
		$_GET['limite']=isset($_GET['limite'])?$_GET['limite']:'100';
		$this->render('cambiarPrecios',array(
			'data'=>$model
		));
	}
	public function actionCambiarPrecioStock()
	{
		$model=new stockPreciosItems;
		$model->idStockPrecio = 1;
		$model->idStock= $_GET['idStock'];
        $model->importePesosStock=$_GET['lista']/1.21;
        $model->importePesosStockMin=$_GET['min']/1.21;
        $model->save();
	}
	public function actionStockReal()
	{
		$model=new Stock('stockReal');
		$model->unsetAttributes();  // clear any default values
		$porcentajeGeneral=strip_tags(Yii::app()->settings->getKey('PORCENTAJE_VENTA_PRODUCTO'))+0;
		$porcentajeGeneral= (($porcentajeGeneral/100));
		if(isset($_GET['accion'])&&$_GET['accion']=="agregarCarro"){
			$this->agregarCarro();
			Yii::app()->user->setFlash('success',"Producto agregado al Carro de compras!");
		}
			
		$this->render('stockReal',array(
			'model'=>$model, 'porcentaje'=>$porcentajeGeneral
		));
	}
	public function actionEstadisticaProducto()
	{
		$model=new Stock;
		$idStock=$_GET['idStock'];
		$this->render('estadisiticaProducto',array('ventas'=>FacturasItems::model()->ventasStock($idStock),
			'compras'=> ComprasItems::model()->comprasProducto($idStock)
		));
		
	}

    public function actionEtiquetas()
    {

        $nombre = $_GET['term'];
$results=array();
        $data = Stock::model()->consultarStockComun($nombre);
        foreach ($data as $m) {
            //$nombreStock = ' (' . ($m->cantidadDisponible) . ' disponibles)';
            //$disponibles = ($m->tipoProducto == 'STOCK') ? $nombreStock : ' - SERVICIO';
            $nombreProducto = $m->nombre;

            $porc = strip_tags(Yii::app()->settings->getKey('PORCENTAJE_VENTA_PRODUCTO'));
            //$precioContado = $m->precioLista - ($m->precioLista * ($porc / 100));
            $results[] = array(
                'idStock' => $m->idStock, 'nombre' => $m->nombre, 'id' => $m->idStock,
                'valor' => $m->nombre, 'value'=>$m->nombre,
                'porcentajeIva' => $m->porcentajeIva);
        }
        echo CJSON::encode($results);
    }

    public function actionIndex()
	{
		$model=new Stock('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stock']))
			$model->attributes=$_GET['Stock'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	private function quitarOrdenCarro()
	{
		$idProducto=$_GET['idOrdenTrabajo'];
		$datos = isset(Yii::app()->request->cookies['ordenesCarro'])?Yii::app()->request->cookies['ordenesCarro']->value:'';
		$datosArray=explode(',',$datos);
		$salida='';
		foreach($datosArray as $item)
			if($item!=$idProducto)
				if($item!='')
					$salida.=','.$item;
		Yii::app()->request->cookies['ordenesCarro'] = new CHttpCookie('ordenesCarro', $salida);
	}
	private function quitarProductoCarro()
	{
		$idProducto=$_GET['idStock'];
		$datos = isset(Yii::app()->request->cookies['productosCarro'])?Yii::app()->request->cookies['productosCarro']->value:'';
		$datosArray=explode(',',$datos);
		$salida='';
		foreach($datosArray as $item)
			if($item!=$idProducto)
				if($item!='')
					$salida.=','.$item;
		Yii::app()->request->cookies['productosCarro'] = new CHttpCookie('productosCarro', $salida);
	}
	public function vaciarCarroOrdenes()
	{
		Yii::app()->request->cookies['ordenesCarro'] = new CHttpCookie('ordenesCarro', '');
	}
	public function vaciarCarro()
	{
		Yii::app()->request->cookies['productosCarro'] = new CHttpCookie('productosCarro', '');
	}
	private function agregarCarro()
	{
		$idStock=$_GET['idStock'];
		
		$datos = isset(Yii::app()->request->cookies['productosCarro'])?Yii::app()->request->cookies['productosCarro']->value:'';
		$datos.=','.($idStock);
		Yii::app()->request->cookies['productosCarro'] = new CHttpCookie('productosCarro', $datos);
	}
        public function getElemento2($id)
        {
            //$elem=$this->getElementoKey($id,$cantidad);
            return "nombre:32; apellido:$id;cantidad:3";
        }
        public function actionConsultarCarro()
	{
		$datos = isset(Yii::app()->request->cookies['productosCarro'])?Yii::app()->request->cookies['productosCarro']->value:''; 
		if(isset($_GET['accion'])&&$_GET['accion']=="quitar"){
			$this->quitarProductoCarro();
			Yii::app()->user->setFlash('success',"Producto quitado del Carro de compras!");
			$this->redirect(array('consultarCarro'));
		}
		if(isset($_GET['accion'])&&$_GET['accion']=="quitarOrden"){
			$this->quitarOrdenCarro();
			Yii::app()->user->setFlash('success',"Orden quitada del Carro de compras!");
			$this->redirect(array('consultarCarro'));
		}
		if(isset($_POST['accion'])&&$_POST['accion']=="vaciar"){
			$this->vaciarCarro();
			Yii::app()->user->setFlash('success',"Carro de compra vaciado!");
			$this->redirect(array('consultarCarro'));
		}
		if(isset($_POST['accion'])&&$_POST['accion']=="vaciarOrdenes"){
			$this->vaciarCarroOrdenes();
			Yii::app()->user->setFlash('success',"Ordenes de Trabajo vaciado!");
			$this->redirect(array('consultarCarro'));
		}
		if(isset($_POST['accion'])&&$_POST['accion']=="facturar"){
			$this->facturarCarro();
			
		}
		
		$this->render('carroCompras',array('it'=>$datos,
			'items'=>$this->consultarItemsCarro($datos), 
		));
	}
	
	private function facturarCarro()
	{
		$ordenes=isset(Yii::app()->request->cookies['ordenesCarro'])?Yii::app()->request->cookies['ordenesCarro']->value:'';
		if($ordenes=='')
		$this->redirect(array('/facturasSalientes/crearFactura&carro=ok'));
		else $this->redirect(array('/facturasSalientes/crearFactura&carro=ok&idOrdenTrabajo='.$ordenes));
		
	}
        public function actionCarro()
	{
            $data = isset(Yii::app()->request->cookies['productosCarro'])?Yii::app()->request->cookies['productosCarro']->value:'';
            $datos=$this->consultarItemsCarro2($data);
             
            $arrayDataProvider=new CArrayDataProvider($datos, array(
		'id'=>'id',
		/* 'sort'=>array(
			'attributes'=>array(
				'username', 'email',
			),
		), */
		'pagination'=>array(
			'pageSize'=>10,
		),
	));
		$this->render('/site/carro',array(
			'datos'=>$arrayDataProvider
		));
	}
        private function getSubElemento($arr)
        {
            foreach($arr as $camp=>$item){
                $salida[$camp]=$item;
            }
            return $salida;
        }
        private function getElemento($arr)
        {
            //array('id'=>1, 'username'=>'from', 'email'=>'array')
            foreach($arr as $item){
                $salida[]=$this->getSubElemento(explode(':',$item));
            }
        }
        private function consultarItemsCarro2($datosProductos)
	{
		$salida=array();
		$datosArray=explode(',',$datosProductos);
		$i=0;
		foreach($datosArray as $item){
			if($i!=0){
                            $salida[]=$this->getElemento(explode(';',$item));
                        }
				
			$i++;
		}
			
		
			
		return $salida;
	}
	private function consultarItemsCarro($datosProductos)
	{
		$salida=array();
		$datosArray=explode(',',$datosProductos);
		$i=0;
		foreach($datosArray as $item){
			if($i!=0)
				$salida[]=ItemsFacturaSaliente::model()->getElementoKey($item,0);
			$i++;
		}
			
		
			
		return $salida;
	}
	public function actionCentroStock()
	{
		$this->render('centroStock',array(
			'model'=>Stock::model(),
			));	
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Stock('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stock']))
			$model->attributes=$_GET['Stock'];

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
		$model=Stock::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='stock-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
