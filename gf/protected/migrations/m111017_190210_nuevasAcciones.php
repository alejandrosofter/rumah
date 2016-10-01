<?php

class m111017_190210_nuevasAcciones extends CDbMigration
{
	public function up()
	{
		$sql="DROP TABLE `acciones`";
		$this->execute($sql);
		$sql="CREATE TABLE IF NOT EXISTS `acciones` (
  `idAccion` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `subTipo` varchar(255) NOT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAccion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;";
		$this->execute($sql);
		$sql="

INSERT INTO `acciones` (`idAccion`, `nombre`, `direccion`, `tipo`, `subTipo`, `descripcion`, `imagen`) VALUES
(1, 'Nueva Factura', 'index.php?r=facturasSalientes/create', 'ventas', 'comprobantes', 'Nueva factura de venta completando todos los datos requeridos.', 'images/iconos/famfam/add.png'),
(2, 'Nueva Factura de Compra', 'index.php?r=facturasEntrantes/create', 'compras', 'comprobantes', 'Creación de una nueva factura de compra.', 'images/iconos/famfam/add.png'),
(3, 'Nueva Orden de Trabajo', 'index.php?r=ordenesTrabajo/create', 'servicios', 'comprobantes', 'Guarda una nueva orden de trabajo.', 'images/iconos/famfam/add.png'),
(4, 'Nuevo Cliente', 'index.php?r=clientes/create', 'ventas', 'archivo', 'Archiva un nuevo cliente a la empresa.', 'images/iconos/famfam/add.png'),
(5, 'Nuevo Proveedor', 'index.php?r=proveedores/create', 'compras', 'archivo', 'Cree un nuevo proveedor', 'images/iconos/famfam/add.png'),
(6, 'Nuevo Servicio', 'index.php?r=servicios/create', 'servicios', 'archivo', 'Crea un nuevo servicio para ofrecer al cliente.', 'images/iconos/famfam/add.png'),
(7, 'Nuevo Producto', 'index.php?r=stock/create', 'productos', 'archivo', 'Crea un nuevo producto.', 'images/iconos/famfam/add.png'),
(8, 'Nuevo Inventario', 'index.php?r=inventarios/create', 'ventas', 'presupuestos', 'Nuevo inventario de la empresa.', 'images/iconos/famfam/add.png'),
(9, 'Nuevo Tipo de Producto', 'index.php?r=stockTipoProducto/create', 'productos', 'archivo', 'Crea un nuevo tipo de producto.', 'images/iconos/famfam/add.png'),
(10, 'Nueva Marca', 'index.php?r=stockMarcas/create', 'productos', 'archivo', 'Crea una nueva marca.', 'images/iconos/famfam/add.png'),
(11, 'Nueva Tarea', 'index.php?r=tareas/create', 'servicios', 'mantenimientos', 'Crea una nueva tarea la cual puede ser asignada a det. usuarios.', 'images/iconos/famfam/add.png'),
(12, 'Nuevo Mantenimiento', 'index.php?r=mantenimientosEmpresas/create', 'servicios', 'mantenimientos', 'Crea un nuevo mantenimiento (el cual se pueden ingresar datos y tareas).', 'images/iconos/famfam/add.png'),
(13, 'Nuevo Pago', 'index.php?r=gastos/create', 'tesoreria', 'comprobantes', 'Crea un nuevo pago a un proveedor.', 'images/iconos/famfam/add.png'),
(14, 'Nuevo Cobro', 'index.php?r=pagos/create', 'tesoreria', 'comprobantes', 'Crea un nuevo cobro a un cliente.', 'images/iconos/famfam/add.png'),
(15, 'Nuevo Presupuesto', 'index.php?r=presupuestos/create', 'ventas', 'presupuestos', 'Acción para crear un nuevo presupuesto.', 'images/iconos/famfam/add.png'),
(16, 'Nueva Factura Corriente', 'index.php?r=facturasSalientes/crearFacturaCte', 'ventas', 'comprobantes', 'Nueva factura que se realizara periódicamente.', 'images/iconos/famfam/add.png'),
(17, 'Ver Clientes', 'index.php?r=clientes', 'ventas', 'archivo', 'Listado de clientes para realizar acciones sobre los mismos.', ''),
(18, 'Proveedores', 'index.php?r=proveedores', 'compras', 'archivo', 'Listado de proveedores', ''),
(19, 'Ordenes de Trabajo', 'index.php?r=ordenesTrabajo', 'servicios', 'comprobantes', 'Vea las ordenes de trabajo en forma de estados.', 'images/iconos/famfam/page.png'),
(20, 'Servicios Disponibles (listado de servicios)', 'index.php?r=servicios', 'servicios', 'archivos', 'Listado de servicios.', 'images/iconos/famfam/page.png'),
(21, 'Ver Stock  (disponibilidades)', 'index.php?r=stock/stockReal', 'productos', 'comprobantes', 'Vea el STOCK disponible (mas allá de los productos cargados).', 'images/iconos/famfam/basket.png'),
(22, 'Inventarios', 'index.php?r=inventarios', 'productos', 'comprobantes', 'Vea los inventarios creados.', 'images/iconos/famfam/box.png'),
(23, 'Ver Tipo de Productos', 'index.php?r=stockTipoProducto', 'productos', 'archivo', 'Vea los tipo de productos existentes.', 'images/iconos/famfam/plugin.png'),
(24, 'Ver Productos', 'index.php?r=stock', 'productos', 'comprobantes', 'Muestra los productos existentes (no muestra disponibilidades).', 'images/iconos/famfam/box.png'),
(25, 'Ver Marcas', 'index.php?r=stockMarcas', 'productos', 'archivo', 'Muestra las marcas.', 'images/iconos/famfam/plugin.png'),
(26, 'Mantenimientos (acceso periódico)', 'index.php?r=mantenimientosEmpresas', 'servicios', 'mantenimientos', 'Vea las empresas a las cuales se realiza mantenimiento.', ''),
(27, 'Ver Tareas', 'index.php?r=tareas', 'servicios', '', 'Vea las tareas de la empresa', ''),
(28, 'Mis Tareas', 'index.php?r=tareas/verMisTareas', 'servicios', 'mantenimientos', 'Ver las tareas asignadas a Ud.', ''),
(29, 'Ver Calendario', 'index.php?r=cal', 'configuracion', '', 'Ver el calendario personal.', 'images/iconos/famfam/calendar.png'),
(30, 'Facturas de Compra', 'index.php?r=facturasEntrantes', 'compras', 'comprobantes', 'Vea las facturas de compra realizadas.', 'images/iconos/famfam/script.png'),
(31, 'Ver Pagos', 'index.php?r=gastos', 'tesoreria', 'comprobantes', 'Muestra los pagos realizados.', 'images/iconos/famfam/money_delete.png'),
(32, 'Facturas de Venta', 'index.php?r=facturasSalientes', 'ventas', 'comprobantes', 'Vea las facturas de venta realizadas.', 'images/iconos/famfam/script.png'),
(33, 'Precios Asignados', 'index.php?r=stockPrecios', 'productos', 'archivo', 'Muestra los precios asignados.', 'images/iconos/famfam/money.png'),
(34, 'Presupuestos', 'index.php?r=presupuestos', 'ventas', 'presupuestos', 'Acción para visualizar todos los presupuestos.', 'images/iconos/famfam/layout.png'),
(35, 'Informe Morosos', 'index.php?r=balances/resumenMorosos', 'ventas', 'informes', 'Saque un resumen de todos los morosos de la empresa.', 'images/iconos/famfam/page.png'),
(36, 'Informe Ordenes de Trabajo', 'index.php?r=balances/resumenOrdenes', 'servicios', 'informes', 'Saque un resumen mediante un rango de fechas de las ordenes de trabajo realizadas, tiempos de finalizacion etc', 'images/iconos/famfam/page.png'),
(37, 'Informe de Deudas', 'index.php?r=balances/resumenDeudores', 'compras', 'informes', 'Resumen de TODOS los proveedores a los cuales se registra una deuda.', 'images/iconos/famfam/page.png'),
(38, 'Informe de Ventas', 'index.php?r=balances/informeVentas', 'ventas', 'informes', 'Resumen en el cual muestra todos los clientes a los cuales se registron ventas en un determinado rango de fechas.', 'images/iconos/famfam/page.png'),
(39, 'Informe Iva Compras/Ventas', 'index.php?r=impresiones/librosiva', 'compras', 'informes', 'Resumen en EXCEL de los movimientos efectuados en un determinado rango de fechas.', 'images/iconos/famfam/page.png'),
(40, 'Informe Contable', 'index.php?r=balances/facturacionContable', 'ventas', 'informes', 'Vea los movimientos de facturación realizados en un determinado rango de fechas y así poder calcular como por ejemplo el pago de IVA.', 'images/iconos/famfam/page.png'),
(41, 'Informe Saldo de Cliente', 'index.php?r=facturasSalientes/saldoClientes', 'ventas', 'informes', 'Saque el informe de saldo de un determinado cliente seleccionando un rango de fecha.', 'images/iconos/famfam/user.png'),
(42, 'Informe Saldo Ventas', 'index.php?r=facturasSalientes/saldoEmpresa', 'ventas', 'informes', 'Saque el informe de las ventas realizadas en un rango de fechas detallado por porcentajes de tipo de productos ', 'images/iconos/famfam/page.png'),
(43, 'Informe Saldo Compras', 'index.php?r=facturasEntrantes/saldoProveedores', 'compras', 'informes', 'Vea un detalle por rango de fechas en el que se emiten las salidas efectuadas.', 'images/iconos/famfam/page.png'),
(44, 'Informe Saldo Proveedor', 'index.php?r=facturasEntrantes/saldoProveedor', 'compras', 'informes', 'Vea un informe detallado de un proveedor en particular filtrando mediante un rango de fechas todas las entradas y salidas.', 'images/iconos/famfam/page.png'),
(45, 'Impresiones (guardadas)', 'index.php?r=impresiones', 'configuraciones', 'impresiones', 'Muestra las impresiones guardadas.', 'images/iconos/famfam/printer.png'),
(46, 'Nueva Impresion', 'index.php?r=impresiones/create', 'configuraciones', 'impresiones', 'Nueva Impresión de información (se pude utilizar como una anotación).', 'images/iconos/famfam/add.png'),
(47, 'Variables del sistema', 'index.php?r=settings', 'configuraciones', 'sistema', 'Vea (con posibilidad de cambio) las variables del sistema (impresiones, tiempos etc)', 'images/iconos/famfam/page_gear.png'),
(48, 'Ver Usuarios', 'index.php?r=usuarios', 'configuraciones', 'usuarios', 'Visualice los usuarios existentes sobre el sistema, permitiendo hacer altas y bajas.', 'images/iconos/famfam/user.png'),
(49, 'Nuevo Usuario', 'index.php?r=usuarios/create', 'configuraciones', 'usuarios', 'Acción para la creación de un nuevo usuario al sistema.', 'images/iconos/famfam/add.png'),
(50, 'Areas de Usuario', 'index.php?r=usuariosAreas', 'configuraciones', 'usuarios', 'Vea las áreas disponibles para los usuarios.', 'images/iconos/famfam/user.png'),
(51, 'Nueva Area de Usuario', 'index.php?r=usuariosAreas/create', 'configuraciones', 'usuarios', 'Crea una nueva Area la cual va a ser asignada lo/s usuario/s', 'images/iconos/famfam/add.png'),
(52, 'Tipo de Usuarios', 'index.php?r=usuariosTipoUsuarios', 'configuraciones', 'usuarios', 'Muesta los tipo de usuarios existentes.', 'images/iconos/famfam/user.png'),
(53, 'Nuevo Tipo de Usuario', 'index.php?r=usuariosTipoUsuarios/create', 'configuraciones', 'usuarios', 'Acción para crear un nuevo tipo de usuario.', 'images/iconos/famfam/add.png'),
(54, 'Nueva Configuracion', 'index.php?r=settings/create', 'configuraciones', 'sistema', 'Nueva configuración para el sistema (uso solamente para programadores).', 'images/iconos/famfam/add.png'),
(55, 'Actualizar Sistema', 'index.php?r=settings/actualizarSistema', 'configuraciones', 'sistema', 'Acción que permite tener el sistema siempre actualizado a su ultima versión. En caso de no existir actualización deja el sistema como esta.', 'images/iconos/famfam/page_gear.png'),
(56, 'Facturas Corrientes', 'index.php?r=facturasSalientesCorriente', 'ventas', 'comprobantes', 'Vea las facturas que se deben realizar periódicamente.', 'images/iconos/famfam/script.png'),
(57, 'Ver Acciones Disponibles', 'index.php?r=acciones', 'configuraciones', 'sistema', 'Vea todas las acciones disponibles.', 'images/iconos/famfam/page_gear.png'),
(58, 'Informe Clientes', 'index.php?r=impresiones/create&tipoImpresion=clientes', 'ventas', 'informes', 'Listado de clientes', 'images/iconos/famfam/user.png'),
(59, 'Informe Proveedores', 'index.php?r=impresiones/create&tipoImpresion=proveedores', 'compras', 'informes', 'Listado de Proveedores', 'images/iconos/famfam/user_gray.png'),
(60, 'Ver Cobros', 'index.php?r=pagos', 'tesoreria', 'comprobantes', 'Muestra los cobros realizados.', 'images/iconos/famfam/money_add.png'),
(61, 'Cheques Propios', 'index.php?r=cheques', 'tesoreria', 'cheques', 'Vea los cheques emitidos.', 'images/iconos/famfam/page_white_width.png'),
(62, 'Nuevo Cheque', 'index.php?r=cheques/create', 'tesoreria', 'cheques', 'Acción para crear un nuevo cheque.', 'images/iconos/famfam/add.png'),
(66, 'Informe Servicios', 'index.php?r=impresiones/create&tipoImpresion=servicios', 'servicios', 'informes', 'Informe de servicios', ''),
(65, 'Informe Stock', 'index.php?r=impresiones/create&tipoImpresion=stock', 'productos', 'informes', 'Informe de los productos.', ''),
(67, 'Nueva Condicion de Compra', 'index.php?r=condicionesCompra/create', 'compras', 'archivo', 'Cree una nueva condicion de compra', NULL),
(68, 'Condiciones de Compra', 'index.php?r=condicionesCompra', 'compras', 'archivo', 'Nueva forma para realizar el pago de una compra', NULL),
(69, 'Nueva Jurisdiccion', 'index.php?r=juridicciones/create', 'ventas', 'archivos', 'Ingresar nueva jurisdiccion', NULL),
(70, 'Ver Juridisiones', 'index.php?r=juridicciones/index', 'ventas', 'archivos', 'Listado de jurisdiccion', NULL),
(71, 'Nueva Clasificacion AFIP', 'index.php?r=clasificacionAfip/create', 'compras', 'archivos', 'Ingresar nueva Clasificacion', NULL),
(72, 'Ver Clasificacion AFIP', 'index.php?r=clasificacionAfip/index', 'compras', 'archivos', 'Listado de Clasificacion', NULL),
(73, 'Nueva Condicion de Venta', 'index.php?r=condicionesVenta/create', 'ventas', 'archivo', 'Ingresar nueva condicion de venta', NULL),
(74, 'Condiciones de Venta', 'index.php?r=condicionesVenta/index', 'ventas', 'archivo', 'Ver condiciones de venta', NULL),
(75, 'Nueva Condicion de venta Items', 'index.php?r=condicionesVentaItems/create', '', '', 'Ingresar nueva condicion de venta Items', NULL),
(76, 'Ver Condiciones de venta Items', 'index.php?r=condicionesVentaItems/index', '', '', 'Ver condiciones de venta Items', NULL),
(77, 'Nueva Orden de Cobro', 'index.php?r=ordenesCobro/create', 'ventas', 'comprobantes', 'Ingresar nueva orden de cobro', ''),
(78, 'Ver Ordenes de Cobro', 'index.php?r=ordenesCobro/index', 'ventas', 'comprobantes', 'Ver ordenes de cobro', ''),
(79, 'Ordenes de Pago', 'index.php?r=ordenesPago', 'compras', 'comprobantes', 'Vista de las ordenes de pago.', NULL),
(80, 'Nueva Orden de Pago', 'index.php?r=ordenesPago/create', 'compras', 'comprobantes', 'Nueva forma para realizar el pago de una compra', NULL);
";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111017_190210_nuevasAcciones does not support migration down.\n";
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