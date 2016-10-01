<?php

class UsuariosController extends RController
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
				'actions'=>array('home','index','view','chat'),
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
	public function actionConsultarGeneral()
	{
		switch ($_POST['tipo']){
			case 'clientes':{
				$model=new Clientes;
				$this->render('historialClientes',array(
			'model'=>$model,'idCliente'=>$_POST['idElemento']
		));
				break;
			}
			case 'proveedores':{
				$model=new Proveedores;
				$this->render('historialProveedores',array(
			'model'=>$model,'idProveedor'=>$_POST['idElemento']
		));
				break;
			}
			case 'acciones':{
				$model=new Proveedores;
				$this->redirect(
			$_POST['idElemento']
		);
				break;
			}
		}
	}
	public function actionEtiquetasGeneral()
	{
		
		$nombre = $_GET['term'];
		
		$data=Usuarios::model()->consultarEtiquetasGeneral($nombre);
		foreach ($data as $m)
    	{
       	 	$results[] = array('value'=>$m['nombre'],'tipo' => $m['tipo'], 'idElemento' => $m['idElemento']);
    	}
    	echo CJSON::encode($results);
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
	public function actionHome()
	{
		$this->render('home',array(
		
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
                        $keywordArray = (!isset($_POST['panelDeControl']) ? array() : $_POST['panelDeControl']);   
                         $this->setKeywords($model,'panelDeControl',$keywordArray);
			if($model->save())
				$this->redirect(array('view','id'=>$model->idUsuario));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionAnotador($id)
	{
		$model=Usuarios::model()->findByPk($id);
		//$model=new Clientes;
		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			if($model->save())
				$this->redirect(array('/'));
		}
		
		$this->render('anotador',array(
			//'cliente'=>$cliente,
			'model'=>$model,
		));
	}
	public function actionEditarPanel($id)
	{
		$model=Usuarios::model()->findByPk($id);
		//$model=new Clientes;
		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			if($model->save())
				$this->redirect(array('/site/index'));
		}
		
		$this->render('editarPanel',array(
			//'cliente'=>$cliente,
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

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
                         $keywordArray = (!isset($_POST['panelDeControl']) ? array() : $_POST['panelDeControl']);   
                         $this->setKeywords($model,'panelDeControl',$keywordArray);
			($model->save());
				$this->redirect(array('view','id'=>$model->idUsuario));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        public function setKeywords($model,$field,$keys)
        {
            $model->$field = (empty($keys) ? null : implode(',',$keys));
        }
        public function getKeywords($delimited)
        {
            $keys = explode(',',$delimited);
            return $keys;
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
		$model=new Usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];
	
		$this->render('index',array(
			'model'=>$model,
		));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	private function cambiarBase($nombreBase)
	{
		$dbname = $nombreBase;

        $db = Yii::createComponent(array(
           'class' => 'CDbConnection',
            // other config properties...
             'connectionString'=>"mysql:host=localhost;dbname=$dbname",
                'username'=>'foxis',
                'password'=> '1234',
                'charset'=>'utf8',
                'emulatePrepare' => true,
                'enableParamLogging'=>true,
                'enableProfiling' => true,
        ));

        Yii::app()->setComponent('db', $db);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Usuarios::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
