<?php

class RipeosController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';


	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array();
	}
	public function actionNumeroFacturas()
	{
		$tals=Talonario::model()->findAll();
		foreach($tals as $tal)$this->ripFacturasNro($tal->idTalonario);


	}
	public function actionNumeroFacturasTalonario($idTalonario)
	{
		$this->ripFacturasNro($idTalonario);

	}
	private function ripFacturasNro($tal)
	{
		$facts=Facturas::model()->consultarPorTalonario($tal);
		$nro=1;
		foreach($facts as $fact){
			$fact->nroFactura=$nro;
			$fact->save();
			$nro++;
		}
		echo "Ripeo ".$tal.'<br>';
	}
	private function ingresarFactura($item)
	{
		$arr=explode(" ",$item["fecha"]);
		$tal=$item["talonarioId"]==''?18:$item["talonarioId"];
		$fecha=$arr[0];
		$sql="insert into facturas values(";
		$sql.="'".$item["idFacturaSaliente"]."',";
		$sql.="'".$fecha."',";
		$sql.=$item["idCliente"].",";
		$sql.="'".$item["numeroFactura"]."',";
		$sql.="'".$item["estado"]."',";
		$sql.=$tal.",";
		$sql.="'0',";//interes
		$sql.="'0',";//bonif
		$sql.="2,";//vendedor
		$sql.="'".round($item["importeFactura"],1)."',";
		$sql.="'0')";//saldo
		$data = Yii::app()->db2->createCommand($sql)->query();
	}
	private function ingresarItemFactura($idFactura)
	{
		$sql='select * from itemsFacturaSaliente where idFacturaSaliente='.$idFactura;
		$data = Yii::app()->db2->createCommand($sql)->query();
		foreach($data as $item){
			$stock=Stock::model()->findByPk($item['idElemento']);
			$model=new FacturasItems;
			$model->idFactura=$idFactura;
			$model->idProducto=$item['idElemento'];
			$model->detalle=$item['nombreItem'];
			$model->importe=$item['importeItem'];
			$model->cantidad=$item['cantidad'];
			$model->total=round($model->importe*$model->cantidad,1);
			if($stock!=null)
				$model->save();

		}
	}
	public function actionRipItemsFacturas($ano)
	{
		$sql='select * from facturas where YEAR(fecha)='.$ano;
		$data = Yii::app()->db2->createCommand($sql)->query();
		foreach($data as $item)$this->ingresarItemFactura($item['id']);
		echo 'Items Facturas agregadas!';
	}
	public function actionRipFacturas($ano)
	{
		$sql='select * from facturasSalientes_view where YEAR(fecha)='.$ano;
		$data = Yii::app()->db2->createCommand($sql)->query();
		foreach($data as $item)$this->ingresarFactura($item);
		echo 'Facturas agregadas!';
	}
	public function actionRipear()
	{
		$this->actionRipClientes();
		$this->actionRipFacturas();
	}
	public function actionRipClientes()
	{
		$sql='update clientes set razonSocial=apellido';
		$data = Yii::app()->db2->createCommand($sql)->query();
		
		$sql='update clientes set apellido=""';
		$data = Yii::app()->db2->createCommand($sql)->query();
		echo 'Clientes modificados!';
	}
}