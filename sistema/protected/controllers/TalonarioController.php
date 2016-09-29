<?php

class TalonarioController extends RController
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
				'actions'=>array('index','view','delete','consultarNumeroFactura'),
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
	public function actionCreate($idPuntoVenta)
	{
		$model=new Talonario;
		$model->unsetAttributes();  // clear any default values
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->idPuntoVenta=$_GET['idPuntoVenta'];
		$model->idPuntoVenta = $idPuntoVenta;
                 $model->certificado=CUploadedFile::getInstance($model,'certificado');
		if(isset($_POST['Talonario']))
		{
                    $model = new Talonario;
                    $model->save(false);
                    $archivo='certificado'.$model->primaryKey;
                    $ruta=dirname(__FILE__).'/facturacionElectronica/'.$archivo;
                            if(file_exists($ruta))unlink ($ruta);
                             if($model->certificado!=null)$model->certificado->saveAs($ruta);
			$model->attributes=$_POST['Talonario'];
			$model->idPuntoVenta=$_GET['idPuntoVenta'];
			$model->idPuntoVenta = $idPuntoVenta;
                        $model->certificado=CUploadedFile::getInstance($model,'certificado');
			if($model->save())
			{
                             if(isset($model->certificado))$model->certificado->saveAs('../facturacionElectronica/certificado');
		$dataProvider=new CActiveDataProvider('Talonario');
		$this->redirect(array('index','idPuntoVenta'=>$idPuntoVenta));
			}
//				$this->redirect(array('view','id'=>$model->idTalonario));
		}
//'dataProvider'=>$model,'model'=>$model,
		$this->render('create',array(
			'model'=>$model,'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
        public function actionCheck($idTalonario)
        {
            include dirname(__FILE__).'/facturacionElectronica/FacturaElectronica.php';
            $pk=$archivo=dirname(__FILE__).'/facturacionElectronica/privada'.$idTalonario.'.key';
            $csr=$archivo=dirname(__FILE__).'/facturacionElectronica/certificado'.$idTalonario.'.crt';
           
            
            $p=new FacturaElectronica($pk,$csr,23250112394,12,1);
            $p->tipoComprobantes();
        }
        public function actiondownPK($idTalonario)
        {
            
            $archivo=dirname(__FILE__).'/facturacionElectronica/privada'.$idTalonario.'.key';
             $archivoDest=dirname(__FILE__).'/../../links/privada'.$idTalonario.'.key';
             $puerto=$_SERVER['SERVER_PORT']=="80"?"":":".$_SERVER['SERVER_PORT'];
            $nombreServidor=$_SERVER['SERVER_NAME'].$puerto;
             $direccionDest='http://'.$nombreServidor.'/links/privada'.$idTalonario.'.key';
             echo $direccionDest;
            if(!file_exists($archivo)){
                $com='openssl genrsa -out '.$archivo.' 1024 ';
                
                exec($com);
                
            }
            $com2="ln $archivo $archivoDest";
            exec($com2);
            
            $this->redirect($direccionDest);
        }
        public function actiondownCSR($idTalonario)
        {
            $archivo=dirname(__FILE__).'/facturacionElectronica/pedido'.$idTalonario.'.csr';
            $privada=dirname(__FILE__).'/facturacionElectronica/privada'.$idTalonario.'.key';
            $puerto=$_SERVER['SERVER_PORT']=="80"?"":":".$_SERVER['SERVER_PORT'];
            $nombreServidor=$_SERVER['SERVER_NAME'].$puerto;
             $archivoDest=dirname(__FILE__).'/../../links/pedido'.$idTalonario.'.csr';
             $direccionDest='http://'.$nombreServidor.'/links/pedido'.$idTalonario.'.csr';
            $cn=Settings::model()->getValorSistema('DATOS_EMPRESA_RAZONSOCIAL');
            $o='PUNTOVENTA_'.$idTalonario;
            
            $cuit=Settings::model()->getValorSistema('DATOS_EMPRESA_CUIT');
            $com='openssl req -new -key '.$privada.' -subj "/C=AR/O='.$o.'/CN='.$cn.'/serialNumber=CUIT '.$cuit.'" -out '.$archivo;
            $com2="ln $archivo $archivoDest";
            echo $com;
            exec($com);
            exec($com2);
            //$this->redirect($direccionDest);
        }
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Talonario']))
		{
                    
			$model->attributes=$_POST['Talonario'];
                        $model->certificado=CUploadedFile::getInstance($model,'certificado');
                        $model->csr=CUploadedFile::getInstance($model,'csr');
                        $model->key=CUploadedFile::getInstance($model,'key');
			if($model->save()){
                            $archivo='certificado'.$model->idTalonario.'.crt';
                            $csr='pedido'.$model->idTalonario.'.csr';
                            $key='privada'.$model->idTalonario.'.key';
                            $ruta=dirname(__FILE__).'/facturacionElectronica/'.$archivo;
                            $ruta2=dirname(__FILE__).'/facturacionElectronica/'.$csr;
                            $ruta3=dirname(__FILE__).'/facturacionElectronica/'.$key;
                            if(file_exists($ruta) && $model->certificado!="")unlink ($ruta);
                             if($model->certificado!=null)$model->certificado->saveAs($ruta);
                             
                             if(file_exists($ruta2) && $model->csr!="")unlink ($ruta2);
                                if($model->csr!=null)$model->csr->saveAs($ruta2);
                             
                             if(file_exists($ruta3)&& $model->key!="")unlink ($ruta3);
                             if($model->key!=null)$model->key->saveAs($ruta3);
                             $this->redirect(array('index','idPuntoVenta'=>$model->idPuntoVenta));
                        }
				
		}
//                include dirname(__FILE__).'/../controllers/facturacionElectronica/FacturaElectronica.php';
//                $pk=$archivo=dirname(__FILE__).'/../controllers/facturacionElectronica/privada'.$id.'.key';
//                $csr=$archivo=dirname(__FILE__).'/../controllers/facturacionElectronica/certificado'.$id;
//            
//                $tipo=FacturasSalientes::model()->getTipoComprobante($id);
//                $cuit=Settings::model()->getValorSistema('DATOS_EMPRESA_CUIT')+0;
//                $p=new FacturaElectronica($pk,$csr,$cuit,$model->idPuntoVenta,$tipo);
//                $nro=$p->nroUltimo($model->idPuntoVenta,$tipo,$cuit);
		$this->render('update',array('proximo'=>'$nro sin efecto',
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
	 */					//consultarNumeroFactura
	public function actionConsultarNumeroFactura()
	{
//		echo $id;
		$tipoTalonario=$_POST['tipoTalonario'];
		$data = Talonario::model()->findByPk($tipoTalonario);
		$data = CHtml::listData($data,'idTalonario','proximo');
		foreach($data as $value=>$name) {
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}
	}
	public function actionIndex($idPuntoVenta)
	{


		$model=new Talonario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Talonario']))
			$model->attributes=$_GET['Talonario'];
		$model->idPuntoVenta=$_GET['idPuntoVenta'];
                
                

			
		$dataProvider=new CActiveDataProvider('Talonario');
		$this->render('index',array(
			'dataProvider'=>$model,'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Talonario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Talonario']))
			$model->attributes=$_GET['Talonario'];

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
		$model=Talonario::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='talonario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
