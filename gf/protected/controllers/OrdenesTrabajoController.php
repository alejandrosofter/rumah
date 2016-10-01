<?php

class OrdenesTrabajoController extends RController
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
				'actions'=>array('index','view','ParaRealizar','realizadas','generarOrden','generarOrdenNueva','generarOrdenExistente',
								'facturadas','finalizarOrden','finalizar','porEstado','cargarCoordinacion'),
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
        
        public function actionImprimir($idOrdenTrabajo)
        {
            if(isset($_POST['yt0'])){
                $puerto=$_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT'];
                $model=  OrdenesTrabajo::model()->findByPk($idOrdenTrabajo);
                $link="http://".$_SERVER['SERVER_NAME'].$puerto.Yii::app()->createUrl('/ordenesTrabajo/porEstado&estado=');
                $redirige=true;
                $this->imprimirOrdenes(isset($_POST['Impresiones'])?$_POST['Impresiones']:null,$model,$link,$redirige);
//            } if(isset($_POST['yt1'])){
//                    Impresiones::model()->redirectPagina("index.php?r=impresiones/create&idTipo=$idOrdenTrabajo&tipoImpresion=orden");
//                }
            }
                   $this->renderPartial('_vistaImpresion', array(
                                   'model'=>$this->loadModel($idOrdenTrabajo),
                                 ),
                          false,true);
            Yii::app()->end();
        }
        public function actionParche()
        {
            $ordenes=OrdenesTrabajo::model()->buscarPorEstado('Realizada',true);
            foreach ($ordenes as $value) {
                $eo=new OrdenesTrabajoEstados;
                $eo->idOrdenTrabajo=$value['idOrdenTrabajo'];
                $eo->fechaEstado=Date('Y-m-d');
                $eo->estado='Facturado';
                $eo->idUsuario=1;
                $eo->detalleEstado="ok";
                $eo->save();
            }
        }
	public function actionAgregarCarro()
	{
		$idOrdenTrabajo=$_GET['idOrdenTrabajo'];
		
		$datos = isset(Yii::app()->request->cookies['ordenesCarro'])?Yii::app()->request->cookies['ordenesCarro']->value:'';
		if(count(explode(',',$datos))==0)
			$datos.=''.$idOrdenTrabajo;
			else
				$datos.=','.$idOrdenTrabajo;
		Yii::app()->request->cookies['ordenesCarro'] = new CHttpCookie('ordenesCarro', $datos);
				echo '<script type="text/javascript">';
				echo 'history.go(-1)';
				echo '</script>';
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
	public function actionSeguimiento($idOrdenTrabajo)
	{
		$model=new OrdenesTrabajo;

		if(isset($_POST['OrdenesTrabajo']))
		{
			$model->attributes=$_POST['OrdenesTrabajo'];
			if($model->save()){
				$modeloPresupuestoOrden=new PresupuestosOrdenesTrabajo;
				$modeloPresupuestoOrden->idPresupuesto=$model->idPresupuesto;
				$modeloPresupuestoOrden->idOrdenTrabajo=$model->idOrdenTrabajo;
				$modeloPresupuestoOrden->fecha= Date('Y-m-d');
				if(!$modeloPresupuestoOrden->save()) echo 'no pudo salvar!';
				$this->redirect(array('/presupuestos/'));
			}
				
		}
		
		$model->idPresupuesto=$_GET['idPresupuesto'];

		$this->render('existentesOrdenPresupuesto',array(
			'model'=>$model,
		));
	}
	public function actionGenerarOrdenExistente($idPresupuesto)
	{
		$model=new OrdenesTrabajo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrdenesTrabajo']))
		{
			$model->attributes=$_POST['OrdenesTrabajo'];
			if($model->save()){
				$modeloPresupuestoOrden=new PresupuestosOrdenesTrabajo;
				$modeloPresupuestoOrden->idPresupuesto=$model->idPresupuesto;
				$modeloPresupuestoOrden->idOrdenTrabajo=$model->idOrdenTrabajo;
				$modeloPresupuestoOrden->fecha= Date('Y-m-d');
				if(!$modeloPresupuestoOrden->save()) echo 'no pudo salvar!';
				$this->redirect(array('/presupuestos/'));
			}
				
		}
		
		$model->idPresupuesto=$_GET['idPresupuesto'];

		$this->render('existentesOrdenPresupuesto',array(
			'model'=>$model,
		));
	}
        private function getDescripcionPresupuesto($idPresupuesto)
        {
            $salida="";
            $items=PresupuestoItems::model()->consultarItems($idPresupuesto);
            foreach ($items as $key => $value){
//                $nom=substr($value['nombreStock'], 0, 40);
                $salida.='ITEM '.($key+1).':'.$value['nombreStock'].' CANTIDAD: '.$value['cantidadItems'].chr(10);
            }
                
            return $salida;
        }
	public function actionGenerarOrdenNueva($idPresupuesto)
	{
		$model=new OrdenesTrabajo;
                $pre=Presupuestos::model()->findByPk($idPresupuesto);
                $model->idCliente=$pre->idClientePresupuesto;
                $model->fechaIngreso=Date('Y-m-d');
                $model->descripcionCliente=$this->getDescripcionPresupuesto($idPresupuesto);
                $focus='descripcionEncargado';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['OrdenesTrabajo']))
		{
			$model->attributes=$_POST['OrdenesTrabajo'];
			if($model->save())
				if(isset($_GET['idPresupuesto'])){
				$modeloPresupuestoOrden=new PresupuestosOrdenesTrabajo;
				$modeloPresupuestoOrden->idPresupuesto=$model->idPresupuesto;
				$modeloPresupuestoOrden->idOrdenTrabajo=$model->idOrdenTrabajo;
				$modeloPresupuestoOrden->fecha= Date('Y-m-d');
				if(!$modeloPresupuestoOrden->save()) echo 'no pudo salvar!';
				$this->redirect(array('/presupuestos/'));
				}
				$this->redirect(array('ordenesTrabajo'));
			
			
				
		}
		$model->idPresupuesto=$_GET['idPresupuesto'];

		$this->render('create',array(
			'model'=>$model,'focus'=>$focus
		));
	}
        private function asignarDatosIniciales($idPresupuesto)
        {
            $model=new OrdenesTrabajo;
            $model->fechaIngreso=Date('Y-m-d');
            $model->estados="Sin Asignar";
            $model=$this->asignarDatosRutina($model,$model->idRutina);
            if($idPresupuesto!=null){
                $pre=Presupuestos::model()->findByPk($idPresupuesto);
                $model->idCliente=$pre->idClientePresupuesto;
                $model->descripcionCliente=$this->getDescripcionPresupuesto($idPresupuesto);
            }
                
                return $model;
        }
        private function asignarDatosRutina($model,$idRutina)
        {
            $rutina=RutinasOrdenesTrabajo::model()->findByPk($idRutina);
            if($rutina!=false){
                    $model->idRutina=$rutina['idOrdenTrabajoRutina'];
                    $model->duracionDias=$rutina['duracionDias'];
                    $model->prioridad=$rutina['prioridad'];
                    if(isset($_GET['idPresupuesto'])) $model->descripcionCliente=$this->getDescripcionPresupuesto($_GET['idPresupuesto']);
                        else $model->descripcionCliente=$rutina['descripcionCliente'];
                    $model->descripcionEncargado=$rutina['descripcionEncargado'];
                }else{
                    $rutina= RutinasOrdenesTrabajo::model()->getPredeterminada();
                    $model->idRutina=$rutina['idOrdenTrabajoRutina'];
                    $model->duracionDias=$rutina['duracionDias'];
                    $model->prioridad=$rutina['prioridad'];
                    if(isset($_GET['idPresupuesto'])) $model->descripcionCliente=$this->getDescripcionPresupuesto($_GET['idPresupuesto']);
                        else $model->descripcionCliente=$rutina['descripcionCliente'];
                    $model->descripcionEncargado=$rutina['descripcionEncargado'];
                }
                return $model;
        }
        private function verificaDatos($model)
        {
            if(isset($_POST['OrdenesTrabajo']))
		{
                    $model->attributes=$_POST['OrdenesTrabajo'];
                    if (isset($_POST['noValidate']) && $_POST['noValidate']=='true'){
                        $model=$this->asignarDatosRutina($model,$model->idRutina);
                }else
			if($model->save()){
                            $puerto=$_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT'];
                            $link="http://".$_SERVER['SERVER_NAME'].$puerto.Yii::app()->createUrl('/ordenesTrabajo/porEstado&estado=');
                            $redirige=true;
                            $this->agregarEstados($model->idRutina,$model->idOrdenTrabajo,$model->fechaIngreso);
                            $this->agregarItemsStock($model);
                            $this->guardarPresupuesto($model);
                            $this->imprimirOrdenes(isset($_POST['Impresiones'])?$_POST['Impresiones']:null,$model,$link,$redirige);

			}
		}
                return $model;
        }
        private function agregarItemsStock($model)
        {
            if(isset($_GET['idPresupuesto']))
                $this->agregarItemsPresupuesto($_GET['idPresupuesto'],$model->idOrdenTrabajo);
            $this->agregarItemsRutina($model->idRutina,$model->idOrdenTrabajo);
        }
        private function agregarItemsRutina($idRutina,$idOrden)
        {
            $rt=RutinasOrdenesTrabajo::model()->findByPk($idRutina);
            if($rt!=null){
                $st=Stock::model()->findByPk($rt->idStock);
                if($st!=null){
                $pi=new OrdenesTrabajoStock;
                $pi->cantidad=1;
                $pi->idOrdenTrabajo=$idOrden;
                $pi->idStock=$rt->idStock;
                $pi->nombreStock=$st->nombre;
                $pi->porcentajeIva=$st->porcentajeIva;
                $pi->importe=Stock::model()->getPrecioVenta($st->idStock,true);
                
                $pi->save();
                }
            }
        }
        private function agregarItemsPresupuesto($id,$idOrden)
        {
            $items=PresupuestoItems::model()->consultarItems($id);
            foreach ($items as $key => $value) {
                $pi=new OrdenesTrabajoStock;
                $pi->cantidad=$value['cantidadItems'];
                $pi->idOrdenTrabajo=$idOrden;
                $pi->idStock=$value['idStock'];
                $pi->nombreStock=$value['nombreStock'];
                $pi->porcentajeIva=$value['porcentajeIva'];
                $pi->importe=($value['precioVenta']);
                
                $pi->save();
            }
        }
	public function actionCreate()
	{
		$model=$this->asignarDatosIniciales(isset($_GET['idPresupuesto'])?$_GET['idPresupuesto']:null);
                $rutina=RutinasOrdenesTrabajo::model()->getPredeterminada();
                $model=$this->asignarDatosRutina($model,$model->idRutina);
		$model=$this->verificaDatos($model);
                $model->idUsuario=Yii::app()->user->id;
                $focus='idCliente';

		$this->render('create',array(
			'model'=>$model,'focus'=>$focus
		));
	}
        private function guardarPresupuesto($model)
        {
            if(isset($_GET['idPresupuesto'])){
				$modeloPresupuestoOrden=new PresupuestosOrdenesTrabajo;
				$modeloPresupuestoOrden->idPresupuesto=$_GET['idPresupuesto'];
				$modeloPresupuestoOrden->idOrdenTrabajo=$model->idOrdenTrabajo;
				$modeloPresupuestoOrden->fecha= Date('Y-m-d');
				if(!$modeloPresupuestoOrden->save()) echo 'no pudo salvar!';
//				$this->redirect(array('/presupuestos/'));
				}
        }
        private function agregarEstados($idRutina,$idOrden,$fecha_o)
        {
            $this->agregarEstadosRutina($idRutina,$idOrden,$fecha_o);
            $this->agregarEstadosPresupuesto($idRutina,$idOrden,$fecha_o);
            
        }
        private function agregarEstadosPresupuesto($idRutina,$idOrden,$fecha_o)
        {
            if(isset($_GET['idPresupuesto'])){
            $estados=  PresupuestoItems::model()->consultarItems($_GET['idPresupuesto']);
            foreach ($estados as $key => $value) {
                $estadoORden=new OrdenesTrabajoEstados;
                $estadoORden->detalleEstado='Realizar : '.$value['nombreStock'];
                $estadoORden->estado='Sin Asignar';
                $estadoORden->fechaEstado=Date('Y-m-d');
                $estadoORden->idOrdenTrabajo=$idOrden;
                $estadoORden->idUsuario=Yii::app()->user->id;
                $estadoORden->save();
            }
            }
        }
        private function agregarEstadosRutina($idRutina,$idOrden,$fecha_o)
        {
            $estados=RutinasEstadosOrdenesTrabajo::model()->consultarRutina($idRutina);
            foreach ($estados as $key => $value) {
                $fecha = new DateTime($fecha_o);
		$intervalo = new DateInterval('P'.$value['dias'].'D');
		$fecha->add($intervalo);
                        
                $estadoORden=new OrdenesTrabajoEstados;
                $estadoORden->detalleEstado=$value['detalle'];
                $estadoORden->estado=$value['estado'];
                $estadoORden->fechaEstado=$fecha->format('Y-m-d');
                $estadoORden->idOrdenTrabajo=$idOrden;
                $estadoORden->idUsuario=Yii::app()->user->id;
                $estadoORden->save();
            }
        }
        private function imprimirOrdenes($data,$model,$link,$redirige)
        {
            $im=new ImpresionOrdenManager;
            $im->manage($data);
            $cantidad=count($im->items);
            $sinImpresiones=true;
            foreach ($im->items as $key => $value) {
                $item=RutinasImpresiones::model()->findByPk($value->impresora); //aca viene el ID no se por que no me lo toma
                $texto=$this->getOrden($item->detalleImpresion,$model);
                if($value->cantidadDefecto>0){
                    Impresiones::model()->imprimirJava($texto, $item->impresora,$link,$value->cantidadDefecto,0,0,'no','no',0,0,$item->impresora);
                    $sinImpresiones=false;
                }
                
            }
            if($sinImpresiones)$this->redirect('index.php?r=ordenesTrabajo/porEstado&estado=');
        }
        private function getOrden($plantilla,$model)
        {
            $cliente=Clientes::model()->findByPk($model->idCliente);
            $rutina=RutinasOrdenesTrabajo::model()->findByPk($model->idRutina);
            $val=Yii::app()->settings->getKey( 'ORDEN_TRABAJO');
            $modelSettings=Settings::model();
            $maxCliente=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_CLIENTE'));
            $maxDetalle=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_DETALLE'));
            $maxDetalle2=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_DETALLE2'));
            $nombreCliente=($cliente->tipoCliente=='Empresa')?$cliente->nombreFantasia:$cliente->apellido.', '.$cliente->nombre;
            $paramentros['cliente']= substr($nombreCliente, 0, (int)$maxCliente);
			$paramentros['motivo']= substr($model->descripcionCliente, 0, $maxDetalle);
			$paramentros['nroOrden']= $model->idOrdenTrabajo;
			$paramentros['fechaOrden']= Yii::app()->dateFormatter->format("dd-M-y",$model->fechaIngreso);
			$paramentros['telefono']= $cliente->telefono;
			$paramentros['celular']= $cliente->celular;
			$paramentros['descripcionCliente']= substr($model->descripcionCliente, 0, 300);
			$paramentros['descripcionEncargado']= substr($model->descripcionEncargado, 0, 300);
//			$val = str_replace("%prioridad", $orden->descripcionCliente."PATOOOO".$orden->descripcionEncargado,$val);
			$paramentros['prioridad']= $model->prioridad;
                        $paramentros['duracionDias']= $model->duracionDias;
			$paramentros['tipoCliente']= $cliente->tipoCliente;
                        $paramentros['rutina']= $rutina->nombreRutina;
            return Impresiones::model()->getTextoParametro($plantilla,$paramentros);
        }
	public function actionGenerarOrden()
	{
		
		$this->render('generarOrden',array('idPresupuesto'=>$_GET['idPresupuesto']
		
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

		if(isset($_POST['OrdenesTrabajo']))
		{
			$model->attributes=$_POST['OrdenesTrabajo'];
			if($model->save()){
//				echo '<script type="text/javascript">';
//				echo 'history.go(-1)';
//				echo '</script>';
                                $this->redirect(array('ordenesTrabajo/porEstado&estado=Trabajando'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionFinalizarOrden()
	{
		$this->render('finalizarOrden',array(
			'idOrden'=>$_GET['id'],'model'=>OrdenesTrabajo::model(),'vista'=>$this->loadModel($_GET['id']),
		));
	}
	public function actionFinalizar()
	{
		$model=OrdenesTrabajo::model();
		$model->finalizarOrden($_GET['id']);
		$this->redirect(array('ordenesTrabajo/porEstado&estado=Trabajando'));
//		$this->redirect(array('/ordenesTrabajo/paraRealizar'));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
                        {
                            echo '<script type="text/javascript">';
				echo 'history.go(-1)';
				echo '</script>';
                        }
		
	}

	/**
	 * Lists all models.
	 */

        
        
	public function actionIndex()
	{
		$model=new OrdenesTrabajo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesTrabajo']))
			$model->attributes=$_GET['OrdenesTrabajo'];
		
		if(isset($_POST['facturarOrdenes']))
		{
			if($_POST['selecciones']!='')
				$this->redirect(Yii::app()->createUrl("facturasSalientes/crearFactura",array("idOrdenTrabajo"=>$_POST['selecciones'])));
				else Yii::app()->user->setFlash('error',"Debe seleccionar alguna orden!");
		}

		$this->render('index',array(
			'model'=>$model,
		));
//$this->redirect( array('porEstado&estado='));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OrdenesTrabajo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesTrabajo']))
			$model->attributes=$_GET['OrdenesTrabajo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionPorEstado($estado)
	{
		$model=new OrdenesTrabajo;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesTrabajo']))
			$model->attributes=$_GET['OrdenesTrabajo'];
		
		if(isset($_POST['facturarOrdenes']))
		{
			if($_POST['selecciones']!='')
				$this->redirect(Yii::app()->createUrl("facturasSalientes/crearFactura",array("idOrdenTrabajo"=>$_POST['selecciones'])));
		}
		$this->render('ordenesParaRealizar',array(
			'model'=>$model,'estado'=>$_GET['estado']
		));
	}
	public function actionParaRealizar()
	{
		$model=new OrdenesTrabajo('paraRealizar');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesTrabajo']))
			$model->attributes=$_GET['OrdenesTrabajo'];

		$this->render('ordenesPendientes',array(
			'model'=>$model,
		));
	}
	public function actionFacturadas()
	{
		$model=new OrdenesTrabajo('facturadas');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesTrabajo']))
			$model->attributes=$_GET['OrdenesTrabajo'];

		$this->render('ordenesFacturadas',array(
			'model'=>$model,
		));
	}
	public function actionRealizadas()
	{
		$model=new OrdenesTrabajo('realizadas');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesTrabajo']))
			$model->attributes=$_GET['OrdenesTrabajo'];

		$this->render('ordenesRealizadas',array(
			'model'=>$model,
		));
	}
	
	public function actionCargarCoordinacion()
	{
		
		if(isset($_GET['idOrdenTrabajo']))
		{
		$model=new OrdenesTrabajoCoordinaciones;
		$model->idOrdenes=$_GET['idOrdenTrabajo'];
		$model->save();
		/// aaca el for de los ususarios ligados, si no hay ninguno con usuario on
		// ver como instanciar controlador/modulo de hellpes
		$modelTareaDestinatario = new OrdenesTrabajo;
		//TareasDestinatarios
		$usuarios = $modelTareaDestinatario->consultarDatosOrden($_GET['idOrdenTrabajo']);
		$items = $usuarios;
		//enviar el que esta logeado!!!
		
			$ev = new EventsHelper;
            $ev->title = $items->data[0]['idOrdenTrabajo']."-".$items->data[0]['cliente']."-".$items->data[0]['descripcionCliente'];
            $ev->user_id = Yii::app()->user->id;
            $ev->save();	
		
		
		
	$this->redirect(array('ordenesTrabajo/porEstado&estado='));
			
		}
		throw new CHttpException(404,'abajo.');
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=OrdenesTrabajo::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='ordenes-trabajo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
