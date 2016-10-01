<?php

class StockPreciosController extends RController
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
				'actions'=>array('index','view','asignarcompra'),
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
	public function actionCreate()
	{
		$model=new StockPrecios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StockPrecios']))
		{
			$model->attributes=$_POST['StockPrecios'];
			$model->save();
			if($_GET['tipo']=='compra')
				$this->actionasignarcompra($model->idStockPrecio);
			if($_GET['tipo']=='inventario')
				$this->actionasignarinventario($model->idStockPrecio);
			if($_GET['tipo']=='porTipo')
				$this->actionVariarPreciosTipo($model->idStockPrecio);
			if($_GET['tipo']=='servicios')
				$this->actionAsignarServicios($model->idStockPrecio);
			
			
				
		}
		$model->tipo=$_GET['tipo'];

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionAsignarServicios($id)
	{
		$sotckPrecio=StockPrecios::model()->findByPk($id);
		
		$model=new stockPreciosItems;
		$model->asignarservicios($sotckPrecio->idTipo,$sotckPrecio->porcentajeVariacion,$id);
		$this->redirect(array('/stockPreciosItems/index',
			'idStockPrecio'=>$id
		));
	}
	public function actionasignarinventario($id)
	{
		$sotckPrecio=StockPrecios::model()->findByPk($id);
		
		$model=new stockPreciosItems;
		$model->asignarInventario($sotckPrecio->idTipo,$id);
		$this->redirect(array('/stockPreciosItems/index',
			'idStockPrecio'=>$id
		));
	}
	public function actionasignarcompra($id)
	{
		$model=new StockPrecios;
		$model->idElemento=$id;
		if(isset($_POST['criterio1']))
		{
			$id=Stock::model()->aplicarPreciosCompra($id,$_POST['criterio1'],$_POST['porcentaje1'],isset($_POST['redondear'])?$_POST['redondear']:0);
			$this->redirect(array('/stockPreciosItems/index',
			'idStockPrecio'=>$id
		));
		}
		$model->formulaPrecios='%UP * %PIVA * %PG * %PPG';
		$this->render('/stock/aplicarPreciosCompra',array(
			'model'=>$model,
		));
	}
	private function chequearAlerta($idFactura)
	{
		$modeloAlerta=new Alertas;
		
      	$alertas=Alertas::model()->buscarElemento($idFactura);
      	
      		if($alertas!=false){
      			Alertas::model()->bajarAlertasUsuarioTarea($alertas);
      			//tengo que bajarla de todos los usuarios!
      		}
      	
	}
	
	public function actionVariarPreciosTipo($id)
	{
		$sotckPrecio=StockPrecios::model()->findByPk($id);
		$idTipo=$_POST['idTipoStock'];
		$model=new stockPreciosItems;
		$model->asignarPorTipo($sotckPrecio->idTipo,$sotckPrecio->porcentajeVariacion,$id);
		$this->redirect(array('/stockPreciosItems/index',
			'idStockPrecio'=>$id
		));
	}
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['StockPrecios']))
		{
			$model->attributes=$_POST['StockPrecios'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idStockPrecio));
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
	public function actionIndex()
	{
		$model=new StockPrecios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StockPrecios']))
			$model->attributes=$_GET['StockPrecios'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StockPrecios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StockPrecios']))
			$model->attributes=$_GET['StockPrecios'];

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
		$model=StockPrecios::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='stock-precios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
