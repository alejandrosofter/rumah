<?php

class MantenimientosEmpresasVisitasRutinaController extends RController
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
				'actions'=>array('verIndividual', 'index','view'),
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
	public function actionVerIndividual()
	{
//		$model=InventariosProductos::model()->consultarProductos($_GET['idInventario']);
//		$this->render('consultarProductos',array(
//			'model'=>$model,'idInventario'=>$_GET['idInventario']
//		));
		
		$dataProvider=new CActiveDataProvider('MantenimientosEmpresasVisitasRutina');
		$modelo = MantenimientosEmpresasVisitasRutina::model();
		
		$modelo->idMantenimientoEmpresa = $_GET['idMantenimientoEmpresa'];

		$this->render('verIndividual',array(
			'modelo'=>$modelo, 'varCliente'=>$_GET['cliente'],
		));
	}
	public function actionView($id)
	{
//		$modelo = MantenimientosEmpresasVisitasRutina::model();
//		$model->idMantenimientoEmpresa = $_GET['idMantenimientoEmpresa'];
		
		
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
		$model=new MantenimientosEmpresasVisitasRutina;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MantenimientosEmpresasVisitasRutina']))
		{
			$model->attributes=$_POST['MantenimientosEmpresasVisitasRutina'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idMantenimientoEmpresaVisitaRutina));
		}
		$model->idMantenimientoEmpresa = $_GET['idMantenimientoEmpresa'];
		$this->render('create',array(
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

		if(isset($_POST['MantenimientosEmpresasVisitasRutina']))
		{
			$model->attributes=$_POST['MantenimientosEmpresasVisitasRutina'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idMantenimientoEmpresaVisitaRutina));
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
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
				$this->actionVerIndividual();
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('MantenimientosEmpresasVisitasRutina');
		$modelo = MantenimientosEmpresasVisitasRutina::model();
		$model->idMantenimientoEmpresa = $_GET['idMantenimientoEmpresa'];
		$this->render('index',array(
			'modelo'=>$modelo,
			
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MantenimientosEmpresasVisitasRutina('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MantenimientosEmpresasVisitasRutina']))
			$model->attributes=$_GET['MantenimientosEmpresasVisitasRutina'];

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
		$model=MantenimientosEmpresasVisitasRutina::model()->with('mantenimientosEmpresas','clientes')->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='mantenimientos-empresas-visitas-rutina-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}