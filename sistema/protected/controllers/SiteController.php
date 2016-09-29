<?php

class SiteController extends UIDashboardController
{
	/**
	 * Declares class-based actions.
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
	public function allowedActions()
	{
		return 'login,logout,acerca,error';
	}
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','logout','acerca'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('login'),
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
        public function init()
    {
        parent::init();

        // Create new field in your users table for store dashboard preference
        // Set table name, user ID field name, user preference field name
        $this->setTableParams('usuarios', 'idUsuario', 'dash');

        // set array of portlets
        $this->setPortlets($this->getPaneles(Yii::app()->user->id));

        //set content BEFORE dashboard
        $this->setContentBefore('<h1>BIENVENDIO AL SISTEMA: </h1>'
                //Pay attension: ExtController looking view in current dir!!!
                //$this->renderPartial('/../views/dash/before', null, true)
                );

        //set content AFTER dashboard
        $model=  Clientes::model();
        $this->setContentAfter('');
        
        

        // uncomment the following to apply jQuery UI theme
        // from protected/components/assets/themes folder
        $this->applyTheme('smoothness');

        // uncomment the following to change columns count
        //$this->setColumns(4);

        // uncomment the following to enable autosave
        $this->setAutosave(true);

        // uncomment the following to disable dashboard header
        //$this->setShowHeaders(false);

        // uncomment the following to enable context menu and add needed items
        /*
        $this->menu = array(
            array('label' => 'Index', 'url' => array('index')),
        );
        */
    }
    public function getPaneles($idUsuario)
        {
            $paneles=UsuariosPaneles::model()->getPaneles($idUsuario);
            $sal=array();
            foreach ($paneles as $value) 
                $sal[]=array('id' => $value->idPanelUsuario, 'title' => $value->nombrePanel, 'content' => $this->renderPartial($value->ayuda, array('descripcion'=>$value->descripcionPanel), true));
            return $sal;
        }
	public function actionIndex()
	{
		parent::init();

	}
	public function actionAcerca()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->cambiarBase('gfoxxxV3');
		$this->render('acerca');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	private function cambiarBase($nombreBase)
	{
		$dbname = $nombreBase;

        $db = Yii::createComponent(array(
           'class' => 'CDbConnection',
            // other config properties...
             'connectionString'=>"mysql:host=localhost;dbname=base_Foxis",
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'vertrigo',
			'charset' => 'utf8',
                
        ));

        Yii::app()->setComponent('db', $db);
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		//$this->cambiarBase('GFOXBASE');
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				//$this->cambiarBase('base_'.$_POST['LoginForm']['idEmpresa']);
		
				$this->redirect(Yii::app()->user->returnUrl);
			}
				
		}
		
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		//echo 'idSesion: '.Yii::app()->user->idSesion;
		//$this->actualizarSalidaSesion(Yii::app()->user->idSesion);
		//$this->cambiarBase('GFOXBASE');
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	private function actualizarSalidaSesion($idSesion)
	{
		$sesion=Sesiones::model()->findByPk($idSesion);
		$sesion->fechaEgresa=time();
		$sesion->save();
	}
}