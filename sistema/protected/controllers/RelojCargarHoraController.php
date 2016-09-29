<?php

class RelojCargarHoraController extends Controller
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
		return array();
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
		$model= new RelojCargarHora;

		if(isset($_POST['RelojCargarHora']))
		{
                    
			$model->attributes=$_POST['RelojCargarHora'];
                        $model->archivo=CUploadedFile::getInstance($model,'archivo');
			if($model->save()){
                            $archivo='archivo'.$model->id.'.dat';
                            $ruta=dirname(__FILE__).'/../../assets/Reloj/'.$archivo;
                                  //if($model->archivo!=null) 
                            $model->archivo->saveAs($ruta);
                             // $this->redirect(array('admin',));
                             echo $ruta;
                             $this->redirect(array('admin',));
                              }
		}
		$this->render('create',array('model'=>$model,));
		

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
{
		$model=$this->loadModel($id);

		if(isset($_POST['RelojCargarHora']))
		{
                    
			$model->attributes=$_POST['RelojCargarHora'];
                        $model->archivo=CUploadedFile::getInstance($model,'archivo');
			if($model->save()){
                            $archivo='archivo'.$model->id.'.dat';
                            $ruta=dirname(__FILE__).'../../assets/Reloj'.$archivo;
                           
                          //  if(file_exists($ruta) && $model->archivo!="")unlink ($ruta);
                           /*  if($model->archivo!=null)*/ $model->archivo->saveAs($ruta);
                             // $this->redirect(array('admin',));
                             echo $ruta;
                        }
				
		}
		$this->render('update',array('model'=>$model,
		));
	}
	
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
		$model=new RelojCargarHora('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RelojCargarHora']))
			$model->attributes=$_GET['RelojCargarHora'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RelojCargarHora('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RelojCargarHora']))
			$model->attributes=$_GET['RelojCargarHora'];

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
		$model=RelojCargarHora::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='reloj-cargar-hora-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAplicarHoras()
	{
                $model=RelojCargarHora::model()->findByPk($_GET['id']);
                $archivo='archivo'.$model->id.'.dat';
                $ruta=dirname(__FILE__).'/../../assets/Reloj/'.$archivo;
                $this->levantarArchivo($ruta,$model->idSucursal);
                $this->aplicarHoras($model->fechaDesde,$model->fechaHasta);
	}
        private function aplicarHoras($fechaInicio,$fechaFin)
        {
            $empleados=RelojEmpleados::model()->search(true);
            RelojResultadoHoras::model()->vaciarTabla();
            foreach ($empleados as $key => $value) 
                $this->ingresaPorEmpleado($value['idEmpleado'],$fechaInicio,$fechaFin);
            
        }
        private function ingresaPorEmpleado($idEmpleado,$fechaInicio,$fechaFin)
        {
            echo 'idEMpl: '.$idEmpleado;
              echo 'ent: '.$fechaInicio;
                echo 'sal: '.$fechaFin;
            $horas=RelojHoraEmpleados::model()->consultarHoras($fechaInicio,$fechaFin,$idEmpleado);
            for ($i = 0; $i < count($horas); $i++) {
                $fechaIngresa=isset ($horas[($i)]['fechaHoraTrabajo'])?$horas[($i)]['fechaHoraTrabajo']:'';
                $fechaEgresa=isset ($horas[($i+1)]['fechaHoraTrabajo'])?$horas[($i+1)]['fechaHoraTrabajo']:'';
                
                $this->ingresar(($fechaIngresa),($fechaEgresa),$horas[$i]['idEmpleado']);
            }
        }
        public function ingresar($fechaIngresa,$fechaEgresa,$id)
        {
//            $model=new RelojResultadoHoras;
//            $model->fechaInicio=($fechaIngresa);
//            $model->fechaFin=($fechaEgresa);
//            $model->idEmpleado=$id;
            $sql="INSERT INTO `reloj_resultadoHoras` VALUES ('','$id',UNIX_TIMESTAMP('".$fechaIngresa."'),UNIX_TIMESTAMP('".$fechaEgresa."'))";
            
            echo $sql."<br>";
            $connection=Yii::app()->getDb();
            $command=$connection->createCommand($sql);
            try {
                $command->query();
//                $model->save();
                
            } catch (Exception $exc) {
                echo 'no salva <br>';
            }

            
        }
	
	// Funcion para cargar el archivo

private function levantarArchivo($ruta,$idSucursal)
{
        $salida=$this->leerArchivo($ruta,$idSucursal);
        $this->ingresarTemp($salida);
 	return;
}

 private function ingresarTemp($vector) 
{ 
RelojEmpladoTarjetas::model()->vaciarTabla();
	for($i=0;count($vector)>$i;$i++){
		
		$empleado = RelojEmpladoTarjetas::model()->getEmpleado($vector[$i]['idTarjeta']);
		$horaTrabajo = $vector[$i]['fecha'];
		RelojEmpladoTarjetas::model()->ingresar($empleado, $horaTrabajo);
                
	}
	
		
		return null;
} 

private function leerArchivo($ruta,$idSucursal)
 {
    $suc=RelojSucursales::model()->findByPk($idSucursal);
    $reloj=RelojRelojes::model()->findByPk($suc->idReloj);
 	if ($mi_array=file($ruta)) { 
    while (list ($linea, $contenido) = each ($mi_array)) {
     	$res=$this->	getObjetoHora($contenido,$reloj->formato);
         
 $sal[]=$res;
    }
 	}
 	return $sal;
 }
 private function getObjetoHora($cadena,$formato)
 {
 	$salida['hora']=$this->buscaCadena('H',$cadena,$formato);
        $salida['min']=$this->buscaCadena('M',$cadena,$formato);
        $salida['seg']=$this->buscaCadena('S',$cadena,$formato);
        $salida['seg']=$salida['seg']==''?'00':$salida['seg'];
        $salida['dia']=$this->buscaCadena('D',$cadena,$formato);
        $salida['mes']=$this->buscaCadena('O',$cadena,$formato);
        $salida['ano']=$this->buscaCadena('Y',$cadena,$formato);
        $salida['idTarjeta']=$this->buscaCadena('T',$cadena,$formato);
        
        $sal['fecha']=$salida['ano'].'-'.$salida['mes'].'-'.$salida['dia'].' '.$salida['hora'].':'.$salida['min'].':'.$salida['seg'];
        $sal['idTarjeta']=$salida['idTarjeta'];
return $sal;
 }
 private function buscaCadena($cadenaBusca,$cadena,$formato)
 {
     $posIni=stripos($formato, $cadenaBusca);
     $posFin=strrpos($formato, $cadenaBusca,$posIni);
     return substr($cadena, $posIni,($posFin-$posIni)+1);
 }

// Termina la funcion
}
