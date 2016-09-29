<?php

class TareasController extends RController
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
				'actions'=>array('imprimirPendientes','tareasPendientes','index','imprimirTareas','view','cliente','imprimirMisTareas',
				'imprimirTareasMiArea','pendientes','finalizarTarea','finalizar','verMisTareas',
				'verTodas','centroTareas','tareasMiArea','imprimirTareasEmpresa','getReporteEmpresa','reporteEmpresa'),
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
        public function actionCrearTareaCron()
        {
            if(isset($_POST['Tareas']) && isset($_POST['Crons']))
		{
                
                }
            
            $this->render('nuevaTareaCron',
		array('modeloCron'=>new Crons,'modeloTarea'=>new Tareas));
        }
	public function actionGetReporteEmpresa()
	{	
		$model=Tareas::model();
		$this->render('reporteEmpresa',
		array('model'=>$model,'idCliente'=>$_GET['idCliente'],'cliente'=>$_GET['cliente']));
	}
	public function actionReporteEmpresa()
	{
		
		$this->redirect(array('impresiones/create&idCliente='.$_POST['Tareas']['idEmpre'].
		'&fechaInicio='.$_POST['Tareas']['fechaInicio'].'&fechaFin='.$_POST['Tareas']['fechaFin'].
		'&tipoImpresion='.$_POST['Tareas']['tipoImpresion']));
	}

	public function actionImprimirTareas()
	{
		$model=Tareas::model();
	
		
		$datosA=$model->consultarTareas('A',$mes,$ano);
		
		
		Yii::import('application.vendors.PHPExcel',true);
        $objPHPExcel = new PHPExcel();
             
		$objPHPExcel=$this->setHojaLibro($objPHPExcel,$datosA,'FACTURAS A',0);
		$objPHPExcel->createSheet();
//		$objPHPExcel=$this->setHojaLibro($objPHPExcel,$datosB,'FACTURAS B',1);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="libroIva.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
      Yii::app()->end();
	}
	private function setHojaLibro($objPHPExcel,$datos,$nombreHoja,$nroHoja)
	{
		$objPHPExcel->setActiveSheetIndex($nroHoja);
		$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B1', 'Nro Fact.')
            ->setCellValue('C1', 'Fecha')
            ->setCellValue('D1', 'Razón Social')
            ->setCellValue('E1', 'Cuit')
            ->setCellValue('F1', 'NETO Iva 10.5')
            ->setCellValue('G1', 'NETO Iva 21')
            ->setCellValue('H1', 'I.V.A 10.5')
            ->setCellValue('I1', 'I.V.A 21')
            ->setCellValue('J1', 'Bruto');
            
    for($i=0;$i<count($datos->data);$i++){
    	$fila=$i+2;
 
    	
    	$objPHPExcel->setActiveSheetIndex($nroHoja)
            ->setCellValue('B'.$fila, $datos->data[$i]['numeroFactura'])
            ->setCellValue('C'.$fila, Yii::app()->dateFormatter->format("dd-M-y",$datos->data[$i]['fechaTarea']))
            ->setCellValue('D'.$fila, $datos->data[$i]['cliente'])
            ->setCellValue('E'.$fila, $datos->data[$i]['descripcionTarea']);
    }
    	$objPHPExcel->getActiveSheet()->setTitle($nombreHoja);
	return $objPHPExcel;
	}
	public function actionCliente()
	{
		$idCliente=$_GET['idCliente'];
		$model=new Tareas;
		$tareas=$model->consultarTareasCliente($idCliente);
		$this->render('clientes',array(
			'model'=>$model,'tareas'=>$tareas,'cliente'=>$_GET['cliente'],'idCliente'=>$_GET['idCliente']
		));
	}
	public function actionFinalizarTarea()
	{
		$this->render('finalizarTarea',array(
			'idTarea'=>$_GET['id'],'model'=>Tareas::model(),'vista'=>$this->loadModel($_GET['id']),
			'idCliente'=>$_GET['idCliente'],'cliente'=>$_GET['cliente'],
		));
	}
	public function actionFinalizar()
	{
		$model=Tareas::model();
		$model->finalizarTarea($_GET['id']);
		$this->redirect(array('/tareas'));
	}
	public function actionPendientes()
	{
		$idCliente=isset($_GET['idCliente'])?$_GET['idCliente']:'';
		$model=new Tareas;
		$tareas=$model->consultarTareasClientePendientes($idCliente);
		$this->render('pendientes',array(
			'model'=>$model,'tareas'=>$tareas,'idCliente'=>$idCliente
		));
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
		$model=new Tareas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tareas']))
		{
			$model->attributes=$_POST['Tareas'];
			if($model->save()){
                            if(Settings::model()->getValorSistema('TAREAS_ALERTAS_MANT_MAIL')==1)
                                if($model->visitaRutina==1){
                                $cliente=Clientes::model()->findByPk($model->idClienteTarea);
                                $visita=($model->visitaRutina==1)?'Visita':'Tarea o evento';
                                $titulo=$visita.' ('.$model->tipoTarea.')';
                                $emailCliente=$cliente->emailContactoMantenimiento;
                                $parametros['oficial']=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
                                $parametros['cliente']=$cliente->nombresContactoMantenimiento;
                                $parametros['descripcion']=$model->descripcionTarea;
                                $parametros['estado']=$model->estadoTarea=='Para Realizar'?'estaremos asistiendo a sus oficinas':'hemos asistido a sus oficinas';
                                $parametros['visitaRutina']=$model->visitaRutina;
                                $parametros['tipo']=$model->tipoTarea;
                                $parametros['mensajeAsistencia']=$model->tipoTarea;
                                $parametros['fecha']=$model->fechaTarea;
                                 Mensajes::model()->enviarMail($emailCliente,Settings::model()->getValorSistema('IMPRESION_MAIL_TAREAMANTENIMIENTO',$parametros,'impresiones'),$titulo,Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
                            }
                               
                            }
                                $this->redirect(array('tareasDestinatarios/create','idCliente'=>isset($_GET['idCliente'])?$_GET['idCliente']:0,'cliente'=>isset($_GET['cliente'])?$_GET['cliente']:0,'idTarea'=>$model->idTarea));
				
				
		}
		$idCliente=isset($_GET['idCliente'])?$_GET['idCliente']:'';
		$cliente=isset($_GET['cliente'])?$_GET['cliente']:'Sin cliente asignado';
		$model->idClienteTarea=$idCliente;
		
		$this->render('create',array(
			'model'=>$model,'cliente'=>$cliente,'idCliente'=>$idCliente
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

		if(isset($_POST['Tareas']))
		{
			$model->attributes=$_POST['Tareas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idTarea));
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
	public function actionCentroTareas()
	{
		$this->redirect(array('/acciones/verAcciones','tipo'=>'tareas','descripcion'=>"Vea las acciones disponibles"));
	}
	public function actionVerTodas()
	{
		$model=new Tareas;
		$this->render('verTodas',array(
			'model'=>$model,
		));
	}

        public function actionVerMisTareas()
	{
		$model=new Tareas('consultarMisTareas');
		$model->unsetAttributes();  // clear any default values
				if(isset($_GET['cliente']))
			$model->attributes=$_GET['cliente'];
				if(isset($_GET['nombre']))
			$model->attributes=$_GET['nombre'];
		
		
		$this->render('verMisTareas',array(
			'model'=>$model		));
	}
	public function actionImprimirPendientes()
	{
		$idCliente=$_GET['idCliente'];
		$this->redirect(array('impresiones/create&tipoImpresion=tareasPendientes&idTipo='.$idCliente));
	}
	public function actionTareasMiArea()
	{
		$model=new Tareas;
		$this->render('tareasMiArea',array(
			'model'=>$model->consultarMiArea()
		));
	}
	public function actionImprimirTareasMiArea()
	{
		$this->redirect(array('impresiones/create'));
	}
	public function actionImprimirMisTareas()
	{
		$this->redirect(array('impresiones/create'));
	}
	public function actionIndex()
	{
		$model=new Tareas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tareas']))
			$model->attributes=$_GET['Tareas'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionTareasPendientes()
	{
		$model=new Tareas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tareas']))
			$model->attributes=$_GET['Tareas'];
		

		$this->render('tareasPendientes',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tareas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tareas']))
			$model->attributes=$_GET['Tareas'];

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
		$model=Tareas::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tareas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
