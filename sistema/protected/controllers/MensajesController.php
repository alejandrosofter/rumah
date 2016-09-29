<?php

class MensajesController extends RController
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
			'accessControl', // perform access control for CRUD operations
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
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateMensajeSms()
	{
		$model=new Mensajes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mensajes']))
		{
			$model->attributes=$_POST['Mensajes'];
			Mensajes::model()->enviarMensaje ($model->tituloMensaje, $model->cuerpoMensaje, $model->destinatario);
                        $this->redirect(array('index'));       
                        
		}
                   $usuario=Usuarios::model()->findByPk(Yii::app()->user->id);
                   $model->remitente='-';
                   $model->tipoMensaje='telefono';
                   $model->tituloMensaje='-';
		$this->render('create',array(
			'model'=>$model,
		));
	}
        public function actionCreateMensaje()
	{
		$model=new Mensajes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mensajes']))
		{
			$model->attributes=$_POST['Mensajes'];
                        $usuario=Usuarios::model()->findByPk(Yii::app()->user->id);
                        $parametros['cuerpo']=$model->cuerpoMensaje;
                                $parametros['usuario']=$usuario->nombre;
                                $parametros['movil']=$usuario->mobil;
                                $parametros['empresa']=Settings::model()->getValorSistema('DATOS_EMPRESA_FANTASIA');
                                $parametros['direccion']=Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECCION');
                                $parametros['telefono']=Settings::model()->getValorSistema('DATOS_EMPRESA_TELEFONO');
                                $parametros['horariosAtencion']= Settings::model()->getValorSistema('DATOS_EMPRESA_HORARIOS');
                                $parametros['emailAdmin']= Settings::model()->getValorSistema('DATOS_EMPRESA_EMAILADMIN');
                                $parametros['site']= Settings::model()->getValorSistema('DATOS_EMPRESA_SITE');
                                Mensajes::model()->enviarMail ( $model->destinatario, Settings::model()->getValorSistema('MAIL_EDIATABLE_USUARIO_SOLO',$parametros,'impresiones'), $model->tituloMensaje, $model->remitente);
				
			$this->redirect(array('index'));       
                        
		}
                   $usuario=Usuarios::model()->findByPk(Yii::app()->user->id);
                   $model->remitente=$model->remitente==''?$usuario->email:$model->remitente;
                   $model->tipoMensaje='email';
                   
		$this->render('create',array(
			'model'=>$model,
		));
	}
        public function actionCreate()
	{
		$model=new Mensajes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mensajes']))
		{
			$model->attributes=$_POST['Mensajes'];
			
                            if($model->tipoMensaje=='telefono')
                                Mensajes::model()->enviarMensaje ($model->tituloMensaje, $model->cuerpoMensaje, $model->destinatario);
                            else {
                                $usuario=Usuarios::model()->findByPk(Yii::app()->user->id);
                                $model->remitente=$model->remitente==''?$usuario->email:$model->remitente;
                                $parametros['cuerpo']=$model->cuerpoMensaje;
                                $parametros['usuario']=$usuario->nombre;
                                $parametros['movil']=$usuario->mobil;
                                $parametros['empresa']=Settings::model()->getValorSistema('DATOS_EMPRESA_FANTASIA');
                                $parametros['direccion']=Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECCION');
                                $parametros['telefono']=Settings::model()->getValorSistema('DATOS_EMPRESA_TELEFONO');
                                $parametros['horariosAtencion']= Settings::model()->getValorSistema('DATOS_EMPRESA_HORARIOS');
                                $parametros['emailAdmin']= Settings::model()->getValorSistema('DATOS_EMPRESA_EMAILADMIN');
                                $parametros['site']= Settings::model()->getValorSistema('DATOS_EMPRESA_SITE');
                                Mensajes::model()->enviarMail ( $model->destinatario, Settings::model()->getValorSistema('MAIL_EDIATABLE_USUARIO_SOLO',$parametros,'impresiones'), $model->tituloMensaje, $model->remitente);
				
                            }
                         $this->redirect(array('index'));       
                        
		}

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

		if(isset($_POST['Mensajes']))
		{
			$model->attributes=$_POST['Mensajes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idMensaje));
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
		$model=new Mensajes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mensajes']))
			$model->attributes=$_GET['Mensajes'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Mensajes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mensajes']))
			$model->attributes=$_GET['Mensajes'];

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
		$model=Mensajes::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='mensajes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
