<?php

class ComprasItemsController extends RController
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
				'actions'=>array('index','view','productos','AgregarStock','QuitarStock'),
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
        public function actionImprimirFrontales($id)
        {
            $model=new ComprasItems;
            $datos=$model->consultarResumen2($id);
           
            
           $arr=array();
            
            foreach ($datos as $value) {
                $arr=$this->getResumenEtiquetasFrontal($value,$arr);
            }
            $salida=Impresiones::model()->imprimeArrayProductos($arr);
             $puerto=$_SERVER['SERVER_PORT']=='80'?'':':'.$_SERVER['SERVER_PORT'];
             $host='http://'.$_SERVER['SERVER_NAME'].$puerto;
             $url=Yii::app()->createUrl('comprasItems&idFactura='.$id);
             
//             echo $salida;
             Impresiones::model()->imprimirJava($salida, 'codigoBarrasProducto', $host.$url, 1);
            
        }
        public function actionImprimirCbPropios($id,$propios)
        {
            $model=new ComprasItems;
            $datos=$model->consultarResumen2($id);
           
            
           $arr=array();
            
            foreach ($datos as $value) {
                $arr=$this->getResumenEtiquetas($value,$propios,$arr);
            }
            $salida=Impresiones::model()->imprimeCodigos($arr);
             $puerto=$_SERVER['SERVER_PORT']=='80'?'':':'.$_SERVER['SERVER_PORT'];
             $host='http://'.$_SERVER['SERVER_NAME'].$puerto;
             $url=Yii::app()->createUrl('comprasItems&idFactura='.$id);
             
//             echo $salida;
             Impresiones::model()->imprimirJava($salida, 'codigoBarrasProducto', $host.$url, 1);
            
        }
        
        public function getResumenEtiquetasFrontal($value,$arr)
        {
            $elem=Stock::model()->findByPk($value['idStock']);
            $cadenaComprobacion=Stock::model()->pais.Stock::model()->empresa;
             $count=0;
             return Stock::model()->getTextoEtiquetasFrontal($value['idStock'],1);
        }
        public function getResumenEtiquetas($value,$imprimePropias,$arr)
        {
            $elem=Stock::model()->findByPk($value['idStock']);
            $cadenaComprobacion=Stock::model()->pais.Stock::model()->empresa;
             $count=0;
             
            if($imprimePropias)
            $imprime=strpos($elem['codigoBarra'], $cadenaComprobacion)==false?false:true;
            else $imprime=strpos($elem['codigoBarra'], $cadenaComprobacion)==false?true:false;
            
            if($elem['codigoBarra']!='')
            return Stock::model()->getTextoEtiquetas($value['idStock'],$arr,$value['cantidad'],$imprime);
//            $etiquetasFila=  Settings::model()->getValorSistema('ETIQUETAS_CANTIDAD_POR_FILA');
//            
//            $cantidadFilas=ceil($value['cantidad'] / $etiquetasFila);
//        
//            $salida='';
//            if($imprime && $elem['codigoBarra']!='')
//            for ($index = 0; $index < $cantidadFilas; $index++)
//                $salida.=$sal;
//            return null;
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
		$model=new ComprasItems;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ComprasItems']))
		{
			$model->attributes=$_POST['ComprasItems'];
			if($model->save()){
				
				$this->redirect(array('index','idFactura'=>$_GET['idFactura']));
			}
				
		}
		$model->idFacturaEntrante=$_GET['idFactura'];

		$this->render('_form',array(
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

		if(isset($_POST['ComprasItems']))
		{
			$model->attributes=$_POST['ComprasItems'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idCompraItem));
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
	public function actionIndex()
	{
		$idFactura=$_GET['idFactura'];
		$model=new ComprasItems;
		$datos=$model->consultarResumen($idFactura);
		$total=$model->consultarResumenTotal($idFactura);
		$model->idFacturaEntrante=$idFactura;
		$factura=FacturasEntrantes::model()->findByPk($idFactura);
		$this->render('index',array('datos'=>$datos,'totales'=>$total,
			
			'model'=>$model,'idFactura'=>$idFactura,'facturaEntrante'=>$factura
		));
	}
	public function actionProductos()
	{
		$model=new ComprasItems;
		
		$this->render('productos',array(
			'model'=>$model->consultarProductos($_GET['idCompra']),'idCompra'=>$_GET['idCompra']
		));
	}
	public function actionAgregarStock($idCompraItem,$idFactura)
	{
		$model=new ComprasItems;
		$prod=$model->findByPk($idCompraItem);
		if($prod->stockeado==1)
		{
			Stock::model()->incrementarStock($prod->idStock,$prod->cantidad);
		$prod->stockeado=0;
		$prod->save();
		$this->redirect(array('/comprasItems&idFactura='.$idFactura,));
		}else echo 'Ya fue stockeado!';
	}
	public function actionQuitarStock($idCompraItem,$idFactura)
	{
		$model=new ComprasItems;
		$prod=$model->findByPk($idCompraItem);
		if($prod->stockeado==0)
		{
			Stock::model()->decrementarStock($prod->idStock,$prod->cantidad);
			$prod->stockeado=1;
			$prod->save();
			$this->redirect(array('/comprasItems&idFactura='.$idFactura,));
		}else echo 'No fue stockeado todavia!';
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ComprasItems('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ComprasItems']))
			$model->attributes=$_GET['ComprasItems'];

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
		$model=ComprasItems::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='compras-items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
