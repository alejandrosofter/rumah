<?php

class CronsController extends RController
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionCreateUsuario()
	{
		$model=new Crons;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Crons']))
		{
			$model->attributes=$_POST['Crons'];
                        $tarea=$_POST['tarea'];
                        $usuario=$_POST['usuarioTarea'];
                        $sup=$_POST['supervisor'];
                        $rutaCrons=Settings::model()->getValorSistema('GENERALES_PATH_CRONS');
                        $sc="php $rutaCrons/console.php nuevaTareaUsuario agregarTareaUsuario --idTarea=$tarea --idUsuario=$usuario --idUsuarioEmisor=$sup";
                        $model->script=$sc;
			if($model->save()){
                            $this->crearArchivoCrons();
                            $this->redirect(array('index'));
                        }
				
		}
                $model->minutos='*';
                 $model->horas='*';
                  $model->dias='*';

		$this->render('createUsuario',array(
			'model'=>$model,
		));
	}
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
        public function crearArchivoCrons()
        {
            $tmp=dirname(__FILE__).'/archivoCrons';
            $crons=Crons::model()->findAll();
            
            $sal='';
            foreach ($crons as $cron){
                $sal.=$cron->minutos.' '.$cron->horas.' '.$cron->dias.' '.$cron->meses.' '.$cron->diasSemana.' '.$cron->script.chr(10);
            }
       
            if(file_exists($tmp))
            unlink($tmp);
            $handle = fopen($tmp, "x+");
            if(fwrite($handle, $sal))
                      echo 'salvo';else echo 'no salvo';
            
            $comando='crontab '.$tmp;
            system($comando);
            
            if(file_exists($tmp))
            unlink($tmp);
            
        }
        public function actionEjecutar()
        {
            $tempCron=Crons::model()->findByPk($_GET['idCron']);
            $ruta=$tempCron->script;
           
            system($tempCron->script);
            $this->redirect(array('/crons'));
        }
	public function actionCreate()
	{
		$model=new Crons;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Crons']))
		{
			$model->attributes=$_POST['Crons'];
                        
			if($model->save()){
                            $this->crearArchivoCrons();
                            $this->redirect(array('index'));
                        }
				
		}
                $model->minutos='*';
                 $model->horas='*';
                  $model->dias='*';

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

		if(isset($_POST['Crons']))
		{
			$model->attributes=$_POST['Crons'];
			if($model->save()){
                            $this->crearArchivoCrons();
                            $this->redirect(array('index'));
                        }
				
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
                        $this->crearArchivoCrons();

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
		$model=new Crons('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Crons']))
			$model->attributes=$_GET['Crons'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Crons('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Crons']))
			$model->attributes=$_GET['Crons'];

		$this->render('index',array(
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
		$model=Crons::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='crons-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
