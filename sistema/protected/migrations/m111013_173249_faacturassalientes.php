<?php

class m111013_173249_faacturassalientes extends CDbMigration
{
	public function up()
	{
		
				$sql="DROP VIEW `facturasSalientes_view` ;";
$this->execute($sql);
				$sql="CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `facturasSalientes_view` AS (select `clientes`.`idCliente` AS `idCliente`,`facturasSalientes`.`estado` AS `estado`,`facturasSalientes`.`idCondicionVenta` AS `idCondicionVenta`,`facturasSalientes`.`numeroFactura` AS `numeroFactura`,group_concat(`itemsFacturaSaliente`.`nombreItem` separator ',') AS `detalle`,sum(`pagos`.`importeDinero`) AS `importePagado`,if((`clientes`.`tipoCliente` = 'Empresa'),`clientes`.`razonSocial`,concat(`clientes`.`apellido`,', ',`clientes`.`nombre`)) AS `cliente`,count(`facturasSalientes`.`idFacturaSaliente`) AS `cantidadItems`,sum((`itemsFacturaSaliente`.`cantidad` * `itemsFacturaSaliente`.`importeItem`)) AS `importe`,`facturasSalientes`.`fecha` AS `fecha`,`facturasSalientes`.`idFacturaSaliente` AS `idFacturaSaliente`,sum(if((`itemsFacturaSaliente`.`porcentajeIva` = '10.5'),(`itemsFacturaSaliente`.`cantidad` * `itemsFacturaSaliente`.`importeItem`),0)) AS `importe105`,sum(if((`itemsFacturaSaliente`.`porcentajeIva` = '21'),(`itemsFacturaSaliente`.`cantidad` * `itemsFacturaSaliente`.`importeItem`),0)) AS `importe21`,`facturasSalientes`.`tipoFactura` AS `tipoFactura` from ((((`facturasSalientes` left join `itemsFacturaSaliente` on((`itemsFacturaSaliente`.`idFacturaSaliente` = `facturasSalientes`.`idFacturaSaliente`))) join `clientes` on((`clientes`.`idCliente` = `facturasSalientes`.`idCliente`))) left join `pagosFactura` on((`pagosFactura`.`idFacturaSaliente` = `facturasSalientes`.`idFacturaSaliente`))) left join `pagos` on((`pagos`.`idPago` = `pagosFactura`.`idPago`))) group by `facturasSalientes`.`idFacturaSaliente`);";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111013_173249_faacturassalientes does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}