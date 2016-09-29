<?php

class BalancesController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';


	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array();
	}
	public function actionIndex()
	{
		$this->redirect(array('/acciones/verAcciones','tipo'=>'informes','descripcion'=>"Vea las acciones disponibles"));
	}
	public function actionResumenDeudores()
	{
		$this->redirect(array('impresiones/create','tipoImpresion'=>'resumenDeudores'));
		
	}
	public function actionResumenMorosos()
	{
		$this->redirect(array('impresiones/create','tipoImpresion'=>'resumenMorosos'));
		
	}
	public function actionResumenFinanciero()
	{
		if(isset($_POST['Balances']))
		{
			$model->attributes=$_POST['Balances'];
				$this->redirect(array('impresiones/create','tipoImpresion'=>'resumenFinanciero','fechaInicio'=>$_POST['Balances']['fechaInicio'],'fechaFin'=>$_POST['Balances']['fechaFin']));
				
		}
		
		$this->render('resumenFinanciero',array(
			'model'=>Balances::model()
		));
	}
	public function actionResumenOrdenes()
	{
		if(isset($_POST['Balances']))
		{
			$model->attributes=$_POST['Balances'];
				$this->redirect(array('impresiones/create','tipoImpresion'=>'resumenOrdenes','fechaInicio'=>$_POST['Balances']['fechaInicio'],'fechaFin'=>$_POST['Balances']['fechaFin']));
				
		}
		
		$this->render('resumenOrdenes',array(
			'model'=>Balances::model()
		));
	}
	public function actionInformeVentas()
	{
		if(isset($_POST['Balances']))
		{
			$model->attributes=$_POST['Balances'];
				$this->redirect(array('impresiones/create','tipoImpresion'=>'informeVentas','fechaInicio'=>$_POST['Balances']['fechaInicio'],'fechaFin'=>$_POST['Balances']['fechaFin']));
				
		}
		
		$this->render('informeVentas',array(
			'model'=>Balances::model()
		));
	}
	public function actionFacturacionContable()
	{
		if(isset($_POST['Balances']))
		{
			$model->attributes=$_POST['Balances'];
				$this->redirect(array('impresiones/create','tipoImpresion'=>'facturacionContable','fechaInicio'=>$_POST['Balances']['fechaInicio'],'fechaFin'=>$_POST['Balances']['fechaFin']));
				
		}
		
		$this->render('balanceFacturacion',array(
			'model'=>Balances::model()
		));
	}
	public function actionBalanceMensual()
	{
		$fecha_actual=date("d/m/Y");
		$timestamp = strtotime( $fecha_actual );
		$diasMes = date( "t", $timestamp );
		
		$fechaInicio=isset($_POST['Balances']['fechaInicio'])?$_POST['Balances']['fechaInicio']:'';
		$fechaFin=isset($_POST['Balances']['fechaFin'])?$_POST['Balances']['fechaFin']:'';
		
		

		$model=Balances::model();
		$datosGastos=Gastos::model()->consultarPorFecha($fechaInicio,$fechaFin);
		$datosPagos=Pagos::model()->consultarPorFecha($fechaInicio,$fechaFin);
		
		$gastos=$this->ripImporte($datosGastos,$diasMes);
		$pagos=$this->ripImporte($datosPagos,$diasMes,'fecha','importeDinero');
		
		$importeGastos=$this->acumularImporte($gastos);
		$importePagos=$this->acumularImporte($pagos);
		
		$this->render('balanceMensual',array('gastos'=>$gastos,'pagos'=>$pagos, 'varianza'=>$this->getVarianza($gastos,$pagos),
			'model'=>$model,'importeGastos'=>$importeGastos, 'importePagos'=>$importePagos,'fechaInicio'=>$fechaInicio,'fechaFin'=>$fechaFin,'diasMes'=>$this->getDias($diasMes)
		));
	}
	private function getVarianza($arrPagos,$arrGastos)
	{
		$sal=array();
		for($i=0;$i<count($arrPagos);$i++)
			array_push($sal,$arrGastos[$i] - $arrPagos[$i]);
		return $sal;
	}
	private function acumularImporte($arr)
	{
		$sal=0;
		for($i=0;$i<count($arr);$i++){
			$sal+=$arr[$i];
		}
		
		return $sal;
	}
	private function ripImporte($arr,$dias,$campoFecha='fecha',$campoImporte='importe')
	{
		$sal=array();
		for($i=0;$i<$dias;$i++){
			array_push($sal,$this->getValorFecha($arr,$i+1,$campoFecha,$campoImporte));
		}
		
		return $sal;
	}
	private function getValorFecha($arr,$diaMes,$campoFecha,$campoImporte)
	{
		
		for($i=0;$i<count($arr);$i++){
			
			$dia=explode('-',$arr[$i][$campoFecha]);
			if($dia[2]==$diaMes){
				//echo '$ '. $arr[$i]['importe'];
				return $arr[$i][$campoImporte]+0;
			}
				
		}
			
		return 0;
		
	}
	private function getDias($dias)
	{
		$dat=array();
		for($i=0;$i<$dias;$i++)
			array_push($dat,$i+1);
		return $dat;
	}
	public function actionConsultarPagosGastos()
	{
		
	}

	
}
