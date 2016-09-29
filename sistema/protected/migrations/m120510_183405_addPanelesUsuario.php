<?php

class m120510_183405_addPanelesUsuario extends CDbMigration
{
	public function up()
	{
            $this->createTable('usuarios_paneles', array('idPanelUsuario' => 'pk',
            'nombrePanel' => 'string',
            'descripcionPanel' => 'text',
            'ayuda' => 'text',
            'linkAyuda' => 'string'));
            
            $sql="

INSERT INTO `usuarios_paneles` (`idPanelUsuario`, `nombrePanel`, `descripcionPanel`, `ayuda`, `linkAyuda`) VALUES
(1, 'ORDENES DE TRABAJO', '', '/tareas/indicadores', ''),
(2, 'VENTAS', 'as', '/facturasSalientes/indicadoresVentas', ''),
(3, 'COBROS', 'afs', '/facturasSalientes/indicadores', ''),
(4, 'PAGOS', 'as', '/facturasEntrantes/indicadores', ''),
(5, 'COMPRAS', '', '/facturasEntrantes/indicadoresCompras', ''),
(6, 'ANOTADOR', '', '/usuarios/anotador', ''),
(7, 'REGISTROS', '', '/usuarios/verRegistros', '');
";
            $this->execute($sql);
	}

	public function down()
	{
		echo "m120510_183405_addPanelesUsuario does not support migration down.\n";
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