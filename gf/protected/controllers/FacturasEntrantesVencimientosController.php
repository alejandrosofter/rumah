<?php

class FacturasEntrantesVencimientosController extends RController
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
				'actions'=>array('ConsultarPendientes','ConsultarPorVencer','ConsultarVencidas','EtiquetasPendientes2','EtiquetasPendientes','index','view','delete'),
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
		$model=new FacturasEntrantesVencimientos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FacturasEntrantesVencimientos']))
		{
			$model->attributes=$_POST['FacturasEntrantesVencimientos'];
			if($model->save())
				$this->redirect(array('index','idFacturaEntrante'=>$model->idFacturaEntrante));
		}
		$model->idFacturaEntrante=$_GET['idFactura'];
		$this->render('create',array(
			'model'=>$model
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

		if(isset($_POST['FacturasEntrantesVencimientos']))
		{
			$model->attributes=$_POST['FacturasEntrantesVencimientos'];
			if($model->save())
				$this->redirect(array('index','idFacturaEntrante'=>$model->idFacturaEntrante));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionConsultarVencidas()
	{
		$model=new FacturasEntrantesVencimientos;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantes']))
			$model->attributes=$_GET['FacturasEntrantes'];
		$model->estado='PEND';
		$model->fechaVencimiento='<'.Date('Y-m-d');
		$this->render('consultarVencidas',array(
			'model'=>$model,'titulo'=>'Vencidos'
		));
	}
	public function actionConsultarPendientes()
	{
		$model=new FacturasEntrantesVencimientos;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantes']))
			$model->attributes=$_GET['FacturasEntrantes'];
		$model->estado='PEND';
//		$model->fechaVencimiento=Date('Y-m-d');
		$this->render('consultarVencidas',array(
			'model'=>$model,'titulo'=>'Pendientes'
		));
	}
	public function actionConsultarPorVencer()
	{
		$model=new FacturasEntrantesVencimientos;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantes']))
			$model->attributes=$_GET['FacturasEntrantes'];
		$model->estado='PEND';
		
		$fecha = new DateTime(Date('Y-m-d'));
		$intervalo = new DateInterval('P7D');
		$fecha->add($intervalo);
			
		$model->fechaVencimiento=$fecha->format('Y-m-d');
		
		$this->render('consultarVencidas',array(
			'model'=>$model,'titulo'=>'Por Vencer'
		));
	}
	public function actionEtiquetasPendientes()
	{
		$nombre = $_GET['term'];
		$data=FacturasEntrantesVencimientos::model()->consultarEtiquetasPendientes($nombre, $_GET['idFacturaEntrante']);
		foreach ($data as $m)
    	{
    		$nombre=$m['estado'].' | '.Yii::app()->numberFormatter->formatCurrency($m['importe'],"$").' | '.Yii::app()->dateFormatter->format("dd-M-y",$m['fechaVencimiento']);
       	 	$results[] = array('idFacturaVencimiento'=>$m['idFacturaVencimiento'],'value' => $nombre,'importe' => $m['importe'],'pagado' =>$m['pagado'],'paraPagar' => $m['importe']-$m['pagado']);
    	}
    	echo CJSON::encode($results);
	}
	public function actionEtiquetasPendientes2()
	{
		$data=FacturasEntrantesVencimientos::model()->consultarEtiquetasPendientes('', 1116);
	
		//$data=CHtml::listData($data,'idFacturaEntranteVencimiento','idFacturaEntrante');

    for($i=0;$i<count($data);$i++)
    {
        echo CHtml::tag('option',
                   array('value'=>$data[$i]['idFacturaEntranteVencimiento']),CHtml::encode($data[$i]['idFacturaEntrante']),true);
    }
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
		$model=new FacturasEntrantesVencimientos('search');
		$dataProvider=new CActiveDataProvider('FacturasEntrantesVencimientos');
		$this->render('index',array(
			'dataProvider'=>$model,'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FacturasEntrantesVencimientos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FacturasEntrantesVencimientos']))
			$model->attributes=$_GET['FacturasEntrantesVencimientos'];

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
		$model=FacturasEntrantesVencimientos::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='facturas-entrantes-vencimientos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
