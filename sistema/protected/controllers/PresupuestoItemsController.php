<?php

class PresupuestoItemsController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
public $extra;
public $rutaFormulario;
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('@','delete'),
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
	public function actionCreate($idPresupuesto)
	{
		$model=new PresupuestoItems;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PresupuestoItems']))
		{
			$model->attributes=$_POST['PresupuestoItems'];
                       
			if($model->save())
				$this->redirect(array('index','idPresupuesto'=>$idPresupuesto));
		}
		$model->idPresupuesto=$idPresupuesto;
		$this->render('create',array(
			'model'=>$model,'idPresupuesto'=>$idPresupuesto
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

		if(isset($_POST['PresupuestoItems']))
		{
			$model->attributes=$_POST['PresupuestoItems'];
			if($model->save())
				$this->redirect(array('/presupuestoItems','idPresupuesto'=>$model->idPresupuesto));
		}
                

		$this->renderPartial('_form', array(
                                   'model'=>$this->loadModel($id),
                                   
                                 ),
                          false,true);
     Yii::app()->end();
                 
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
        private function getAdjuntos($id)
        {
            $res=Imagenes::model()->getArchivos($id,'presupuestos');
            $sal="";
            $i=0;
            if(count($res)==0)$sal="No hay archivos adjuntos";
            foreach ($res as $key => $value) {
                $i++;
                $nombre=$value['nombreImagen'];
                $idTipo=$value['idTipo'];
                $link=Settings::model()->getValorSistema('GENERALES_RUTASISTEMA')."/images/presupuestos/$idTipo/$nombre";
                $sal.=CHtml::link($i.'.- '.$nombre,$link);
            }
            return $sal;
        }
	private function enviarMensaje($id)
        {
            $pres=Presupuestos::model()->findByPk($id);
            $cl=  Clientes::model()->findByPk($pres->idClientePresupuesto);
            $parametros['cliente']=$cl->apellido.' '.$cl->nombre.' '.$cl->razonSocial;
//            $parametros['adjuntos']=$this->getAdjuntos($id);
            $parametros['titulo']='COTIZACION '.$pres->asuntoPresupuesto;
            $parametros['date']=Date('Y-m-d');
            
                    $texto=Presupuestos::model()->getTextoPresupuesto($id);
             Mensajes::model()->checkEnvioMensajes($_POST,$cl,Settings::model()->getValorSistema('MAIL_PRESUPUESTO',$parametros,'impresiones'),$parametros['titulo'],$this->getAttachs($id,$texto));
		
        }
        private function getAttachs($id,$texto)
        {
            $res=Imagenes::model()->getArchivos($id,'presupuestos');
            
            $sal[]=$this->getPresAttach($texto,$id);
            foreach ($res as $key => $value) {
                $nombre=$value['nombreImagen'];
                $idTipo=$value['idTipo'];
                $link=dirname(__FILE__)."/../../images/presupuestos/$idTipo/$nombre";
                $carpeta=dirname(__FILE__)."/../../images/presupuestos/$idTipo";
                if(!file_exists($carpeta)) mkdir($carpeta);
                $sal[]=$link;
            }
            return $sal;
        }
        private function getPresAttach($texto,$id)
        {
            $link=dirname(__FILE__)."/../../images/presupuestos/$id/pres.pdf";
            $carpeta=dirname(__FILE__)."/../../images/presupuestos/$id";
            if(!file_exists($carpeta)) mkdir($carpeta);
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($texto);
        $html2pdf->Output($link,EYiiPdf::OUTPUT_TO_FILE);
        
        return $link;
        }
        public function actionIndex($idPresupuesto)
	{
            $model=new Presupuestos;
            if(isset ($_POST['Presupuestos']))
                $model->attributes=$_POST['Presupuestos'];
            if(isset($_POST['finalizar'])){
              
                   
                $this->enviarMensaje($idPresupuesto);
               	$this->redirect(array('/presupuestos'));
            }
            if(isset($_POST['valorCodigoBarras'])){
                $st=Stock::model()->findByPk($_POST['valorCodigoBarras']);
                $pi=new PresupuestoItems;
                $pi->cantidadItems=$_POST['cantidad'];
                $pi->idPresupuesto=$idPresupuesto;
                $pi->idStock=$_POST['idStock'];
                $pi->nombreStock=$_POST['valorCodigoBarras'];
                $pi->porcentajeIva=$_POST['iva'];
                $pi->precioVenta=round($_POST['importe']/(($pi->porcentajeIva/100)+1),2);
                
                $pi->tipoImporte='lista';
                $pi->save();
                $this->redirect(array('','idPresupuesto'=>$idPresupuesto));
            }
            $archivos=Imagenes::model()->getCantidadArchivos($idPresupuesto,'presupuestos');
		$dataProvider=new CActiveDataProvider('PresupuestoItems');
		$this->render('index',array('model'=>$model,'archivos'=>$archivos,
			'model'=>PresupuestoItems::model(),'idPresupuesto'=>$idPresupuesto
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PresupuestoItems('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PresupuestoItems']))
			$model->attributes=$_GET['PresupuestoItems'];

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
		$model=PresupuestoItems::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='presupuesto-items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
