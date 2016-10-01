<?php

class PresupuestosController extends RController
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
				'actions'=>array('crearPresupuesto','index','view','aprobar','rechazar'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('@','delete'),
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
		$model=new Presupuestos;
                $model->formaPago=Settings::model()->getValorSistema('PRESUPUESTOS_FORMASPAGO');
                $model->descripcionPresupuesto=Settings::model()->getValorSistema('PRESUPUESTOS_ANEXOS');


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Presupuestos']))
		{
			$model->attributes=$_POST['Presupuestos'];
			if($model->save())
				$this->redirect(array('/presupuestoItems','idPresupuesto'=>$model->idPresupuesto));
		}
                $model->fechaPresupuesto=Date('Y-m-d');
                $model->estado="Para Aprobar";
                $condicionVenta=CondicionesVentaItems::model()->consultarCondiciones3($model->idCondicionVenta);
                
		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCrearPresupuesto()
	{
		$model=new Presupuestos;
                
		$manager=new PresupuestoItemsManager();
		
		if(isset($_POST['Presupuestos']))
        {
            $model->attributes=$_POST['Presupuestos'];
 $manager->manage(isset($_POST['PresupuestoItems'])?$_POST['PresupuestoItems']:null);
//            $manager->manage($_POST['PresupuestoItems']);
            if (($_POST['noValidate']=='guardar'))
            {
                $valid=$model->validate();
                $valid=$manager->validate($model) && $valid;
                if(!$valid)
                {
                    $model->save();
                    $manager->save($model);
                    $this->redirect(array('/presupuestos/index'));
                }
            }
        }

        $condicionVenta=CondicionesVentaItems::model()->consultarCondiciones3($model->idCondicionVenta);
        $model->formaPago=Settings::model()->getValorSistema('PRESUPUESTOS_FORMASPAGO');
                $model->descripcionPresupuesto=Settings::model()->getValorSistema('PRESUPUESTOS_ANEXOS');
		$this->render('crearPresupuesto',array(
			'model'=>$model,'manager'=>$manager,'condicionVenta'=>$condicionVenta
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

		if(isset($_POST['Presupuestos']))
		{
			$model->attributes=$_POST['Presupuestos'];
			if($model->save())
				$this->redirect(array('/presupuestoItems','idPresupuesto'=>$model->idPresupuesto));
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
		$model=new Presupuestos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Presupuestos']))
			$model->attributes=$_GET['Presupuestos'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
        
	public function actionAprobar($idPresupuesto)
	{
		$model=new Presupuestos();
		$model->aceptar($idPresupuesto);
		$this->redirect(array('index'));
	}
	public function actionRechazar($idPresupuesto)
	{
		$model=new Presupuestos();
		$model->rechazar($idPresupuesto);
		$this->redirect(array('index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Presupuestos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Presupuestos']))
			$model->attributes=$_GET['Presupuestos'];

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
		$model=Presupuestos::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='presupuestos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
