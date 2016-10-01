<?php

class PagosController extends RController
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
				'actions'=>array('centroPagos','index','view','consultarPagosFactura','PagarFacturaItems','pagodirecto'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionPagodirecto()
	{
	$idFactura=isset($_GET['idFactura'])?$_GET['idFactura']:0;
		

		$model=new Pagos;
		
		
		if(isset($_POST['Pagos']))
		{
			$model->attributes=$_POST['Pagos'];
			if($model->save()){

				$this->redirect(array('/pagosFactura/create','idCliente'=>$model->idCliente,
				'idPago'=>$model->idPago,'idFacturaSaliente'=>$idFactura,'importeDinero'=>$model->importeDinero));

			}
		}
			
			if($idFactura!=0){
			$idFactura=$_GET['idFactura'];
			$factura= FacturasSalientes::model()->findByPk($idFactura);
			$model->idCliente=$factura->idCliente;
			
			$valores = ItemsFacturaSaliente::model()->consultarFacturaUnicaCliente($idFactura);
			
		$model->fecha=date('Y-m-d');
		$model->importeDinero =  isset($valores[0]->importeFinal)?$valores[0]->importeFinal:0;
		$model->detalle = isset($_GET['detalle'])?$_GET['detalle']:'';
		$model->idFacturaSaliente = $idFactura;
		$this->render('create',array(
			'model'=>$model,'idFacturaSaliente'=>$idFactura
		));
		
		}
	}
	public function actionCreate()
	{
		$idFactura=isset($_GET['idFactura'])?$_GET['idFactura']:0;
		$model=new Pagos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		

		if(isset($_POST['Pagos']))
		{
			$model->attributes=$_POST['Pagos'];
			if($model->save()){
				
				
				
				$this->redirect(array('/pagosFactura/create','idCliente'=>$model->idCliente,
				'idPago'=>$model->idPago,'idFacturaSaliente'=>$idFactura,'importeDinero'=>$model->importeDinero));

			}
				
		}
		
		if($idFactura!=0){
			$idFactura=$_GET['idFactura'];
			$factura= FacturasSalientes::model()->findByPk($idFactura);
			$model->idCliente=$factura->idCliente;
		}
		
		$model->fecha=date('Y-m-d');
		$model->importeDinero = isset($_GET['restante'])?number_format($_GET['restante'],2,'.',''):0;
		$model->detalle = isset($_GET['detalle'])?$_GET['detalle']:'';
		$model->idFacturaSaliente = $idFactura;
		$model->nuevaFactura = isset($_GET['nuevaFactura'])?1:0;
		
		$this->render('create',array(
			'model'=>$model,'idFacturaSaliente'=>$idFactura, 
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

		if(isset($_POST['Pagos']))
		{
			$model->attributes=$_POST['Pagos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idPago));
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

	public function actionCentroPagos()
	{
		$this->render('centroPagos',array(
			'model'=>Pagos::model(),
		));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Pagos('Pagos');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['nombre']))
			$model->attributes=$_GET['nombre'];
		
		
		$this->render('index',array(
			'model'=>Pagos::model(),
		));
	}
	public  function actionPagarFacturaItems()
	{
		$idFacturaSaliente = isset($_GET['idFacturaSaliente'])?$_GET['idFacturaSaliente']:0;
		
		$factura= ItemsFacturaSaliente::model()->consultarFacturaUnicaCliente($idFacturaSaliente);
		
		
		
		$this->redirect('pagos/create',array(
			'model'=>$model,'idFactura'=>$idFacturaSaliente,'restante'=>$factura->importeFinal
		));
		//sumar los items
		//asentar en pagos importe
		
		//rescatar el idPago
		//asentar en pagofactura con idpago!!
		
		
	}
	
	public function actionConsultarPagosFactura($idFacturaSaliente,$importeFactura)
	{
		$data=Pagos::model()->consultarPagos($idFacturaSaliente);
		$ev = 0;
		for($i=0;count($data->data)>$i;$i++)
		{
			
         
            $ev = $data->data[$i]['importeDinero'] + $ev ;
            
		}
		$factura= FacturasSalientes::model()->findByPk($idFacturaSaliente);
		$restante = $importeFactura - $ev;
		$this->render('consultarPagosFactura',array(
			'data'=>$data,'idFacturaSaliente'=>$idFacturaSaliente,'idCliente'=>$factura->idCliente,
		'restante'=>$restante
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pagos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pagos']))
			$model->attributes=$_GET['Pagos'];

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
		$model=Pagos::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pagos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
