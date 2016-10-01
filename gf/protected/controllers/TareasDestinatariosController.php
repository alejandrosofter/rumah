<?php

class TareasDestinatariosController extends RController
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
				'actions'=>array('index','view','tareas'),
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
		$model=new TareasDestinatarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TareasDestinatarios']))
		{
			$model->attributes=$_POST['TareasDestinatarios'];
			$model->idTarea=$_GET['idTarea'];
			if($model->save()){
                            if(Settings::model()->getValorSistema('TAREAS_ALERTAS_USUARIOS_MAIL')==1){
                                $usuario=Usuarios::model()->findByPk($model->idUsuario);
                                
                                $usuarioEmisor=Usuarios::model()->findByPk(Yii::app()->user->id);
                               $tarea=Tareas::model()->findByPk($model->idTarea);
                               $cliente=Clientes::model()->findByPk($tarea->idClienteTarea);
                                $titulo="Nueva tarea Asignada por ".$usuarioEmisor->nombre;
                                $parametros['emisor']=$usuarioEmisor->nombre;
                                $parametros['receptor']=$usuario->nombre;
                                $parametros['tarea']=$tarea->descripcionTarea;
                                $parametros['cliente']=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
                                $parametros['estado']=$tarea->estadoTarea;
                                $parametros['fechaTarea']=$tarea->fechaTarea;
                                $parametros['prioridadTarea']=$tarea->prioridadTarea;
                                $parametros['tipoTarea']=$tarea->tipoTarea;
                                $parametros['linkSolucion']=CHtml::link('Finalizar Tarea','http://'. Settings::model()->getValorSistema('GENERALES_RUTASISTEMA').'/index.php?r=tareas/verMisTareas');
                                Mensajes::model()->enviarMail ($usuario->email, Settings::model()->getValorSistema('MAIL_TAREAS_USUARIO',$parametros,'impresiones'), $titulo, Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
                            }
                                
                            $this->redirect(array('create','idCliente'=>$_GET['idCliente'],'cliente'=>$_GET['cliente'],'idTarea'=>$_GET['idTarea']));
                        }
				
		}
                $model->idUsuarioEmisor=Yii::app()->user->id;
		$model->idTarea=$_GET['idTarea'];

		$this->render('create',array(
			'model'=>$model,'idCliente'=>$_GET['idCliente'],'cliente'=>$_GET['cliente'],'idTarea'=>$_GET['idTarea']
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function agregarPersonal()
	{
		$model=TareasDestinatarios::model();
		
		$this->render('create',array('model'=>$model,
			'idCliente'=>$_GET['idCliente'],'cliente'=>$_GET['cliente'],'idTarea'=>$_GET['idTarea']));
	}
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TareasDestinatarios']))
		{
			$model->attributes=$_POST['TareasDestinatarios'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idTareaDestinantario));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionTareas()
	{
		$model=new TareasDestinatarios;
		$usuarios=$model->consultarUsuariosTarea($_GET['id']);
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TareasDestinatarios']))
			$model->attributes=$_GET['TareasDestinatarios'];

		$this->render('index',array(
			'usuarios'=>$usuarios,'cliente'=>$_GET['cliente'],'idCliente'=>$_GET['idCliente'],'id'=>$_GET['id']
		));
	}
	public function actionVerTodas()
	{
		$model=TareasDestinatarios::model();
		$this->render('verTodas',array(
			'model'=>$model,'cliente'=>$_GET['cliente'],'idCliente'=>$_GET['idCliente'],'id'=>$_GET['id']
		));
	}
	public function actionVerMisTareas()
	{
		$model=TareasDestinatarios::model();
		$this->render('verMisTareas',array(
			'model'=>$model,'cliente'=>$_GET['cliente'],'idCliente'=>$_GET['idCliente'],'id'=>$_GET['id']
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
		$dataProvider=new CActiveDataProvider('TareasDestinatarios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TareasDestinatarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TareasDestinatarios']))
			$model->attributes=$_GET['TareasDestinatarios'];

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
		$model=TareasDestinatarios::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tareas-destinatarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
