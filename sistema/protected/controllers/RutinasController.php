<?php

class RutinasController extends RController
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
			
		);
	}

	public function actionVerIndividual()
	{

		
		$dataProvider=new CActiveDataProvider('Rutinas');
		$modelo = Rutinas::model();
	//	$modelo->idMantenimientoEmpresa = $_GET['idMantenimientoEmpresa'];

		$this->render('verIndividual',array(
			'modelo'=>$modelo, 'varCliente'=>$_GET['cliente'], 'idMantenimientoEmpresa'=>$_GET['idMantenimientoEmpresa'],
		));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),'idMantenimientoEmpresa'=>$_GET['idMantenimientoEmpresa'],
		));
	}
	
public function actionView2()  //DOBLEEEEEEEEE
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),'idMantenimientoEmpresa'=>$_GET['idMantenimientoEmpresa'],
		));
	}

	
	//http://servidores/frameworkYil/GfoxV3/index.php?r=rutinas/view&idRutina=3
	//http://servidores/frameworkYil/GfoxV3/index.php?r=rutinas/view&id=3
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Rutinas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rutinas']))
		{
			$model->attributes=$_POST['Rutinas'];
			if($model->save())
			{
				if(isset($_GET['idMantenimientoEmpresa']))
				{
					$modeloManteRutina=new MantenimientosRutina;
					$modeloManteRutina->idMantenimientoEmpresa=$_GET['idMantenimientoEmpresa'];
					$modeloManteRutina->idRutina=$model->idRutina;
					$modeloManteRutina->save();
					//en realidad va al view! pero es lo q hay
					$this->redirect(array('verIndividual','idMantenimientoEmpresa'=>$_GET['idMantenimientoEmpresa']
					));
				}
				//idMantenimientoEmpresa
				
			}
			
			
				
		}

		$this->render('create',array(
			'model'=>$model,'idMantenimientoEmpresa'=>$_GET['idMantenimientoEmpresa'],
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

		if(isset($_POST['Rutinas']))
		{
			$model->attributes=$_POST['Rutinas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idRutina,'idMantenimientoEmpresa'=>$_GET['idMantenimientoEmpresa']));
		}

		$this->render('update',array(
			'model'=>$model,'idMantenimientoEmpresa'=>$_GET['idMantenimientoEmpresa'],
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
		$dataProvider=new CActiveDataProvider('Rutinas');
		$modelo = Rutinas::model();
		$model->idMantenimientoEmpresa = $_GET['idMantenimientoEmpresa'];
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rutinas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rutinas']))
			$model->attributes=$_GET['Rutinas'];

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
		$model=Rutinas::model()->with('manteminientosRutina','mantenimientosEmpresas')->findByPk((int)$id);
		//$model=Rutinas::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='rutinas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
