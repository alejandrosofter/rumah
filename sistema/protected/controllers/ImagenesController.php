<?php

class ImagenesController extends RController
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
		$model=new Imagenes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $model->fecha=Date('Y-m-d h:i:s');
                $model->tipo=$_GET['tipo'];
                $model->idTipo=$_GET['idTipo'];
		if(isset($_POST['Imagenes']))
		{
//			$model->attributes=$_POST['Imagenes'];
////                        $model->archivo=CUploadedFile::getInstance($model,'archivo');
//			if($model->save()){
////                            $archivo='ar';
////                            $ruta=dirname(__FILE__).'/../../images/'.$_GET['tipo'].'/'.$archivo;
////                            echo $ruta;
//////                            if(file_exists($ruta))unlink ($ruta);
////                             $model->archivo->saveAs($ruta);
//                             $this->redirect(array('index','idTipo'=>$_GET['idTipo'].'2','tipo'=>$_GET['tipo']));
//                        }else $this->redirect(array('index','idTipo'=>$_GET['idTipo'].'3','tipo'=>$_GET['tipo']));
			echo 'fsdfsdfsd';	
		}else echo 'd';
                echo 'ddddddddddd<br><br><br><br><br><br><br><br>ddddddddddddddddddddddddd';
                
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

		if(isset($_POST['Imagenes']))
		{
			$model->attributes=$_POST['Imagenes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idImagen));
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
			
                        $model=Imagenes::model()->findByPk($id);
                        $archivo=$model->nombreImagen.'.'.$model->ext;
                        $ruta=dirname(__FILE__).'/../../images/'.$model->tipo.'/';
                        if(file_exists($ruta.$archivo))unlink ($ruta.$archivo);
                        
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
        private function getRuta($ruta)
        {
            $res=explode('/', $ruta);
            $sal="";
            for ($index = 0; $index < (count($sal)-1); $index++) {
                if($res[$index]!="index.php")
                    $res.=$res[$index].'/';
            }
            return $sal;
        }
        public function actionDescargar($idArchivo)
        {
            $model=Imagenes::model()->findByPk($idArchivo);
             $archivo=$model->nombreImagen;
              $puerto=$_SERVER['SERVER_PORT']=="80"?"":":".$_SERVER['SERVER_PORT'];
                $nombreServidor=$_SERVER['SERVER_NAME'].$puerto;
                $rutaProyecto=str_replace('/index.php', '', Yii::app()->createUrl(""));
             $ruta='http://'.$nombreServidor.$rutaProyecto.'/images/'.$model->tipo.'/'.$model->nombreImagen;
            
            Yii::app()->request->xSendFile($ruta,array(
   'saveName'=>$archivo,
 
   'terminate'=>true,
));
        }
	public function actionIndex($tipo,$idTipo)
	{
		$model=new Imagenes('search');
                $model->tipo=$tipo;
                $model->idTipo=$idTipo;
		
		if(isset($_POST['Imagenes']))
		{
			$model->attributes=$_POST['Imagenes'];
                        $model->archivo=CUploadedFile::getInstance($model,'archivo');
                        $model->nombreImagen=$model->archivo->name;
                        $model->ext=$model->archivo->extensionName;
                        $model->fecha=Date('Y-m-d h:i:s');
			if($model->save()){
                            $archivo=$model->nombreImagen;
                            $ruta=dirname(__FILE__)."/../../images/$tipo/$idTipo/";
                       
                            if(!file_exists($ruta))mkdir ($ruta);
                            if(file_exists($ruta.$archivo))unlink ($ruta.$archivo);
                            $model->archivo->saveAs($ruta.$archivo);
                            $this->redirect(array('index','idTipo'=>$_GET['idTipo'],'tipo'=>$_GET['tipo']));
			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Imagenes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Imagenes']))
			$model->attributes=$_GET['Imagenes'];

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
		$model=Imagenes::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='imagenes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
