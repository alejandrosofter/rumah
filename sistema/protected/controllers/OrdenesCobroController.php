<?php

class OrdenesCobroController extends RController
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
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('PagoDirecto','index','view','delete','crearCobro'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update','delete'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('@'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
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
	
	public function actionCrearCobro()
	{
		$model=new OrdenesCobro;
		$manager=new OrdenesCobroItemsManager();
//                echo '<br><br><br>model'.$model->idCliente;
                
                
		if(isset($_POST['OrdenesCobro']))
            {
            $model->attributes=$_POST['OrdenesCobro'];
            if($model->idCliente!='')
                    $manager->agregarItems(FacturasSalientesVencimiento::model()->consultarPendientes($model->idCliente)->data);
//            $items=isset($_POST['chk'])?$_POST['chk']:'';
            if(isset ($_POST['noValidate']))
            if($_POST['noValidate']=='false'){
                $manager->manage(isset($_POST['FacturasSalientesVencimiento'])?$_POST['FacturasSalientesVencimiento']:null);
                $datosCorrectos=$this->datosCorrectos($model,$manager->getItems());
                $valid=$model->validate() && $datosCorrectos;
                if($valid)
                {
//                    $this->agregarPagosItems($manager->getItems());
                    $model->estado=$model->importeAcuenta;
                    $model->save();
                    $this->asentarItems($model->idOrdenCobro,$manager->getItems());
                    $this->redirect(array('/ordenesCobro/'));
                }

            }

        }
        
        $model->fechaOrdenCobro=Date('Y-m-d');

		$this->render('crearCobro',array(
			'model'=>$model,'manager'=>$manager
		));
	}
        public function actionAplicarCobrosCuenta($idCliente)
        {
//            $pendientes=OrdenesCobro::model()->consultarPagosCuenta($idCliente);
//            echo 'PENDIENTES: '.  count($pendientes);
//            foreach ($pendientes as $key => $value){
//                //AGARRO LA FACTURA CON MAYOR IMPORTE
//                $facturaPagar=FacturasSalientes::model()->getFacturaPagarCuenta($idCliente,$value['importeAcuenta']);
//                //AGARRO EL VENCIMIENTO
//                $factVencimiento=FacturasSalientesVencimiento::model()->consultarFacturaUnica($value['idFacturaSaliente']);
//                //CALCULO EL IMPORTE A LIQUIDAR
//                $aPagar=$facturaPagar['importeFactura']-$factVencimiento['pagos'];
//                $resto=$this->getImportePagar($aPagar,$value['importeAcuenta']);
//                if($facturaPagar!='no')
//                    $this->aplicarPagoCuenta($value['idOrdenCobro'],$facturaPagar['idFacturaSaliente'],$value['importeAcuenta'],$facturaPagar['idFacturaVencimiento'],$resto);
//                
//            }
            $model=new OrdenesCobro;
	    $manager=new OrdenesCobroItemsManager();
  
            if($idCliente!='')
                    $manager->agregarItems(FacturasSalientesVencimiento::model()->consultarPendientes($idCliente,false,false)->data);
//            $items=isset($_POST['chk'])?$_POST['chk']:'';
            if(isset ($_POST['noValidate']))
            if($_POST['noValidate']=='false'){
                $manager->manage(isset($_POST['FacturasSalientesVencimiento'])?$_POST['FacturasSalientesVencimiento']:null);
                $datosCorrectos=$this->datosCorrectos($model,$manager->getItems());
                $valid= $datosCorrectos;
                if($valid)
                {
                    $importeImputado=$this->getImporteImputado($manager->getItems());
                    $this->quitarImporteAcuenta($importeImputado,$idCliente);
                    $model->idCliente=$idCliente;
                    $model->fechaOrdenCobro=Date('Y-m-d');
                    $model->idFormaPago=0;
                    $model->save();
                    $this->asentarItems($model->idOrdenCobro,$manager->getItems());
                    $this->redirect(array('/ordenesCobro/'));
                }

            }
            if(isset ($_POST['noValidate']))
            if($_POST['noValidate']=='ok'){
                $manager->manage(isset($_POST['FacturasSalientesVencimiento'])?$_POST['FacturasSalientesVencimiento']:null);
//                echo '<br><br><br><br><br>'.count($manager->getItems());
            }

        
        $importeCuenta=(OrdenesCobro::model()->consultarImporteCuenta($_GET['idCliente']));
        
        $model->fechaOrdenCobro=Date('Y-m-d');

		$this->render('aplicarCobrosAcuenta',array(
			'model'=>$model,'manager'=>$manager,'importeCuenta'=>$importeCuenta
		));
        }
        private function quitarImporteAcuenta($importe,$idCliente)
        {
            $impAux=$importe;
            $ordenes=OrdenesCobro::model()->consultarPagosCuenta($idCliente);
//            echo '<br><br><br><br><br>10Cantidad ordenes'.count($ordenes);
            foreach ($ordenes as $key => $value) {
                if($impAux==0) continue;
                
                $resto=$impAux-$value['importeAcuenta'];
               
                if($resto<0){
                    
                    $orden=OrdenesCobro::model()->findByPk($value['idOrdenCobro']);
                    
                    $orden->importeAcuenta=$orden->importeAcuenta-$impAux;
                    $impAux=0;
                    $orden->save();
//                     echo '$value'.$value['idOrdenCobro'].', '.$orden->save();
                    
                }else{
                    $impAux=$resto;
                    $orden=OrdenesCobro::model()->findByPk($value['idOrdenCobro']);
                    $orden->importeAcuenta=$resto;
                    $orden->save();
                }
            }
        }
        private function getImporteImputado($items)
        {
            $saldo=0;
            foreach ($items as $key => $value) 
                $saldo+=$value['importeF'];
            return $saldo;
                
            
        }
        private function getImportePagar($debe,$cuenta)
        {
            if($debe>$cuenta)return $cuenta;
            return $debe;
        }
        private function aplicarPagoCuenta($idOrden,$idFactura,$importe,$idFacturaVenc,$resto)
        {
            $orden=OrdenesCobro::model()->findByPk($idOrden);
            $this->crearOrdenPagoCuenta($orden->idCliente,$orden->idFormaPago,$idFactura,$resto,$idFacturaVenc);
            $this->actualizarImporteCuenta($idOrden,$resto);
            
        }
        private function actualizarImporteCuenta($idOrden,$importe)
        {
            echo 'idOrden'.$idOrden;
            $orden=  OrdenesCobro::model()->findByPk($idOrden);
            
            if(isset ($orden)){
                echo 'Actualiza';
                 echo '$importe'.$importe;
                $orden->importeAcuenta=$orden->importeAcuenta-$importe;
                $orden->save();
            }
                    
        }
        private function crearOrdenPagoCuenta($idCliente,$idFormaPago,$idFactura,$importe,$idFacturaVencimiento)
        {
            $op=new OrdenesCobro;
            $op->fechaOrdenCobro=Date('Y-m-d');
            $op->idCliente=$idCliente;
            $op->idFormaPago=$idFormaPago;
            $op->save();
//            echo 'IMPORTE '.$importe;
          	
            $opf= new OrdenesCobroFacturas;
            $opf->idOrdenCobro=$op->idOrdenCobro;
            $opf->idFacturaSaliente=$idFactura;
            $opf->idFacturaVencimiento=$idFacturaVencimiento;
            $opf->importeCobroFactura=$importe;
            $opf->save();
            
        }
        private function itemsCorrectos($items)
        {
            $sal="";
            foreach ($items as $key => $value) 
                if($value['procesar']){
                $factura=  FacturasSalientes::model()->consultarUnica($value['idFacturaSaliente']);
                $resto1=round($factura['importeFactura'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'))-round($factura['pagos'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'));
                $resto=round($resto1,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))-round($value['importeF'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'));
               $importe=$value['importeFacturaSaliente'];
                if($resto<0) $sal.="El item con importe $ $importe es mayor al importe posible $resto1 - ".$value['importeF']."= $resto";
            }
            return $sal;
        }
        private function datosCorrectos($model,$items)
        {
            $error="";
            $salida=true;
//            if(count($items)==0){ 
//                $salida=false; 
//                $error.="No existen items o bien no se selecciono ninguno";
//                
//                }
                $itemsOk=$this->itemsCorrectos($items);
            if($itemsOk!=""){
                $salida=false;
                $error.="<br>Existen items ($itemsOk) que los valores mayores al importe de la factura, por favor revise los importes y vuelva a intentar";
            }
            if($error!="")
                Yii::app()->user->setFlash('error',$error);
            return $salida;
        }
	
	private function asentarItems($idOrdenCobro,$items)
	{
            if($items!=null)
		foreach($items as $id => $vencimiento)
            {
//                echo '<br><br><br><br><br>';
//                            print_r($vencimiento);
                   if($vencimiento->procesar==1) {
//			$vencimiento=FacturasSalientesVencimiento::model()->findByPk($item);
//			$factura=  FacturasSalientes::model()->consultarUnica($vencimiento->idFacturaSaliente);
			if($vencimiento->importeF>0){
                            $modelVencimientos=new OrdenesCobroFacturas;
                            $modelVencimientos->importeCobroFactura=$vencimiento->importeF;
                            $modelVencimientos->idFacturaSaliente=$vencimiento->idFacturaSaliente;
                            $modelVencimientos->idFacturaVencimiento=$vencimiento->idFacturaVencimiento;
                        echo 'venc'.$vencimiento->idFacturaVencimiento;
                            $modelVencimientos->idOrdenCobro=$idOrdenCobro;
                            $modelVencimientos->save();
                        }
		}
            }
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new OrdenesCobro;
		$manager=new OrdenesCobroItemsManager();
//                echo '<br><br><br>model'.$model->idCliente;
                
                
		if(isset($_POST['OrdenesCobro']))
            {
            $model->attributes=$_POST['OrdenesCobro'];
            if($model->idCliente!='')
                    $manager->agregarItems(FacturasSalientesVencimiento::model()->consultarPendientes($model->idCliente)->data);
//            $items=isset($_POST['chk'])?$_POST['chk']:'';
            if(isset ($_POST['noValidate']))
            if($_POST['noValidate']=='false'){
                $manager->manage(isset($_POST['FacturasSalientesVencimiento'])?$_POST['FacturasSalientesVencimiento']:null);
                $datosCorrectos=$this->datosCorrectos($model,$manager->getItems());
                $valid=$model->validate() && $datosCorrectos;
                if($valid)
                {
//                    $this->agregarPagosItems($manager->getItems());
                    $model->estado=$model->importeAcuenta;
                    $model->save();
                    $this->asentarItems($model->idOrdenCobro,$manager->getItems());
                    $this->redirect(array('/ordenesCobro/'));
                }

            }

        }
        
        $model->fechaOrdenCobro=Date('Y-m-d');

		$this->render('crearCobro',array(
			'model'=>$model,'manager'=>$manager
		));
	}
	public function actionPagoDirecto($idFactura,$idCliente)
	{
		$model=new OrdenesCobro;
		$manager=new OrdenesCobroItemsManager();
//                echo '<br><br><br>model'.$model->idCliente;
                
            $model->idCliente=$idCliente;
            $manager->agregarItems(FacturasSalientesVencimiento::model()->consultarPendientes($model->idCliente)->data);
	    if(isset($_POST['OrdenesCobro']))
            {
            $model->attributes=$_POST['OrdenesCobro'];
            if($model->idCliente!='')
                    $manager->agregarItems(FacturasSalientesVencimiento::model()->consultarPendientes($model->idCliente)->data);
//            $items=isset($_POST['chk'])?$_POST['chk']:'';
            if(isset ($_POST['noValidate']))
            if($_POST['noValidate']=='false'){
                $manager->manage(isset($_POST['FacturasSalientesVencimiento'])?$_POST['FacturasSalientesVencimiento']:null);
                $datosCorrectos=$this->datosCorrectos($model,$manager->getItems());
                $valid=$model->validate() && $datosCorrectos;
                if($valid)
                {
//                    $this->agregarPagosItems($manager->getItems());
                    $model->estado=$model->importeAcuenta;
                    $model->save();
                    $this->asentarItems($model->idOrdenCobro,$manager->getItems());
                    $this->redirect(array('/ordenesCobro/'));
                }

            }

        }
        
        $model->fechaOrdenCobro=Date('Y-m-d');

		$this->render('crearCobro',array(
			'model'=>$model,'manager'=>$manager
		));
	}
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrdenesCobro']))
		{
			$model->attributes=$_POST['OrdenesCobro'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idOrdenCobro));
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
		
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('OrdenesCobro');
		$model=new OrdenesCobro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesCobro']))
			$model->attributes=$_GET['OrdenesCobro'];	
		$this->render('index',array(
			'dataProvider'=>$model,
			'model'=>$model,
		));
		

		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OrdenesCobro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesCobro']))
			$model->attributes=$_GET['OrdenesCobro'];

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
		$model=OrdenesCobro::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='ordenes-cobro-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
