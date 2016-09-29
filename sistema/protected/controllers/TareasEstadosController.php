<?php

class TareasEstadosController extends RController
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
				'actions'=>array('index','view','estadosTarea'),
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
			'model'=>$this->loadModel($id),'id'=>$_GET['id']
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TareasEstados;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TareasEstados']))
		{
			$model->attributes=$_POST['TareasEstados'];
                        Mensajes::model()->checkEnvioMensajes($_POST,Clientes::model()->findByPk($_GET['idCliente']),'Nuevo estado de Tarea ('.$model->nombreEstado.')',$model->detalleEstadoTarea);
			if($model->save())
                                if($model->nombreEstado=='Finalizada'){
                                if(Settings::model()->getValorSistema('TAREAS_ALERTAS_USUARIOS_MAIL')==1)
                                    if(Settings::model()->getValorSistema('TAREAS_ENVIAR_MAIL_FINALIZADA')==1){
                                    $usuarios=TareasDestinatarios::model()->consultarUsuariosTarea2($model->idTarea);
                                    foreach ($usuarios as $usuario){
                                        $usuarioEmisor=Usuarios::model()->findByPk(Yii::app()->user->id);
                                        $tarea=Tareas::model()->findByPk($model->idTarea);
                                        $titulo="Tarea Finalizada!".$usuarioEmisor->nombre;
                                        $parametros['emisor']=$usuarioEmisor->nombre;
                                        //$parametros['receptor']=$usuario['nombre'];
                                        $parametros['tarea']=$tarea->descripcionTarea;
                                        $parametros['estado']=$tarea->estadoTarea;
                                        $parametros['fechaTarea']=$tarea->fechaTarea;
                                        $parametros['prioridadTarea']=$tarea->prioridadTarea;
                                        $parametros['tipoTarea']=$tarea->tipoTarea;
                                       // Mensajes::model()->enviarMail ($usuario['email'], Settings::model()->getValorSistema('MAIL_TAREAS_USUARIO_FINALIZA',$parametros,'impresiones'), $titulo, Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
                                    }
                                    $usuarioEmisor=Usuarios::model()->findByPk(Yii::app()->user->id);
                                        $tarea=Tareas::model()->findByPk($model->idTarea);
                                        $titulo="Tarea Finalizada!".$usuarioEmisor->nombre;
                                        $parametros['emisor']=$usuarioEmisor->nombre;
                                        //$parametros['receptor']=$usuario['nombre'];
                                        $parametros['tarea']=$tarea->descripcionTarea;
                                        $parametros['estado']=$tarea->estadoTarea;
                                        $parametros['fechaTarea']=$tarea->fechaTarea;
                                        $parametros['prioridadTarea']=$tarea->prioridadTarea;
                                        $parametros['tipoTarea']=$tarea->tipoTarea;
                                        Mensajes::model()->enviarMail ($usuarioEmisor->email, Settings::model()->getValorSistema('MAIL_TAREAS_USUARIO_FINALIZA',$parametros,'impresiones'), $titulo, Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
                                    
                                    
                            }
                                
				echo '<script type="text/javascript">';
				echo 'history.go(-2)';
				echo '</script>';
			}
				//$this->redirect(array('/tareas'));
		}
		$model->idTarea=$_GET['id'];

		$this->render('create',array(
			'model'=>$model,'cliente'=>(isset($_GET['cliente'])?$_GET['cliente']:0),'idCliente'=>(isset($_GET['idCliente']))?$_GET['idCliente']:0,'id'=>$_GET['id']
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

		if(isset($_POST['TareasEstados']))
		{
			$model->attributes=$_POST['TareasEstados'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idTareaEstado));
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
		$dataProvider=new CActiveDataProvider('TareasEstados');
		$this->render('estadosTarea',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionEstadosTarea()
	{
		$idTarea=$_GET['id'];
		$model=new TareasEstados;
		$this->render('estadosTarea',array(
			'estados'=>$model->consultarEstadosTarea($idTarea),'model'=>$model,'id'=>$_GET['id'],'cliente'=>$_GET['cliente'],'idCliente'=>$_GET['idCliente']
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TareasEstados('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TareasEstados']))
			$model->attributes=$_GET['TareasEstados'];

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
		$model=TareasEstados::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tareas-estados-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
