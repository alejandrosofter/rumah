SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


CREATE TABLE IF NOT EXISTS `acciones` (
  `idAccion` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `subTipo` varchar(255) NOT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  `padre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAccion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE IF NOT EXISTS `alertas` (
  `idAlerta` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `nivelAlerta` varchar(255) DEFAULT NULL,
  `tipoAlerta` varchar(255) DEFAULT NULL,
  `estadoAlerta` varchar(255) DEFAULT NULL,
  `fechaVencimiento` date DEFAULT NULL,
  `linkSolucion` text,
  `area` varchar(255) DEFAULT NULL,
  `fechaInicioAlerta` date DEFAULT NULL,
  `controlador` varchar(255) DEFAULT NULL,
  `idElemento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAlerta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=237 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas_usuario`
--

CREATE TABLE IF NOT EXISTS `alertas_usuario` (
  `idAlertaUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idAlerta` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAlertaUsuario`),
  KEY `idAlerta` (`idAlerta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authItemPanel`
--

CREATE TABLE IF NOT EXISTS `authItemPanel` (
  `rol` varchar(255) NOT NULL DEFAULT '',
  `panel` longtext,
  PRIMARY KEY (`rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrosCosto`
--

CREATE TABLE IF NOT EXISTS `centrosCosto` (
  `idCentroCosto` int(22) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`idCentroCosto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheques`
--

CREATE TABLE IF NOT EXISTS `cheques` (
  `idCheque` int(100) NOT NULL AUTO_INCREMENT,
  `fechaEmision` date NOT NULL,
  `fechaCobro` date NOT NULL,
  `idCliente` int(100) NOT NULL,
  `paguese` text NOT NULL,
  `importe` float NOT NULL,
  `esCruzado` tinyint(1) NOT NULL,
  `idCuenta` int(100) NOT NULL,
  `numeroCheque` int(100) NOT NULL,
  PRIMARY KEY (`idCheque`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheques_estados`
--

CREATE TABLE IF NOT EXISTS `cheques_estados` (
  `idEstadoCheque` int(100) NOT NULL AUTO_INCREMENT,
  `idCheque` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `nombreEstado` varchar(100) NOT NULL,
  PRIMARY KEY (`idEstadoCheque`),
  KEY `idCheque` (`idCheque`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierreCuentasEfectivo`
--

CREATE TABLE IF NOT EXISTS `cierreCuentasEfectivo` (
  `idCierreCuenta` int(30) NOT NULL AUTO_INCREMENT,
  `fechaCierreCuenta` date NOT NULL,
  `idCuentaEfectivo` int(3) NOT NULL,
  `importeDineroSistema` float NOT NULL,
  `importeDineroExistente` double NOT NULL,
  PRIMARY KEY (`idCierreCuenta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacionAfip`
--

CREATE TABLE IF NOT EXISTS `clasificacionAfip` (
  `idClasificacionAfip` int(11) NOT NULL AUTO_INCREMENT,
  `nombreClasificacionAfip` varchar(255) DEFAULT NULL,
  `codigoClasificacion` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idClasificacionAfip`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(30) NOT NULL AUTO_INCREMENT,
  `tipoCliente` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `apellido` varchar(30) NOT NULL DEFAULT '',
  `razonSocial` varchar(140) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `telefono` varchar(30) NOT NULL DEFAULT '',
  `celular` varchar(30) NOT NULL DEFAULT '',
  `nombreFantasia` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `cuit` varchar(30) NOT NULL DEFAULT '',
  `condicionIva` varchar(100) NOT NULL,
  `condicionVenta` varchar(255) NOT NULL,
  `codCliente` varchar(200) NOT NULL,
  `idJuridiccion` varchar(200) NOT NULL,
  `localidad` varchar(200) NOT NULL,
  `limiteCredito` varchar(200) NOT NULL,
  `fechaAlta` date NOT NULL,
  `nro` varchar(79) NOT NULL,
  `letraHabitual` varchar(2) NOT NULL,
  `nombresContactoFinanzas` varchar(255) DEFAULT NULL,
  `emailContactoFinanzas` varchar(255) DEFAULT NULL,
  `mobilContactoFinanzas` varchar(255) DEFAULT NULL,
  `nombresContactoMantenimiento` varchar(255) DEFAULT NULL,
  `emailContactoMantenimiento` varchar(255) DEFAULT NULL,
  `mobilContactoMantenimiento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=723 ;

--
-- (Evento) desencadenante `clientes`
--
DROP TRIGGER IF EXISTS `clientes_ingresa`;
DELIMITER //
CREATE TRIGGER `clientes_ingresa` AFTER INSERT ON `clientes`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','clientes',NEW.idCliente )
//
DELIMITER ;
DROP TRIGGER IF EXISTS `clientes_modifica`;
DELIMITER //
CREATE TRIGGER `clientes_modifica` AFTER UPDATE ON `clientes`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'update','clientes',NEW.idCliente )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosFicha`
--

CREATE TABLE IF NOT EXISTS `comentariosFicha` (
  `idComentarioFicha` int(10) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `idTipo` int(50) NOT NULL,
  `fechaComentario` date NOT NULL,
  `detalleComentario` text NOT NULL,
  `idUsuario` int(5) NOT NULL,
  PRIMARY KEY (`idComentarioFicha`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `idCompra` int(100) NOT NULL AUTO_INCREMENT,
  `fechaCompra` date NOT NULL,
  `idFacturaEntrante` int(50) NOT NULL,
  `descripcionCompra` text NOT NULL,
  `importeDolar` float NOT NULL,
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_items`
--

CREATE TABLE IF NOT EXISTS `compras_items` (
  `idCompraItem` int(100) NOT NULL AUTO_INCREMENT,
  `idFacturaEntrante` int(100) NOT NULL,
  `idStock` int(100) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `alicuotaIva` float NOT NULL,
  `importeCompra` float NOT NULL,
  `importeDolarCompra` float NOT NULL,
  `stockeado` int(1) NOT NULL,
  PRIMARY KEY (`idCompraItem`),
  KEY `idCompra` (`idFacturaEntrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=341 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE IF NOT EXISTS `conceptos` (
  `idConcepto` int(100) NOT NULL AUTO_INCREMENT,
  `nombreConcepto` text NOT NULL,
  `idCuentaContable` int(100) NOT NULL,
  `codigoConcepto` varchar(50) NOT NULL,
  PRIMARY KEY (`idConcepto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionesCompra`
--

CREATE TABLE IF NOT EXISTS `condicionesCompra` (
  `idCondicionCompra` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `generaFacturaCredito` float DEFAULT NULL,
  `porcentajeTotalFacturado` float DEFAULT NULL,
  `cantidadCuotas` int(11) DEFAULT NULL,
  `aVencerEnDias` int(11) DEFAULT NULL,
  `cantidadDiasMeses` int(11) DEFAULT NULL,
  `unidadCantidad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCondicionCompra`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionesCompra_items`
--

CREATE TABLE IF NOT EXISTS `condicionesCompra_items` (
  `idCondicionCompraItem` int(11) NOT NULL AUTO_INCREMENT,
  `idCondicionCompra` int(11) DEFAULT NULL,
  `porcentajeTotalFacturado` float DEFAULT NULL,
  `cantidadCuotas` int(11) DEFAULT NULL,
  `aVencerEnDias` int(11) DEFAULT NULL,
  `cantidadDiasMeses` int(11) DEFAULT NULL,
  `unidadCantidad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCondicionCompraItem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionesVenta`
--

CREATE TABLE IF NOT EXISTS `condicionesVenta` (
  `idCondicionVenta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionVenta` varchar(255) DEFAULT NULL,
  `generaFacturaCredito` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCondicionVenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionesVentaItems`
--

CREATE TABLE IF NOT EXISTS `condicionesVentaItems` (
  `idCondicionVentaItem` int(11) NOT NULL AUTO_INCREMENT,
  `idCondicionVenta` int(11) DEFAULT NULL,
  `porcentajeTotalFacturado` float DEFAULT NULL,
  `cantidadCuotas` int(11) DEFAULT NULL,
  `aVencerEnDias` int(11) DEFAULT NULL,
  `CantidadDiasMesesCuotas` int(11) DEFAULT NULL,
  `porcentajeInteres` float DEFAULT NULL,
  `fechaVencimiento` date DEFAULT NULL,
  `calculo` varchar(255) DEFAULT NULL,
  `letraDiaMes` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`idCondicionVentaItem`),
  KEY `idCondicionVenta` (`idCondicionVenta`),
  KEY `idCondicionVenta_2` (`idCondicionVenta`),
  KEY `idCondicionVenta_3` (`idCondicionVenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crons`
--

CREATE TABLE IF NOT EXISTS `crons` (
  `idCron` int(11) NOT NULL AUTO_INCREMENT,
  `minutos` varchar(255) DEFAULT NULL,
  `horas` text,
  `dias` varchar(255) DEFAULT NULL,
  `meses` varchar(255) DEFAULT NULL,
  `diasSemana` varchar(255) DEFAULT NULL,
  `script` varchar(255) DEFAULT NULL,
  `parametros` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCron`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `idCuenta` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `idCentroCosto` int(10) NOT NULL,
  PRIMARY KEY (`idCuenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentasEfectivo`
--

CREATE TABLE IF NOT EXISTS `cuentasEfectivo` (
  `idCuentaEfectivo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `acuerdo` float NOT NULL,
  PRIMARY KEY (`idCuentaEfectivo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentasVenta`
--

CREATE TABLE IF NOT EXISTS `cuentasVenta` (
  `idCuentaVenta` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `otro` varchar(255) NOT NULL,
  PRIMARY KEY (`idCuentaVenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosRecepcion`
--

CREATE TABLE IF NOT EXISTS `estadosRecepcion` (
  `idEstadoRecepcion` int(20) NOT NULL AUTO_INCREMENT,
  `idRecepcion` int(20) NOT NULL,
  `fechaEstadoRecepcion` date NOT NULL,
  `descripcionEstadoRecepcion` text NOT NULL,
  `idUsuarioEstado` int(2) NOT NULL,
  `estadoEstadoRecepcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idEstadoRecepcion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=304 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `allDay` smallint(5) unsigned NOT NULL DEFAULT '0',
  `start` int(10) unsigned DEFAULT NULL,
  `end` int(10) unsigned DEFAULT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

--
-- (Evento) desencadenante `events`
--
DROP TRIGGER IF EXISTS `events_ingresa`;
DELIMITER //
CREATE TRIGGER `events_ingresa` AFTER INSERT ON `events`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','events',NEW.id )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events_helper`
--

CREATE TABLE IF NOT EXISTS `events_helper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events_user_preference`
--

CREATE TABLE IF NOT EXISTS `events_user_preference` (
  `user_id` int(10) unsigned NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `mobile_alert` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(40) DEFAULT NULL,
  `email_alert` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasEntrantes`
--

CREATE TABLE IF NOT EXISTS `facturasEntrantes` (
  `idFacturaEntrante` int(8) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(9) NOT NULL,
  `fecha` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `numeroFactura` varchar(40) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(29) NOT NULL,
  `tipoFactura` varchar(20) NOT NULL,
  `idCentroCosto` int(22) NOT NULL,
  `iva21` float NOT NULL,
  `iva105` float NOT NULL,
  `esCorriente` tinyint(1) NOT NULL,
  `condicion` varchar(100) NOT NULL,
  `condicionIva` varchar(100) NOT NULL,
  `idCondicionCompra` int(11) DEFAULT NULL,
  `importeDescuentos` float NOT NULL DEFAULT '0',
  `importeFlete` float NOT NULL DEFAULT '0',
  `importeRecargos` float NOT NULL DEFAULT '0',
  `importeImpuestos` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idFacturaEntrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1164 ;

--
-- (Evento) desencadenante `facturasEntrantes`
--
DROP TRIGGER IF EXISTS `facturasEntrantes_ingresa`;
DELIMITER //
CREATE TRIGGER `facturasEntrantes_ingresa` AFTER INSERT ON `facturasEntrantes`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','facturasEntrantes',NEW.idFacturaEntrante )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasEntrantesCorriente`
--

CREATE TABLE IF NOT EXISTS `facturasEntrantesCorriente` (
  `idFacturaEntranteCorriente` int(50) NOT NULL AUTO_INCREMENT,
  `idFacturaEntrante` int(100) NOT NULL,
  `periodicidad` int(100) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `estadoFactura` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`idFacturaEntranteCorriente`),
  KEY `idFacturaEntrante` (`idFacturaEntrante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasEntrantes_concepto`
--

CREATE TABLE IF NOT EXISTS `facturasEntrantes_concepto` (
  `idFacturaConcepto` int(100) NOT NULL AUTO_INCREMENT,
  `idFacturaEntrante` int(100) NOT NULL,
  `idConcepto` int(100) NOT NULL,
  `importe` float NOT NULL,
  `alicuotaIva` float NOT NULL,
  PRIMARY KEY (`idFacturaConcepto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasEntrantes_vencimientos`
--

CREATE TABLE IF NOT EXISTS `facturasEntrantes_vencimientos` (
  `idFacturaVencimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idFacturaEntrante` int(11) DEFAULT NULL,
  `fechaVencimiento` date DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `importe` float DEFAULT NULL,
  PRIMARY KEY (`idFacturaVencimiento`),
  KEY `idFacturaEntrante` (`idFacturaEntrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=259 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasOrdenesTrabajo`
--

CREATE TABLE IF NOT EXISTS `facturasOrdenesTrabajo` (
  `idFacturaOrden` int(100) NOT NULL AUTO_INCREMENT,
  `idFacturaSaliente` int(100) NOT NULL,
  `idOrdenTrabajo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idFacturaOrden`),
  KEY `idFacturaSaliente` (`idFacturaSaliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasSalientes`
--

CREATE TABLE IF NOT EXISTS `facturasSalientes` (
  `idFacturaSaliente` int(8) NOT NULL AUTO_INCREMENT,
  `idCliente` int(8) NOT NULL,
  `fecha` date NOT NULL,
  `numeroFactura` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(20) NOT NULL,
  `tipoFactura` varchar(15) NOT NULL,
  `idCentroCosto` int(1) NOT NULL,
  `fechaEstimadaCobro` date NOT NULL,
  `esCorriente` tinyint(1) NOT NULL,
  `idCondicionVenta` int(11) DEFAULT NULL,
  `bonificacion` float DEFAULT NULL,
  `idListaPrecios` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFacturaSaliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1916 ;

--
-- (Evento) desencadenante `facturasSalientes`
--
DROP TRIGGER IF EXISTS `facturasSalientes_ingresa`;
DELIMITER //
CREATE TRIGGER `facturasSalientes_ingresa` AFTER INSERT ON `facturasSalientes`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','facturasSalientes',NEW.idFacturaSaliente )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasSalientesCorriente`
--

CREATE TABLE IF NOT EXISTS `facturasSalientesCorriente` (
  `idFacturaSalienteCorriente` int(50) NOT NULL AUTO_INCREMENT,
  `idFacturaSaliente` int(100) NOT NULL,
  `periodicidad` int(100) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `estadoFactura` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`idFacturaSalienteCorriente`),
  KEY `idFacturaSaliente` (`idFacturaSaliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- (Evento) desencadenante `facturasSalientesCorriente`
--
DROP TRIGGER IF EXISTS `facturasSalientesCorriente_ingresa`;
DELIMITER //
CREATE TRIGGER `facturasSalientesCorriente_ingresa` AFTER INSERT ON `facturasSalientesCorriente`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','facturasSalientesCorriente',NEW.idFacturaSalienteCorriente )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasSalientesVencimiento`
--

CREATE TABLE IF NOT EXISTS `facturasSalientesVencimiento` (
  `idFacturaVencimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idFacturaSaliente` int(11) DEFAULT NULL,
  `fechaVencimiento` date DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `importeFacturaSaliente` float DEFAULT NULL,
  PRIMARY KEY (`idFacturaVencimiento`),
  KEY `idFacturaSaliente` (`idFacturaSaliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE IF NOT EXISTS `gastos` (
  `idGasto` int(10) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(5) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `detalle` text NOT NULL,
  `importe` float NOT NULL,
  `formaPago` varchar(20) NOT NULL,
  `idCuentaEfectivo` int(2) NOT NULL,
  PRIMARY KEY (`idGasto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=985 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastosfijos`
--

CREATE TABLE IF NOT EXISTS `gastosfijos` (
  `idGastoFijo` int(7) NOT NULL AUTO_INCREMENT,
  `importe` float DEFAULT NULL,
  `detalle` text,
  `idProveedor` int(7) DEFAULT NULL,
  `periodicidadMeses` int(3) DEFAULT NULL,
  `esVariable` int(1) DEFAULT NULL,
  `numeroDiaVence` int(2) DEFAULT NULL,
  `fechaComienzo` date DEFAULT NULL,
  PRIMARY KEY (`idGastoFijo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_factura`
--

CREATE TABLE IF NOT EXISTS `gastos_factura` (
  `idGastoFactura` int(50) NOT NULL AUTO_INCREMENT,
  `idGasto` int(100) NOT NULL,
  `idFacturaSaliente` int(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`idGastoFactura`),
  KEY `idFacturaSaliente` (`idFacturaSaliente`),
  KEY `idGasto` (`idGasto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=974 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

CREATE TABLE IF NOT EXISTS `impresiones` (
  `idImpresion` int(255) NOT NULL AUTO_INCREMENT,
  `idTipoImpresion` int(100) NOT NULL,
  `tipoImpresion` varchar(255) NOT NULL,
  `fechaImpresion` date NOT NULL,
  `textoImpresion` text NOT NULL,
  `fechaLastModifico` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idImpresion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE IF NOT EXISTS `inventarios` (
  `idInventario` int(50) NOT NULL AUTO_INCREMENT,
  `fechaInventario` date NOT NULL,
  `descripcionInventario` text NOT NULL,
  `esPredeterminado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idInventario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- (Evento) desencadenante `inventarios`
--
DROP TRIGGER IF EXISTS `inventarios_ingresa`;
DELIMITER //
CREATE TRIGGER `inventarios_ingresa` AFTER INSERT ON `inventarios`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','inventarios',NEW.idInventario )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios_productos`
--

CREATE TABLE IF NOT EXISTS `inventarios_productos` (
  `idInventarioProducto` int(50) NOT NULL AUTO_INCREMENT,
  `idInventario` int(50) NOT NULL,
  `fechaProductoInventario` date NOT NULL,
  `idStockInventario` int(50) NOT NULL,
  `cantidadInventario` int(50) NOT NULL,
  PRIMARY KEY (`idInventarioProducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=289 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemsFacturaSaliente`
--

CREATE TABLE IF NOT EXISTS `itemsFacturaSaliente` (
  `idItemsFacturaSaliente` int(8) NOT NULL AUTO_INCREMENT,
  `idFacturaSaliente` int(8) NOT NULL,
  `idElemento` int(8) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `nombreItem` varchar(500) NOT NULL,
  `importeItem` float NOT NULL,
  `porcentajeIva` varchar(5) NOT NULL,
  `tipoImporte` varchar(50) NOT NULL,
  `importeItemLista` float DEFAULT NULL,
  `importeItemMinimo` float DEFAULT NULL,
  PRIMARY KEY (`idItemsFacturaSaliente`),
  KEY `idFacturaSaliente` (`idFacturaSaliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1951 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemsPedido`
--

CREATE TABLE IF NOT EXISTS `itemsPedido` (
  `idItemPedido` int(20) NOT NULL AUTO_INCREMENT,
  `nombreItem` varchar(255) NOT NULL,
  `precioCompra` float NOT NULL,
  `porecentajeIva` float NOT NULL,
  `idStock` int(20) NOT NULL,
  `idPedido` int(20) NOT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`idItemPedido`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juridicciones`
--

CREATE TABLE IF NOT EXISTS `juridicciones` (
  `idJuridiccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreJuridiccion` varchar(255) NOT NULL,
  `codigoJuridiccion` varchar(255) NOT NULL,
  PRIMARY KEY (`idJuridiccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(128) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL,
  `logtime` int(11) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientosEmpresas`
--

CREATE TABLE IF NOT EXISTS `mantenimientosEmpresas` (
  `idMantenimientoEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `idClienteEmpresa` int(15) NOT NULL,
  `fechaInicioEmpresa` date NOT NULL,
  `estadoMatenimiento` varchar(100) NOT NULL,
  `cantidadVisitasMensuales` int(2) NOT NULL,
  `datosRelevantes` text NOT NULL,
  `tipoMantenimiento` varchar(100) NOT NULL,
  PRIMARY KEY (`idMantenimientoEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientosEmpresas_visitasRutina`
--

CREATE TABLE IF NOT EXISTS `mantenimientosEmpresas_visitasRutina` (
  `idMantenimientoEmpresaVisitaRutina` int(11) NOT NULL AUTO_INCREMENT,
  `idMantenimientoEmpresa` int(11) NOT NULL,
  `semana` int(11) NOT NULL COMMENT 'semana del 1 al 4',
  `nombreDia` varchar(50) NOT NULL COMMENT 'de lunes a domingo',
  `idDia` int(11) NOT NULL COMMENT '1 a 7',
  `hora` time NOT NULL,
  `divisorSemana` int(11) NOT NULL COMMENT 'para avanzado',
  `horaIngreso` time NOT NULL,
  `horaSalida` time NOT NULL,
  `comentarioVisita` varchar(255) NOT NULL,
  PRIMARY KEY (`idMantenimientoEmpresaVisitaRutina`),
  KEY `idMantenimientoEmpresa` (`idMantenimientoEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos_rutina`
--

CREATE TABLE IF NOT EXISTS `mantenimientos_rutina` (
  `idMantenimientoRutina` int(11) NOT NULL AUTO_INCREMENT,
  `idMantenimientoEmpresa` int(11) NOT NULL,
  `idRutina` int(11) NOT NULL,
  `comentario` int(11) NOT NULL,
  PRIMARY KEY (`idMantenimientoRutina`),
  KEY `idMantenimientoEmpresa` (`idMantenimientoEmpresa`),
  KEY `idRutina` (`idRutina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `idMensaje` int(11) NOT NULL AUTO_INCREMENT,
  `cuerpoMensaje` longtext,
  `tituloMensaje` varchar(255) DEFAULT NULL,
  `tipoMensaje` varchar(255) DEFAULT NULL,
  `fechaMensaje` datetime DEFAULT NULL,
  `destinatario` varchar(255) DEFAULT NULL,
  `remitente` varchar(255) DEFAULT NULL,
  `idReferencia` int(11) DEFAULT NULL,
  `stausMail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idMensaje`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=937 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE IF NOT EXISTS `movimientos` (
  `idMovimiento` int(9) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(8) NOT NULL,
  `fecha` date NOT NULL,
  `tipoMovimiento` varchar(30) NOT NULL,
  `tabla` varchar(30) NOT NULL,
  `idElemento` int(8) NOT NULL,
  PRIMARY KEY (`idMovimiento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1181 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesCobro`
--

CREATE TABLE IF NOT EXISTS `ordenesCobro` (
  `idOrdenCobro` int(11) NOT NULL AUTO_INCREMENT,
  `fechaOrdenCobro` date DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `importeAcuenta` float DEFAULT NULL,
  PRIMARY KEY (`idOrdenCobro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- (Evento) desencadenante `ordenesCobro`
--
DROP TRIGGER IF EXISTS `ordenesCobro_ingresa`;
DELIMITER //
CREATE TRIGGER `ordenesCobro_ingresa` AFTER INSERT ON `ordenesCobro`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','ordenesCobro',NEW.idOrdenCobro )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesCobroFacturas`
--

CREATE TABLE IF NOT EXISTS `ordenesCobroFacturas` (
  `idOrdenCobroFacturas` int(11) NOT NULL AUTO_INCREMENT,
  `idOrdenCobro` int(11) DEFAULT NULL,
  `idFacturaSaliente` int(11) DEFAULT NULL,
  `idFacturaVencimiento` int(11) DEFAULT NULL,
  `importeCobroFactura` float DEFAULT NULL,
  PRIMARY KEY (`idOrdenCobroFacturas`),
  KEY `idOrdenCobro` (`idOrdenCobro`),
  KEY `idFacturaVencimiento` (`idFacturaVencimiento`),
  KEY `idFacturaVencimiento_2` (`idFacturaVencimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesPago`
--

CREATE TABLE IF NOT EXISTS `ordenesPago` (
  `idOrdenPago` int(11) NOT NULL AUTO_INCREMENT,
  `fechaOrden` date DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `pagoAcuenta` float DEFAULT NULL,
  PRIMARY KEY (`idOrdenPago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesPago_vencimientos`
--

CREATE TABLE IF NOT EXISTS `ordenesPago_vencimientos` (
  `idOrdenPagoVencimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idFacturaEntrante` int(11) DEFAULT NULL,
  `idFacturaEntranteVencimiento` int(11) DEFAULT NULL,
  `importe` float DEFAULT NULL,
  `idOrdenPago` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOrdenPagoVencimiento`),
  KEY `idOrdenPago` (`idOrdenPago`),
  KEY `idFacturaEntrante` (`idFacturaEntrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesTrabajo`
--

CREATE TABLE IF NOT EXISTS `ordenesTrabajo` (
  `idOrdenTrabajo` int(8) NOT NULL AUTO_INCREMENT,
  `idCliente` int(8) NOT NULL,
  `descripcionCliente` text NOT NULL,
  `descripcionEncargado` text NOT NULL,
  `estadoOrden` varchar(20) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `tipoOrden` varchar(20) NOT NULL,
  `observaciones` text NOT NULL,
  PRIMARY KEY (`idOrdenTrabajo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1524 ;

--
-- (Evento) desencadenante `ordenesTrabajo`
--
DROP TRIGGER IF EXISTS `ordenes_ingresa`;
DELIMITER //
CREATE TRIGGER `ordenes_ingresa` AFTER INSERT ON `ordenesTrabajo`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, DATE_ADD(NOW(),INTERVAL 2 DAY) , 'insert','ordenesTrabajo',NEW.idOrdenTrabajo )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesTrabajo_coordinaciones`
--

CREATE TABLE IF NOT EXISTS `ordenesTrabajo_coordinaciones` (
  `idOrdenesCoordinaciones` int(11) NOT NULL AUTO_INCREMENT,
  `idOrdenes` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idCalendario` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  PRIMARY KEY (`idOrdenesCoordinaciones`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesTrabajo_estados`
--

CREATE TABLE IF NOT EXISTS `ordenesTrabajo_estados` (
  `idEstadoOrden` int(10) NOT NULL AUTO_INCREMENT,
  `fechaEstado` date NOT NULL,
  `idUsuario` int(5) NOT NULL,
  `idOrdenTrabajo` int(7) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `detalleEstado` text NOT NULL,
  PRIMARY KEY (`idEstadoOrden`),
  KEY `idOrdenTrabajo` (`idOrdenTrabajo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2697 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `idPago` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `detalle` varchar(100) NOT NULL DEFAULT '',
  `idCliente` int(20) NOT NULL DEFAULT '0',
  `importeDinero` float NOT NULL,
  `formaPago` varchar(20) NOT NULL,
  `idCuentaEfectivo` int(2) NOT NULL,
  PRIMARY KEY (`idPago`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1690 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosFactura`
--

CREATE TABLE IF NOT EXISTS `pagosFactura` (
  `idPagoFactura` int(10) NOT NULL AUTO_INCREMENT,
  `idFacturaSaliente` int(10) NOT NULL,
  `idPago` int(10) NOT NULL,
  `estadoPagoFactura` varchar(255) NOT NULL,
  PRIMARY KEY (`idPagoFactura`),
  KEY `idFacturaSaliente` (`idFacturaSaliente`),
  KEY `idPago` (`idPago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1658 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(10) NOT NULL AUTO_INCREMENT,
  `idFacturaSaliente` int(10) NOT NULL,
  `fechaPedido` date NOT NULL,
  `comentarioPedido` text NOT NULL,
  `datos` text NOT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestoItems`
--

CREATE TABLE IF NOT EXISTS `presupuestoItems` (
  `idItemPresupuesto` int(11) NOT NULL AUTO_INCREMENT,
  `idPresupuesto` int(20) NOT NULL,
  `idStock` int(40) NOT NULL,
  `precioVenta` float NOT NULL,
  `nombreStock` varchar(180) NOT NULL,
  `cantidadItems` int(10) NOT NULL,
  `porcentajeIva` float NOT NULL,
  `tipoImporte` varchar(80) NOT NULL,
  `importeItemLista` float NOT NULL,
  `importeItemSinIva` float NOT NULL,
  `importeItemMinimo` float NOT NULL,
  `bonificado` float DEFAULT NULL,
  `idCondicionVenta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idItemPresupuesto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE IF NOT EXISTS `presupuestos` (
  `idPresupuesto` int(20) NOT NULL AUTO_INCREMENT,
  `fechaPresupuesto` date NOT NULL,
  `descripcionPresupuesto` text NOT NULL,
  `asuntoPresupuesto` varchar(180) NOT NULL,
  `idClientePresupuesto` int(20) NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `precioEspecial` int(1) NOT NULL,
  `formaPago` varchar(255) NOT NULL,
  `fechaentrega` date NOT NULL,
  `porcentajeIva` varchar(100) NOT NULL,
  `estado` varchar(80) NOT NULL,
  `tipoPresupuesto` varchar(255) NOT NULL,
  PRIMARY KEY (`idPresupuesto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- (Evento) desencadenante `presupuestos`
--
DROP TRIGGER IF EXISTS `presupuestos_ingresa`;
DELIMITER //
CREATE TRIGGER `presupuestos_ingresa` AFTER INSERT ON `presupuestos`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','presupuestos',NEW.idPresupuesto )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos_ordenesTrabajo`
--

CREATE TABLE IF NOT EXISTS `presupuestos_ordenesTrabajo` (
  `idPresupuestoOrden` int(100) NOT NULL AUTO_INCREMENT,
  `idPresupuesto` int(100) NOT NULL,
  `idOrdenTrabajo` int(100) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idPresupuestoOrden`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `idProveedor` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `rubro` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `direccion` varchar(30) NOT NULL DEFAULT '',
  `telefono` varchar(30) NOT NULL DEFAULT '',
  `celular` varchar(30) NOT NULL DEFAULT '',
  `cuit` varchar(30) NOT NULL DEFAULT '',
  `idCuenta` int(2) NOT NULL,
  `condicionIva` varchar(255) DEFAULT NULL,
  `idClasificacionAfip` varchar(255) DEFAULT NULL,
  `idJuridiccion` int(11) DEFAULT NULL,
  `localidad` varchar(255) DEFAULT NULL,
  `nro` varchar(255) DEFAULT NULL,
  `codigoProveedor` varchar(255) DEFAULT NULL,
  `letraHabitual` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- (Evento) desencadenante `proveedores`
--
DROP TRIGGER IF EXISTS `proveedores_ingresa`;
DELIMITER //
CREATE TRIGGER `proveedores_ingresa` AFTER INSERT ON `proveedores`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','proveedores',NEW.idProveedor )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_rubros`
--

CREATE TABLE IF NOT EXISTS `proveedores_rubros` (
  `idProveedor_rubro` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `idCuenta` int(10) NOT NULL,
  PRIMARY KEY (`idProveedor_rubro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoVenta`
--

CREATE TABLE IF NOT EXISTS `puntoVenta` (
  `idPuntoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePuntoVenta` varchar(255) NOT NULL,
  `descripcionPuntoVenta` varchar(255) DEFAULT NULL,
  `electronica` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPuntoVenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

CREATE TABLE IF NOT EXISTS `recepcion` (
  `idRecepcion` int(20) NOT NULL AUTO_INCREMENT,
  `idCliente` int(20) NOT NULL,
  `descripcionRecepcion` text NOT NULL,
  `fechaRecepcion` date NOT NULL,
  `tipoRecepcion` varchar(100) NOT NULL,
  `idRecepcionPadre` int(10) NOT NULL,
  `estadoRecepcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idRecepcion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=173 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE IF NOT EXISTS `rutinas` (
  `idRutina` int(11) NOT NULL AUTO_INCREMENT,
  `semana` int(11) NOT NULL,
  `nombreDia` varchar(50) NOT NULL,
  `idDia` int(11) NOT NULL,
  `hora` time NOT NULL,
  `divisorSemana` int(11) NOT NULL COMMENT 'avanzado divide y obtiene modulo semana',
  `horaIngreso` time NOT NULL,
  `horaSalida` time NOT NULL,
  `comentarioRutina` varchar(255) NOT NULL,
  PRIMARY KEY (`idRutina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE IF NOT EXISTS `sesiones` (
  `idSesion` int(100) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(50) NOT NULL,
  `fechaIngresa` int(50) NOT NULL,
  `fechaEgresa` int(50) NOT NULL,
  PRIMARY KEY (`idSesion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  `descripcion` longtext,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=187 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `idStock` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `tipoProducto` varchar(255) NOT NULL DEFAULT '',
  `detalle` text NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT '0',
  `idTipoProducto` varchar(30) DEFAULT NULL,
  `codigoBarra` varchar(60) NOT NULL,
  `porcentajeIva` float NOT NULL,
  `min` int(3) NOT NULL,
  `max` int(3) NOT NULL,
  `idCuenta` int(5) NOT NULL,
  `idStockMarca` int(11) NOT NULL,
  `codigoProducto` varchar(255) DEFAULT NULL,
  `unidadMedida` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idStock`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=379 ;

--
-- (Evento) desencadenante `stock`
--
DROP TRIGGER IF EXISTS `stock_ingresa`;
DELIMITER //
CREATE TRIGGER `stock_ingresa` AFTER INSERT ON `stock`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','stock',NEW.idStock )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_disponible`
--

CREATE TABLE IF NOT EXISTS `stock_disponible` (
  `idStockDisponible` int(11) NOT NULL AUTO_INCREMENT,
  `idStock` int(11) NOT NULL,
  `cantidadDisponible` int(11) NOT NULL,
  `auxiliarStock` int(11) NOT NULL,
  `auxiliarDisponible` int(11) NOT NULL,
  PRIMARY KEY (`idStockDisponible`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=867 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_marcas`
--

CREATE TABLE IF NOT EXISTS `stock_marcas` (
  `idStockMarcas` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMarca` varchar(255) NOT NULL,
  `adicionalNumeroMarca` int(11) DEFAULT NULL,
  `adicionalCadenaMarca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idStockMarcas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_precios`
--

CREATE TABLE IF NOT EXISTS `stock_precios` (
  `idStockPrecio` int(50) NOT NULL AUTO_INCREMENT,
  `fechaStock` date NOT NULL,
  `enServicios` tinyint(1) NOT NULL,
  `tipo` varchar(255) NOT NULL COMMENT 'puede ser inventario o compra',
  `idTipo` int(50) NOT NULL COMMENT 'dependiendo del tipo',
  `porcentajeVariacion` int(3) NOT NULL,
  `idElemento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idStockPrecio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_precios_items`
--

CREATE TABLE IF NOT EXISTS `stock_precios_items` (
  `idStockPrecioStock` int(50) NOT NULL AUTO_INCREMENT,
  `idStockPrecio` int(50) NOT NULL,
  `idStock` int(100) NOT NULL,
  `importePesosStock` float NOT NULL,
  `importeDolarStock` float NOT NULL,
  `importePesosStockMin` float NOT NULL,
  PRIMARY KEY (`idStockPrecioStock`),
  KEY `idStockPrecio` (`idStockPrecio`),
  KEY `idStockPrecio_2` (`idStockPrecio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1439 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_tipoProducto`
--

CREATE TABLE IF NOT EXISTS `stock_tipoProducto` (
  `idStockTipo` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `porcentajeGananciaLista` int(3) NOT NULL,
  `porcentajeGananciaMin` int(3) NOT NULL,
  PRIMARY KEY (`idStockTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talonario`
--

CREATE TABLE IF NOT EXISTS `talonario` (
  `idTalonario` int(11) NOT NULL AUTO_INCREMENT,
  `idPuntoVenta` int(8) NOT NULL,
  `desdeNumero` varchar(8) DEFAULT NULL,
  `hastaNumero` varchar(8) DEFAULT NULL,
  `proximo` varchar(8) DEFAULT NULL,
  `letraTalonario` varchar(255) DEFAULT NULL,
  `tipoTalonario` varchar(255) DEFAULT NULL,
  `numeroSerie` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`idTalonario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `idTarea` int(50) NOT NULL AUTO_INCREMENT,
  `fechaTarea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prioridadTarea` varchar(50) NOT NULL,
  `estadoTarea` varchar(50) NOT NULL,
  `descripcionTarea` text NOT NULL,
  `tipoTarea` varchar(50) NOT NULL,
  `idClienteTarea` int(10) NOT NULL,
  `visitaRutina` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idTarea`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1119 ;

--
-- (Evento) desencadenante `tareas`
--
DROP TRIGGER IF EXISTS `tareas_ingresa`;
DELIMITER //
CREATE TRIGGER `tareas_ingresa` AFTER INSERT ON `tareas`
 FOR EACH ROW INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','tareas',NEW.idTarea )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_coordinaciones`
--

CREATE TABLE IF NOT EXISTS `tareas_coordinaciones` (
  `idTareasCoordinaciones` int(11) NOT NULL AUTO_INCREMENT,
  `idTarea` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idCalendario` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  PRIMARY KEY (`idTareasCoordinaciones`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_destinatarios`
--

CREATE TABLE IF NOT EXISTS `tareas_destinatarios` (
  `idTareaDestinantario` int(50) NOT NULL AUTO_INCREMENT,
  `idTarea` int(50) NOT NULL,
  `idUsuario` int(50) NOT NULL,
  `notificarArea` tinyint(1) NOT NULL,
  `idUsuarioEmisor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTareaDestinantario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=950 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_estados`
--

CREATE TABLE IF NOT EXISTS `tareas_estados` (
  `idTareaEstado` int(50) NOT NULL AUTO_INCREMENT,
  `idTarea` int(50) NOT NULL,
  `fechaEstadoTarea` date NOT NULL,
  `detalleEstadoTarea` text NOT NULL,
  `nombreEstado` varchar(255) NOT NULL,
  PRIMARY KEY (`idTareaEstado`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=585 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_audit_trail`
--

CREATE TABLE IF NOT EXISTS `tbl_audit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `old_value` text,
  `new_value` text,
  `action` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `stamp` datetime DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `model_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_audit_trail_user_id` (`user_id`),
  KEY `idx_audit_trail_model_id` (`model_id`),
  KEY `idx_audit_trail_model` (`model`),
  KEY `idx_audit_trail_field` (`field`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17655 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `usuario_` varchar(30) NOT NULL DEFAULT '',
  `clave_` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(80) DEFAULT NULL,
  `rutaImagen` text,
  `idTipoUsuario` int(10) NOT NULL,
  `idAreaUsuario` int(10) NOT NULL,
  `panelDeControl` longtext,
  `anotador` longtext,
  `mobil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_areas`
--

CREATE TABLE IF NOT EXISTS `usuarios_areas` (
  `idUsuarioArea` int(55) NOT NULL AUTO_INCREMENT,
  `nombreArea` varchar(255) NOT NULL,
  `centroCosto` int(2) NOT NULL,
  PRIMARY KEY (`idUsuarioArea`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipoUsuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios_tipoUsuarios` (
  `idUsuarioTipo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`idUsuarioTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorMoneda`
--

CREATE TABLE IF NOT EXISTS `valorMoneda` (
  `idValorMoneda` int(10) NOT NULL AUTO_INCREMENT,
  `idTipoMoneda` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `valorCompra` float NOT NULL,
  `valorVenta` float NOT NULL,
  PRIMARY KEY (`idValorMoneda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorMoneda_tipos`
--

CREATE TABLE IF NOT EXISTS `valorMoneda_tipos` (
  `idValorMonedaTipo` int(50) NOT NULL AUTO_INCREMENT,
  `nombreMoneda` varchar(255) NOT NULL,
  PRIMARY KEY (`idValorMonedaTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `alertas_usuario`
--
ALTER TABLE `alertas_usuario`
  ADD CONSTRAINT `alertas_usuario_ibfk_1` FOREIGN KEY (`idAlerta`) REFERENCES `alertas` (`idAlerta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `condicionesVentaItems`
--
ALTER TABLE `condicionesVentaItems`
  ADD CONSTRAINT `condicionesVentaItems_ibfk_1` FOREIGN KEY (`idCondicionVenta`) REFERENCES `condicionesVenta` (`idCondicionVenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturasEntrantesCorriente`
--
ALTER TABLE `facturasEntrantesCorriente`
  ADD CONSTRAINT `facturasEntrantesCorriente_ibfk_1` FOREIGN KEY (`idFacturaEntrante`) REFERENCES `facturasEntrantes` (`idFacturaEntrante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturasEntrantes_vencimientos`
--
ALTER TABLE `facturasEntrantes_vencimientos`
  ADD CONSTRAINT `facturasEntrantes_vencimientos_ibfk_1` FOREIGN KEY (`idFacturaEntrante`) REFERENCES `facturasEntrantes` (`idFacturaEntrante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturasOrdenesTrabajo`
--
ALTER TABLE `facturasOrdenesTrabajo`
  ADD CONSTRAINT `facturasOrdenesTrabajo_ibfk_1` FOREIGN KEY (`idFacturaSaliente`) REFERENCES `facturasSalientes` (`idFacturaSaliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturasOrdenesTrabajo_ibfk_2` FOREIGN KEY (`idFacturaSaliente`) REFERENCES `facturasSalientes` (`idFacturaSaliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturasSalientesCorriente`
--
ALTER TABLE `facturasSalientesCorriente`
  ADD CONSTRAINT `facturasSalientesCorriente_ibfk_1` FOREIGN KEY (`idFacturaSaliente`) REFERENCES `facturasSalientes` (`idFacturaSaliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturasSalientesVencimiento`
--
ALTER TABLE `facturasSalientesVencimiento`
  ADD CONSTRAINT `facturasSalientesVencimiento_ibfk_1` FOREIGN KEY (`idFacturaSaliente`) REFERENCES `facturasSalientes` (`idFacturaSaliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimientosEmpresas_visitasRutina`
--
ALTER TABLE `mantenimientosEmpresas_visitasRutina`
  ADD CONSTRAINT `mantenimientosEmpresas_visitasRutina_ibfk_1` FOREIGN KEY (`idMantenimientoEmpresa`) REFERENCES `mantenimientosEmpresas` (`idMantenimientoEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimientos_rutina`
--
ALTER TABLE `mantenimientos_rutina`
  ADD CONSTRAINT `mantenimientos_rutina_ibfk_1` FOREIGN KEY (`idMantenimientoEmpresa`) REFERENCES `mantenimientosEmpresas` (`idMantenimientoEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimientos_rutina_ibfk_2` FOREIGN KEY (`idRutina`) REFERENCES `rutinas` (`idRutina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenesCobroFacturas`
--
ALTER TABLE `ordenesCobroFacturas`
  ADD CONSTRAINT `ordenesCobroFacturas_ibfk_1` FOREIGN KEY (`idOrdenCobro`) REFERENCES `ordenesCobro` (`idOrdenCobro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenesCobroFacturas_ibfk_2` FOREIGN KEY (`idFacturaVencimiento`) REFERENCES `facturasSalientesVencimiento` (`idFacturaVencimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenesCobroFacturas_ibfk_3` FOREIGN KEY (`idFacturaVencimiento`) REFERENCES `facturasSalientesVencimiento` (`idFacturaVencimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenesPago_vencimientos`
--
ALTER TABLE `ordenesPago_vencimientos`
  ADD CONSTRAINT `ordenesPago_vencimientos_ibfk_1` FOREIGN KEY (`idOrdenPago`) REFERENCES `ordenesPago` (`idOrdenPago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenesPago_vencimientos_ibfk_2` FOREIGN KEY (`idFacturaEntrante`) REFERENCES `facturasEntrantes` (`idFacturaEntrante`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stock_precios_items`
--
ALTER TABLE `stock_precios_items`
  ADD CONSTRAINT `stock_precios_items_ibfk_1` FOREIGN KEY (`idStockPrecio`) REFERENCES `stock_precios` (`idStockPrecio`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `facturasEntrantes_view` (
`nombreProveedor` varchar(30)
,`idFacturaEntrante` int(8)
,`idProveedor` int(9)
,`fecha` date
,`fechaVencimiento` date
,`numeroFactura` varchar(40)
,`precio` float
,`descripcion` text
,`estado` varchar(29)
,`tipoFactura` varchar(20)
,`idCentroCosto` int(22)
,`iva21` float
,`iva105` float
,`esCorriente` tinyint(1)
,`condicion` varchar(100)
,`condicionIva` varchar(100)
,`idCondicionCompra` int(11)
,`importeDescuentos` float
,`importeFlete` float
,`importeRecargos` float
,`importeImpuestos` float
,`importe` double
,`importe105` double
,`importe21` double
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasSalientes_view`
--

CREATE  VIEW `facturasSalientes_view` AS (select `t`.`idFacturaSaliente` AS `idFacturaSaliente`,`t`.`idCliente` AS `idCliente`,`t`.`fecha` AS `fecha`,`t`.`numeroFactura` AS `numeroFactura`,`t`.`descripcion` AS `descripcion`,`t`.`estado` AS `estado`,`t`.`tipoFactura` AS `tipoFactura`,`t`.`idCentroCosto` AS `idCentroCosto`,`t`.`fechaEstimadaCobro` AS `fechaEstimadaCobro`,`t`.`esCorriente` AS `esCorriente`,`t`.`idCondicionVenta` AS `idCondicionVenta`,`t`.`bonificacion` AS `bonificacion`,`t`.`idListaPrecios` AS `idListaPrecios`,sum(if((`itemsFacturaSaliente`.`porcentajeIva` = '21'),(`itemsFacturaSaliente`.`importeItem` * `itemsFacturaSaliente`.`cantidad`),0)) AS `iva21`,sum(if((`itemsFacturaSaliente`.`porcentajeIva` = '10.5'),(`itemsFacturaSaliente`.`importeItem` * `itemsFacturaSaliente`.`cantidad`),0)) AS `iva105`,(select sum(`pagos`.`importeDinero`) AS `SUM(pagos.importeDinero)` from (`pagosFactura` left join `pagos` on((`pagos`.`idPago` = `pagosFactura`.`idPago`))) where (`pagosFactura`.`idFacturaSaliente` = `t`.`idFacturaSaliente`)) AS `pagos`,(sum((`itemsFacturaSaliente`.`importeItem` * `itemsFacturaSaliente`.`cantidad`)) + if(isnull(((sum((`itemsFacturaSaliente`.`importeItem` * `itemsFacturaSaliente`.`cantidad`)) * `condicionesVentaItems`.`porcentajeInteres`) / 100)),0,((sum((`itemsFacturaSaliente`.`importeItem` * `itemsFacturaSaliente`.`cantidad`)) * `condicionesVentaItems`.`porcentajeInteres`) / 100))) AS `importeFactura`,(sum((`itemsFacturaSaliente`.`importeItem` * `itemsFacturaSaliente`.`cantidad`)) + if(isnull(((sum((`itemsFacturaSaliente`.`importeItem` * `itemsFacturaSaliente`.`cantidad`)) * `condicionesVentaItems`.`porcentajeInteres`) / 100)),0,((sum((`itemsFacturaSaliente`.`importeItem` * `itemsFacturaSaliente`.`cantidad`)) * `condicionesVentaItems`.`porcentajeInteres`) / 100))) AS `importe`,if((`clientes`.`tipoCliente` = 'Empresa'),`clientes`.`razonSocial`,concat(`clientes`.`apellido`,', ',`clientes`.`nombre`)) AS `cliente` from (((`facturasSalientes` `t` join `clientes` on((`clientes`.`idCliente` = `t`.`idCliente`))) left join `itemsFacturaSaliente` on((`itemsFacturaSaliente`.`idFacturaSaliente` = `t`.`idFacturaSaliente`))) left join `condicionesVentaItems` on((`t`.`idCondicionVenta` = `condicionesVentaItems`.`idCondicionVenta`))) group by `itemsFacturaSaliente`.`idFacturaSaliente`,`t`.`idFacturaSaliente`);

-- --------------------------------------------------------

--
-- Estructura para la vista `facturasEntrantes_view`
--
DROP TABLE IF EXISTS `facturasEntrantes_view`;

CREATE  VIEW `facturasEntrantes_view` AS (select `proveedores`.`nombre` AS `nombreProveedor`,`t`.`idFacturaEntrante` AS `idFacturaEntrante`,`t`.`idProveedor` AS `idProveedor`,`t`.`fecha` AS `fecha`,`t`.`fechaVencimiento` AS `fechaVencimiento`,`t`.`numeroFactura` AS `numeroFactura`,`t`.`precio` AS `precio`,`t`.`descripcion` AS `descripcion`,`t`.`estado` AS `estado`,`t`.`tipoFactura` AS `tipoFactura`,`t`.`idCentroCosto` AS `idCentroCosto`,`t`.`iva21` AS `iva21`,`t`.`iva105` AS `iva105`,`t`.`esCorriente` AS `esCorriente`,`t`.`condicion` AS `condicion`,`t`.`condicionIva` AS `condicionIva`,`t`.`idCondicionCompra` AS `idCondicionCompra`,`t`.`importeDescuentos` AS `importeDescuentos`,`t`.`importeFlete` AS `importeFlete`,`t`.`importeRecargos` AS `importeRecargos`,`t`.`importeImpuestos` AS `importeImpuestos`,((((if((`t`.`condicion` = 'Stock'),sum(((`compras_items`.`importeCompra` * `compras_items`.`cantidad`) * if((`t`.`tipoFactura` = 'A'),((`compras_items`.`alicuotaIva` / 100) + 1),1))),sum((`facturasEntrantes_concepto`.`importe` * if((`t`.`tipoFactura` = 'A'),((`facturasEntrantes_concepto`.`alicuotaIva` / 100) + 1),1)))) + (`t`.`importeFlete` * 1.21)) + `t`.`importeRecargos`) + `t`.`importeImpuestos`) - `t`.`importeDescuentos`) AS `importe`,if((`t`.`condicion` = 'Stock'),sum(if((`compras_items`.`alicuotaIva` = '10.5'),(`compras_items`.`importeCompra` * `compras_items`.`cantidad`),0)),sum(if((`facturasEntrantes_concepto`.`alicuotaIva` = '10.5'),`facturasEntrantes_concepto`.`importe`,0))) AS `importe105`,if((`t`.`condicion` = 'Stock'),sum(if((`compras_items`.`alicuotaIva` = '21'),(`compras_items`.`importeCompra` * `compras_items`.`cantidad`),0)),sum(if((`facturasEntrantes_concepto`.`alicuotaIva` = '21'),`facturasEntrantes_concepto`.`importe`,0))) AS `importe21` from (((`facturasEntrantes` `t` left join `compras_items` on((`t`.`idFacturaEntrante` = `compras_items`.`idFacturaEntrante`))) left join `proveedores` on((`t`.`idProveedor` = `proveedores`.`idProveedor`))) left join `facturasEntrantes_concepto` on((`t`.`idFacturaEntrante` = `facturasEntrantes_concepto`.`idFacturaEntrante`))) group by `t`.`idFacturaEntrante` order by `t`.`idFacturaEntrante` desc);

-- --------------------------------------------------------

--
-- CONTENIDO!!
--



INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '17', NULL, NULL),
('Administrador', '1', NULL, 'N;'),
('Administrador', '2', NULL, 'N;'),
('Mantenimiento', '13', NULL, 'N;'),
('Mantenimiento', '14', NULL, 'N;'),
('Mantenimiento', '15', NULL, 'N;'),
('Mantenimiento', '10', NULL, 'N;'),
('Compras', '14', NULL, 'N;'),
('Ventas', '16', NULL, 'N;'),
('Settings.ActualizarSistema', '10', NULL, 'N;'),
('Settings.*', '13', NULL, 'N;'),
('Settings.*', '10', NULL, 'N;'),
('Impresiones.*', '16', NULL, 'N;');

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Acciones.*', 1, NULL, NULL, 'N;'),
('Alertas.*', 1, NULL, NULL, 'N;'),
('AlertasUsuario.*', 1, NULL, NULL, 'N;'),
('AuthItemPanel.*', 1, NULL, NULL, 'N;'),
('Balances.*', 1, NULL, NULL, 'N;'),
('CentrosCosto.*', 1, NULL, NULL, 'N;'),
('Cheques.*', 1, NULL, NULL, 'N;'),
('ChequesEstados.*', 1, NULL, NULL, 'N;'),
('CierreCuentasEfectivo.*', 1, NULL, NULL, 'N;'),
('ClasificacionAfip.*', 1, NULL, NULL, 'N;'),
('Clientes.*', 1, NULL, NULL, 'N;'),
('ComentariosFicha.*', 1, NULL, NULL, 'N;'),
('Componentes.*', 1, NULL, NULL, 'N;'),
('ComponentesItems.*', 1, NULL, NULL, 'N;'),
('Compras.*', 1, NULL, NULL, 'N;'),
('ComprasItems.*', 1, NULL, NULL, 'N;'),
('Conceptos.*', 1, NULL, NULL, 'N;'),
('CondicionesCompra.*', 1, NULL, NULL, 'N;'),
('CondicionesCompraItems.*', 1, NULL, NULL, 'N;'),
('CondicionesVenta.*', 1, NULL, NULL, 'N;'),
('CondicionesVentaItems.*', 1, NULL, NULL, 'N;'),
('Cuentas.*', 1, NULL, NULL, 'N;'),
('CuentasEfectivo.*', 1, NULL, NULL, 'N;'),
('CuentasVenta.*', 1, NULL, NULL, 'N;'),
('Empresas.*', 1, NULL, NULL, 'N;'),
('EstadosRecepcion.*', 1, NULL, NULL, 'N;'),
('Events.*', 1, NULL, NULL, 'N;'),
('FacturasEntrantesConcepto.*', 1, NULL, NULL, 'N;'),
('FacturasEntrantes.*', 1, NULL, NULL, 'N;'),
('FacturasEntrantesCorriente.*', 1, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.*', 1, NULL, NULL, 'N;'),
('FacturasOrdenesTrabajo.*', 1, NULL, NULL, 'N;'),
('FacturasSalientes.*', 1, NULL, NULL, 'N;'),
('FacturasSalientesCorriente.*', 1, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.*', 1, NULL, NULL, 'N;'),
('Gastos.*', 1, NULL, NULL, 'N;'),
('GastosFactura.*', 1, NULL, NULL, 'N;'),
('Gastosfijos.*', 1, NULL, NULL, 'N;'),
('Impresiones.*', 1, NULL, NULL, 'N;'),
('Inventarios.*', 1, NULL, NULL, 'N;'),
('InventariosProductos.*', 1, NULL, NULL, 'N;'),
('ItemsFacturaSaliente.*', 1, NULL, NULL, 'N;'),
('ItemsPedido.*', 1, NULL, NULL, 'N;'),
('Juridicciones.*', 1, NULL, NULL, 'N;'),
('Log.*', 1, NULL, NULL, 'N;'),
('MantenimientosEmpresas.*', 1, NULL, NULL, 'N;'),
('MantenimientosEmpresasVisitasRutina.*', 1, NULL, NULL, 'N;'),
('MantenimientosRutina.*', 1, NULL, NULL, 'N;'),
('Movimientos.*', 1, NULL, NULL, 'N;'),
('OrdenesCobro.*', 1, NULL, NULL, 'N;'),
('OrdenesCobroFacturas.*', 1, NULL, NULL, 'N;'),
('OrdenesPago.*', 1, NULL, NULL, 'N;'),
('OrdenesPagoVencimientos.*', 1, NULL, NULL, 'N;'),
('OrdenesTrabajo.*', 1, NULL, NULL, 'N;'),
('OrdenesTrabajoCoordinaciones.*', 1, NULL, NULL, 'N;'),
('OrdenesTrabajoEstados.*', 1, NULL, NULL, 'N;'),
('OrdenesTrabajoItems.*', 1, NULL, NULL, 'N;'),
('Pagos.*', 1, NULL, NULL, 'N;'),
('PagosFactura.*', 1, NULL, NULL, 'N;'),
('Pedidos.*', 1, NULL, NULL, 'N;'),
('Personas.*', 1, NULL, NULL, 'N;'),
('PresupuestoItems.*', 1, NULL, NULL, 'N;'),
('Presupuestos.*', 1, NULL, NULL, 'N;'),
('PresupuestosOrdenesTrabajo.*', 1, NULL, NULL, 'N;'),
('Proveedores.*', 1, NULL, NULL, 'N;'),
('ProveedoresRubros.*', 1, NULL, NULL, 'N;'),
('PuntoVenta.*', 1, NULL, NULL, 'N;'),
('Recepcion.*', 1, NULL, NULL, 'N;'),
('Rutinas.*', 1, NULL, NULL, 'N;'),
('Servicios.*', 1, NULL, NULL, 'N;'),
('Sesiones.*', 1, NULL, NULL, 'N;'),
('Settings.*', 1, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Stock.*', 1, NULL, NULL, 'N;'),
('StockDisponible.*', 1, NULL, NULL, 'N;'),
('StockMarcas.*', 1, NULL, NULL, 'N;'),
('StockPrecios.*', 1, NULL, NULL, 'N;'),
('StockPreciosItems.*', 1, NULL, NULL, 'N;'),
('StockTipoProducto.*', 1, NULL, NULL, 'N;'),
('Talonario.*', 1, NULL, NULL, 'N;'),
('Tareas.*', 1, NULL, NULL, 'N;'),
('TareasCoordinaciones.*', 1, NULL, NULL, 'N;'),
('TareasDestinatarios.*', 1, NULL, NULL, 'N;'),
('TareasEstados.*', 1, NULL, NULL, 'N;'),
('UsuariosAreas.*', 1, NULL, NULL, 'N;'),
('Usuarios.*', 1, NULL, NULL, 'N;'),
('UsuariosTipoUsuarios.*', 1, NULL, NULL, 'N;'),
('ValorMoneda.*', 1, NULL, NULL, 'N;'),
('ValorMonedaTipos.*', 1, NULL, NULL, 'N;'),
('WizardFacturaEntrante.*', 1, NULL, NULL, 'N;'),
('AuditTrail.Admin.*', 1, NULL, NULL, 'N;'),
('AuditTrail.Default.*', 1, NULL, NULL, 'N;'),
('Cal.Cron.*', 1, NULL, NULL, 'N;'),
('Cal.Main.*', 1, NULL, NULL, 'N;'),
('Acciones.View', 0, NULL, NULL, 'N;'),
('Acciones.Etiquetas', 0, NULL, NULL, 'N;'),
('Acciones.Create', 0, NULL, NULL, 'N;'),
('Acciones.Update', 0, NULL, NULL, 'N;'),
('Acciones.Delete', 0, NULL, NULL, 'N;'),
('Acciones.VerAcciones', 0, NULL, NULL, 'N;'),
('Acciones.Index', 0, NULL, NULL, 'N;'),
('Acciones.Admin', 0, NULL, NULL, 'N;'),
('Alertas.View', 0, NULL, NULL, 'N;'),
('Alertas.Create', 0, NULL, NULL, 'N;'),
('Alertas.Finalizar', 0, NULL, NULL, 'N;'),
('Alertas.Update', 0, NULL, NULL, 'N;'),
('Alertas.Delete', 0, NULL, NULL, 'N;'),
('Alertas.Index', 0, NULL, NULL, 'N;'),
('Alertas.Admin', 0, NULL, NULL, 'N;'),
('AlertasUsuario.View', 0, NULL, NULL, 'N;'),
('AlertasUsuario.Create', 0, NULL, NULL, 'N;'),
('AlertasUsuario.Update', 0, NULL, NULL, 'N;'),
('AlertasUsuario.Delete', 0, NULL, NULL, 'N;'),
('AlertasUsuario.Index', 0, NULL, NULL, 'N;'),
('AlertasUsuario.Admin', 0, NULL, NULL, 'N;'),
('AuthItemPanel.View', 0, NULL, NULL, 'N;'),
('AuthItemPanel.Editar', 0, NULL, NULL, 'N;'),
('AuthItemPanel.Create', 0, NULL, NULL, 'N;'),
('AuthItemPanel.Act', 0, NULL, NULL, 'N;'),
('AuthItemPanel.Update', 0, NULL, NULL, 'N;'),
('AuthItemPanel.Delete', 0, NULL, NULL, 'N;'),
('AuthItemPanel.Index', 0, NULL, NULL, 'N;'),
('AuthItemPanel.Admin', 0, NULL, NULL, 'N;'),
('Balances.Index', 0, NULL, NULL, 'N;'),
('Balances.ResumenDeudores', 0, NULL, NULL, 'N;'),
('Balances.ResumenMorosos', 0, NULL, NULL, 'N;'),
('Balances.ResumenFinanciero', 0, NULL, NULL, 'N;'),
('Balances.ResumenOrdenes', 0, NULL, NULL, 'N;'),
('Balances.InformeVentas', 0, NULL, NULL, 'N;'),
('Balances.FacturacionContable', 0, NULL, NULL, 'N;'),
('Balances.BalanceMensual', 0, NULL, NULL, 'N;'),
('Balances.ConsultarPagosGastos', 0, NULL, NULL, 'N;'),
('CentrosCosto.View', 0, NULL, NULL, 'N;'),
('CentrosCosto.Create', 0, NULL, NULL, 'N;'),
('CentrosCosto.Update', 0, NULL, NULL, 'N;'),
('CentrosCosto.Delete', 0, NULL, NULL, 'N;'),
('CentrosCosto.Index', 0, NULL, NULL, 'N;'),
('CentrosCosto.Admin', 0, NULL, NULL, 'N;'),
('Cheques.View', 0, NULL, NULL, 'N;'),
('Cheques.Create', 0, NULL, NULL, 'N;'),
('Cheques.Update', 0, NULL, NULL, 'N;'),
('Cheques.Delete', 0, NULL, NULL, 'N;'),
('Cheques.Index', 0, NULL, NULL, 'N;'),
('Cheques.Admin', 0, NULL, NULL, 'N;'),
('ChequesEstados.View', 0, NULL, NULL, 'N;'),
('ChequesEstados.Create', 0, NULL, NULL, 'N;'),
('ChequesEstados.Update', 0, NULL, NULL, 'N;'),
('ChequesEstados.Delete', 0, NULL, NULL, 'N;'),
('ChequesEstados.Index', 0, NULL, NULL, 'N;'),
('ChequesEstados.Admin', 0, NULL, NULL, 'N;'),
('CierreCuentasEfectivo.View', 0, NULL, NULL, 'N;'),
('CierreCuentasEfectivo.Create', 0, NULL, NULL, 'N;'),
('CierreCuentasEfectivo.Update', 0, NULL, NULL, 'N;'),
('CierreCuentasEfectivo.Delete', 0, NULL, NULL, 'N;'),
('CierreCuentasEfectivo.Index', 0, NULL, NULL, 'N;'),
('CierreCuentasEfectivo.Admin', 0, NULL, NULL, 'N;'),
('ClasificacionAfip.View', 0, NULL, NULL, 'N;'),
('ClasificacionAfip.Create', 0, NULL, NULL, 'N;'),
('ClasificacionAfip.Update', 0, NULL, NULL, 'N;'),
('ClasificacionAfip.Delete', 0, NULL, NULL, 'N;'),
('ClasificacionAfip.Index', 0, NULL, NULL, 'N;'),
('ClasificacionAfip.Admin', 0, NULL, NULL, 'N;'),
('Clientes.CrearEmpresa', 0, NULL, NULL, 'N;'),
('Clientes.BuscarEmpresas', 0, NULL, NULL, 'N;'),
('Clientes.BuscarPersonas', 0, NULL, NULL, 'N;'),
('Clientes.View', 0, NULL, NULL, 'N;'),
('Clientes.Create', 0, NULL, NULL, 'N;'),
('Clientes.Update', 0, NULL, NULL, 'N;'),
('Clientes.Delete', 0, NULL, NULL, 'N;'),
('Clientes.Acciones', 0, NULL, NULL, 'N;'),
('Clientes.Etiquetas', 0, NULL, NULL, 'N;'),
('Clientes.Index', 0, NULL, NULL, 'N;'),
('Clientes.Admin', 0, NULL, NULL, 'N;'),
('ComentariosFicha.View', 0, NULL, NULL, 'N;'),
('ComentariosFicha.Create', 0, NULL, NULL, 'N;'),
('ComentariosFicha.Update', 0, NULL, NULL, 'N;'),
('ComentariosFicha.Delete', 0, NULL, NULL, 'N;'),
('ComentariosFicha.Index', 0, NULL, NULL, 'N;'),
('ComentariosFicha.Admin', 0, NULL, NULL, 'N;'),
('Componentes.View', 0, NULL, NULL, 'N;'),
('Componentes.Create', 0, NULL, NULL, 'N;'),
('Componentes.CrearNuevo', 0, NULL, NULL, 'N;'),
('Componentes.Update', 0, NULL, NULL, 'N;'),
('Componentes.Delete', 0, NULL, NULL, 'N;'),
('Componentes.Index', 0, NULL, NULL, 'N;'),
('Componentes.Admin', 0, NULL, NULL, 'N;'),
('ComponentesItems.View', 0, NULL, NULL, 'N;'),
('ComponentesItems.Create', 0, NULL, NULL, 'N;'),
('ComponentesItems.Update', 0, NULL, NULL, 'N;'),
('ComponentesItems.Delete', 0, NULL, NULL, 'N;'),
('ComponentesItems.Index', 0, NULL, NULL, 'N;'),
('ComponentesItems.Admin', 0, NULL, NULL, 'N;'),
('Compras.View', 0, NULL, NULL, 'N;'),
('Compras.Create', 0, NULL, NULL, 'N;'),
('Compras.Update', 0, NULL, NULL, 'N;'),
('Compras.Delete', 0, NULL, NULL, 'N;'),
('Compras.ConsultarComprasProducto', 0, NULL, NULL, 'N;'),
('Compras.Index', 0, NULL, NULL, 'N;'),
('Compras.Admin', 0, NULL, NULL, 'N;'),
('ComprasItems.View', 0, NULL, NULL, 'N;'),
('ComprasItems.Create', 0, NULL, NULL, 'N;'),
('ComprasItems.Update', 0, NULL, NULL, 'N;'),
('ComprasItems.Delete', 0, NULL, NULL, 'N;'),
('ComprasItems.Index', 0, NULL, NULL, 'N;'),
('ComprasItems.Productos', 0, NULL, NULL, 'N;'),
('ComprasItems.AgregarStock', 0, NULL, NULL, 'N;'),
('ComprasItems.QuitarStock', 0, NULL, NULL, 'N;'),
('ComprasItems.Admin', 0, NULL, NULL, 'N;'),
('Conceptos.View', 0, NULL, NULL, 'N;'),
('Conceptos.Create', 0, NULL, NULL, 'N;'),
('Conceptos.Update', 0, NULL, NULL, 'N;'),
('Conceptos.Delete', 0, NULL, NULL, 'N;'),
('Conceptos.Etiquetas', 0, NULL, NULL, 'N;'),
('Conceptos.Index', 0, NULL, NULL, 'N;'),
('Conceptos.Admin', 0, NULL, NULL, 'N;'),
('CondicionesCompra.Etiquetas', 0, NULL, NULL, 'N;'),
('CondicionesCompra.View', 0, NULL, NULL, 'N;'),
('CondicionesCompra.Create', 0, NULL, NULL, 'N;'),
('CondicionesCompra.Update', 0, NULL, NULL, 'N;'),
('CondicionesCompra.Delete', 0, NULL, NULL, 'N;'),
('CondicionesCompra.Index', 0, NULL, NULL, 'N;'),
('CondicionesCompra.Admin', 0, NULL, NULL, 'N;'),
('CondicionesCompraItems.View', 0, NULL, NULL, 'N;'),
('CondicionesCompraItems.Create', 0, NULL, NULL, 'N;'),
('CondicionesCompraItems.Update', 0, NULL, NULL, 'N;'),
('CondicionesCompraItems.Delete', 0, NULL, NULL, 'N;'),
('CondicionesCompraItems.Index', 0, NULL, NULL, 'N;'),
('CondicionesCompraItems.Admin', 0, NULL, NULL, 'N;'),
('CondicionesVenta.View', 0, NULL, NULL, 'N;'),
('CondicionesVenta.Create', 0, NULL, NULL, 'N;'),
('CondicionesVenta.Update', 0, NULL, NULL, 'N;'),
('CondicionesVenta.Etiquetas', 0, NULL, NULL, 'N;'),
('CondicionesVenta.Delete', 0, NULL, NULL, 'N;'),
('CondicionesVenta.Index', 0, NULL, NULL, 'N;'),
('CondicionesVenta.Admin', 0, NULL, NULL, 'N;'),
('CondicionesVentaItems.View', 0, NULL, NULL, 'N;'),
('CondicionesVentaItems.Create', 0, NULL, NULL, 'N;'),
('CondicionesVentaItems.Update', 0, NULL, NULL, 'N;'),
('CondicionesVentaItems.Delete', 0, NULL, NULL, 'N;'),
('CondicionesVentaItems.Index', 0, NULL, NULL, 'N;'),
('CondicionesVentaItems.Admin', 0, NULL, NULL, 'N;'),
('Cuentas.View', 0, NULL, NULL, 'N;'),
('Cuentas.Create', 0, NULL, NULL, 'N;'),
('Cuentas.Update', 0, NULL, NULL, 'N;'),
('Cuentas.Delete', 0, NULL, NULL, 'N;'),
('Cuentas.Index', 0, NULL, NULL, 'N;'),
('Cuentas.Admin', 0, NULL, NULL, 'N;'),
('CuentasEfectivo.View', 0, NULL, NULL, 'N;'),
('CuentasEfectivo.Create', 0, NULL, NULL, 'N;'),
('CuentasEfectivo.Update', 0, NULL, NULL, 'N;'),
('CuentasEfectivo.Delete', 0, NULL, NULL, 'N;'),
('CuentasEfectivo.Index', 0, NULL, NULL, 'N;'),
('CuentasEfectivo.Admin', 0, NULL, NULL, 'N;'),
('CuentasVenta.View', 0, NULL, NULL, 'N;'),
('CuentasVenta.Create', 0, NULL, NULL, 'N;'),
('CuentasVenta.Update', 0, NULL, NULL, 'N;'),
('CuentasVenta.Delete', 0, NULL, NULL, 'N;'),
('CuentasVenta.Index', 0, NULL, NULL, 'N;'),
('CuentasVenta.Admin', 0, NULL, NULL, 'N;'),
('Empresas.View', 0, NULL, NULL, 'N;'),
('Empresas.Create', 0, NULL, NULL, 'N;'),
('Empresas.Update', 0, NULL, NULL, 'N;'),
('Empresas.Delete', 0, NULL, NULL, 'N;'),
('Empresas.Index', 0, NULL, NULL, 'N;'),
('Empresas.Admin', 0, NULL, NULL, 'N;'),
('EstadosRecepcion.View', 0, NULL, NULL, 'N;'),
('EstadosRecepcion.Create', 0, NULL, NULL, 'N;'),
('EstadosRecepcion.Update', 0, NULL, NULL, 'N;'),
('EstadosRecepcion.Delete', 0, NULL, NULL, 'N;'),
('EstadosRecepcion.Index', 0, NULL, NULL, 'N;'),
('EstadosRecepcion.Admin', 0, NULL, NULL, 'N;'),
('Events.View', 0, NULL, NULL, 'N;'),
('Events.Create', 0, NULL, NULL, 'N;'),
('Events.Update', 0, NULL, NULL, 'N;'),
('Events.Delete', 0, NULL, NULL, 'N;'),
('Events.Index', 0, NULL, NULL, 'N;'),
('Events.Admin', 0, NULL, NULL, 'N;'),
('FacturasEntrantesConcepto.View', 0, NULL, NULL, 'N;'),
('FacturasEntrantesConcepto.ConsultarPorFactura', 0, NULL, NULL, 'N;'),
('FacturasEntrantesConcepto.Create', 0, NULL, NULL, 'N;'),
('FacturasEntrantesConcepto.Update', 0, NULL, NULL, 'N;'),
('FacturasEntrantesConcepto.Delete', 0, NULL, NULL, 'N;'),
('FacturasEntrantesConcepto.Index', 0, NULL, NULL, 'N;'),
('FacturasEntrantesConcepto.Admin', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.NuevaFactura', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.View', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.AsistenteNuevaFactura', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.VerItems', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.EtiquetasPendientes', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.CrearParaConceptos', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.CrearParaStock', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.CrearFactura', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.Create', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.FinalizarCarga', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.SaldoEmpresa', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.SaldoProveedores', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.SaldoProveedor', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.ConsultarEnDeuda', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.Index', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.ConsultarCompraStock', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.ConsultarParaPagar', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.Facturas', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.Update', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.Delete', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.ImprimirIvaCompras', 0, NULL, NULL, 'N;'),
('FacturasEntrantes.Admin', 0, NULL, NULL, 'N;'),
('FacturasEntrantesCorriente.View', 0, NULL, NULL, 'N;'),
('FacturasEntrantesCorriente.Create', 0, NULL, NULL, 'N;'),
('FacturasEntrantesCorriente.Update', 0, NULL, NULL, 'N;'),
('FacturasEntrantesCorriente.Delete', 0, NULL, NULL, 'N;'),
('FacturasEntrantesCorriente.Index', 0, NULL, NULL, 'N;'),
('FacturasEntrantesCorriente.Admin', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.View', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.Create', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.Update', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.ConsultarVencidas', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.ConsultarPendientes', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.ConsultarPorVencer', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.EtiquetasPendientes', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.EtiquetasPendientes2', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.Delete', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.Index', 0, NULL, NULL, 'N;'),
('FacturasEntrantesVencimientos.Admin', 0, NULL, NULL, 'N;'),
('FacturasOrdenesTrabajo.View', 0, NULL, NULL, 'N;'),
('FacturasOrdenesTrabajo.Create', 0, NULL, NULL, 'N;'),
('FacturasOrdenesTrabajo.Update', 0, NULL, NULL, 'N;'),
('FacturasOrdenesTrabajo.Delete', 0, NULL, NULL, 'N;'),
('FacturasOrdenesTrabajo.Index', 0, NULL, NULL, 'N;'),
('FacturasOrdenesTrabajo.Admin', 0, NULL, NULL, 'N;'),
('FacturasSalientes.EtiquetasPendientes', 0, NULL, NULL, 'N;'),
('FacturasSalientes.View', 0, NULL, NULL, 'N;'),
('FacturasSalientes.CondicionPago', 0, NULL, NULL, 'N;'),
('FacturasSalientes.SaldoEmpresa', 0, NULL, NULL, 'N;'),
('FacturasSalientes.SaldoClientes', 0, NULL, NULL, 'N;'),
('FacturasSalientes.GenerarFacturacionOrden', 0, NULL, NULL, 'N;'),
('FacturasSalientes.Create', 0, NULL, NULL, 'N;'),
('FacturasSalientes.CrearFacturaCompleta', 0, NULL, NULL, 'N;'),
('FacturasSalientes.CrearFactura', 0, NULL, NULL, 'N;'),
('FacturasSalientes.GenerarFacturaCte', 0, NULL, NULL, 'N;'),
('FacturasSalientes.CrearFacturaCte', 0, NULL, NULL, 'N;'),
('FacturasSalientes.Update', 0, NULL, NULL, 'N;'),
('FacturasSalientes.Delete', 0, NULL, NULL, 'N;'),
('FacturasSalientes.CentroVentas', 0, NULL, NULL, 'N;'),
('FacturasSalientes.Tesoreria', 0, NULL, NULL, 'N;'),
('FacturasSalientes.BuscarEstado', 0, NULL, NULL, 'N;'),
('FacturasSalientes.Index', 0, NULL, NULL, 'N;'),
('FacturasSalientes.FacturaRapida', 0, NULL, NULL, 'N;'),
('FacturasSalientes.ConsultarLibroIva', 0, NULL, NULL, 'N;'),
('FacturasSalientes.Admin', 0, NULL, NULL, 'N;'),
('FacturasSalientesCorriente.View', 0, NULL, NULL, 'N;'),
('FacturasSalientesCorriente.Create', 0, NULL, NULL, 'N;'),
('FacturasSalientesCorriente.Update', 0, NULL, NULL, 'N;'),
('FacturasSalientesCorriente.Delete', 0, NULL, NULL, 'N;'),
('FacturasSalientesCorriente.Index', 0, NULL, NULL, 'N;'),
('FacturasSalientesCorriente.Admin', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.EtiquetasPendientesVencimientos', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.ConsultarVencidas', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.ConsultarPendientes', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.EtiquetasPendientes', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.View', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.Create', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.Update', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.Delete', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.Index', 0, NULL, NULL, 'N;'),
('FacturasSalientesVencimiento.Admin', 0, NULL, NULL, 'N;'),
('Gastos.View', 0, NULL, NULL, 'N;'),
('Gastos.Create', 0, NULL, NULL, 'N;'),
('Gastos.Update', 0, NULL, NULL, 'N;'),
('Gastos.Delete', 0, NULL, NULL, 'N;'),
('Gastos.Index', 0, NULL, NULL, 'N;'),
('Gastos.ConsultarGastosFactura', 0, NULL, NULL, 'N;'),
('Gastos.ConsultarGastosFacturaDeuda', 0, NULL, NULL, 'N;'),
('Gastos.Admin', 0, NULL, NULL, 'N;'),
('GastosFactura.View', 0, NULL, NULL, 'N;'),
('GastosFactura.Create', 0, NULL, NULL, 'N;'),
('GastosFactura.Update', 0, NULL, NULL, 'N;'),
('GastosFactura.Delete', 0, NULL, NULL, 'N;'),
('GastosFactura.Index', 0, NULL, NULL, 'N;'),
('GastosFactura.Admin', 0, NULL, NULL, 'N;'),
('Gastosfijos.View', 0, NULL, NULL, 'N;'),
('Gastosfijos.Create', 0, NULL, NULL, 'N;'),
('Gastosfijos.Update', 0, NULL, NULL, 'N;'),
('Gastosfijos.Delete', 0, NULL, NULL, 'N;'),
('Gastosfijos.Index', 0, NULL, NULL, 'N;'),
('Gastosfijos.Admin', 0, NULL, NULL, 'N;'),
('Impresiones.Librosiva', 0, NULL, NULL, 'N;'),
('Impresiones.Ivalibro', 0, NULL, NULL, 'N;'),
('Impresiones.View', 0, NULL, NULL, 'N;'),
('Impresiones.Create', 0, NULL, NULL, 'N;'),
('Impresiones.Update', 0, NULL, NULL, 'N;'),
('Impresiones.Delete', 0, NULL, NULL, 'N;'),
('Impresiones.ImprimeExcel', 0, NULL, NULL, 'N;'),
('Impresiones.Index', 0, NULL, NULL, 'N;'),
('Impresiones.Admin', 0, NULL, NULL, 'N;'),
('Inventarios.View', 0, NULL, NULL, 'N;'),
('Inventarios.Create', 0, NULL, NULL, 'N;'),
('Inventarios.Update', 0, NULL, NULL, 'N;'),
('Inventarios.Delete', 0, NULL, NULL, 'N;'),
('Inventarios.Index', 0, NULL, NULL, 'N;'),
('Inventarios.Admin', 0, NULL, NULL, 'N;'),
('InventariosProductos.View', 0, NULL, NULL, 'N;'),
('InventariosProductos.Create', 0, NULL, NULL, 'N;'),
('InventariosProductos.Update', 0, NULL, NULL, 'N;'),
('InventariosProductos.Delete', 0, NULL, NULL, 'N;'),
('InventariosProductos.Index', 0, NULL, NULL, 'N;'),
('InventariosProductos.ConsultarProductos', 0, NULL, NULL, 'N;'),
('InventariosProductos.Admin', 0, NULL, NULL, 'N;'),
('ItemsFacturaSaliente.View', 0, NULL, NULL, 'N;'),
('ItemsFacturaSaliente.Create', 0, NULL, NULL, 'N;'),
('ItemsFacturaSaliente.PagarFacturaItems', 0, NULL, NULL, 'N;'),
('ItemsFacturaSaliente.Index', 0, NULL, NULL, 'N;'),
('ItemsFacturaSaliente.Update', 0, NULL, NULL, 'N;'),
('ItemsFacturaSaliente.Delete', 0, NULL, NULL, 'N;'),
('ItemsFacturaSaliente.Admin', 0, NULL, NULL, 'N;'),
('ItemsPedido.View', 0, NULL, NULL, 'N;'),
('ItemsPedido.Create', 0, NULL, NULL, 'N;'),
('ItemsPedido.Update', 0, NULL, NULL, 'N;'),
('ItemsPedido.Delete', 0, NULL, NULL, 'N;'),
('ItemsPedido.Index', 0, NULL, NULL, 'N;'),
('ItemsPedido.Admin', 0, NULL, NULL, 'N;'),
('Juridicciones.View', 0, NULL, NULL, 'N;'),
('Juridicciones.Create', 0, NULL, NULL, 'N;'),
('Juridicciones.Update', 0, NULL, NULL, 'N;'),
('Juridicciones.Delete', 0, NULL, NULL, 'N;'),
('Juridicciones.Index', 0, NULL, NULL, 'N;'),
('Juridicciones.Admin', 0, NULL, NULL, 'N;'),
('Log.View', 0, NULL, NULL, 'N;'),
('Log.Create', 0, NULL, NULL, 'N;'),
('Log.Update', 0, NULL, NULL, 'N;'),
('Log.Delete', 0, NULL, NULL, 'N;'),
('Log.Index', 0, NULL, NULL, 'N;'),
('Log.Admin', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresas.View', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresas.Create', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresas.Update', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresas.Delete', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresas.Index', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresas.Admin', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresasVisitasRutina.VerIndividual', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresasVisitasRutina.View', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresasVisitasRutina.Create', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresasVisitasRutina.Update', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresasVisitasRutina.Delete', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresasVisitasRutina.Index', 0, NULL, NULL, 'N;'),
('MantenimientosEmpresasVisitasRutina.Admin', 0, NULL, NULL, 'N;'),
('MantenimientosRutina.View', 0, NULL, NULL, 'N;'),
('MantenimientosRutina.Create', 0, NULL, NULL, 'N;'),
('MantenimientosRutina.Update', 0, NULL, NULL, 'N;'),
('MantenimientosRutina.Delete', 0, NULL, NULL, 'N;'),
('MantenimientosRutina.Index', 0, NULL, NULL, 'N;'),
('MantenimientosRutina.Admin', 0, NULL, NULL, 'N;'),
('Movimientos.View', 0, NULL, NULL, 'N;'),
('Movimientos.Create', 0, NULL, NULL, 'N;'),
('Movimientos.Update', 0, NULL, NULL, 'N;'),
('Movimientos.Delete', 0, NULL, NULL, 'N;'),
('Movimientos.Index', 0, NULL, NULL, 'N;'),
('Movimientos.Admin', 0, NULL, NULL, 'N;'),
('OrdenesCobro.View', 0, NULL, NULL, 'N;'),
('OrdenesCobro.CrearCobro', 0, NULL, NULL, 'N;'),
('OrdenesCobro.Create', 0, NULL, NULL, 'N;'),
('OrdenesCobro.PagoDirecto', 0, NULL, NULL, 'N;'),
('OrdenesCobro.Update', 0, NULL, NULL, 'N;'),
('OrdenesCobro.Delete', 0, NULL, NULL, 'N;'),
('OrdenesCobro.Index', 0, NULL, NULL, 'N;'),
('OrdenesCobro.Admin', 0, NULL, NULL, 'N;'),
('OrdenesCobroFacturas.View', 0, NULL, NULL, 'N;'),
('OrdenesCobroFacturas.Create', 0, NULL, NULL, 'N;'),
('OrdenesCobroFacturas.Update', 0, NULL, NULL, 'N;'),
('OrdenesCobroFacturas.Delete', 0, NULL, NULL, 'N;'),
('OrdenesCobroFacturas.Index', 0, NULL, NULL, 'N;'),
('OrdenesCobroFacturas.Admin', 0, NULL, NULL, 'N;'),
('OrdenesPago.View', 0, NULL, NULL, 'N;'),
('OrdenesPago.Create', 0, NULL, NULL, 'N;'),
('OrdenesPago.PagoDirecto', 0, NULL, NULL, 'N;'),
('OrdenesPago.CrearOrden', 0, NULL, NULL, 'N;'),
('OrdenesPago.Update', 0, NULL, NULL, 'N;'),
('OrdenesPago.Delete', 0, NULL, NULL, 'N;'),
('OrdenesPago.ConsultarSaldoProveedor', 0, NULL, NULL, 'N;'),
('OrdenesPago.Index', 0, NULL, NULL, 'N;'),
('OrdenesPago.Admin', 0, NULL, NULL, 'N;'),
('OrdenesPagoVencimientos.View', 0, NULL, NULL, 'N;'),
('OrdenesPagoVencimientos.Create', 0, NULL, NULL, 'N;'),
('OrdenesPagoVencimientos.Update', 0, NULL, NULL, 'N;'),
('OrdenesPagoVencimientos.Delete', 0, NULL, NULL, 'N;'),
('OrdenesPagoVencimientos.Index', 0, NULL, NULL, 'N;'),
('OrdenesPagoVencimientos.Admin', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.View', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Seguimiento', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.GenerarOrdenExistente', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.GenerarOrdenNueva', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Create', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.GenerarOrden', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Update', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.FinalizarOrden', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Finalizar', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Delete', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Index', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Admin', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.PorEstado', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.ParaRealizar', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Facturadas', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.Realizadas', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.CargarCoordinacion', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoCoordinaciones.View', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoCoordinaciones.Create', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoCoordinaciones.Update', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoCoordinaciones.Delete', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoCoordinaciones.Index', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoCoordinaciones.Admin', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoEstados.View', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoEstados.Create', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoEstados.Update', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoEstados.Delete', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoEstados.Index', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoEstados.VerEstadosOrden', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoEstados.Admin', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoItems.View', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoItems.Create', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoItems.Update', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoItems.Delete', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoItems.Index', 0, NULL, NULL, 'N;'),
('OrdenesTrabajoItems.Admin', 0, NULL, NULL, 'N;'),
('Pagos.View', 0, NULL, NULL, 'N;'),
('Pagos.Pagodirecto', 0, NULL, NULL, 'N;'),
('Pagos.Create', 0, NULL, NULL, 'N;'),
('Pagos.Update', 0, NULL, NULL, 'N;'),
('Pagos.Delete', 0, NULL, NULL, 'N;'),
('Pagos.CentroPagos', 0, NULL, NULL, 'N;'),
('Pagos.Index', 0, NULL, NULL, 'N;'),
('Pagos.PagarFacturaItems', 0, NULL, NULL, 'N;'),
('Pagos.ConsultarPagosFactura', 0, NULL, NULL, 'N;'),
('Pagos.Admin', 0, NULL, NULL, 'N;'),
('PagosFactura.ImprecionRecibo', 0, NULL, NULL, 'N;'),
('PagosFactura.View', 0, NULL, NULL, 'N;'),
('PagosFactura.Create', 0, NULL, NULL, 'N;'),
('PagosFactura.Update', 0, NULL, NULL, 'N;'),
('PagosFactura.Delete', 0, NULL, NULL, 'N;'),
('PagosFactura.Index', 0, NULL, NULL, 'N;'),
('PagosFactura.Admin', 0, NULL, NULL, 'N;'),
('Pedidos.View', 0, NULL, NULL, 'N;'),
('Pedidos.Create', 0, NULL, NULL, 'N;'),
('Pedidos.Update', 0, NULL, NULL, 'N;'),
('Pedidos.Delete', 0, NULL, NULL, 'N;'),
('Pedidos.Index', 0, NULL, NULL, 'N;'),
('Pedidos.Admin', 0, NULL, NULL, 'N;'),
('Personas.View', 0, NULL, NULL, 'N;'),
('Personas.Create', 0, NULL, NULL, 'N;'),
('Personas.Update', 0, NULL, NULL, 'N;'),
('Personas.Delete', 0, NULL, NULL, 'N;'),
('Personas.Index', 0, NULL, NULL, 'N;'),
('Personas.Admin', 0, NULL, NULL, 'N;'),
('PresupuestoItems.View', 0, NULL, NULL, 'N;'),
('PresupuestoItems.Create', 0, NULL, NULL, 'N;'),
('PresupuestoItems.Update', 0, NULL, NULL, 'N;'),
('PresupuestoItems.Delete', 0, NULL, NULL, 'N;'),
('PresupuestoItems.Index', 0, NULL, NULL, 'N;'),
('PresupuestoItems.Admin', 0, NULL, NULL, 'N;'),
('Presupuestos.View', 0, NULL, NULL, 'N;'),
('Presupuestos.Create', 0, NULL, NULL, 'N;'),
('Presupuestos.CrearPresupuesto', 0, NULL, NULL, 'N;'),
('Presupuestos.Update', 0, NULL, NULL, 'N;'),
('Presupuestos.Delete', 0, NULL, NULL, 'N;'),
('Presupuestos.Index', 0, NULL, NULL, 'N;'),
('Presupuestos.Aprobar', 0, NULL, NULL, 'N;'),
('Presupuestos.Rechazar', 0, NULL, NULL, 'N;'),
('Presupuestos.Admin', 0, NULL, NULL, 'N;'),
('PresupuestosOrdenesTrabajo.View', 0, NULL, NULL, 'N;'),
('PresupuestosOrdenesTrabajo.Create', 0, NULL, NULL, 'N;'),
('PresupuestosOrdenesTrabajo.Update', 0, NULL, NULL, 'N;'),
('PresupuestosOrdenesTrabajo.Delete', 0, NULL, NULL, 'N;'),
('PresupuestosOrdenesTrabajo.Index', 0, NULL, NULL, 'N;'),
('PresupuestosOrdenesTrabajo.Admin', 0, NULL, NULL, 'N;'),
('Proveedores.AutoCompletarAlgo', 0, NULL, NULL, 'N;'),
('Proveedores.View', 0, NULL, NULL, 'N;'),
('Proveedores.Etiquetas', 0, NULL, NULL, 'N;'),
('Proveedores.Create', 0, NULL, NULL, 'N;'),
('Proveedores.Update', 0, NULL, NULL, 'N;'),
('Proveedores.Delete', 0, NULL, NULL, 'N;'),
('Proveedores.Index', 0, NULL, NULL, 'N;'),
('Proveedores.Admin', 0, NULL, NULL, 'N;'),
('ProveedoresRubros.View', 0, NULL, NULL, 'N;'),
('ProveedoresRubros.Create', 0, NULL, NULL, 'N;'),
('ProveedoresRubros.Update', 0, NULL, NULL, 'N;'),
('ProveedoresRubros.Delete', 0, NULL, NULL, 'N;'),
('ProveedoresRubros.Index', 0, NULL, NULL, 'N;'),
('ProveedoresRubros.Admin', 0, NULL, NULL, 'N;'),
('PuntoVenta.View', 0, NULL, NULL, 'N;'),
('PuntoVenta.Create', 0, NULL, NULL, 'N;'),
('PuntoVenta.Update', 0, NULL, NULL, 'N;'),
('PuntoVenta.Delete', 0, NULL, NULL, 'N;'),
('PuntoVenta.Index', 0, NULL, NULL, 'N;'),
('PuntoVenta.Admin', 0, NULL, NULL, 'N;'),
('Recepcion.View', 0, NULL, NULL, 'N;'),
('Recepcion.Create', 0, NULL, NULL, 'N;'),
('Recepcion.Update', 0, NULL, NULL, 'N;'),
('Recepcion.Delete', 0, NULL, NULL, 'N;'),
('Recepcion.Index', 0, NULL, NULL, 'N;'),
('Recepcion.Admin', 0, NULL, NULL, 'N;'),
('Rutinas.VerIndividual', 0, NULL, NULL, 'N;'),
('Rutinas.View', 0, NULL, NULL, 'N;'),
('Rutinas.View2', 0, NULL, NULL, 'N;'),
('Rutinas.Create', 0, NULL, NULL, 'N;'),
('Rutinas.Update', 0, NULL, NULL, 'N;'),
('Rutinas.Delete', 0, NULL, NULL, 'N;'),
('Rutinas.Index', 0, NULL, NULL, 'N;'),
('Rutinas.Admin', 0, NULL, NULL, 'N;'),
('Servicios.View', 0, NULL, NULL, 'N;'),
('Servicios.Create', 0, NULL, NULL, 'N;'),
('Servicios.Update', 0, NULL, NULL, 'N;'),
('Servicios.Delete', 0, NULL, NULL, 'N;'),
('Servicios.Index', 0, NULL, NULL, 'N;'),
('Servicios.CentroServicios', 0, NULL, NULL, 'N;'),
('Servicios.Admin', 0, NULL, NULL, 'N;'),
('Sesiones.View', 0, NULL, NULL, 'N;'),
('Sesiones.Create', 0, NULL, NULL, 'N;'),
('Sesiones.UsuariosActivos', 0, NULL, NULL, 'N;'),
('Sesiones.Update', 0, NULL, NULL, 'N;'),
('Sesiones.Delete', 0, NULL, NULL, 'N;'),
('Sesiones.Index', 0, NULL, NULL, 'N;'),
('Sesiones.Admin', 0, NULL, NULL, 'N;'),
('Settings.View', 0, NULL, NULL, 'N;'),
('Settings.Create', 0, NULL, NULL, 'N;'),
('Settings.Update', 0, NULL, NULL, 'N;'),
('Settings.Delete', 0, NULL, NULL, 'N;'),
('Settings.VerConfiguraciones', 0, NULL, NULL, 'N;'),
('Settings.CentroConfig', 0, NULL, NULL, 'N;'),
('Settings.Index', 0, NULL, NULL, 'N;'),
('Settings.ActualizarSistema', 0, NULL, NULL, 'N;'),
('Settings.ActualizarBase', 0, NULL, NULL, 'N;'),
('Settings.Admin', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Acerca', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Stock.View', 0, NULL, NULL, 'N;'),
('Stock.Create', 0, NULL, NULL, 'N;'),
('Stock.AplicarPreciosCompra', 0, NULL, NULL, 'N;'),
('Stock.AplicarPreciosServicios', 0, NULL, NULL, 'N;'),
('Stock.AplicarPreciosCategoria', 0, NULL, NULL, 'N;'),
('Stock.AplicarPreciosInventario', 0, NULL, NULL, 'N;'),
('Stock.AplicarStockInventario', 0, NULL, NULL, 'N;'),
('Stock.Update', 0, NULL, NULL, 'N;'),
('Stock.Delete', 0, NULL, NULL, 'N;'),
('Stock.StockReal', 0, NULL, NULL, 'N;'),
('Stock.EstadisticaProducto', 0, NULL, NULL, 'N;'),
('Stock.Etiquetas', 0, NULL, NULL, 'N;'),
('Stock.Index', 0, NULL, NULL, 'N;'),
('Stock.ConsultarCarro', 0, NULL, NULL, 'N;'),
('Stock.CentroStock', 0, NULL, NULL, 'N;'),
('Stock.Admin', 0, NULL, NULL, 'N;'),
('StockDisponible.View', 0, NULL, NULL, 'N;'),
('StockDisponible.Create', 0, NULL, NULL, 'N;'),
('StockDisponible.Update', 0, NULL, NULL, 'N;'),
('StockDisponible.Delete', 0, NULL, NULL, 'N;'),
('StockDisponible.Index', 0, NULL, NULL, 'N;'),
('StockDisponible.Admin', 0, NULL, NULL, 'N;'),
('StockMarcas.View', 0, NULL, NULL, 'N;'),
('StockMarcas.Create', 0, NULL, NULL, 'N;'),
('StockMarcas.Update', 0, NULL, NULL, 'N;'),
('StockMarcas.Delete', 0, NULL, NULL, 'N;'),
('StockMarcas.Index', 0, NULL, NULL, 'N;'),
('StockMarcas.Admin', 0, NULL, NULL, 'N;'),
('StockPrecios.View', 0, NULL, NULL, 'N;'),
('StockPrecios.Create', 0, NULL, NULL, 'N;'),
('StockPrecios.AsignarServicios', 0, NULL, NULL, 'N;'),
('StockPrecios.VariarPreciosTipo', 0, NULL, NULL, 'N;'),
('StockPrecios.Update', 0, NULL, NULL, 'N;'),
('StockPrecios.Delete', 0, NULL, NULL, 'N;'),
('StockPrecios.Index', 0, NULL, NULL, 'N;'),
('StockPrecios.Admin', 0, NULL, NULL, 'N;'),
('StockPreciosItems.View', 0, NULL, NULL, 'N;'),
('StockPreciosItems.Create', 0, NULL, NULL, 'N;'),
('StockPreciosItems.Update', 0, NULL, NULL, 'N;'),
('StockPreciosItems.Delete', 0, NULL, NULL, 'N;'),
('StockPreciosItems.Index', 0, NULL, NULL, 'N;'),
('StockPreciosItems.Admin', 0, NULL, NULL, 'N;'),
('StockTipoProducto.View', 0, NULL, NULL, 'N;'),
('StockTipoProducto.Create', 0, NULL, NULL, 'N;'),
('StockTipoProducto.Update', 0, NULL, NULL, 'N;'),
('StockTipoProducto.Delete', 0, NULL, NULL, 'N;'),
('StockTipoProducto.Index', 0, NULL, NULL, 'N;'),
('StockTipoProducto.Admin', 0, NULL, NULL, 'N;'),
('Talonario.View', 0, NULL, NULL, 'N;'),
('Talonario.Create', 0, NULL, NULL, 'N;'),
('Talonario.Update', 0, NULL, NULL, 'N;'),
('Talonario.Delete', 0, NULL, NULL, 'N;'),
('Talonario.ConsultarNumeroFactura', 0, NULL, NULL, 'N;'),
('Talonario.Index', 0, NULL, NULL, 'N;'),
('Talonario.Admin', 0, NULL, NULL, 'N;'),
('Tareas.GetReporteEmpresa', 0, NULL, NULL, 'N;'),
('Tareas.ReporteEmpresa', 0, NULL, NULL, 'N;'),
('Tareas.ImprimirTareas', 0, NULL, NULL, 'N;'),
('Tareas.Cliente', 0, NULL, NULL, 'N;'),
('Tareas.FinalizarTarea', 0, NULL, NULL, 'N;'),
('Tareas.Finalizar', 0, NULL, NULL, 'N;'),
('Tareas.Pendientes', 0, NULL, NULL, 'N;'),
('Tareas.View', 0, NULL, NULL, 'N;'),
('Tareas.Create', 0, NULL, NULL, 'N;'),
('Tareas.Update', 0, NULL, NULL, 'N;'),
('Tareas.Delete', 0, NULL, NULL, 'N;'),
('Tareas.CentroTareas', 0, NULL, NULL, 'N;'),
('Tareas.VerTodas', 0, NULL, NULL, 'N;'),
('Tareas.VerMisTareas', 0, NULL, NULL, 'N;'),
('Tareas.ImprimirPendientes', 0, NULL, NULL, 'N;'),
('Tareas.TareasMiArea', 0, NULL, NULL, 'N;'),
('Tareas.ImprimirTareasMiArea', 0, NULL, NULL, 'N;'),
('Tareas.ImprimirMisTareas', 0, NULL, NULL, 'N;'),
('Tareas.Index', 0, NULL, NULL, 'N;'),
('Tareas.TareasPendientes', 0, NULL, NULL, 'N;'),
('Tareas.Admin', 0, NULL, NULL, 'N;'),
('TareasCoordinaciones.View', 0, NULL, NULL, 'N;'),
('TareasCoordinaciones.CargarCoordinacion', 0, NULL, NULL, 'N;'),
('TareasCoordinaciones.Create', 0, NULL, NULL, 'N;'),
('TareasCoordinaciones.Update', 0, NULL, NULL, 'N;'),
('TareasCoordinaciones.Delete', 0, NULL, NULL, 'N;'),
('TareasCoordinaciones.Index', 0, NULL, NULL, 'N;'),
('TareasCoordinaciones.Admin', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.View', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.Create', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.Update', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.Tareas', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.VerTodas', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.VerMisTareas', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.Delete', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.Index', 0, NULL, NULL, 'N;'),
('TareasDestinatarios.Admin', 0, NULL, NULL, 'N;'),
('TareasEstados.View', 0, NULL, NULL, 'N;'),
('TareasEstados.Create', 0, NULL, NULL, 'N;'),
('TareasEstados.Update', 0, NULL, NULL, 'N;'),
('TareasEstados.Delete', 0, NULL, NULL, 'N;'),
('TareasEstados.Index', 0, NULL, NULL, 'N;'),
('TareasEstados.EstadosTarea', 0, NULL, NULL, 'N;'),
('TareasEstados.Admin', 0, NULL, NULL, 'N;'),
('UsuariosAreas.View', 0, NULL, NULL, 'N;'),
('UsuariosAreas.Create', 0, NULL, NULL, 'N;'),
('UsuariosAreas.Update', 0, NULL, NULL, 'N;'),
('UsuariosAreas.Delete', 0, NULL, NULL, 'N;'),
('UsuariosAreas.Index', 0, NULL, NULL, 'N;'),
('UsuariosAreas.Admin', 0, NULL, NULL, 'N;'),
('Usuarios.View', 0, NULL, NULL, 'N;'),
('Usuarios.Home', 0, NULL, NULL, 'N;'),
('Usuarios.Create', 0, NULL, NULL, 'N;'),
('Usuarios.Update', 0, NULL, NULL, 'N;'),
('Usuarios.Delete', 0, NULL, NULL, 'N;'),
('Usuarios.Index', 0, NULL, NULL, 'N;'),
('Usuarios.Admin', 0, NULL, NULL, 'N;'),
('UsuariosTipoUsuarios.View', 0, NULL, NULL, 'N;'),
('UsuariosTipoUsuarios.Create', 0, NULL, NULL, 'N;'),
('UsuariosTipoUsuarios.Update', 0, NULL, NULL, 'N;'),
('UsuariosTipoUsuarios.Delete', 0, NULL, NULL, 'N;'),
('UsuariosTipoUsuarios.Index', 0, NULL, NULL, 'N;'),
('UsuariosTipoUsuarios.Admin', 0, NULL, NULL, 'N;'),
('ValorMoneda.View', 0, NULL, NULL, 'N;'),
('ValorMoneda.Create', 0, NULL, NULL, 'N;'),
('ValorMoneda.Update', 0, NULL, NULL, 'N;'),
('ValorMoneda.Delete', 0, NULL, NULL, 'N;'),
('ValorMoneda.Index', 0, NULL, NULL, 'N;'),
('ValorMoneda.Admin', 0, NULL, NULL, 'N;'),
('ValorMonedaTipos.View', 0, NULL, NULL, 'N;'),
('ValorMonedaTipos.Create', 0, NULL, NULL, 'N;'),
('ValorMonedaTipos.Update', 0, NULL, NULL, 'N;'),
('ValorMonedaTipos.Delete', 0, NULL, NULL, 'N;'),
('ValorMonedaTipos.Index', 0, NULL, NULL, 'N;'),
('ValorMonedaTipos.Admin', 0, NULL, NULL, 'N;'),
('WizardFacturaEntrante.NuevaFactura', 0, NULL, NULL, 'N;'),
('AuditTrail.Admin.Admin', 0, NULL, NULL, 'N;'),
('AuditTrail.Default.Index', 0, NULL, NULL, 'N;'),
('Cal.Cron.Index', 0, NULL, NULL, 'N;'),
('Cal.Main.Browse', 0, NULL, NULL, 'N;'),
('Cal.Main.List', 0, NULL, NULL, 'N;'),
('Cal.Main.Update', 0, NULL, NULL, 'N;'),
('Cal.Main.Move', 0, NULL, NULL, 'N;'),
('Cal.Main.Resize', 0, NULL, NULL, 'N;'),
('Cal.Main.CreateHelper', 0, NULL, NULL, 'N;'),
('Cal.Main.RemoveHelper', 0, NULL, NULL, 'N;'),
('Cal.Main.Userpreference', 0, NULL, NULL, 'N;'),
('Administrador', 2, 'Control Total', NULL, 'N;'),
('Mantenimiento', 2, 'Uso del sector Mantenimiento', NULL, 'N;'),
('Ventas', 2, 'Uso de Ventas', NULL, 'N;'),
('Admin', 2, 'Control del sistema', NULL, 'N;'),
('Compras', 2, 'Manejo de Compras', NULL, 'N;'),
('Usuarios.ConsultarGeneral', 0, NULL, NULL, 'N;'),
('Usuarios.EtiquetasGeneral', 0, NULL, NULL, 'N;'),
('Usuarios.Anotador', 0, NULL, NULL, 'N;'),
('Usuarios.EditarPanel', 0, NULL, NULL, 'N;'),
('Crons.*', 1, NULL, NULL, 'N;'),
('Settings.VariablesSistema', 0, NULL, NULL, 'N;'),
('Settings.ImpresionesSistema', 0, NULL, NULL, 'N;'),
('Settings.NewCron', 0, NULL, NULL, 'N;'),
('Settings.ConsultarCrons', 0, NULL, NULL, 'N;'),
('Mensajes.*', 1, NULL, NULL, 'N;'),
('Clientes.EtiquetasMails', 0, NULL, NULL, 'N;'),
('Crons.View', 0, NULL, NULL, 'N;'),
('Crons.Ejecutar', 0, NULL, NULL, 'N;'),
('Crons.Create', 0, NULL, NULL, 'N;'),
('Crons.Update', 0, NULL, NULL, 'N;'),
('Crons.Delete', 0, NULL, NULL, 'N;'),
('Crons.Index', 0, NULL, NULL, 'N;'),
('Crons.Admin', 0, NULL, NULL, 'N;'),
('Mensajes.View', 0, NULL, NULL, 'N;'),
('Mensajes.Create', 0, NULL, NULL, 'N;'),
('Mensajes.Update', 0, NULL, NULL, 'N;'),
('Mensajes.Delete', 0, NULL, NULL, 'N;'),
('Mensajes.Index', 0, NULL, NULL, 'N;'),
('Mensajes.Admin', 0, NULL, NULL, 'N;'),
('OrdenesTrabajo.AgregarCarro', 0, NULL, NULL, 'N;'),
('Stock.PatientCard', 0, NULL, NULL, 'N;'),
('Acciones.EtiquetasMail', 0, NULL, NULL, 'N;'),
('Mensajes.CreateMensajeSms', 0, NULL, NULL, 'N;'),
('Mensajes.CreateMensaje', 0, NULL, NULL, 'N;'),
('Settings.VariablesSistemaUsuario', 0, NULL, NULL, 'N;');


INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Administrador', 'Acciones.*'),
('Administrador', 'Alertas.*'),
('Administrador', 'AlertasUsuario.*'),
('Administrador', 'AuthItemPanel.*'),
('Administrador', 'Balances.*'),
('Administrador', 'Cal.Cron.*'),
('Administrador', 'Cal.Main.*'),
('Administrador', 'CentrosCosto.*'),
('Administrador', 'CierreCuentasEfectivo.*'),
('Administrador', 'ClasificacionAfip.*'),
('Administrador', 'Clientes.*'),
('Administrador', 'ComponentesItems.*'),
('Administrador', 'Compras.*'),
('Administrador', 'ComprasItems.*'),
('Administrador', 'Conceptos.*'),
('Administrador', 'CondicionesCompra.*'),
('Administrador', 'CondicionesCompraItems.*'),
('Administrador', 'CondicionesVenta.*'),
('Administrador', 'CondicionesVentaItems.*'),
('Administrador', 'Crons.*'),
('Administrador', 'CuentasVenta.*'),
('Administrador', 'Events.*'),
('Administrador', 'FacturasEntrantes.*'),
('Administrador', 'FacturasEntrantesConcepto.*'),
('Administrador', 'FacturasEntrantesCorriente.*'),
('Administrador', 'FacturasEntrantesVencimientos.*'),
('Administrador', 'FacturasOrdenesTrabajo.*'),
('Administrador', 'FacturasSalientes.*'),
('Administrador', 'FacturasSalientesVencimiento.*'),
('Administrador', 'Impresiones.*'),
('Administrador', 'Inventarios.*'),
('Administrador', 'InventariosProductos.*'),
('Administrador', 'ItemsFacturaSaliente.*'),
('Administrador', 'Juridicciones.*'),
('Administrador', 'Log.*'),
('Administrador', 'MantenimientosEmpresas.*'),
('Administrador', 'MantenimientosEmpresasVisitasRutina.*'),
('Administrador', 'MantenimientosRutina.*'),
('Administrador', 'Mensajes.*'),
('Administrador', 'Mensajes.CreateMensajeSms'),
('Administrador', 'OrdenesCobro.*'),
('Administrador', 'OrdenesCobroFacturas.*'),
('Administrador', 'OrdenesPago.*'),
('Administrador', 'OrdenesPagoVencimientos.*'),
('Administrador', 'OrdenesTrabajo.*'),
('Administrador', 'OrdenesTrabajoCoordinaciones.*'),
('Administrador', 'OrdenesTrabajoEstados.*'),
('Administrador', 'OrdenesTrabajoItems.*'),
('Administrador', 'PagosFactura.*'),
('Administrador', 'PresupuestoItems.*'),
('Administrador', 'Presupuestos.*'),
('Administrador', 'PresupuestosOrdenesTrabajo.*'),
('Administrador', 'Proveedores.*'),
('Administrador', 'ProveedoresRubros.*'),
('Administrador', 'PuntoVenta.*'),
('Administrador', 'Servicios.*'),
('Administrador', 'Sesiones.*'),
('Administrador', 'Settings.*'),
('Administrador', 'Site.*'),
('Administrador', 'Stock.*'),
('Administrador', 'StockDisponible.*'),
('Administrador', 'StockMarcas.*'),
('Administrador', 'StockPrecios.*'),
('Administrador', 'StockPreciosItems.*'),
('Administrador', 'StockTipoProducto.*'),
('Administrador', 'Talonario.*'),
('Administrador', 'Tareas.*'),
('Administrador', 'TareasCoordinaciones.*'),
('Administrador', 'TareasDestinatarios.*'),
('Administrador', 'TareasEstados.*'),
('Administrador', 'Usuarios.*'),
('Administrador', 'UsuariosAreas.*'),
('Compras', 'Compras.*'),
('Compras', 'ComprasItems.*'),
('Compras', 'Conceptos.*'),
('Compras', 'CondicionesCompra.*'),
('Compras', 'CondicionesCompraItems.*'),
('Compras', 'FacturasEntrantes.*'),
('Compras', 'FacturasEntrantesConcepto.*'),
('Compras', 'FacturasEntrantesVencimientos.*'),
('Compras', 'Inventarios.*'),
('Compras', 'InventariosProductos.*'),
('Compras', 'OrdenesPago.*'),
('Compras', 'OrdenesPagoVencimientos.*'),
('Compras', 'Proveedores.*'),
('Mantenimiento', 'ClasificacionAfip.*'),
('Mantenimiento', 'Clientes.*'),
('Mantenimiento', 'Impresiones.*'),
('Mantenimiento', 'MantenimientosEmpresas.*'),
('Mantenimiento', 'MantenimientosEmpresasVisitasRutina.*'),
('Mantenimiento', 'Mensajes.*'),
('Mantenimiento', 'OrdenesTrabajo.*'),
('Mantenimiento', 'OrdenesTrabajoEstados.*'),
('Mantenimiento', 'Servicios.*'),
('Mantenimiento', 'Settings.VariablesSistemaUsuario'),
('Mantenimiento', 'Site.*'),
('Mantenimiento', 'Stock.*'),
('Mantenimiento', 'Tareas.*'),
('Mantenimiento', 'TareasDestinatarios.*'),
('Mantenimiento', 'TareasEstados.*'),
('Mantenimiento', 'Usuarios.Anotador'),
('Mantenimiento', 'Usuarios.ConsultarGeneral'),
('Mantenimiento', 'Usuarios.EditarPanel'),
('Mantenimiento', 'Usuarios.EtiquetasGeneral'),
('Ventas', 'Acciones.*'),
('Ventas', 'Clientes.*'),
('Ventas', 'CondicionesVenta.*'),
('Ventas', 'CondicionesVentaItems.*'),
('Ventas', 'CuentasVenta.*'),
('Ventas', 'FacturasSalientes.*'),
('Ventas', 'FacturasSalientesVencimiento.*'),
('Ventas', 'Impresiones.*'),
('Ventas', 'ItemsFacturaSaliente.*'),
('Ventas', 'OrdenesCobro.*'),
('Ventas', 'OrdenesCobroFacturas.*'),
('Ventas', 'OrdenesTrabajo.*'),
('Ventas', 'PuntoVenta.*'),
('Ventas', 'Servicios.*'),
('Ventas', 'Settings.VariablesSistemaUsuario'),
('Ventas', 'Site.*'),
('Ventas', 'Stock.*'),
('Ventas', 'StockDisponible.*'),
('Ventas', 'StockMarcas.*'),
('Ventas', 'StockTipoProducto.*'),
('Ventas', 'Talonario.*'),
('Ventas', 'Tareas.*'),
('Ventas', 'Usuarios.Anotador'),
('Ventas', 'Usuarios.ConsultarGeneral'),
('Ventas', 'Usuarios.EditarPanel'),
('Ventas', 'Usuarios.EtiquetasGeneral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authItemPanel`
--

CREATE TABLE IF NOT EXISTS `authItemPanel` (
  `rol` varchar(255) NOT NULL DEFAULT '',
  `panel` longtext,
  PRIMARY KEY (`rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `authItemPanel`
--

INSERT INTO `authItemPanel` (`rol`, `panel`) VALUES
('Administrador', '<p><span style="font-size: x-large; ">&nbsp;PANEL DE CONTROL GERENCIA </span><i><font class="Apple-style-span" size="5"><br />\r\n</font> </i></p>\r\n<table width="100%" border="0" cellpadding="0" cellspacing="0">\r\n    <colgroup><col width="104*" /><col width="152*" /></colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td width="60%">\r\n            <p>%alertas</p>\r\n            </td>\r\n            <td width="30%">\r\n            <p>%indicadorCompras</p>\r\n            <p>%indicadorVentas</p>\r\n            <p>%indicadorPagos</p>\r\n            <p>%indicadorCobros</p>\r\n            <p>%indicadorTareas</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p style="text-align: left; ">&nbsp;%movimientos</p>\r\n<div>&nbsp;</div>\r\n<p>&nbsp;</p>'),
('Mantenimiento', '<p><font class="Apple-style-span" size="5">BIENVENIDO AL SISTEMA %usuario</font></p>\r\n<p style="text-align: right; "><em>%buscadorProductos</em></p>\r\n<p style="text-align: left; ">&nbsp;</p>\r\n<table width="100%" border="0" cellpadding="0" cellspacing="0">\r\n    <colgroup><col width="104*" /><col width="152*" /></colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td width="41%">\r\n            <p>%alertas</p>\r\n            </td>\r\n            <td width="59%">\r\n            <p>%indicadorTareas</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p style="text-align: left; ">&nbsp;</p>'),
('Ventas', '<p><span style="font-size: x-large; ">&nbsp; MESA DE ENTRADA</span></p>\r\n<div style="padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; ">\r\n<p style="text-align: left; ">%buscadorProductos</p>\r\n<p>%indicadorTareas</p>\r\n</div>\r\n<p>&nbsp;</p>'),
('Admin', '<p><span style="font-size: x-large; ">ADMINISTRADOR DEL SISTEMA</span><i><br />\r\n</i></p>\r\n<p style="text-align: left; ">&nbsp;<a href="index.php?r=rights">Ir a modulo de privilegios</a></p>\r\n<p style="text-align: left; ">&nbsp;%movimientos</p>\r\n<div>&nbsp;</div>');


INSERT INTO `centrosCosto` (`idCentroCosto`, `nombre`) VALUES
(1, 'General');


-- --------------------------------------------------------




INSERT INTO `clasificacionAfip` (`idClasificacionAfip`, `nombreClasificacionAfip`, `codigoClasificacion`, `detalle`) VALUES
(1, 'Compra de bienes mercado local (excepto bienes de uso)', 'C1', ''),
(2, 'Locación', 'C2', ''),
(3, 'Prestación de servicios', 'C3', ''),
(4, 'Inversion de bienes de uso', 'C4', ''),
(5, 'Compras de bienes usados a consumidor final', 'C5', ''),
(6, 'Otros conceptos', 'C6', ''),
(7, 'Compras no gravadas y exentas (no genera crédito fiscal)', 'C7', ''),
(8, 'Compra a R.N.I. (no genera crédito fiscal)', 'C8', ''),
(9, 'Compra a monotributista (no genera crédito fiscal)', 'C9', ''),
(10, 'Otras compras (no genera crédito fiscal)', 'C10', ''),
(11, 'Compra de bienes en el exterior', 'C12', ''),
(12, 'Sin Clasificar', 'SIN', '');


INSERT INTO `condicionesCompra` (`idCondicionCompra`, `descripcion`, `generaFacturaCredito`, `porcentajeTotalFacturado`, `cantidadCuotas`, `aVencerEnDias`, `cantidadDiasMeses`, `unidadCantidad`) VALUES
(1, '30 dias', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Contado', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'A 10 DIAS', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '7 días', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Debito', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Cheque a 25-27-29 dias', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '15 Dias', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Cheque al dia', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionesCompra_items`
--



INSERT INTO `condicionesCompra_items` (`idCondicionCompraItem`, `idCondicionCompra`, `porcentajeTotalFacturado`, `cantidadCuotas`, `aVencerEnDias`, `cantidadDiasMeses`, `unidadCantidad`) VALUES
(1, 1, 100, 1, 30, NULL, '0'),
(7, 8, 0, 1, NULL, NULL, ''),
(3, 3, 100, 1, 10, NULL, ''),
(4, 4, 100, 1, 7, NULL, '0'),
(5, 7, 100, 1, 15, NULL, ''),
(6, 2, 100, 0, 0, NULL, '0');



INSERT INTO `condicionesVenta` (`idCondicionVenta`, `descripcionVenta`, `generaFacturaCredito`) VALUES
(1, 'Contado', ''),
(2, '30 dias', ''),
(3, '7 dias', '7 dias'),
(4, 'Cheque al dia', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionesVentaItems`
--



INSERT INTO `condicionesVentaItems` (`idCondicionVentaItem`, `idCondicionVenta`, `porcentajeTotalFacturado`, `cantidadCuotas`, `aVencerEnDias`, `CantidadDiasMesesCuotas`, `porcentajeInteres`, `fechaVencimiento`, `calculo`, `letraDiaMes`) VALUES
(1, 1, 100, 1, 0, 0, 0, '0000-00-00', NULL, '0'),
(2, 2, 100, 1, 30, 0, 0, '0000-00-00', '', '0'),
(3, 3, 0, 1, 7, 1, 0, '2011-11-24', NULL, '5'),
(4, 4, 0, 1, NULL, NULL, NULL, '0000-00-00', NULL, '');





INSERT INTO `cuentasEfectivo` (`idCuentaEfectivo`, `nombre`, `moneda`, `tipo`, `acuerdo`) VALUES
(1, 'Caja', '$', 'caja', 0),
(2, 'Banco Patagonia', '$', 'Cta.Cte', 0),
(3, 'Standart BANK', '$', 'Cta.Cte', 0);



INSERT INTO `cuentasVenta` (`idCuentaVenta`, `nombre`, `otro`) VALUES
(1, 'MERCADERIA', 'MER'),
(2, 'SERVICIOS', 'S');

-- --------------------------------------------------------


INSERT INTO `juridicciones` (`idJuridiccion`, `nombreJuridiccion`, `codigoJuridiccion`) VALUES
(1, 'Chubut', '17');

-- --------------------------------------------------------

INSERT INTO `puntoVenta` (`idPuntoVenta`, `nombrePuntoVenta`, `descripcionPuntoVenta`, `electronica`) VALUES
(1, 'Oficina', 'En oficina Central', 'no');


INSERT INTO `Rights` (`itemname`, `type`, `weight`) VALUES
('Administrador', 2, 1);

INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(1, 'impresiones', 'ORDEN_TRABAJO', '<p><img width="180" height="53" alt="" src="$direccionSistema/images/archivosEditor/image/Logo_Foxis.jpg" /></p>\r\n<div><span style="font-size: small; "><strong>ORDEN DE TRABAJO</strong></span></div>\r\n<div><strong><span style="font-size: xx-small; ">FECHA:</span></strong><span style="font-size: xx-small; "> %fechaOrden</span></div>\r\n<div><strong><span style="font-size: xx-small; ">PRIORIDAD: </span></strong><span style="font-size: xx-small; ">%prioridad</span></div>\r\n<div><strong><span style="font-size: xx-small; ">NRO ORDEN: %nroOrden</span></strong></div>\r\n<div><strong><span style="font-size: xx-small; ">CLIENTE:</span></strong><span style="font-size: xx-small; "> %cliente</span></div>\r\n<div><strong><span style="font-size: xx-small; ">DESCRIPCION CLIENTE:</span></strong><span style="font-size: xx-small; "> %descripcionCliente</span></div>\r\n<div><span style="font-size: xx-small; "> </span><em><strong><span style="font-size: xx-small; ">Gracias por confiar en nuestros servicios!</span></strong></em></div>\r\n<div><em><span style="font-size: xx-small; ">Cualquier consulta puede hacerla al 0297-4476554 o bien acceder a nuestras oficinas en Av San Martin 263 (galeria San Martin) 2do piso of 210</span></em></div>', 'Formulario de las Ordenes de Trabajo', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(2, 'impresiones', 'ORDEN_TRABAJO_PLANILLA', '<table width="761" cellspacing="0" cellpadding="0" border="1" class="MsoTableGrid" style="border-collapse:collapse;mso-table-layout-alt:fixed;border:none;\r\n    mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-yfti-tbllook:\r\n    1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt">\r\n    <tbody>\r\n        <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">\r\n            <td width="357" valign="top" colspan="2" style="width:267.6pt;border-top:solid windowtext 1.0pt;\r\n            border-left:solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:\r\n            none;border-right:none;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:\r\n            solid black .5pt;mso-border-left-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n            normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Fecha:<b style="mso-bidi-font-weight:normal"> %fechaOrden</b> </span></p>\r\n            </td>\r\n            <td width="189" valign="top" colspan="2" style="width:141.8pt;border:none;\r\n            border-top:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;\r\n            padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n            text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n            font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n            </td>\r\n            <td width="215" valign="top" style="width:161.45pt;border-top:solid black 1.0pt;\r\n            mso-border-top-themecolor:text1;border-left:none;border-bottom:none;\r\n            border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n            solid black .5pt;mso-border-top-themecolor:text1;mso-border-right-alt:solid black .5pt;\r\n            mso-border-right-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p align="right" class="MsoNormal" style="margin-top:0cm;margin-right:-.05pt;\r\n            margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:right;\r\n            line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">N&ordm;Orden:   </span><b style="mso-bidi-font-weight:normal"><span style="font-size:16.0pt;\r\n            mso-bidi-font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">%nroOrden</span></b></p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:1">\r\n            <td width="761" valign="top" colspan="5" style="width:570.85pt;border:solid black 1.0pt;\r\n            mso-border-themecolor:text1;border-top:none;mso-border-left-alt:solid black .5pt;\r\n            mso-border-left-themecolor:text1;mso-border-bottom-alt:solid black .5pt;\r\n            mso-border-bottom-themecolor:text1;mso-border-right-alt:solid black .5pt;\r\n            mso-border-right-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p align="center" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n            text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:22.0pt;mso-bidi-font-size:24.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">PLANILLA   FORMATEO</span></b></p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:2;height:69.2pt">\r\n            <td width="761" valign="top" colspan="5" style="width:570.85pt;border:solid black 1.0pt;\r\n            mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n            mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n            text1;padding:0cm 5.4pt 0cm 5.4pt;height:69.2pt">\r\n            <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n            normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Cliente:</span><span style="font-size:14.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"> <span style="mso-spacerun:yes">&nbsp;</span></span><b style="mso-bidi-font-weight:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">%cliente</span></b><br />\r\n            <span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Tel: %telefono</span><br />\r\n            <span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Descripci&oacute;n:   <b style="mso-bidi-font-weight:normal">%descripcionCliente.</b></span><br />\r\n            <span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">%descripcionEncargado.<br />\r\n            <br />\r\n            </span><span style="font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"> </span></p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:3">\r\n            <td width="338" valign="top" style="width:253.5pt;border:none;border-left:solid black 1.0pt;\r\n            mso-border-left-themecolor:text1;mso-border-top-alt:solid black .5pt;\r\n            mso-border-top-themecolor:text1;mso-border-top-alt:solid black .5pt;\r\n            mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n            mso-border-left-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n            normal"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">PASO   1</span></b><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">. Datos de Backup.<b style="mso-bidi-font-weight:normal"> </b></span></p>\r\n            </td>\r\n            <td width="423" valign="top" colspan="4" style="width:317.35pt;border:none;\r\n            border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n            solid black .5pt;mso-border-top-themecolor:text1;mso-border-top-alt:solid black .5pt;\r\n            mso-border-top-themecolor:text1;mso-border-right-alt:solid black .5pt;\r\n            mso-border-right-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n            normal"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">PASO   2</span></b><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">. Soft &amp;   Drivers</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:4;height:167.75pt">\r\n            <td width="338" valign="top" style="width:253.5pt;border-top:none;border-left:\r\n            solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:solid windowtext 1.0pt;\r\n            border-right:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:\r\n            text1;mso-border-bottom-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;\r\n            height:167.75pt">\r\n            <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n            normal">&nbsp;</p>\r\n            <table cellspacing="0" cellpadding="0" border="1" class="MsoTableGrid" style="border-collapse: collapse; border: medium none; width: 380px; height: 190px;">\r\n                <tbody>\r\n                    <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:20.25pt">\r\n                        <td width="156" style="width:116.8pt;border:solid windowtext 1.0pt;\r\n                        mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.25pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Nombre de equipo:</span></p>\r\n                        </td>\r\n                        <td width="175" style="width:131.05pt;border:solid windowtext 1.0pt;\r\n                        border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:background1;\r\n                        mso-background-themeshade:242;padding:0cm 5.4pt 0cm 5.4pt;height:20.25pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:1;height:20.3pt">\r\n                        <td width="156" style="width:116.8pt;border:solid windowtext 1.0pt;\r\n                        border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.3pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Grupo Trabajo:</span></p>\r\n                        </td>\r\n                        <td width="175" style="width:131.05pt;border-top:none;border-left:none;\r\n                        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n                        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-alt:solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:\r\n                        background1;mso-background-themeshade:242;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.3pt">\r\n                        <p align="center" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:\r\n                        .0001pt;text-align:center;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:2;height:20.3pt">\r\n                        <td width="156" style="width:116.8pt;border:solid windowtext 1.0pt;\r\n                        border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.3pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Conexi&oacute;n Internet:</span></p>\r\n                        </td>\r\n                        <td width="175" style="width:131.05pt;border-top:none;border-left:none;\r\n                        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n                        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-alt:solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:\r\n                        background1;mso-background-themeshade:242;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.3pt">\r\n                        <p align="center" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:\r\n                        .0001pt;text-align:center;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:3;height:20.3pt">\r\n                        <td width="156" style="width:116.8pt;border:solid windowtext 1.0pt;\r\n                        border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.3pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Impresora:</span></p>\r\n                        </td>\r\n                        <td width="175" style="width:131.05pt;border-top:none;border-left:none;\r\n                        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n                        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-alt:solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:\r\n                        background1;mso-background-themeshade:242;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.3pt">\r\n                        <p align="center" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:\r\n                        .0001pt;text-align:center;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:4;height:20.3pt">\r\n                        <td width="156" style="width:116.8pt;border:solid windowtext 1.0pt;\r\n                        border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.3pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">IP [Lan/ wireless]:</span></p>\r\n                        </td>\r\n                        <td width="175" style="width:131.05pt;border:none;border-right:solid windowtext 1.0pt;\r\n                        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-right-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.3pt">\r\n                        <p align="center" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:\r\n                        .0001pt;text-align:center;line-height:normal"><span style="font-family:\r\n                        &quot;Arial&quot;,&quot;sans-serif&quot;">____.____.____.____ </span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:5;height:20.25pt">\r\n                        <td width="156" style="width:116.8pt;border:solid windowtext 1.0pt;\r\n                        border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.25pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Puerta de enlace:</span></p>\r\n                        </td>\r\n                        <td width="175" style="width:131.05pt;border:none;border-right:solid windowtext 1.0pt;\r\n                        mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-right-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.25pt">\r\n                        <p align="center" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:\r\n                        .0001pt;text-align:center;line-height:normal"><span style="font-family:\r\n                        &quot;Arial&quot;,&quot;sans-serif&quot;">____.____.____.____</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:6;mso-yfti-lastrow:yes;height:20.3pt">\r\n                        <td width="156" style="width:116.8pt;border:solid windowtext 1.0pt;\r\n                        border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.3pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Servidor DNS:<span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp; </span></span></p>\r\n                        </td>\r\n                        <td width="175" style="width:131.05pt;border-top:none;border-left:none;\r\n                        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n                        mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;\r\n                        padding:0cm 5.4pt 0cm 5.4pt;height:20.3pt">\r\n                        <p align="center" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:\r\n                        .0001pt;text-align:center;line-height:normal"><span style="font-family:\r\n                        &quot;Arial&quot;,&quot;sans-serif&quot;">____.____.____.____</span></p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n            text-align:right;line-height:normal">&nbsp;</p>\r\n            </td>\r\n            <td width="423" valign="top" colspan="4" style="width:317.35pt;border-top:none;\r\n            border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;\r\n            mso-border-right-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;\r\n            mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;\r\n            padding:0cm 5.4pt 0cm 5.4pt;height:167.75pt">\r\n            <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n            text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n            font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n            <table width="366" cellspacing="0" cellpadding="0" border="1" class="MsoTableGrid" style="border-collapse:collapse;mso-table-layout-alt:fixed;border:none;\r\n                mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-yfti-tbllook:\r\n                1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt">\r\n                <tbody>\r\n                    <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="104" valign="top" style="width:77.95pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;\r\n                        mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;\r\n                        mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">SoftPack</span></p>\r\n                        </td>\r\n                        <td width="28" valign="top" style="width:21.25pt;border-top:solid black 1.0pt;\r\n                        mso-border-top-themecolor:text1;border-left:none;border-bottom:solid black 1.0pt;\r\n                        mso-border-bottom-themecolor:text1;border-right:solid windowtext 1.0pt;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-right-alt:\r\n                        solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:background1;\r\n                        mso-background-themeshade:242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="85" valign="top" style="width:63.8pt;border-top:solid black 1.0pt;\r\n                        mso-border-top-themecolor:text1;border-left:none;border-bottom:solid black 1.0pt;\r\n                        mso-border-bottom-themecolor:text1;border-right:solid windowtext 1.0pt;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-right-alt:\r\n                        solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Antivirus:</span></p>\r\n                        </td>\r\n                        <td width="118" valign="top" style="width:88.45pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-left-alt:\r\n                        solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:background1;\r\n                        mso-background-themeshade:242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:1;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="104" valign="top" style="width:77.95pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Adobe     Pro8</span></p>\r\n                        </td>\r\n                        <td width="28" valign="top" style="width:21.25pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid windowtext 1.0pt;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n                        mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;\r\n                        mso-border-themecolor:text1;mso-border-right-alt:solid windowtext .5pt;\r\n                        background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="85" valign="top" style="width:63.8pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid windowtext 1.0pt;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n                        mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;\r\n                        mso-border-themecolor:text1;mso-border-right-alt:solid windowtext .5pt;\r\n                        padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="118" valign="top" style="width:88.45pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid black .5pt;\r\n                        mso-border-themecolor:text1;mso-border-left-alt:solid windowtext .5pt;\r\n                        padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:2;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="104" valign="top" style="width:77.95pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Modelo:</span></p>\r\n                        </td>\r\n                        <td width="231" valign="top" colspan="3" style="width:173.5pt;border-top:none;\r\n                        border-left:none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:\r\n                        text1;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;background:\r\n                        #F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:3;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="104" valign="top" style="width:77.95pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Video:</span></p>\r\n                        </td>\r\n                        <td width="231" valign="top" colspan="3" style="width:173.5pt;border-top:none;\r\n                        border-left:none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:\r\n                        text1;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;background:\r\n                        #F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:4;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="104" valign="top" style="width:77.95pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Audio:</span></p>\r\n                        </td>\r\n                        <td width="231" valign="top" colspan="3" style="width:173.5pt;border-top:none;\r\n                        border-left:none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:\r\n                        text1;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;background:\r\n                        #F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:5;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="104" valign="top" style="width:77.95pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="231" valign="top" colspan="3" style="width:173.5pt;border-top:none;\r\n                        border-left:none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:\r\n                        text1;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:6;mso-yfti-lastrow:yes;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="104" valign="top" style="width:77.95pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="231" valign="top" colspan="3" style="width:173.5pt;border-top:none;\r\n                        border-left:none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:\r\n                        text1;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n            text-align:right;line-height:normal">&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:5;height:12.55pt">\r\n            <td width="761" valign="top" colspan="5" style="width:570.85pt;border-top:none;\r\n            border-left:solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:\r\n            none;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n            mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;\r\n            mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n            mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;\r\n            padding:0cm 5.4pt 0cm 5.4pt;height:12.55pt">\r\n            <p class="MsoNormal" style="margin-top:0cm;margin-right:28.45pt;margin-bottom:\r\n            0cm;margin-left:0cm;margin-bottom:.0001pt;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">PASO   3</span></b><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">. Finalizaci&oacute;n.</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:6;height:1.55pt">\r\n            <td width="761" valign="top" colspan="5" style="width:570.85pt;border-top:none;\r\n            border-left:solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:\r\n            none;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n            mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n            mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;\r\n            padding:0cm 5.4pt 0cm 5.4pt;height:1.55pt">\r\n            <p class="MsoNormal" style="margin-top:0cm;margin-right:28.45pt;margin-bottom:\r\n            0cm;margin-left:0cm;margin-bottom:.0001pt;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></b></p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:7;mso-yfti-lastrow:yes;height:51.0pt">\r\n            <td width="395" valign="top" colspan="3" style="width:296.0pt;border-top:none;\r\n            border-left:solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:\r\n            solid black 1.0pt;mso-border-bottom-themecolor:text1;border-right:none;\r\n            mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n            mso-border-bottom-alt:solid black .5pt;mso-border-bottom-themecolor:text1;\r\n            padding:0cm 5.4pt 0cm 5.4pt;height:51.0pt">\r\n            <table width="387" cellspacing="0" cellpadding="0" border="1" class="MsoTableGrid" style="border-collapse:collapse;mso-table-layout-alt:fixed;border:none;\r\n                mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:\r\n                0cm 5.4pt 0cm 5.4pt;mso-border-insideh:.5pt solid windowtext;mso-border-insidev:\r\n                .5pt solid windowtext">\r\n                <tbody>\r\n                    <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:20.25pt">\r\n                        <td width="170" style="width:127.35pt;border:solid windowtext 1.0pt;\r\n                        mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.25pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Operador(es):</span></p>\r\n                        </td>\r\n                        <td width="217" style="width:163.0pt;border:solid windowtext 1.0pt;\r\n                        border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:background1;\r\n                        mso-background-themeshade:242;padding:0cm 5.4pt 0cm 5.4pt;height:20.25pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes;height:20.3pt">\r\n                        <td width="170" style="width:127.35pt;border:solid windowtext 1.0pt;\r\n                        border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:\r\n                        solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.3pt">\r\n                        <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        text-align:right;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Fecha de finalizaci&oacute;n:</span></p>\r\n                        </td>\r\n                        <td width="217" style="width:163.0pt;border-top:none;border-left:none;\r\n                        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n                        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n                        mso-border-alt:solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:\r\n                        background1;mso-background-themeshade:242;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.3pt">\r\n                        <p align="center" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:\r\n                        .0001pt;text-align:center;line-height:normal"><span style="font-size:12.0pt;\r\n                        font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n            text-align:right;line-height:normal">&nbsp;</p>\r\n            </td>\r\n            <td width="366" valign="top" colspan="2" style="width:274.85pt;border-top:none;\r\n            border-left:none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:\r\n            text1;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n            mso-border-bottom-alt:solid black .5pt;mso-border-bottom-themecolor:text1;\r\n            mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;\r\n            padding:0cm 5.4pt 0cm 5.4pt;height:51.0pt">\r\n            <table cellspacing="0" cellpadding="0" border="1" class="MsoTableGrid" style="border-collapse: collapse; border: medium none; width: 175px; height: 47px;">\r\n                <tbody>\r\n                    <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="132" valign="top" style="width:99.2pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;\r\n                        mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;\r\n                        mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Pegar     Backup</span></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes;height:20.05pt">\r\n                        <td width="30" valign="top" style="width:22.7pt;border:solid black 1.0pt;\r\n                        mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n                        mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n                        text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:\r\n                        242;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:16.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>\r\n                        </td>\r\n                        <td width="132" valign="top" style="width:99.2pt;border-top:none;border-left:\r\n                        none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n                        border-right:solid black 1.0pt;mso-border-right-themecolor:text1;\r\n                        mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;\r\n                        mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n                        mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt;\r\n                        height:20.05pt">\r\n                        <p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n                        line-height:normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Llamar     al cliente</span></p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <p align="right" class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\n            text-align:right;line-height:normal">&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr height="0">\r\n            <td width="765" style="border:none">&nbsp;</td>\r\n            <td width="19" style="border:none">&nbsp;</td>\r\n            <td width="38" style="border:none">&nbsp;</td>\r\n            <td width="133" style="border:none">&nbsp;</td>\r\n            <td width="191" style="border:none">&nbsp;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;line-height:115%"><br />\r\n</span></p>', 'Formulario de planilla de formateo', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(3, 'impresiones', 'FACTURA_CABEZAL', '<p style="text-align: right">\r\n<meta content="text/html; charset=utf-8" http-equiv="content-type"><br />\r\n&nbsp;  </meta>\r\n</p>\r\n<p style="text-align: right">&nbsp;</p>\r\n<p style="text-align: right"><br />\r\n<br />\r\n<big>&nbsp;&nbsp;&nbsp;%fecha&nbsp;&nbsp;&nbsp;&nbsp;</big><br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n&nbsp;</p>\r\n<p>\r\n<meta content="text/html; charset=utf-8" http-equiv="content-type" /></p>\r\n<div style="text-align: left; font-family: ''verdana arial helvetica'', ''sans serif''">&nbsp;&nbsp;\r\n<table border="0" cellspacing="2" cellpadding="2" style="text-align: left; width: 825px; height: 72px">\r\n    <tbody>\r\n        <tr style="font-weight: bold">\r\n            <td style="text-align: right; width: 106px">Se&ntilde;or/es:</td>\r\n            <td style="width: 537px">%cliente</td>\r\n            <td style="width: 74px">&nbsp;</td>\r\n            <td style="width: 233px">&nbsp;</td>\r\n        </tr>\r\n        <tr style="font-weight: bold">\r\n            <td style="text-align: right; width: 106px">Domicilio:</td>\r\n            <td style="width: 537px">%domicilio %numero</td>\r\n            <td style="text-align: right; width: 74px">Tel.:</td>\r\n            <td style="width: 233px">%telefono</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="text-align: right; width: 106px; font-weight: bold">Localidad:</td>\r\n            <td style="width: 537px">%localidad</td>\r\n            <td style="text-align: right; width: 74px; font-weight: bold">CUIT:</td>\r\n            <td style="width: 233px">%cuit</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="text-align: right; width: 106px; font-weight: bold">Condicion IVA:</td>\r\n            <td style="width: 537px">\r\n            <meta content="text/html; charset=utf-8" http-equiv="content-type">%condicionIva                          </meta>\r\n            </td>\r\n            <td style="text-align: right; width: 74px; font-weight: bold">Cond.Venta:</td>\r\n            <td style="width: 233px">\r\n            <meta content="text/html; charset=utf-8" http-equiv="content-type">%condicionVenta                          </meta>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n</div>', 'Cabezal de la factura', NULL),
(4, 'impresiones', 'FACTURA_PIE', '<p>\r\n<meta http-equiv="content-type" content="text/html; charset=utf-8">     </meta>\r\n</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p>\r\n<table border="0" cellpadding="2" cellspacing="2" style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: left; width: 825px; height: 72px; ">\r\n    <tbody>\r\n        <tr>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 106px; font-weight: bold; text-align: right; ">I.V.A 21%</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 537px; ">%iva21</td>\r\n            <td width="50" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 74px; font-weight: bold; text-align: right; ">SUB TOTAL</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 233px; text-align: right; ">%subTotal</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 106px; font-weight: bold; text-align: right; ">I.V.A 10.5%</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 537px; ">\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8">%iva105                                                                 </meta>\r\n            </td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 74px; font-weight: bold; text-align: right; ">TOTAL</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 233px; text-align: right; ">\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8"><span style="font-size: large; ">%total</span>                                                                 </meta>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'Pie de Factura  A', NULL),
(5, 'usuario', 'INICIO_COMPRAS', '<p><span style="font-family: Arial; "><span style="font-size: smaller; "><var>Desde esta interfaz ud. podr&aacute; comandar todo lo referente a las compras. Desde ingresar un Pago de una factura de Compra hasta imprimir las deudas con los proveedores:</var></span></span></p>\r\n<p>&nbsp;</p>\r\n<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="OpenOffice.org 3.2  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n		TD P { margin-bottom: 0cm }\r\n	--><br>\r\n</style>                </meta>\r\n</meta>\r\n</p>\r\n<table width="585" border="0" cellpadding="4" cellspacing="0">\r\n    <colgroup><col width="59" /> 	<col width="216" /> 	<col width="61" /> 	<col width="217" /> 	</colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="59">\r\n            <p style="text-align: right; "><img alt="" src="images/archivosEditor/image/invoice-icon.png" />&nbsp;</p>\r\n            </td>\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=facturasEntrantes">Facturas</a></b></font></font></p>\r\n            </td>\r\n            <td rowspan="2" width="61">\r\n            <p style="text-align: right; ">&nbsp;<a href="index.php?r=gastos"><img alt="" src="images/archivosEditor/image/Money-Safe-1-icon.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=gastos">Pagos</a></b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="2">Vea las ultimas 			facturas imputadas.</font></font></p>\r\n            </td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="2">Vea las ultimos 			pagos imputados.</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="59">\r\n            <p style="text-align: right; "><a href="index.php?r=compras"><img vspace="index.php?r=gastos" alt="" src="images/archivosEditor/image/shopping-cart-icon.png" /></a></p>\r\n            </td>\r\n            <td width="216">\r\n            <p><a href="index.php?r=compras"><span style="font-size: x-large; "><b>Compras</b></span></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8">\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8">\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8">\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8">\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8">                                                                                                                                                                                                                                                                                                                        </meta>\r\n            </meta>\r\n            </meta>\r\n            </meta>\r\n            </meta>\r\n            </td>\r\n            <td rowspan="2" width="61">\r\n            <p style="text-align: right; "><a href="index.php?r=cuentas"><img width="64" height="64" alt="" src="../../../../../images/archivosEditor/image/business-info-icon.png" /></a>&nbsp;</p>\r\n            </td>\r\n            <td width="217">\r\n            <p>&nbsp;<strong><span style="font-size: x-large; "><a href="index.php?r=cuentas">Cuentas</a></span></strong></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="216">\r\n            <p>Vea las compras imputadas con sus determinados items.</p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="217">\r\n            <p>&nbsp;Vea las cuentas disponibles para compras</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p><br />\r\n&nbsp;<em>SALDOS (movimientos reportes)&nbsp;</em></p>\r\n<table width="585" border="0" cellpadding="4" cellspacing="0">\r\n    <colgroup><col width="78" /><col width="197" /><col width="78" /><col width="200" /></colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="78">\r\n            <p align="RIGHT" style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; padding-top: 0cm; padding-right: 0cm; padding-bottom: 0cm; padding-left: 0cm; ">&nbsp;<a href="index.php?r=facturasEntrantes/saldoProveedor"><img width="64" height="64" alt="" src="../../../../../images/archivosEditor/image/i.png" /></a></p>\r\n            </td>\r\n            <td width="197">\r\n            <p style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; padding-top: 0cm; padding-right: 0cm; padding-bottom: 0cm; padding-left: 0cm; ">&nbsp;<span style="font-size: x-large; "><b><a href="index.php?r=facturasEntrantes/saldoProveedor">Saldo P</a><a href="index.php?r=facturasEntrantes/saldoProveedor">roveedor</a></b></span></p>\r\n            </td>\r\n            <td rowspan="2" width="78">\r\n            <p align="RIGHT" style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; padding-top: 0cm; padding-right: 0cm; padding-bottom: 0cm; padding-left: 0cm; ">&nbsp;<a href="index.php?r=facturasEntrantes/saldoProveedores"><img width="48" height="48" alt="" src="../../../../../images/archivosEditor/image/justice-balance-icon.png" /></a></p>\r\n            </td>\r\n            <td width="200">\r\n            <p style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; padding-top: 0cm; padding-right: 0cm; padding-bottom: 0cm; padding-left: 0cm; "><a href="index.php?r=facturasEntrantes/saldoProveedores">&nbsp;<strong><font face="Arial, Verdana, sans-serif"><font size="6"><span style="font-size: x-large; ">S</span></font><span style="font-size: x-large; ">aldo Empresa</span></font></strong></a></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="197">\r\n            <p style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; padding-top: 0cm; padding-right: 0cm; padding-bottom: 0cm; padding-left: 0cm; ">Vea los ultimos movimientos sobre un proveedor.</p>\r\n            </td>\r\n            <td width="200">\r\n            <p style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; padding-top: 0cm; padding-right: 0cm; padding-bottom: 0cm; padding-left: 0cm; ">Vea los movimientos sobre la empresa.</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', NULL, NULL),
(6, 'inicio', 'INICIO_CLIENTES', '<p><var><span style="font-size: smaller; "><span style="font-family: Arial; ">&nbsp;Desde esta interfaz ud. podr&aacute; comandar todo lo referente a las compras. Desde ingresar un Pago de una factura de Compra hasta imprimir las deudas con los proveedores:</span></span></var></p>\r\n<p>&nbsp;</p>\r\n<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="OpenOffice.org 3.2  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n		TD P { margin-bottom: 0cm }\r\n	--><br>\r\n</style></meta>\r\n</meta>\r\n</p>\r\n<table width="585" border="0" cellpadding="4" cellspacing="0">\r\n    <colgroup><col width="59" /> 	<col width="237" /> 	<col width="51" /> 	<col width="206" /> 	</colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="59">\r\n            <p style="text-align: right; "><a href="index.php?r=personas"><img alt="" src="images/archivosEditor/image/financieros/user-info-icon.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="237">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=personas">Clientes</a></b></font></font></p>\r\n            </td>\r\n            <td rowspan="2" width="51">\r\n            <p style="text-align: right; "><a href="index.php?r=empresas"><img alt="" src="images/archivosEditor/image/financieros/User-icon.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="206">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=empresas">Empresas</a></b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="237">\r\n            <p><font face="Arial, sans-serif"><font size="2">Lista de clientes 			cargados.</font></font></p>\r\n            </td>\r\n            <td width="206">\r\n            <p><font face="Arial, sans-serif"><font size="2">Lista de empresas 			cargadas</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="59">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="237">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td rowspan="2" width="51">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="206">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="237">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="206">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p style="margin-bottom: 0cm; border: none; padding: 0cm; widows: 2; orphans: 2">&nbsp;</p>', NULL, NULL),
(7, 'inciio', 'INICIO_STOCK', '<p><span style="font-family: Arial; "><span style="font-size: smaller; "><var>Desde esta interfaz ud. podr&aacute; comandar todo lo referente a las productos:</var></span></span></p>\r\n<p>&nbsp;</p>\r\n<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="OpenOffice.org 3.2  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n		TD P { margin-bottom: 0cm }\r\n	-->\r\n	</style>  </meta>\r\n</meta>\r\n</p>\r\n<p style="margin-bottom: 0cm; border: none; padding: 0cm; font-weight: normal; widows: 2; orphans: 2">&nbsp;</p>\r\n<table width="585" border="0" cellpadding="4" cellspacing="0">\r\n    <colgroup><col width="59" /> 	<col width="216" /> 	<col width="61" /> 	<col width="217" /> 	</colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="59">\r\n            <p style="text-align: right; "><span style="font-size: smaller; "><a href="index.php?r=stock/stockReal"><img align="absMiddle" alt="" src="images/archivosEditor/image/financieros/stockReal.png" /></a></span></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=stock/stockReal">Productos</a></b></font></font></p>\r\n            </td>\r\n            <td rowspan="2" width="61">\r\n            <p style="text-align: right; "><a href="index.php?r=stockTipoProducto"><img alt="" src="images/archivosEditor/image/financieros/tipoProducto.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=stockTipoProducto">Tipo de 			Productos</a></b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="2">Vea la 			disponibilidad de productos.</font></font></p>\r\n            </td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="2">Listado de 			productos tipificados.</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="59">\r\n            <p style="text-align: right; "><a href="index.php?r=inventarios"><img alt="" src="images/archivosEditor/image/financieros/inventory.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=inventarios">Inventarios</a></b></font></font></p>\r\n            </td>\r\n            <td rowspan="2" width="61">\r\n            <p style="text-align: right; "><a href="index.php?r=stock"><img alt="" src="images/archivosEditor/image/financieros/product-icon.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=stock">Lista de 			Productos</a></b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="2">Listado de 			inventarios realizados.</font></font></p>\r\n            </td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="2">Listado de 			productos existentes.</font></font></p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>', NULL, NULL),
(8, 'inicio', 'INICIO_SERVICIOS', '<p><span style="font-family: Arial; "><span style="font-size: smaller; "><var>Desde esta interfaz ud. podr&aacute; comandar todo lo referente a los SERVICIOS PRESTADOS:</var></span></span></p>\r\n<p>&nbsp;</p>\r\n<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="OpenOffice.org 3.2  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n		TD P { margin-bottom: 0cm }\r\n	--><br>\r\n</style></meta>\r\n</meta>\r\n</p>\r\n<table width="585" border="0" cellpadding="4" cellspacing="0">\r\n    <colgroup><col width="59" /> 	<col width="237" /> 	<col width="51" /> 	<col width="206" /> 	</colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="59">\r\n            <p style="text-align: right; "><a href="index.php?r=ordenesTrabajo"><img align="top" alt="" src="images/archivosEditor/image/financieros/ordenes.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="237">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=ordenesTrabajo">Ordenes de 			Trabajo</a></b></font></font></p>\r\n            </td>\r\n            <td rowspan="2" width="51">\r\n            <p style="text-align: right; "><a href="index.php?r=servicios"><img alt="" src="images/archivosEditor/image/financieros/service.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="206">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=servicios">Oferta Servicios</a></b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="237">\r\n            <p><font face="Arial, sans-serif"><font size="2">M&oacute;dulo de ordenes.</font></font></p>\r\n            </td>\r\n            <td width="206">\r\n            <p><font face="Arial, sans-serif"><font size="2">Listado de 			servicios disponibles.</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="59">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="237">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td rowspan="2" width="51">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="206">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="237">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="206">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>', NULL, NULL),
(9, 'system', 'INICIO_TAREAS', '<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="OpenOffice.org 3.2  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n		TD P { margin-bottom: 0cm }\r\n	-->\r\n	</style>         </meta>\r\n</meta>\r\n</p>\r\n<p style="margin-bottom: 0cm; border: none; padding: 0cm; widows: 2; orphans: 2"><i><span style="background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial; ">Tenga al alcance la posibilidad de administrar el sector de VENTAS de forma f&aacute;cil:</span></i></p>\r\n<p style="margin-bottom: 0cm; border: none; padding: 0cm; widows: 2; orphans: 2">&nbsp;</p>\r\n<table width="800" border="0" cellpadding="4" cellspacing="0">\r\n    <colgroup><col width="78" /> 	<col width="223" /> 	<col width="78" /> 	<col width="173" /> 	</colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="78">\r\n            <p align="RIGHT" style="border: none; padding: 0cm"><a href="index.php?r=tareas/verMisTareas"><img alt="" src="images/archivosEditor/image/Actions-mail-mark-task-icon.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="223">\r\n            <p style="border: none; padding: 0cm"><span class="Apple-style-span" style="font-family: Arial, sans-serif; font-size: x-large; "><b><a href="index.php?r=tareas/verMisTareas">Mis Tareas</a></b></span><a href="http://192.168.1.205:5555/fckeditor/editor/index.php?r=tareas/verMisTareas"></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td rowspan="2" width="78">\r\n            <p align="RIGHT" style="border: none; padding: 0cm"><a href="index.php?r=tareas/tareasMiArea"><img alt="" src="images/archivosEditor/image/task-manager-icon.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="173">\r\n            <p style="border: none; padding: 0cm"><span class="Apple-style-span" style="font-family: Arial, sans-serif; font-size: x-large; "><b><a href="index.php?r=tareas/tareasMiArea">Tareas mi Area</a></b></span><a href="http://192.168.1.205:5555/fckeditor/editor/index.php?r=tareas/tareasMiArea"></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="223">\r\n            <p style="border: none; padding: 0cm"><font face="Arial, sans-serif"><font size="2">Lista 			de todas mis tareas.</font></font></p>\r\n            </td>\r\n            <td width="173">\r\n            <p style="border: none; padding: 0cm"><font face="Arial, sans-serif"><font size="2">Listado 			de tareas de mi area.</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td rowspan="2" width="78">\r\n            <p align="RIGHT" style="border: none; padding: 0cm"><a href="index.php?r=mantenimientosEmpresas"><img alt="" src="images/archivosEditor/image/tool-kit-icon.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="223">\r\n            <p style="border: none; padding: 0cm"><span class="Apple-style-span" style="font-family: Arial, sans-serif; font-size: x-large; "><b><a href="index.php?r=mantenimientosEmpresas">Mantenimientos</a></b></span><a href="http://192.168.1.205:5555/fckeditor/editor/index.php?r=mantenimientosEmpresas"></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td rowspan="2" width="78">\r\n            <p align="RIGHT" style="border: none; padding: 0cm">&nbsp;<a href="index.php?r=tareas"><img alt="" src="images/archivosEditor/image/Actions-view-calendar-tasks-icon.png" /></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="173">\r\n            <p style="border: none; padding: 0cm"><span style="font-size: medium; "><b><a href="index.php?r=tareas"><span style="font-size: x-large; ">Centro de Tareas</span></a></b></span><a href="http://192.168.1.205:5555/fckeditor/editor/index.php?r=tareas"></a></p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="223">\r\n            <p style="border: none; padding: 0cm"><font face="Arial, sans-serif"><font size="2">Vea 			los Mantenimientos mensuales.</font></font></p>\r\n            </td>\r\n            <td width="173">\r\n            <p style="border: none; padding: 0cm">&nbsp;<font face="Arial, Verdana, sans-serif"><font size="2" style="font-size: 9pt">Listado 			de todas las tareas</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="78" style="text-align: right; "><a href="index.php?r=cal"><img width="72" height="72" alt="" src="../../../../../images/archivosEditor/image/calendar-icon.png" /></a></td>\r\n            <td width="223">\r\n            <p style="border: none; padding: 0cm"><span class="Apple-style-span" style="font-family: Arial, sans-serif; font-size: x-large; "><b><a href="index.php?r=cal">Calendario</a></b></span></p>\r\n            <p style="border: none; padding: 0cm">Vea las cordinaciones que ha realizado.</p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="78">&nbsp;</td>\r\n            <td width="173">\r\n            <p style="border: none; padding: 0cm">&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="78">&nbsp;</td>\r\n            <td width="223">\r\n            <p style="border: none; padding: 0cm">&nbsp;</p>\r\n            </td>\r\n            <td width="78">&nbsp;</td>\r\n            <td width="173">\r\n            <p style="border: none; padding: 0cm">&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p><br />\r\n&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="OpenOffice.org 3.2  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		P { margin-bottom: 0.21cm }\r\n		TD P { margin-bottom: 0cm }\r\n	--><br></style>        </meta>\r\n</meta>\r\n</p>\r\n<p>&nbsp;</p>', NULL, NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(11, 'impresiones', 'MIS_TAREAS', '<p>&nbsp;<!--[if !mso]>\r\n<style>\r\nv\\:* {behavior:url(#default#VML);}\r\no\\:* {behavior:url(#default#VML);}\r\nw\\:* {behavior:url(#default#VML);}\r\n.shape {behavior:url(#default#VML);}\r\n</style>\r\n<![endif]--><!--[if gte mso 9]><xml>\r\n<w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\nDefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\nLatentStyleCount="267">\r\n<w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Normal" />\r\n<w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="heading 1" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 1" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 2" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 3" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 4" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 5" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 6" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 7" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 8" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 9" />\r\n<w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption" />\r\n<w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Title" />\r\n<w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font" />\r\n<w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Subtitle" />\r\n<w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Strong" />\r\n<w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Emphasis" />\r\n<w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Table Grid" />\r\n<w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text" />\r\n<w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="No Spacing" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 1" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 1" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 1" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 1" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 1" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 1" />\r\n<w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision" />\r\n<w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="List Paragraph" />\r\n<w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Quote" />\r\n<w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Intense Quote" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 1" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 1" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 1" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 1" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 1" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 1" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 1" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 1" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 2" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 2" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 2" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 2" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 2" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 2" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 2" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 2" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 2" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 2" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 2" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 2" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 2" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 2" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 3" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 3" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 3" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 3" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 3" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 3" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 3" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 3" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 3" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 3" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 3" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 3" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 3" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 3" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 4" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 4" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 4" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 4" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 4" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 4" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 4" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 4" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 4" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 4" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 4" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 4" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 4" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 4" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 5" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 5" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 5" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 5" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 5" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 5" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 5" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 5" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 5" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 5" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 5" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 5" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 5" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 5" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 6" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 6" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 6" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 6" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 6" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 6" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 6" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 6" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 6" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 6" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 6" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 6" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 6" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 6" />\r\n<w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis" />\r\n<w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis" />\r\n<w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Subtle Reference" />\r\n<w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Intense Reference" />\r\n<w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Book Title" />\r\n<w:LsdException Locked="false" Priority="37" Name="Bibliography" />\r\n<w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading" />\r\n</w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n/* Style Definitions */\r\ntable.MsoNormalTable\r\n{mso-style-name:"Tabla normal";\r\nmso-tstyle-rowband-size:0;\r\nmso-tstyle-colband-size:0;\r\nmso-style-noshow:yes;\r\nmso-style-priority:99;\r\nmso-style-qformat:yes;\r\nmso-style-parent:"";\r\nmso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\nmso-para-margin-top:0cm;\r\nmso-para-margin-right:0cm;\r\nmso-para-margin-bottom:10.0pt;\r\nmso-para-margin-left:0cm;\r\nline-height:115%;\r\nmso-pagination:widow-orphan;\r\nfont-size:11.0pt;\r\nfont-family:"Calibri","sans-serif";\r\nmso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:"Times New Roman";\r\nmso-fareast-theme-font:minor-fareast;\r\nmso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:"Times New Roman";\r\nmso-bidi-theme-font:minor-bidi;}\r\ntable.MsoTableGrid\r\n{mso-style-name:"Tabla con cuadrícula";\r\nmso-tstyle-rowband-size:0;\r\nmso-tstyle-colband-size:0;\r\nmso-style-priority:59;\r\nmso-style-unhide:no;\r\nborder:solid black 1.0pt;\r\nmso-border-themecolor:text1;\r\nmso-border-alt:solid black .5pt;\r\nmso-border-themecolor:text1;\r\nmso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\nmso-border-insideh:.5pt solid black;\r\nmso-border-insideh-themecolor:text1;\r\nmso-border-insidev:.5pt solid black;\r\nmso-border-insidev-themecolor:text1;\r\nmso-para-margin:0cm;\r\nmso-para-margin-bottom:.0001pt;\r\nmso-pagination:widow-orphan;\r\nfont-size:11.0pt;\r\nfont-family:"Calibri","sans-serif";\r\nmso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;\r\nmso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:"Times New Roman";\r\nmso-bidi-theme-font:minor-bidi;\r\nmso-fareast-language:EN-US;}\r\n</style>\r\n<![endif]--></p>\r\n<table cellspacing="0" cellpadding="0" border="1" class="MsoTableGrid" style="border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;\r\n    mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt">\r\n    <tbody>\r\n        <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">\r\n            <td width="373" style="width:279.55pt;border:solid black 1.0pt;mso-border-themecolor:\r\n            text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:\r\n            0cm 5.4pt 0cm 5.4pt">\r\n            <p align="center" style="text-align:center">Tareas pendientes para %usuario</p>\r\n            </td>\r\n            <td width="209" valign="top" style="width:156.45pt;border:solid black 1.0pt;\r\n            mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;\r\n            mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n            text1;padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p style="text-align: center;"><img style="width: 194px; height: 94px;" alt="" src="../../../../../images/archivosEditor/image/logo.png" />%fecha</p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:1">\r\n            <td width="581" valign="top" colspan="2" style="width:436.0pt;border:solid black 1.0pt;\r\n            mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n            mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n            text1;padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p><!--[if gte mso 9]><xml>\r\n            <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n            DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n            LatentStyleCount="267">\r\n            <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Normal" />\r\n            <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="heading 1" />\r\n            <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2" />\r\n            <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3" />\r\n            <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4" />\r\n            <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5" />\r\n            <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6" />\r\n            <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7" />\r\n            <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8" />\r\n            <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 1" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 2" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 3" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 4" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 5" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 6" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 7" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 8" />\r\n            <w:LsdException Locked="false" Priority="39" Name="toc 9" />\r\n            <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption" />\r\n            <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Title" />\r\n            <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font" />\r\n            <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Subtitle" />\r\n            <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Strong" />\r\n            <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Emphasis" />\r\n            <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Table Grid" />\r\n            <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text" />\r\n            <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="No Spacing" />\r\n            <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Shading" />\r\n            <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light List" />\r\n            <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Grid" />\r\n            <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 1" />\r\n            <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 2" />\r\n            <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 1" />\r\n            <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 2" />\r\n            <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 1" />\r\n            <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 2" />\r\n            <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 3" />\r\n            <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Dark List" />\r\n            <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Shading" />\r\n            <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful List" />\r\n            <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Grid" />\r\n            <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Shading Accent 1" />\r\n            <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light List Accent 1" />\r\n            <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Grid Accent 1" />\r\n            <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1" />\r\n            <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1" />\r\n            <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 1 Accent 1" />\r\n            <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision" />\r\n            <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="List Paragraph" />\r\n            <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Quote" />\r\n            <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Intense Quote" />\r\n            <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 2 Accent 1" />\r\n            <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1" />\r\n            <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1" />\r\n            <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1" />\r\n            <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Dark List Accent 1" />\r\n            <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Shading Accent 1" />\r\n            <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful List Accent 1" />\r\n            <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Grid Accent 1" />\r\n            <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Shading Accent 2" />\r\n            <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light List Accent 2" />\r\n            <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Grid Accent 2" />\r\n            <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2" />\r\n            <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2" />\r\n            <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 1 Accent 2" />\r\n            <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 2 Accent 2" />\r\n            <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2" />\r\n            <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2" />\r\n            <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2" />\r\n            <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Dark List Accent 2" />\r\n            <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Shading Accent 2" />\r\n            <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful List Accent 2" />\r\n            <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Grid Accent 2" />\r\n            <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Shading Accent 3" />\r\n            <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light List Accent 3" />\r\n            <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Grid Accent 3" />\r\n            <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3" />\r\n            <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3" />\r\n            <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 1 Accent 3" />\r\n            <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 2 Accent 3" />\r\n            <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3" />\r\n            <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3" />\r\n            <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3" />\r\n            <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Dark List Accent 3" />\r\n            <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Shading Accent 3" />\r\n            <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful List Accent 3" />\r\n            <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Grid Accent 3" />\r\n            <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Shading Accent 4" />\r\n            <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light List Accent 4" />\r\n            <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Grid Accent 4" />\r\n            <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4" />\r\n            <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4" />\r\n            <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 1 Accent 4" />\r\n            <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 2 Accent 4" />\r\n            <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4" />\r\n            <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4" />\r\n            <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4" />\r\n            <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Dark List Accent 4" />\r\n            <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Shading Accent 4" />\r\n            <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful List Accent 4" />\r\n            <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Grid Accent 4" />\r\n            <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Shading Accent 5" />\r\n            <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light List Accent 5" />\r\n            <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Grid Accent 5" />\r\n            <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5" />\r\n            <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5" />\r\n            <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 1 Accent 5" />\r\n            <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 2 Accent 5" />\r\n            <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5" />\r\n            <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5" />\r\n            <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5" />\r\n            <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Dark List Accent 5" />\r\n            <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Shading Accent 5" />\r\n            <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful List Accent 5" />\r\n            <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Grid Accent 5" />\r\n            <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Shading Accent 6" />\r\n            <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light List Accent 6" />\r\n            <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Light Grid Accent 6" />\r\n            <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6" />\r\n            <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6" />\r\n            <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 1 Accent 6" />\r\n            <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium List 2 Accent 6" />\r\n            <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6" />\r\n            <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6" />\r\n            <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6" />\r\n            <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Dark List Accent 6" />\r\n            <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Shading Accent 6" />\r\n            <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful List Accent 6" />\r\n            <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n            UnhideWhenUsed="false" Name="Colorful Grid Accent 6" />\r\n            <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis" />\r\n            <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis" />\r\n            <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference" />\r\n            <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Intense Reference" />\r\n            <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n            UnhideWhenUsed="false" QFormat="true" Name="Book Title" />\r\n            <w:LsdException Locked="false" Priority="37" Name="Bibliography" />\r\n            <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading" />\r\n            </w:LatentStyles>\r\n            </xml><![endif]--><!--[if gte mso 10]>\r\n            <style>\r\n            /* Style Definitions */\r\n            table.MsoNormalTable\r\n            {mso-style-name:"Tabla normal";\r\n            mso-tstyle-rowband-size:0;\r\n            mso-tstyle-colband-size:0;\r\n            mso-style-noshow:yes;\r\n            mso-style-priority:99;\r\n            mso-style-qformat:yes;\r\n            mso-style-parent:"";\r\n            mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n            mso-para-margin-top:0cm;\r\n            mso-para-margin-right:0cm;\r\n            mso-para-margin-bottom:10.0pt;\r\n            mso-para-margin-left:0cm;\r\n            line-height:115%;\r\n            mso-pagination:widow-orphan;\r\n            font-size:11.0pt;\r\n            font-family:"Calibri","sans-serif";\r\n            mso-ascii-font-family:Calibri;\r\n            mso-ascii-theme-font:minor-latin;\r\n            mso-fareast-font-family:"Times New Roman";\r\n            mso-fareast-theme-font:minor-fareast;\r\n            mso-hansi-font-family:Calibri;\r\n            mso-hansi-theme-font:minor-latin;\r\n            mso-bidi-font-family:"Times New Roman";\r\n            mso-bidi-theme-font:minor-bidi;}\r\n            </style>\r\n            <![endif]--><!--[if gte mso 9]><xml>\r\n            <o:shapedefaults v:ext="edit" spidmax="1026" />\r\n            </xml><![endif]--><!--[if gte mso 9]><xml>\r\n            <o:shapelayout v:ext="edit">\r\n            <o:idmap v:ext="edit" data="1" />\r\n            </o:shapelayout></xml><![endif]--><span style="font-size: smaller;">%tareas</span></p>\r\n            <p>&nbsp;</p>\r\n            <p>&nbsp;</p>\r\n            <p>&nbsp;</p>\r\n            <p>&nbsp;</p>\r\n            <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr style="mso-yfti-irow:2;mso-yfti-lastrow:yes">\r\n            <td width="581" valign="top" colspan="2" style="width:436.0pt;border:solid black 1.0pt;\r\n            mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n            mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n            text1;padding:0cm 5.4pt 0cm 5.4pt">\r\n            <p align="center" style="text-align:center"><i><span style="font-size:7.5pt;\r\n            font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Foxis &ndash; Galeria San Mart&iacute;n 2do piso &ndash;   Oficina 210</span></i></p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">------ ------- ------- ----- ------- ----- ---- --- ------- --------- ----- ---------- ------- ----- ------- ------- --------- ------ -------</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left; "><span style="text-align: -webkit-auto; font-size: smaller; "><b style="font-family: Arial, sans-serif; font-size: 15px; ">FECHA</b></span><span style="text-align: -webkit-auto; font-size: xx-small; ">&nbsp;%fecha</span></p>\r\n<p style="text-align: center; "><span style="font-size: xx-small; ">&nbsp;</span>LISTADO DE TAREA PARA %usuario</p>\r\n<p style="text-align: left; ">A continuaci&oacute;n se listan las tareas para %usuario que se encuentran en estado pendiente:</p>\r\n<p style="text-align: left; ">%tareas</p>\r\n<p style="text-align: left; ">&nbsp;</p>\r\n<p style="text-align: center; "><i style="font-family: Arial, sans-serif; text-align: -webkit-right; font-size: xx-small; ">Foxis &ndash; Galeria San Mart&iacute;n 2do piso &ndash; Oficina 210</i></p>', 'Listado de Mis Tareas', NULL),
(12, 'impresiones', 'TAREAS_MI_AREA', '<p>&nbsp;</p>\r\n<p>\r\n<meta http-equiv="content-type" content="text/html; charset=utf-8" /></p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p>\r\n<table width="100%" border="0" cellpadding="4" cellspacing="0" style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n    <colgroup><col width="83*" /><col width="102*" /><col width="71*" /></colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td width="33%" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="40%" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="28%" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p><font face="Arial, sans-serif"><font size="2" style="font-size: 11pt; "><b>FECHA</b>&nbsp;%fecha</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3" width="100%" valign="TOP" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p align="CENTER"><font face="Arial, sans-serif"><font size="5" style="font-size: 20pt; "><b>LISTADO DE TAREAS DE AREA</b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3" width="100%" valign="TOP" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p><font face="Arial, sans-serif"><font size="2" style="font-size: 11pt; ">A continuaci&oacute;n se listan las tareas del area que se encuentran en estado pendiente:</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3" width="100%" valign="TOP" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p>%tareas</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3" width="100%" valign="TOP" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p align="RIGHT"><font face="Arial, sans-serif"><font size="2"><i>Foxis &ndash; Galeria San Mart&iacute;n 2do piso &ndash; Oficina 210</i></font></font></p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>\r\n</div>\r\n<p>&nbsp;</p>', 'Listado de Tareas para Mi Area', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(13, 'system', 'INICIO_BALANCES', '<p><span style="font-family: Arial; "><span style="font-size: smaller; "><var>Desde  esta interfaz ud. podr&aacute; visualizar todo lo referente a la emrpesa pero de una forma mas global:<br />\r\n</var></span></span></p>\r\n<p>&nbsp;</p>\r\n<table width="585" cellspacing="0" cellpadding="4" border="0">\r\n    <colgroup><col width="59" /> 	<col width="216" /> 	<col width="61" /> 	<col width="217" /> 	</colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td width="59" rowspan="2">\r\n            <p style="text-align: center;"><a href="index.php?r=balances/balanceMensual"><img width="64" height="64" alt="" src="../../../../../images/archivosEditor/image/line-chart-icon.png" /></a>&nbsp;</p>\r\n            </td>\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=balances/balanceMensual">Balance Liquidez</a><br />\r\n            </b></font></font></p>\r\n            </td>\r\n            <td width="61" rowspan="2">\r\n            <p style="text-align: center;"><a href="index.php?r=balances/facturacionContable"><img width="64" height="64" alt="" src="../../../../../images/archivosEditor/image/Column-Chart-icon.png" /></a>&nbsp;</p>\r\n            </td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=balances/facturacionContable">Informe Contable</a><br />\r\n            </b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="2">Vista del balance de efectivo mensual<br />\r\n            </font></font></p>\r\n            </td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="2">Vea informacion en un rango de fechas de movimiento.<br />\r\n            </font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="59" rowspan="2">\r\n            <p style="text-align: right; ">&nbsp;</p>\r\n            <p style="text-align: center;"><a href="index.php?r=balances/informeOrdenes">﻿</a><a href="index.php?r=balances/informeVentas"><img width="64" height="64" alt="" src="../../../../../images/archivosEditor/image/Sales-by-Payment-Method-rep-icon.png" /></a></p>\r\n            <p style="text-align: center;">&nbsp;</p>\r\n            </td>\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><strong><span style="font-size: x-large; "><a href="index.php?r=balances/informeVentas">Informe de Ventas</a></span></strong>             </b></font></font></p>\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="61" rowspan="2">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="217">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="216">\r\n            <p>Vea los indices de ventas</p>\r\n            </td>\r\n            <td width="217">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p><br />\r\n<em>&nbsp; Resumenes/Informes</em></p>\r\n<p>&nbsp;</p>\r\n<table width="585" cellspacing="0" cellpadding="4" border="0">\r\n    <colgroup><col width="59" /><col width="216" /><col width="61" /><col width="217" /></colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td width="59" rowspan="2">\r\n            <p style="text-align: center; "><a href="index.php?r=balances/resumenOrdenes"><img width="64" height="64" alt="" src="../../../../../images/archivosEditor/image/Actions-mail-mark-task-icon.png" /></a>&nbsp;</p>\r\n            </td>\r\n            <td width="216">\r\n            <p><span style="font-size: x-large; "><b><a href="index.php?r=balances/resumenOrdenes">Resumen Ordenes</a></b></span></p>\r\n            </td>\r\n            <td width="61" rowspan="2">\r\n            <p style="text-align: center; ">&nbsp;<img width="64" height="64" alt="" src="../../../../../images/archivosEditor/image/i.png" /></p>\r\n            </td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=balances/resumenMorosos">Morosos</a><br />\r\n            </b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="2">Vista del balance de ordenes en un rango de fechas<br />\r\n            </font></font></p>\r\n            </td>\r\n            <td width="217">\r\n            <p><font face="Arial, sans-serif"><font size="2">Resumen de morosos a cobrar.<br />\r\n            </font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="59" rowspan="2">\r\n            <p style="text-align: right; ">&nbsp;</p>\r\n            <p style="text-align: center; ">&nbsp;<a href="index.php?r=balances/resumenDeudores"><img width="72" height="72" alt="" src="../../../../../images/archivosEditor/image/bank-icon.png" /></a></p>\r\n            </td>\r\n            <td width="216">\r\n            <p><font face="Arial, sans-serif"><font size="5"><b><a href="index.php?r=balances/resumenDeudores">Deudas</a><br />\r\n            </b></font></font></p>\r\n            </td>\r\n            <td width="61" rowspan="2">\r\n            <p>&nbsp;<a href="index.php?r=balances/resumenFinanciero"><img width="64" height="64" alt="" src="../../../../../images/archivosEditor/image/open-safety-box-icon.png" /></a></p>\r\n            </td>\r\n            <td width="217">\r\n            <p>&nbsp;<strong><span style="font-size: x-large; "><a href="index.php?r=balances/resumenFinanciero">Resumen Financiero</a></span></strong></p>\r\n            </td>\r\n        </tr>\r\n        <tr valign="TOP">\r\n            <td width="216">\r\n            <p>Resumen de deudas a pagar</p>\r\n            </td>\r\n            <td width="217">\r\n            <p>&nbsp;Resumen de movimientos de efectivo.&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>', NULL, NULL),
(14, 'impresiones', 'IMPRESION_MANTENIMIENTO', '<p>&nbsp;\r\n<meta http-equiv="content-type" content="text/html; charset=utf-8">&nbsp; </meta>\r\n</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p>\r\n<meta http-equiv="content-type" content="text/html; charset=utf-8" /></p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p>\r\n<table width="100%" border="0" cellpadding="4" cellspacing="0" style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n    <colgroup><col width="83*" /><col width="102*" /><col width="71*" /></colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td width="33%" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p>&nbsp;FECHA ACTUAL: %fechaActual</p>\r\n            </td>\r\n            <td width="40%" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p>&nbsp;</p>\r\n            </td>\r\n            <td width="28%" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p><font face="Arial, sans-serif"><font size="2" style="font-size: 11pt; "><b>FECHA DESDE</b>&nbsp;%fechaInicio</font></font></p>\r\n            <p><b>FECHA HASTA</b>&nbsp;%fechaFin</p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8">\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8">             </meta>\r\n            </meta>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3" width="100%" valign="TOP" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p align="CENTER"><font face="Arial, sans-serif"><font size="5" style="font-size: 20pt; "><b>LISTADO DE TAREAS PARA %cliente</b></font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3" width="100%" valign="TOP" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p><font face="Arial, sans-serif"><font size="2" style="font-size: 11pt; ">A continuaci&oacute;n se listan las tareas para %cliente:</font></font></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3" width="100%" valign="TOP" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p>%tareas</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3" width="100%" valign="TOP" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; ">\r\n            <p align="RIGHT"><font face="Arial, sans-serif"><font size="2"><i>Foxis &ndash; Galeria San Mart&iacute;n 2do piso &ndash; Oficina 210</i></font></font></p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n</div>\r\n<p>&nbsp;</p>', 'Formulario para tareas pendientes por Cliente (mantenimiento)', NULL),
(15, 'impresiones', 'FACTURA_PIE_B', '<p>&nbsp;\r\n<meta http-equiv="content-type" content="text/html; charset=utf-8">&nbsp;        </meta>\r\n</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p>\r\n<meta http-equiv="content-type" content="text/html; charset=utf-8" /></p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p>\r\n<table border="0" cellpadding="2" cellspacing="2" width="825" height="40" style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: left; ">\r\n    <tbody>\r\n        <tr>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 106px; font-weight: bold; text-align: right; ">&nbsp;</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 537px; ">&nbsp;</td>\r\n            <td width="50" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 74px; font-weight: bold; text-align: right; "><span style="font-size: large; ">TOTAL</span></td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 233px; text-align: right; "><span style="font-size: large; ">%total</span></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>\r\n</div>\r\n</div>', 'Pie de Factura B', NULL),
(16, 'impresiones', 'IMPRESION_RECIBOPAGO', '<p>&nbsp;</p>\r\n<p>\r\n<meta http-equiv="content-type" content="text/html; charset=utf-8" /></p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; ">\r\n<p style="font-family: Arial, Verdana, sans-serif; font-size: 12px; text-align: center; ">RECIBO</p>\r\n<p style="font-family: Arial, Verdana, sans-serif; font-size: 12px; text-align: right; "><br />\r\n<big>&nbsp;&nbsp;&nbsp;%fecha&nbsp;&nbsp;&nbsp;&nbsp;</big></p>\r\n<div style="text-align: left; ">\r\n<div style="text-align: right; ">&nbsp;</div>\r\n<table border="0" cellspacing="2" cellpadding="2" style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: left; width: 825px; height: 72px; font-family: ''verdana arial helvetica'', ''sans serif''; font-size: 12px; ">\r\n    <tbody>\r\n        <tr style="font-weight: bold; ">\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: right; width: 106px; ">Se&ntilde;or/es:</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 537px; ">%cliente</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 74px; ">&nbsp;</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 233px; ">&nbsp;</td>\r\n        </tr>\r\n        <tr style="font-weight: bold; ">\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: right; width: 106px; ">Domicilio:</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 537px; ">%domicilio</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: right; width: 74px; ">Tel.:</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 233px; ">%telefono</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: right; width: 106px; font-weight: bold; ">Localidad:</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 537px; ">%localidad</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: right; width: 74px; font-weight: bold; ">CUIT:</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 233px; ">%cuit</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: right; width: 106px; font-weight: bold; ">Condicion IVA:</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 537px; ">\r\n            <meta content="text/html; charset=utf-8" http-equiv="content-type">%condicionIva                          </meta>\r\n            </td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; text-align: right; width: 74px; font-weight: bold; ">Cond.Venta:</td>\r\n            <td style="font-family: Arial, Verdana, sans-serif; font-size: 12px; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 233px; ">\r\n            <meta content="text/html; charset=utf-8" http-equiv="content-type">%condicionVenta                          </meta>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">\r\n<title></title>\r\n<meta name="GENERATOR" content="OpenOffice.org 3.0  (Linux)"> 	<style type="text/css">\r\n	<!--\r\n		@page { margin: 2cm }\r\n		TD P { margin-bottom: 0cm }\r\n		P { margin-bottom: 0.21cm }\r\n	-->\r\n	</style>\r\n<p style="margin-bottom: 0cm">&nbsp;</p>\r\n<table width="100%" border="0" cellpadding="4" cellspacing="0">\r\n    <colgroup><col width="128*" /> 	<col width="128*" /> 	</colgroup>\r\n    <tbody>\r\n        <tr valign="TOP">\r\n            <td width="50%">\r\n            <p><b>Detalle</b>: %detalle</p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n            <td width="50%">\r\n            <p><b>Importe</b>: %importe</p>\r\n            <meta http-equiv="content-type" content="text/html; charset=utf-8" /></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p style="margin-bottom: 0cm">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</meta>\r\n</meta>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>', 'Forma de Recibo', NULL),
(17, 'FINANCIERA', 'PORCENTAJE_VENTA_PRODUCTO', '10', NULL, NULL),
(21, 'system', 'SALDO_CLIENTE', '<p style="text-align: right; "><strong><span style="font-size: smaller; ">Saldo Anterior: %saldoAnterior&nbsp;</span></strong>&nbsp;&nbsp;DESDE:&nbsp;%fechaInicio HASTA&nbsp;%fechaFin</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p style="text-align: center; "><strong><span style="font-size: x-large; ">SALDO&nbsp;%cliente</span></strong></p>\r\n<p>%detalle</p>\r\n</div>', NULL, NULL),
(22, 'system', 'SALDO_EMPRESA', '<p style="text-align: right; "><strong><span style="font-size: smaller; ">Saldo Anterior: %saldoAnterior&nbsp;</span></strong>&nbsp;&nbsp;DESDE:&nbsp;%fechaInicio HASTA&nbsp;%fechaFin</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p style="text-align: center; "><span style="font-size: x-large; ">VENTAS</span></p>\r\n<p><span style="font-size: xx-small; ">%detalle</span></p>\r\n</div>', NULL, NULL),
(23, 'system', 'SALDO_PROVEEDOR', '<p style="text-align: right; ">&nbsp;&nbsp;DESDE:&nbsp;%fechaInicio HASTA&nbsp;%fechaFin</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p style="text-align: center; "><strong><span style="font-size: x-large; ">SALDO %proveedor</span></strong></p>\r\n<p>%detalle</p>\r\n</div>\r\n<p>&nbsp;</p>', NULL, NULL),
(24, 'system', 'SALDO_PROVEEDORES', '<p style="text-align: right; ">&nbsp;&nbsp;DESDE:&nbsp;%fechaInicio HASTA&nbsp;%fechaFin</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p style="text-align: center; "><strong><span style="font-size: x-large; ">SALDO PROVEEDORES<br />\r\n</span></strong></p>\r\n<p>%detalle</p>\r\n</div>', NULL, NULL),
(25, 'system', 'IMPRESION_PRESUPUESTO', '<p style="text-align: right; ">&nbsp;<strong>FECHA</strong>&nbsp;%fechaPresupuesto</p>\r\n<p style="text-align: right; "><strong>PRESUPUESTO:</strong>&nbsp;%tipoPresupuesto</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p style="text-align: center; "><strong><span style="font-size: x-large; ">PRESUPUESTO</span></strong></p>\r\n<p><strong>CLIENTE:</strong>&nbsp;%cliente</p>\r\n<p><strong>ASUNTO:</strong>&nbsp;%asunto</p>\r\n<p><strong>FORMA DE PAGO:&nbsp;</strong>%formaPago</p>\r\n<p><strong>VENCIMIENTO:&nbsp;</strong>%vencimiento</p>\r\n<p><strong>CONDICIONES:</strong>&nbsp;%condiciones</p>\r\n<p>%detalle</p>\r\n<p>&nbsp;</p>\r\n</div>', NULL, NULL),
(26, 'system', 'IMPRESION_FACTURACION_CONTABLE', '<p style="text-align: right; ">&nbsp;PERIODO&nbsp;<strong>DESDE:</strong>&nbsp;%fechaInicio</p>\r\n<p style="text-align: right; "><strong>HASTA:&nbsp;</strong>&nbsp; &nbsp;%fechaFin&nbsp;</p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p style="text-align: center; "><span style="font-size: x-large; "><strong>INFORMACION CONTABLE</strong></span></p>\r\n<p style="text-align: right; "><span style="font-size: small; "><strong>FACTURAS DE COMPRA</strong></span></p>\r\n<p>%facturacionEntrante</p>\r\n<p style="text-align: right; "><span style="font-size: medium; "><strong><span style="font-size: small; ">FACTURAS DE VENTA</span></strong></span></p>\r\n<p>%facturacionSaliente</p>\r\n<p style="text-align: right; "><span style="font-size: small; ">&nbsp;<strong>RESUMEN</strong></span></p>\r\n<p>%facturacion</p>\r\n<p>&nbsp;</p>\r\n</div>', NULL, NULL),
(27, 'system', 'IMPRESION_INFORME_VENTAS', '<p style="text-align: right; ">&nbsp;&nbsp;PERIODO&nbsp;<strong>DESDE:</strong>&nbsp;%fechaInicio</p>\r\n<p style="text-align: right; "><strong>HASTA:&nbsp;</strong>&nbsp; &nbsp;%fechaFin</p>\r\n<p style="text-align: center; ">&nbsp;<span style="font-size: x-large; "><strong>INFORME DE VENTAS</strong></span></p>\r\n<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p style="text-align: right; "><span style="font-size: small; "><strong>INFORME</strong></span></p>\r\n<p>DETALLE POR CUENTA</p>\r\n<p>%informe</p>\r\n<p>DETALLE POR TIPO DE PRODUCTO/SERVICIO</p>\r\n<p>%tipoProducto</p>\r\n<p><em>DETALLE DE LAS VENTAS</em></p>\r\n<p>%detalle</p>\r\n<p style="text-align: right; "><b><br />\r\n</b></p>\r\n<p>&nbsp;</p>\r\n</div>', NULL, NULL),
(28, 'system', 'IMPRESION_ORDENES', '<div style="background-color: rgb(255, 255, 255); padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Arial, Verdana, sans-serif; font-size: 12px; ">\r\n<p style="text-align: right; "><img width="194" height="94" alt="" src="../../../../../images/archivosEditor/image/logo.png" /></p>\r\n<p style="text-align: right; ">Fecha <strong>DESDE</strong> %fechaInicio</p>\r\n<p style="text-align: right; "><strong>HASTA</strong> %fechaFin</p>\r\n<p style="text-align: center; "><span style="font-size: xx-large; ">INFORME DE ORDENES DE TRABAJO</span></p>\r\n<p><em>INFORME REDUCIDO</em></p>\r\n<p>%informe</p>\r\n<p><em>DETALLE</em></p>\r\n<p>%detalle</p>\r\n</div>', NULL, NULL),
(29, 'system', 'IMPRESION_MOROSOS', '<p style="text-align: center; "><span style="font-size: x-large; ">RESUMEN DE MOROSOS</span></p>\r\n<p>INFORME DE MOROSOS AL DIA</p>\r\n<p><span style="font-size: xx-small; ">%informe</span></p>', NULL, NULL),
(30, 'system', 'IMPRESION_DEUDORES', '<p style="text-align: center; "><span style="font-size: x-large; ">RESUMEN DE DEUDAS</span></p>\r\n<p>Listado de proveedores a los cuales se registran deudas:</p>\r\n<p><span style="font-size: xx-small; ">%informe&nbsp;</span></p>', NULL, NULL),
(31, 'system', 'VERSION', 'U    protected/models/Impresiones.php', NULL, NULL),
(32, 'system', 'BASE', 'No new migration found. Your system is up-to-date.', NULL, NULL),
(33, 'impresiones', 'IMPRESION_CLIENTES', '<p style="text-align: center; "><span style="font-size: x-large; ">LISTADO DE CLIENTES</span></p>\r\n<p><span style="font-size: xx-small; ">%clientes</span></p>', 'Listado de Clientes', NULL),
(34, 'impresiones', 'IMPRESION_PROVEEDOR', '<p style="text-align: center; "><span style="font-size: x-large; ">LISTADO DE PROVEEDORES</span></p>\r\n<p><span style="font-size: xx-small; ">%proveedores</span></p>', 'Listado de Proveedores', NULL),
(37, 'impresiones', 'IMPRESION_STOCK', '<p style="text-align: center; "><span style="font-size: x-large; ">LISTADO DE PRODUCTOS</span></p>\r\n<p><span style="font-size: xx-small; ">&nbsp;%stock</span></p>', 'Listado de Productos', NULL),
(38, 'impresiones', 'IMPRESION_SERVICIO', '<p style="margin-left: 80px; text-align: right; "><img width="194" height="94" alt="" src="../../../../../images/archivosEditor/image/logo.png" /></p>\r\n<p style="text-align: center; "><span style="font-size: x-large; ">LISTADO DE SERVICIOS PARA OFRECER</span></p>\r\n<p><span style="font-size: xx-small; ">&nbsp;%servicio</span></p>', 'Listado de Servicios', NULL),
(39, 'system', 'IMPRESION_MANTENIMIENTO_PEND', '<p style="text-align: right; ">%fechaActual</p>\r\n<h1 style="text-align: center; ">&nbsp;%cliente&nbsp;</h1>\r\n<p>&nbsp;</p>\r\n<p>Encargado de la visita : _____________________________</p>\r\n<p>&nbsp;</p>\r\n<p>Hora de Llegada y salida: <span style="font-size: x-large; ">________ : _______ </span>hasta<span style="font-size: large; "> </span><span style="font-size: x-large; ">_______ : _________</span></p>\r\n<p>Listado de las tareas pendientes para el cliente:</p>\r\n<p>%tareas</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Por favor complete AQUI las tareas pendientes en la visita realizada</strong> (en caso de falta de espacio completar al dorso de esta hoja)<strong>:</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: right; ">___________________</p>\r\n<p style="text-align: right; ">Firma de confirmidad</p>', NULL, NULL),
(40, 'ventas', 'IDCLIENTE_CONSUMIDORFINAL', '704', NULL, NULL),
(41, 'ventas', 'ID_CONTADO', '1', NULL, NULL),
(42, 'impresiones', 'IMPRESION_FACTURASCOMPRA', '<div style="text-align: center; "><span style="font-size: x-large; ">COMPRAS</span></div>\r\n<div style="text-align: center; "><em><span style="color: rgb(128, 128, 128); ">Detalle de compras realizadas en el mes</span></em></div>\r\n<p><span style="font-size: xx-small; ">%items</span></p>', 'Listado de Compras ', NULL),
(43, 'system', 'MAX_STOCK', '25000', 'MAX_STOCK', NULL),
(44, 'system', 'MAX_VERDE_COMPRAS_STOCK', '15000', 'MAX_VERDE_COMPRAS_STOCK', NULL),
(45, 'system', 'MIN_ROJO_COMPRAS_STOCK', '25000', 'MIN_ROJO_COMPRAS_STOCK', NULL),
(46, 'system', 'MAX_STOCK_CONCEPTOS', '30000', 'MAX_STOCK_CONCEPTOS', NULL),
(47, 'system', 'MAX_VERDE_COMPRAS_CONCEPTOS', '20000', 'MAX_VERDE_COMPRAS_CONCEPTOS', NULL),
(48, 'system', 'MIN_ROJO_COMPRAS_CONCEPTOS', '25000', 'MIN_ROJO_COMPRAS_CONCEPTOS', NULL),
(49, 'system', 'MAX_STOCK_TOTALES', '40000', 'MAX_STOCK_TOTALES', NULL),
(50, 'system', 'MAX_STOCK_TOTALES_VERDE', '20000', 'MAX_STOCK_TOTALES_VERDE', NULL),
(51, 'system', 'MAX_STOCK_TOTALES_ROJO', '25000', 'MAX_STOCK_TOTALES_ROJO', NULL),
(52, 'system', 'MAX_STOCK_VENTAS', '60000', 'MAX_STOCK_VENTAS', NULL),
(53, 'system', 'MAX_STOCK_VENTAS_VERDE', '20000', 'MAX_STOCK_VENTAS_VERDE', NULL),
(54, 'system', 'MAX_STOCK_VENTAS_ROJO', '30000', 'MAX_STOCK_VENTAS_ROJO', NULL),
(55, 'system', 'MAX_SERVICIOS_VENTAS', '40000', 'MAX_SERVICIOS_VENTAS', NULL),
(56, 'system', 'MAX_SERVICIOS_VENTAS_VERDE', '25000', 'MAX_SERVICIOS_VENTAS_VERDE', NULL),
(57, 'system', 'MAX_SERVICIOS_VENTAS_ROJO', '32000', 'MAX_SERVICIOS_VENTAS_ROJO', NULL),
(58, 'system', 'MAX_TOTALES_VENTAS', '40000', 'MAX_TOTALES_VENTAS', NULL),
(59, 'system', 'MAX_TOTALES_VENTAS_VERDE', '25000', 'MAX_TOTALES_VENTAS_VERDE', NULL),
(60, 'system', 'MAX_TOTALES_VENTAS_ROJO', '30000', 'MAX_TOTALES_VENTAS_ROJO', NULL),
(61, 'system', 'VENTAS_ALERTAS_PRECIOS', '1', 'VENTAS_ALERTAS_PRECIOS', NULL),
(62, 'system', 'SERVICIOS_DIAS_FINALIZA', '2', 'SERVICIOS_DIAS_FINALIZA', NULL),
(63, 'system', 'SERVICIOS_ALERTAS_ACTIVAS', '1', 'SERVICIOS_ALERTAS_ACTIVAS', NULL),
(64, 'system', 'TAREAS_ALERTAS_ACTIVAS', '1', 'TAREAS_ALERTAS_ACTIVAS', NULL),
(65, 'system', 'ORDENESTRABAJO_DIRECCION', 'ORDENESTRABAJO_DIRECCION', 'ORDENESTRABAJO_DIRECCION', NULL),
(66, 'system', 'ORDENESTRABAJO_TELEFONO', 'ORDENESTRABAJO_TELEFONO', 'ORDENESTRABAJO_TELEFONO', NULL),
(67, 'system', 'ORDENESTRABAJO_DIRECIONRETIRO', 'ORDENESTRABAJO_DIRECIONRETIRO', 'ORDENESTRABAJO_DIRECIONRETIRO', NULL),
(68, 'system', 'ORDENESTRABAJO_HORARIOS', 'ORDENESTRABAJO_HORARIOS', 'ORDENESTRABAJO_HORARIOS', NULL),
(69, 'system', 'ORDENESTRABAJO_SITE', 'ORDENESTRABAJO_SITE', 'ORDENESTRABAJO_SITE', NULL),
(70, 'system', 'ORDENESTRABAJO_EMAILADMIN', 'ORDENESTRABAJO_EMAILADMIN', 'ORDENESTRABAJO_EMAILADMIN', NULL),
(71, 'system', 'DATOS_EMPRESA_RAZONSOCIAL', '%%razonSocial', 'DATOS_EMPRESA_RAZONSOCIAL', NULL),
(72, 'system', 'DATOS_EMPRESA_FANTASIA', '%%nombreFantasia', 'DATOS_EMPRESA_FANTASIA', NULL),
(73, 'system', 'DATOS_EMPRESA_CUIT', '%%cuitEmpresa', 'DATOS_EMPRESA_CUIT', NULL),
(74, 'system', 'DATOS_EMPRESA_DIRECCION', '%%direccionEmpresa', 'DATOS_EMPRESA_DIRECCION', NULL),
(75, 'system', 'DATOS_EMPRESA_TELEFONO', '%%telefonoEmpresa', 'DATOS_EMPRESA_TELEFONO', NULL),
(76, 'system', 'DATOS_EMPRESA_DIRECIONRETIRO', '%%dirRetiro', 'DATOS_EMPRESA_DIRECIONRETIRO', NULL),
(77, 'system', 'DATOS_EMPRESA_HORARIOS', '%%horarios', 'DATOS_EMPRESA_HORARIOS', NULL),
(78, 'system', 'DATOS_EMPRESA_SITE', '%%site', 'DATOS_EMPRESA_SITE', NULL),
(79, 'system', 'DATOS_EMPRESA_EMAILADMIN', '%%remitenteAdmin', 'DATOS_EMPRESA_EMAILADMIN', NULL),
(80, 'system', 'IMPRESION_MAX_DETALLE', '300', 'IMPRESION_MAX_DETALLE', NULL),
(81, 'system', 'GENERALES_RUTAMAILS', 'http://www.foxis.com.ar/mailtest/myemailserv.php?wsdl', 'GENERALES_RUTAMAILS', NULL),
(82, 'system', 'GENERALES_MAIL_ACTIVOTAREAS', '1', 'GENERALES_MAIL_ACTIVOTAREAS', NULL),
(83, 'system', 'GENERALES_MENSAJETEXTO_ACTIVO', '1', 'GENERALES_MENSAJETEXTO_ACTIVO', NULL),
(84, 'system', 'GENERALES_MENSAJETEXTO_NRO', '1', 'GENERALES_MENSAJETEXTO_NRO', NULL),
(85, 'system', 'GENERALES_MAIL_REMITENTE_TAREAS', '%%remitenteTareas', 'GENERALES_MAIL_REMITENTE_TAREAS', NULL),
(86, 'system', 'GENERALES_MAIL_ACTIVORDENES', '1', 'GENERALES_MAIL_ACTIVORDENES', NULL),
(87, 'system', 'GENERALES_MAIL_REMITENTE_ORDENES', '%%remitenteOrdenes', 'GENERALES_MAIL_REMITENTE_ORDENES', NULL),
(88, 'system', 'ORDENES_AREA_ENCARGADA', '1', 'ORDENES_AREA_ENCARGADA', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(89, 'impresiones', 'GENERALES_MAIL_IMPRESION_ORDEN', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>NUEVA ORDEN DE TRABAJO</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Cliente<br />\r\n                                                            </b>                                                             %cliente &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n                                                            <strong>Fecha de la Orden</strong><br />\r\n                                                            %fechaTarea</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;</div>\r\n                                                            <div mc:edit="std_content01"><strong>Prioridad</strong></div>\r\n                                                            <div mc:edit="std_content01">%prioridad</div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                <!-- // End Module: Standard Content \\\\ --></td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <!-- // End Sidebar \\\\ -->\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <h3><!-- // Begin Module: Standard Content \\\\ -->                                     Hola ha ingresado una nueva orden de Trabajo!</h3>\r\n                                    <h3><br />\r\n                                    Contenido de la Orden</h3>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00" style="text-align: left; "><strong>DESCRIPCION</strong>&nbsp;<strong>DEL CLIENTE: </strong>%descripcionCliente&nbsp;</div>\r\n                                                <div mc:edit="std_content00" style="text-align: left; "><strong>DESCRIPCION</strong>&nbsp;<strong>PARA</strong>&nbsp;<strong>REPARADOR:&nbsp;</strong>%descripcionEncargado &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n                                                <div mc:edit="std_content00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; ">&nbsp;<span style="background-color: rgb(250, 250, 250); ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="background-color: rgb(250, 250, 250); " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - Nueva Orden de Trabajo Creada', NULL),
(90, 'impresiones', 'GENERALES_MAIL_IMPRESION_TAREA', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>NUEVA TAREA</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Cliente<br />\r\n                                                            </b>                                                             %cliente &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n                                                            <div mc:edit="std_content01"><strong>Fecha de la Tarea</strong><br />\r\n                                                            %fecha</div>\r\n                                                            <div mc:edit="std_content01"><strong>Tipo de Tarea</strong></div>\r\n                                                            <div mc:edit="std_content01">%tipoTarea</div>\r\n                                                            <div mc:edit="std_content01"><strong>Prioridad</strong></div>\r\n                                                            <div mc:edit="std_content01">%prioridadTarea</div>\r\n                                                            <div mc:edit="std_content01"><strong>Visita</strong></div>\r\n                                                            <div mc:edit="std_content01">%visitaRutina</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;</div>\r\n                                                            <div mc:edit="std_content01">%linkMisTareas</div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <h3>&nbsp;</h3>\r\n                                    <h3>Contenido de la tarea</h3>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00"><strong>TAREA:</strong> %mensaje<br />\r\n                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; ">&nbsp;<span style="background-color: rgb(250, 250, 250); ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email&nbsp;</span><a style="background-color: rgb(250, 250, 250); " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - Nueva Tarea Creada', NULL),
(91, 'system', 'IMPRESION_MAX_CLIENTE', '300', 'IMPRESION_MAX_CLIENTE', NULL),
(92, 'system', 'IMPRESION_MAX_DETALLE2', 'IMPRESION_MAX_DETALLE2', 'IMPRESION_MAX_DETALLE2', NULL),
(93, 'system', 'GENERALES_MAIL_ACTIVOGENERAL', '1', 'GENERALES_MAIL_ACTIVOGENERAL', NULL),
(94, 'system', 'GENERALES_SMS_ACTIVO', '1', 'GENERALES_SMS_ACTIVO', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(95, 'impresiones', 'GENERALES_MAIL_IMPRESION_TAREAPENDIENTE', '<p><style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n\r\n			/* Template Styles */\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border: 1px solid #DDDDDD;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:30px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:26px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:22px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:0;\r\n				/*@editable*/ text-align:center;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n			}\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:12px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:center;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:center;\r\n			}\r\n\r\n			#monkeyRewards img{\r\n				max-width:190px;\r\n			}\r\n		</style></p>\r\n<center>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="900" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em style="color: rgb(112, 112, 112); ">Foxis Av San Martin of 210 2do piso</em></div>\r\n                                    </td>\r\n                                    <td valign="top" width="190">\r\n                                    <div mc:edit="std_preheader_links"><span style="color: rgb(112, 112, 112); ">El email no se ver correctamente?</span></div>\r\n                                    <div mc:edit="std_preheader_links"><a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    <div mc:edit="std_preheader_links">&nbsp;</div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><!-- // Begin Module: Standard Header Image \\\\ -->                                             	<input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:900px;" />                                             	<!-- // End Module: Standard Header Image \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="bodyContent"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top">\r\n                                                <div mc:edit="std_content00">\r\n                                                <h1 class="h1" style="text-align: center; ">TAREAS PENDIENTES</h1>\r\n                                                <h4>Hola %usuario tenes tareas pendientes a la fecha %fecha :</h4>\r\n                                                %contenido</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="900" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social"><span style="font-size: 11px; line-height: 13px; ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email &nbsp;</span><a style="font-size: 11px; line-height: 13px; " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong style="font-size: 11px; line-height: 13px; background-color: rgb(250, 250, 250); "><i>S</i></strong><i style="font-size: 11px; line-height: 13px; background-color: rgb(250, 250, 250); ">istemas a Medidas |&nbsp;<strong>V</strong>entas de Insumos |&nbsp;<strong>S</strong>istema&nbsp;<strong>GFox</strong></i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; "><span style="background-color: rgb(250, 250, 250); font-size: 11px; line-height: 13px; text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</span></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - Listado recordatorio de TAREA PENDIENTES', NULL),
(96, 'system', 'GENERALES_RUTASISTEMA', 'foxis.sytes.net:1234/%%rutaSistema', 'GENERALES_RUTASISTEMA', NULL),
(97, 'system', 'GENERALES_MAIL_REMITENTE_FINANZAS', '%%remitenteFinanzas', 'GENERALES_MAIL_REMITENTE_FINANZAS', NULL),
(98, 'impresiones', 'GENERALES_MAIL_IMPRESION_COBROPENDIENTE', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>FACTURA PENDIENTE</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Importe<br />\r\n                                                            </b>                                                             %importeFactura &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n                                                            <strong>Nro Factura</strong><br />\r\n                                                            %numeroFactura</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;</div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <h3>&nbsp;</h3>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00">Hola <strong>%contacto</strong> tenemos una factura <strong>(%tipoFactura %numeroFactura)</strong> pendiente de pago con un importe de %importeFactura. Cualquier novedad por favor comunicarse al <strong>4476554 (oficina) </strong>o bien le paso los datos para hacer el deposito o transferencia bancaria:<br />\r\n                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; ">&nbsp;<span style="background-color: rgb(250, 250, 250); ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="background-color: rgb(250, 250, 250); " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - Factura prendiente de PAGO ', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(99, 'impresiones', 'GENERALES_MAIL_IMPRESION_COBROSGRAL', '<p><style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n\r\n			/* Template Styles */\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border: 1px solid #DDDDDD;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:30px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:26px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:22px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:0;\r\n				/*@editable*/ text-align:center;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n			}\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:12px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:center;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:center;\r\n			}\r\n\r\n			#monkeyRewards img{\r\n				max-width:190px;\r\n			}\r\n		</style></p>\r\n<center>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="900" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em style="color: rgb(112, 112, 112); ">Foxis Av San Martin of 210 2do piso</em></div>\r\n                                    </td>\r\n                                    <td valign="top" width="190">\r\n                                    <div mc:edit="std_preheader_links"><span style="color: rgb(112, 112, 112); ">El email no se ver correctamente?</span></div>\r\n                                    <div mc:edit="std_preheader_links"><a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    <div mc:edit="std_preheader_links">&nbsp;</div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><!-- // Begin Module: Standard Header Image \\\\ -->                                             	<input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:900px;" />                                             	<!-- // End Module: Standard Header Image \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="bodyContent"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top">\r\n                                                <div mc:edit="std_content00">\r\n                                                <h1 class="h1" style="text-align: center; ">COBROS VENCIDOS</h1>\r\n                                                <h4>A la fecha %fechaActual</h4>\r\n                                                %contenido</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="900" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social"><span style="font-size: 11px; line-height: 13px; ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="font-size: 11px; line-height: 13px; " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong style="font-size: 11px; line-height: 13px; background-color: rgb(250, 250, 250); "><i>S</i></strong><i style="font-size: 11px; line-height: 13px; background-color: rgb(250, 250, 250); ">istemas a Medidas |&nbsp;<strong>V</strong>entas de Insumos |&nbsp;<strong>S</strong>istema&nbsp;<strong>GFox</strong></i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; "><span style="background-color: rgb(250, 250, 250); font-size: 11px; line-height: 13px; text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</span></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail- finanzas listado vencidos', NULL),
(100, 'system', 'TAREAS_ALERTAS_MANT_MAIL', '1', 'TAREAS_ALERTAS_MANT_MAIL', NULL),
(101, 'impresiones', 'MAIL_AUTOMATICO_MANTENIMIENTOS', '<p><style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n\r\n			/* Template Styles */\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border: 1px solid #DDDDDD;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:30px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:26px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:22px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:0;\r\n				/*@editable*/ text-align:center;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n			}\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:12px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:center;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:center;\r\n			}\r\n\r\n			#monkeyRewards img{\r\n				max-width:190px;\r\n			}\r\n		</style></p>\r\n<center>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="900" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em style="color: rgb(112, 112, 112); ">Foxis Av San Martin of 210 2do piso</em></div>\r\n                                    </td>\r\n                                    <td valign="top" width="190">\r\n                                    <div mc:edit="std_preheader_links"><span style="color: rgb(112, 112, 112); ">El email no se ver correctamente?</span></div>\r\n                                    <div mc:edit="std_preheader_links"><a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    <div mc:edit="std_preheader_links">&nbsp;</div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><!-- // Begin Module: Standard Header Image \\\\ -->                                             	<input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:900px;" />                                             	<!-- // End Module: Standard Header Image \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="bodyContent"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top">\r\n                                                <div mc:edit="std_content00">\r\n                                                <h1 class="h1" style="text-align: center; ">SERVICIO DE MANTENIMIENTO INFORMATICO</h1>\r\n                                                <h4>PERIODO: Desde %fechaDesde hasta %fechaHasta</h4>\r\n                                                <h4>VISITAS PACTADAS: %visitasPactadas</h4>\r\n                                                <p>Hola %nombreMantenimiento ( %cliente ) hemos registrado los siguientes eventos en el servicio:</p>\r\n                                                %contenido</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="900" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social"><span style="font-size: 11px; line-height: 13px; ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="font-size: 11px; line-height: 13px; " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong style="font-size: 11px; line-height: 13px; background-color: rgb(250, 250, 250); "><i>S</i></strong><i style="font-size: 11px; line-height: 13px; background-color: rgb(250, 250, 250); ">istemas a Medidas |&nbsp;<strong>V</strong>entas de Insumos |&nbsp;<strong>S</strong>istema&nbsp;<strong>GFox</strong></i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; "><span style="background-color: rgb(250, 250, 250); font-size: 11px; line-height: 13px; text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</span></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - aviso de mantenimientos mensual a clientes', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(102, 'impresiones', 'MAIL_AUTOMATICO_MANTENIMIENTOS_ADMIN', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>AVISO A CLIENTES</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Fecha desde<br />\r\n                                                            </b>                                                             %fechaDesde<br />\r\n                                                            <strong>Fecha Hasta</strong><br />\r\n                                                            %fechaHasta</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;</div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                <!-- // End Module: Standard Content \\\\ --></td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <!-- // End Sidebar \\\\ -->\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <h3>Clientes avisados servicios Mantenimientos</h3>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00"><strong>TAREA:</strong> %clientes<br />\r\n                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; ">&nbsp;<span style="background-color: rgb(250, 250, 250); ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="background-color: rgb(250, 250, 250); " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - envio al administrador de mantenimientos los clientes avisados', NULL),
(103, 'impresiones', 'IMPRESION_MAIL_TAREAMANTENIMIENTO', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>ASISTENCIA A DOMICILIO</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Cliente<br />\r\n                                                            </b>                                                             %oficial<br />\r\n                                                            <strong>Nota</strong><br />\r\n                                                            %fecha</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;<b><br />\r\n                                                            </b></div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <h3>&nbsp;</h3>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00">Hola %cliente avisamos que en el dia de la fecha %estado con el motivo %tipo .&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br />\r\n                                                <em><strong>NOTA: </strong>%descripcion</em></div>\r\n                                                <div mc:edit="std_content00">Cualquier consulta por favor respondanos a este mail o bien llame a nuestras oficinas 4476554.</div>\r\n                                                <div mc:edit="std_content00"><em><strong>Atte. administracion FOXIS</strong></em></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; ">&nbsp;<span style="background-color: rgb(250, 250, 250); ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="background-color: rgb(250, 250, 250); " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail- Envio de tarea a encargado de mantenimiento', NULL),
(104, 'system', 'TAREAS_ALERTAS_USUARIOS_MAIL', '1', 'TAREAS_ALERTAS_USUARIOS_MAIL', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(105, 'impresiones', 'MAIL_TAREAS_USUARIO', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>ASIGNACION DE TAREA</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Cliente<br />\r\n                                                            </b>                                                             %cliente &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n                                                            <strong>Fecha de la Tarea</strong><br />\r\n                                                            %fechaTarea</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;</div>\r\n                                                            <div mc:edit="std_content01"><strong>Estado</strong></div>\r\n                                                            <div mc:edit="std_content01">%estado</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;</div>\r\n                                                            <div mc:edit="std_content01">%linkSolucion</div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                <!-- // End Module: Standard Content \\\\ --></td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <!-- // End Sidebar \\\\ -->\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <h3><!-- // Begin Module: Standard Content \\\\ -->                                     %emisor te ha asignado una tarea!</h3>\r\n                                    <h3><br />\r\n                                    Contenido de la tarea</h3>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00"><strong>TAREA:</strong> %tarea &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br />\r\n                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; ">&nbsp;<span style="background-color: rgb(250, 250, 250); ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="background-color: rgb(250, 250, 250); " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - asignacion de tarea a usuario', NULL),
(106, 'impresiones', 'MAIL_TAREAS_USUARIO_FINALIZA', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>TAREA FINALIZADA</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Estado<br />\r\n                                                            </b>                                                             %estado&nbsp;</div>\r\n                                                            <div mc:edit="std_content01"><br />\r\n                                                            <strong>Tipo de Tarea</strong><br />\r\n                                                            %tipoTarea</div>\r\n                                                            <div mc:edit="std_content01">&nbsp;</div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                <!-- // End Module: Standard Content \\\\ --></td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <!-- // End Sidebar \\\\ -->\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <h3><!-- // Begin Module: Standard Content \\\\ -->                                     %emisor han finalizado la tarea!</h3>\r\n                                    <h3><br />\r\n                                    Contenido de la tarea</h3>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hola %emisor, se ha finalizado la &nbsp;tarea con caracter %prioridadTarea:</div>\r\n                                                <div>&nbsp;</div>\r\n                                                <div mc:edit="std_content00">%tarea&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; ">&nbsp;<span style="background-color: rgb(250, 250, 250); ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="background-color: rgb(250, 250, 250); " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - Tarea de Usuario Finalizada', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(107, 'impresiones', 'MAIL_PENDIENTES_ASIGNADOS_USUARIO', '<p><style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n\r\n			/* Template Styles */\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border: 1px solid #DDDDDD;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:30px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:26px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:22px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:0;\r\n				margin-right:0;\r\n				margin-bottom:10px;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:0;\r\n				/*@editable*/ text-align:center;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n			}\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:12px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:center;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:center;\r\n			}\r\n\r\n			#monkeyRewards img{\r\n				max-width:190px;\r\n			}\r\n		</style></p>\r\n<center>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="900" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em style="color: rgb(112, 112, 112); ">Foxis Av San Martin of 210 2do piso</em></div>\r\n                                    </td>\r\n                                    <td valign="top" width="190">\r\n                                    <div mc:edit="std_preheader_links"><span style="color: rgb(112, 112, 112); ">El email no se ver correctamente?</span></div>\r\n                                    <div mc:edit="std_preheader_links"><a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    <div mc:edit="std_preheader_links">&nbsp;</div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><!-- // Begin Module: Standard Header Image \\\\ -->                                             	<input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:900px;" />                                             	<!-- // End Module: Standard Header Image \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="900" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="bodyContent"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top">\r\n                                                <div mc:edit="std_content00">\r\n                                                <h1 class="h1" style="text-align: center; ">INFORME DE TAREAS ASIGNADAS</h1>\r\n                                                <h4>Hola %usuario:</h4>\r\n                                                <p>A continuacion listamos las tareas que se encuentran PENDIENTES DE FINALIZACION:</p>\r\n                                                %contenido</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="900" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social"><span style="font-size: 11px; line-height: 13px; ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email</span><a style="font-size: 11px; line-height: 13px; " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong style="font-size: 11px; line-height: 13px; background-color: rgb(250, 250, 250); "><i>S</i></strong><i style="font-size: 11px; line-height: 13px; background-color: rgb(250, 250, 250); ">istemas a Medidas |&nbsp;<strong>V</strong>entas de Insumos |&nbsp;<strong>S</strong>istema&nbsp;<strong>GFox</strong></i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; "><span style="background-color: rgb(250, 250, 250); font-size: 11px; line-height: 13px; text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</span></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mails - aviso a usuarios que asignaron tareas el estado en que se encuentra', NULL),
(108, 'system', 'GENERALES_PATH_CRONS', '/empresa/genFox/plataformaYii/%%rutaSistema', 'GENERALES_PATH_CRONS', NULL),
(109, 'impresiones', 'MAIL_AVISO_ESTADO_ORDEN', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>ESTADO ORDEN</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Cliente<br />\r\n                                                            </b>                                                             %cliente &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n                                                            <div mc:edit="std_content01"><strong>Nro de Orden</strong><br />\r\n                                                            %nroOrden</div>\r\n                                                            <div mc:edit="std_content01"><strong>Fecha de Ingreso</strong></div>\r\n                                                            <div mc:edit="std_content01">%fechaIngreso</div>\r\n                                                            <div mc:edit="std_content01"><strong>Estado Actual</strong></div>\r\n                                                            <div mc:edit="std_content01">%estado</div>\r\n                                                            <div mc:edit="std_content01"><b><br />\r\n                                                            </b></div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <div>Hola <strong>%nombreCli</strong>&nbsp;estamos trabajando en su requerimiento. Actualmente ha pasado al estado <strong>%estado</strong>:</div>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00"><b>NOTA:</b>&nbsp;%mensaje</div>\r\n                                                <div mc:edit="std_content00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Content \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; ">&nbsp;<span style="background-color: rgb(250, 250, 250); ">Av San Martin 2do piso Of 210 Telefonos 447-6554 Email&nbsp;</span><a style="background-color: rgb(250, 250, 250); " href="mailto:info@foxis.com.ar">info@foxis.com.ar</a></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail - Aviso de nuevo estado en ORDEN DE TRABAJO', NULL),
(110, 'system', 'TAREAS_ENVIAR_MAIL_FINALIZADA', '0', 'TAREAS_ENVIAR_MAIL_FINALIZADA', NULL),
(111, 'impresiones', 'MAIL_SOLO', 'MAIL_SOLO', 'MAIL_SOLO', NULL);
INSERT INTO `settings` (`id`, `category`, `key`, `value`, `descripcion`, `idUsuario`) VALUES
(112, 'impresiones', 'MAIL_EDIATABLE_USUARIO_SOLO', '<center> <style type="text/css">\r\n			/* Client-specific Styles */\r\n			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */\r\n			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */\r\n			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */\r\n			\r\n			/* Reset Styles */\r\n			body{margin:0; padding:0;}\r\n			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}\r\n			table td{border-collapse:collapse;}\r\n			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}\r\n			\r\n			/* Template Styles */\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: COMMON PAGE ELEMENTS /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section background color\r\n			* @tip Set the background color for your email. You may want to choose one that matches your company''s branding.\r\n			* @theme page\r\n			*/\r\n			body, #backgroundTable{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section email border\r\n			* @tip Set the border for your email.\r\n			*/\r\n			#templateContainer{\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Page\r\n			* @section heading 1\r\n			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.\r\n			* @style heading 1\r\n			*/\r\n			h1, .h1{\r\n				/*@editable*/ color:#202020;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:40px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 2\r\n			* @tip Set the styling for all second-level headings in your emails.\r\n			* @style heading 2\r\n			*/\r\n			h2, .h2{\r\n				/*@editable*/ color:#404040;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:18px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 3\r\n			* @tip Set the styling for all third-level headings in your emails.\r\n			* @style heading 3\r\n			*/\r\n			h3, .h3{\r\n				/*@editable*/ color:#606060;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:16px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n\r\n			/**\r\n			* @tab Page\r\n			* @section heading 4\r\n			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.\r\n			* @style heading 4\r\n			*/\r\n			h4, .h4{\r\n				/*@editable*/ color:#808080;\r\n				display:block;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				margin-top:2%;\r\n				margin-right:0;\r\n				margin-bottom:1%;\r\n				margin-left:0;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: PREHEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader style\r\n			* @tip Set the background color for your email''s preheader area.\r\n			* @theme page\r\n			*/\r\n			#templatePreheader{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader text\r\n			* @tip Set the styling for your email''s preheader text. Choose a size and color that is easy to read.\r\n			*/\r\n			.preheaderContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section preheader link\r\n			* @tip Set the styling for your email''s preheader links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:right;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: HEADER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header style\r\n			* @tip Set the background color and border for your email''s header area.\r\n			* @theme header\r\n			*/\r\n			#templateHeader{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border-bottom:5px solid #505050;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header text\r\n			* @tip Set the styling for your email''s header text. Choose a size and color that is easy to read.\r\n			*/\r\n			.headerContent{\r\n				/*@editable*/ color:#202020;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:34px;\r\n				/*@editable*/ font-weight:bold;\r\n				/*@editable*/ line-height:100%;\r\n				/*@editable*/ padding:10px;\r\n				/*@editable*/ text-align:right;\r\n				/*@editable*/ vertical-align:middle;\r\n			}\r\n			\r\n			/**\r\n			* @tab Header\r\n			* @section header link\r\n			* @tip Set the styling for your email''s header links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			#headerImage{\r\n				height:auto;\r\n				max-width:600px !important;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: MAIN BODY /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body style\r\n			* @tip Set the background color for your email''s body area.\r\n			*/\r\n			#templateContainer, .bodyContent{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body text\r\n			* @tip Set the styling for your email''s main content text. Choose a size and color that is easy to read.\r\n			* @theme main\r\n			*/\r\n			.bodyContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:14px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:justify;\r\n			}\r\n			\r\n			/**\r\n			* @tab Body\r\n			* @section body link\r\n			* @tip Set the styling for your email''s main content links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.bodyContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: SIDEBAR /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			#templateSidebar{\r\n				/*@editable*/ background-color:#FDFDFD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar style\r\n			* @tip Set the background color and border for your email''s sidebar area.\r\n			*/\r\n			.sidebarContent{\r\n				/*@editable*/ border-right:1px solid #DDDDDD;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar text\r\n			* @tip Set the styling for your email''s sidebar text. Choose a size and color that is easy to read.\r\n			*/\r\n			.sidebarContent div{\r\n				/*@editable*/ color:#505050;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:10px;\r\n				/*@editable*/ line-height:150%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Sidebar\r\n			* @section sidebar link\r\n			* @tip Set the styling for your email''s sidebar links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.sidebarContent img{\r\n				display:inline;\r\n				height:auto;\r\n			}\r\n			\r\n			/* /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ STANDARD STYLING: FOOTER /\\/\\/\\/\\/\\/\\/\\/\\/\\/\\ */\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer style\r\n			* @tip Set the background color and top border for your email''s footer area.\r\n			* @theme footer\r\n			*/\r\n			#templateFooter{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:3px solid #909090;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer text\r\n			* @tip Set the styling for your email''s footer text. Choose a size and color that is easy to read.\r\n			* @theme footer\r\n			*/\r\n			.footerContent div{\r\n				/*@editable*/ color:#707070;\r\n				/*@editable*/ font-family:Arial;\r\n				/*@editable*/ font-size:11px;\r\n				/*@editable*/ line-height:125%;\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section footer link\r\n			* @tip Set the styling for your email''s footer links. Choose a color that helps them stand out from your text.\r\n			*/\r\n			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{\r\n				/*@editable*/ color:#336699;\r\n				/*@editable*/ font-weight:normal;\r\n				/*@editable*/ text-decoration:underline;\r\n			}\r\n			\r\n			.footerContent img{\r\n				display:inline;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			* @theme footer\r\n			*/\r\n			#social{\r\n				/*@editable*/ background-color:#FFFFFF;\r\n				/*@editable*/ border:0;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section social bar style\r\n			* @tip Set the background color and border for your email''s footer social bar.\r\n			*/\r\n			#social div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			* @theme footer\r\n			*/\r\n			#utility{\r\n				/*@editable*/ background-color:#FAFAFA;\r\n				/*@editable*/ border-top:0;\r\n			}\r\n\r\n			/**\r\n			* @tab Footer\r\n			* @section utility bar style\r\n			* @tip Set the background color and border for your email''s footer utility bar.\r\n			*/\r\n			#utility div{\r\n				/*@editable*/ text-align:left;\r\n			}\r\n			\r\n			#monkeyRewards img{\r\n				max-width:170px !important;\r\n			}\r\n		</style>\r\n<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top"><!-- // Begin Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" class="preheaderContent"><!-- // Begin Module: Standard Preheader \\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top">\r\n                                    <div mc:edit="std_preheader_content"><em>Foxis Av San Martin of 210 2do piso&nbsp;</em></div>\r\n                                    </td>\r\n                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->\r\n                                    <td valign="top" width="170">\r\n                                    <div mc:edit="std_preheader_links">El email no se ver correctamente?<br />\r\n                                    <a href="http://foxis">I</a><a href="mailto:sistemas@foxis.com.ar">nforme al Administrador del sistema</a></div>\r\n                                    </td>\r\n                                    <!-- *|END:IF|* -->\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Module: Standard Preheader \\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <!-- // End Template Preheader \\\\ -->\r\n            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">\r\n                <tbody>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Header \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td class="headerContent"><input type="image" src="http://foxis.com.ar/imagenes/logo.png" id="headerImage campaign-icon" style="max-width:180px;" /></td>\r\n                                    <td class="headerContent" width="100%" style="padding-left:10px; padding-right:20px;">\r\n                                    <div mc:edit="Header_content">\r\n                                    <h1>&nbsp;</h1>\r\n                                    </div>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Header \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Body \\\\ -->\r\n                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <!-- // Begin Sidebar \\\\  -->\r\n                                    <td valign="top" width="180" id="templateSidebar">\r\n                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top"><!-- // Begin Module: Standard Content \\\\ -->\r\n                                                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign="top" style="padding-left:10px;">\r\n                                                            <div mc:edit="std_content01"><b>Foxis</b></div>\r\n                                                            <div mc:edit="std_content01"><b><br />\r\n                                                            </b></div>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <td valign="top" class="bodyContent">\r\n                                    <div>&nbsp;</div>\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign="top" style="padding-left:0;">\r\n                                                <div mc:edit="std_content00">%cuerpo</div>\r\n                                                <div mc:edit="std_content00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <p><!-- // End Module: Standard Content \\\\ --></p>\r\n                                    <p style="text-align: right; "><em>%usuario</em></p>\r\n                                    <p style="text-align: right; "><em>%movil</em></p>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Body \\\\ --></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="center" valign="top"><!-- // Begin Template Footer \\\\ -->\r\n                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" class="footerContent"><!-- // Begin Module: Standard Footer \\\\ -->\r\n                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="social">\r\n                                                <div mc:edit="std_social" style="text-align: center; "><span style="background-color: rgb(250, 250, 250); ">%direccion %telefono%horariosAtencion %emailAdmin</span></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td valign="top" width="350">\r\n                                                <div mc:edit="std_footer"><strong><i>S</i></strong><i>istemas a Medidas | <strong>V</strong>entas de Insumos | <strong>S</strong>istema <strong>GFox</strong>                                                 </i></div>\r\n                                                </td>\r\n                                                <td valign="top" width="190" id="monkeyRewards">\r\n                                                <div mc:edit="monkeyrewards">&nbsp;%site</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td colspan="2" valign="middle" id="utility">\r\n                                                <div mc:edit="std_utility" style="text-align: right; ">&nbsp;Patagonia - Comodoro Rivadavia - Chubut -Argentina</div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    <!-- // End Module: Standard Footer \\\\ --></td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <!-- // End Template Footer \\\\ --></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</center>\r\n<p>&nbsp;</p>', 'Mail -Manual usuario', NULL),
(113, 'system', 'IMPRIME_FACTURA_RAPIDA_DEF', '1', 'IMPRIME_FACTURA_RAPIDA_DEF', NULL),
(114, 'system', 'IMPREISON_FACTURA_CANTIDAD_COMPLETAFAC', '2', 'IMPREISON_FACTURA_CANTIDAD_COMPLETAFAC', NULL),
(115, 'system', 'IMPREISON_RECIBO_CANTIDAD_RAPIDAFAC', '1', 'IMPREISON_RECIBO_CANTIDAD_RAPIDAFAC', NULL),
(116, 'system', 'ORDENES_CANTIDAD_CLIENTE', '1', 'ORDENES_CANTIDAD_CLIENTE', NULL),
(117, 'system', 'ORDENES_CANTIDAD_EXTRAS', '1', 'ORDENES_CANTIDAD_EXTRAS', NULL),
(118, 'impresiones', 'FACTURA_A', '<div>\r\n<meta content="text/html; charset=utf-8" http-equiv="content-type"><br />\r\n<span style="font-size: xx-small; ">&nbsp;     </span>      </meta>\r\n</div>\r\n<div><span style="font-size: xx-small; ">&nbsp;</span></div>\r\n<div style="text-align: right; "><span style="font-size: xx-small; "><br />\r\n<br />\r\n<big>&nbsp;&nbsp;&nbsp;%fecha&nbsp;&nbsp;&nbsp;&nbsp;</big><br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n&nbsp;</span></div>\r\n<div>\r\n<meta content="text/html; charset=utf-8" http-equiv="content-type" /></div>\r\n<div style="text-align: left; font-family: ''verdana arial helvetica'', ''sans serif''">\r\n<div><span style="font-size: xx-small; ">&nbsp;&nbsp;</span></div>\r\n<table border="0" cellspacing="2" cellpadding="2" style="text-align: left; width: 100%; height: 72px">\r\n    <tbody>\r\n        <tr style="font-weight: bold">\r\n            <td style="text-align: right; width: 106px"><span style="font-size: xx-small; ">Se&ntilde;or/es:</span></td>\r\n            <td style="width: 537px"><span style="font-size: xx-small; ">%cliente</span></td>\r\n            <td style="width: 74px"><span style="font-size: xx-small; ">&nbsp;</span></td>\r\n            <td style="width: 233px"><span style="font-size: xx-small; ">&nbsp;</span></td>\r\n        </tr>\r\n        <tr style="font-weight: bold">\r\n            <td style="text-align: right; width: 106px"><span style="font-size: xx-small; ">Domicilio:</span></td>\r\n            <td style="width: 537px"><span style="font-size: xx-small; ">%domicilio %numero</span></td>\r\n            <td style="text-align: right; width: 74px"><span style="font-size: xx-small; ">Tel.:</span></td>\r\n            <td style="width: 233px"><span style="font-size: xx-small; ">%telefono</span></td>\r\n        </tr>\r\n        <tr>\r\n            <td style="text-align: right; width: 106px; font-weight: bold"><span style="font-size: xx-small; ">Localidad:</span></td>\r\n            <td style="width: 537px"><span style="font-size: xx-small; ">%localidad</span></td>\r\n            <td style="text-align: right; width: 74px; font-weight: bold"><span style="font-size: xx-small; ">CUIT:</span></td>\r\n            <td style="width: 233px"><span style="font-size: xx-small; ">%cuit</span></td>\r\n        </tr>\r\n        <tr>\r\n            <td style="text-align: right; width: 106px; font-weight: bold"><span style="font-size: xx-small; ">Condicion IVA:</span></td>\r\n            <td style="width: 537px">\r\n            <meta content="text/html; charset=utf-8" http-equiv="content-type"><span style="font-size: xx-small; ">%condicionIva                                                                 </span>                                                                              </meta>\r\n            </td>\r\n            <td style="text-align: right; width: 74px; font-weight: bold"><span style="font-size: xx-small; ">Cond.Venta:</span></td>\r\n            <td style="width: 233px">\r\n            <meta content="text/html; charset=utf-8" http-equiv="content-type"><span style="font-size: xx-small; ">%condicionVenta                                                                 </span>                                                                              </meta>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<div><span style="font-size: xx-small; ">&nbsp;%detalle</span></div>\r\n<div><span style="font-size: xx-small; ">%pie</span></div>\r\n</div>', 'FACTURA_A', NULL),

(120, 'system', 'IMPRESORA_TICKET_USUARIO', '', 'IMPRESORA_TICKET_USUARIO', 17),
(121, 'system', 'HOJA_TICKET_USUARIO', '76x297', 'HOJA_TICKET_USUARIO', 17),
(122, 'system', 'IMPRESORA_PRINCIPAL_USUARIO', '', 'IMPRESORA_PRINCIPAL_USUARIO', 17),
(123, 'system', 'HOJA_PRINCIPAL_USUARIO', '210x297', 'HOJA_PRINCIPAL_USUARIO', 17),
(124, 'system', 'IMPRESORA_SECUNDARIA_USUARIO', '', 'IMPRESORA_SECUNDARIA_USUARIO', 17),
(125, 'system', 'HOJA_SECUNDARIA_USUARIO', '210x297', 'HOJA_SECUNDARIA_USUARIO', 17),
(126, 'system', 'IMPRESORA_ETIQUETAS_USUARIO', '', 'IMPRESORA_ETIQUETAS_USUARIO', 17),
(127, 'system', 'HOJA_ETIQUETAS_USUARIO', '210x297', 'HOJA_ETIQUETAS_USUARIO', 17),
(128, 'system', 'HOJA_PERSONALIZADO1x', '0', 'HOJA_PERSONALIZADO1x', 17),
(129, 'system', 'HOJA_PERSONALIZADO1y', '0', 'HOJA_PERSONALIZADO1y', 17),
(130, 'system', 'HOJA_PERSONALIZADO2x', '0', 'HOJA_PERSONALIZADO2x', 17),
(131, 'system', 'HOJA_PERSONALIZADO2y', '0', 'HOJA_PERSONALIZADO2y', 17),
(132, 'system', 'IMPRESION_ORDENES_IMPRESORA', 'Preguntar', 'IMPRESION_ORDENES_IMPRESORA', 17),
(133, 'system', 'IMPRESION_FACTURAS_IMPRESORA', 'Preguntar', 'IMPRESION_FACTURAS_IMPRESORA', 17),
(134, 'system', 'IMPRESION_FACTURAS_IMPRESORA_B', 'Preguntar', 'IMPRESION_FACTURAS_IMPRESORA_B', 17),
(135, 'system', 'IMPRESION_FACTURAS_IMPRESORAX', 'Preguntar', 'IMPRESION_FACTURAS_IMPRESORAX', 17),
(136, 'system', 'IMPRESION_ORDENPAGO_IMPRESORA', 'Preguntar', 'IMPRESION_ORDENPAGO_IMPRESORA', 17),
(137, 'system', 'IMPRESION_ORDENCOBRO_IMPRESORA', 'Preguntar', 'IMPRESION_ORDENCOBRO_IMPRESORA', 17),
(138, 'system', 'IMPRESION_RECIBO_IMPRESORA', 'Preguntar', 'IMPRESION_RECIBO_IMPRESORA', 17),
(139, 'system', 'IMPRESION_PRESUPUESTOS_IMPRESORA', 'Preguntar', 'IMPRESION_PRESUPUESTOS_IMPRESORA', 17),
(140, 'system', 'IMPRESION_TAREAS_IMPRESORA', 'Preguntar', 'IMPRESION_TAREAS_IMPRESORA', 17),
(141, 'system', 'IMPRESION_INFORMES_IMPRESORA', 'Preguntar', 'IMPRESION_INFORMES_IMPRESORA', 17);



INSERT INTO `talonario` (`idTalonario`, `idPuntoVenta`, `desdeNumero`, `hastaNumero`, `proximo`, `letraTalonario`, `tipoTalonario`, `numeroSerie`) VALUES
(1, 1, '00000001', '00000350', '00000001', 'A', 'Oficina A', '0001'),
(2, 1, '00000001', '00000250', '00000001', 'B', 'Oficina B', '0001'),
(3, 1, '00000000', '999999', '00000001', 'X', 'Recibo X', '0001');

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m111003_154519_accionesModifica', 1317728516),
('m111003_190506_clientesupcaseapellido', 1317733487),
('m111004_124447_ripeorproveedor', 1317733487),
('m111004_133444_nuevosCamposSettings', 1317735579),
('m111004_170341_clientesproveedor', 1317751666),
('m111004_181027_addletracliente', 1317996680),
('m111005_141222_nuevosCampostock', 1317996681),
('m111006_163141_tablaCondicionesCompra', 1317996681),
('m111007_132110_insertoJurisdiccion', 1317996681),
('m111007_140902_unicocuitproveedor', 1318339054),
('m111007_155600_proveedor', 1318339054),
('m111007_160355_clasificacionAfip', 1318339054),
('m111007_162805_addclasificacionafip', 1318339054),
('m111012_123656_clavesVEncimientos', 1318439625),
('m111012_142207_condicionVenta', 1318439626),
('m111012_142220_condicionesVentaItems', 1318439626),
('m111006_164211_agregarAccionesCondicionesCompra', 1318447206),
('m111006_171534_agregarCondicionFactura', 1318447206),
('m111011_123836_itemsCondicionesCompra', 1318447206),
('m111011_124044_quitaCamposCondicionCompra', 1318447206),
('m111011_135441_agregarTablaVencimientosFactEntr', 1318447206),
('m111011_143848_agregarTablaOrdenesPago', 1318447206),
('m111011_143906_agregarTablaOrdenesPagoItems', 1318447206),
('m111011_145822_agregarCampoOrdenPago', 1318447206),
('m111011_165354_nuevaVistaFactEntrante', 1318447206),
('m111012_144935_relacionCondicionVenta', 1318448991),
('m111012_145804_ordenesCobro', 1318448991),
('m111012_145837_ordenescobroFacturas', 1318448992),
('m111012_145851_facturassalientesvencimientos', 1318449976),
('m111012_145904_facturassalientes', 1318449978),
('m111012_164651_addmenucompras', 1318449978),
('m111012_193701_accionesOrdenesPago', 1318454042),
('m111013_131746_relacionesOrdenesPago', 1318515066),
('m111013_134812_accionesOrdenePago', 1318515066),
('m111013_142741_parcheFacturasEntrantesEstado', 1318516165),
('m111012_210227_adddiames', 1318881440),
('m111013_133419_agregarmenufacturas', 1318881440),
('m111013_173249_faacturassalientes', 1318881440),
('m111017_190210_nuevasAcciones', 1318881440),
('m111018_170519_nuevasAccionesPRecios', 1318960165),
('m111018_182336_nuevasAccionesPRecios2', 1318962334),
('m111018_201915_nuevasAccionesPRecios3', 1318969269),
('m111019_155202_facturasEntrantes_agregaCampos', 1319042243),
('m111019_155834_facturasEntrantes_cambiaVista', 1319042243),
('m111019_160234_facturasEntrantes_defaultImportes', 1319042244),
('m111019_204509_acciones_agregarCampoPadre', 1319063311),
('m111019_232417_nuevasAcciones', 1319066966),
('m111020_163813_facturasEntrantes_camposImporte', 1319128882),
('m111024_214811_facturasEntrantes_cambiaVista2', 1319493290),
('m111026_163907_triggers', 1319831300),
('m111028_160939_alertas_crear', 1319831300),
('m111028_162247_alertasUsuarios_crear', 1319831301),
('m111028_193244_alertas_addCampos', 1319831302),
('m111028_200415_alertas_addCampos2', 1320073560),
('m111028_201703_alertas_addCampos3', 1320073560),
('m111031_165435_movimietos_autoincremental', 1320080292),
('m111104_185313_indicesORdenes', 1320756417),
('m111104_191458_facturasEntrantesView_cambia', 1320756417),
('m111107_230410_triggerORdenes', 1320756417),
('m111107_231247_triggerORdenes2', 1320756417),
('m111107_231258_triggerORdenes2', 1320756417),
('m111108_221241_stock_preciosADD', 1320792518),
('m111103_132504_talonario_nuevatabla', 1321365649),
('m111104_130108_puntoventa_nuevatabla', 1321365649),
('m111115_142901_talonarios_cambiaTipos', 1321367545),
('m111116_150319_presupuestosItems_agregarCampo', 1321459934),
('m111116_150840_presupuestosItems_agregarCampo2', 1321459934),
('m111117_193314_settings_agregar', 1321656165),
('m111121_133018_proveedores_addCampojuris', 1321883099),
('m111121_192723_configuraciones_add', 1321971283),
('m111121_192819_proveedores_addCampojuris', 1321971283),
('m111125_143826_addImpresion', 1322236018),
('m111125_165228_cambiaVistaFacturasSalientes', 1322260101),
('m111126_140230_cambiaVistaFacturasSalientes2', 1322317489),
('m111126_141441_cambiaVistaFacturasSalientes3', 1322317490),
('m111126_142456_cambiaVistaFacturasSalientes4', 1322317614),
('m111130_161422_tablaLog', 1322767659),
('m111201_161750_agregarPanelUsuario', 1322768041),
('m111201_193602_tablasREgistro', 1322768213),
('m111205_153704_clientes_agregaCampos', 1323100945),
('m111205_164729_usuarios_agregaCampos2', 1323104551),
('m111206_140000_settings', 1323184611),
('m111207_232516_mantenimientos_addVisitaRutina', 1323301887),
('m111208_204532_envioMensajes_addTAbla', 1323380862),
('m111214_223745_nuevosCamposCliente', 1323957043),
('m111215_185659_nuevosCamposMensaje', 1323979864),
('m111215_191637_addMensStatus', 1323980403),
('m111215_212234_crons', 1324048798),
('m111216_203248_camposUsuario', 1324072941),
('m111216_204916_camposUsuario2', 1324415367),
('m111220_141213_tareasDestinatarioadd', 1324415368),
('m120107_144840_addSettings', 1326201699);


INSERT INTO `usuarios_areas` (`idUsuarioArea`, `nombreArea`, `centroCosto`) VALUES
(1, 'Oficina', 1);
-- --------------------------------------------------------


INSERT INTO `usuarios_tipoUsuarios` (`idUsuarioTipo`, `nombre`) VALUES
(1, 'administrador');

TRUNCATE TABLE  `usuarios`;

INSERT INTO  `usuarios` (
`idUsuario` ,
`nombre` ,
`usuario_` ,
`clave_` ,
`email` ,
`rutaImagen` ,
`idTipoUsuario` ,
`idAreaUsuario` ,
`panelDeControl` ,
`anotador` ,
`mobil`
)
VALUES (
'17' ,  'Administrador',  'Admin',  '%%claveUsuario', NULL , NULL ,  '1',  '1', '<p><span style="font-size: x-large; ">PANEL DE USUARIO PARA %usuario&nbsp;</span></p>
<p>&nbsp;%buscadorProductos</p>
<div class="row">
<div class="span4">
<p>%menu</p>
<p>&nbsp;</p>
<p>%indicadorCompras</p>
<p>%indicadorPagos</p>
<p>&nbsp;%anotador&nbsp;</p>
</div>
<div class="span12">
<p><a href="index.php?r=rights">Permisos</a></p>
<p>%alertas</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>' ,  'Administrador del sistema!', NULL);

UPDATE  `usuarios` SET  `idUsuario` =  '17' WHERE  `usuarios`.`idUsuario` =18;

TRUNCATE TABLE  `stock_precios`;
INSERT INTO `stock_precios` (`idStockPrecio`, `fechaStock`, `enServicios`, `tipo`, `idTipo`, `porcentajeVariacion`, `idElemento`) VALUES (NULL, '2012-01-11', '0', 'Precios asignacion individual', '0', '0', '0');

INSERT INTO `clientes` (`idCliente`, `tipoCliente`, `nombre`, `apellido`, `razonSocial`, `direccion`, `telefono`, `celular`, `nombreFantasia`, `email`, `cuit`, `condicionIva`, `condicionVenta`, `codCliente`, `idJuridiccion`, `localidad`, `limiteCredito`, `fechaAlta`, `nro`, `letraHabitual`, `nombresContactoFinanzas`, `emailContactoFinanzas`, `mobilContactoFinanzas`, `nombresContactoMantenimiento`, `emailContactoMantenimiento`, `mobilContactoMantenimiento`) VALUES ('704', '', '', 'CONS. FINAL', 'CONS. FINAL', '', '', '', '', '', '', 'Cons.Final', '', '', '1', '', '', '', '', 'B', NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `acciones` (`idAccion`, `nombre`, `direccion`, `tipo`, `subTipo`, `descripcion`, `imagen`, `padre`) VALUES
(1, 'Nueva Factura', 'index.php?r=facturasSalientes/crearFactura', 'ventas', 'comprobantes', 'Nueva factura de venta completando todos los datos requeridos.', 'images/iconos/famfam/add.png', 32),
(2, 'Nueva Factura de Compra', 'index.php?r=facturasEntrantes/crearFactura', 'compras', 'comprobantes', 'Creación de una nueva factura de compra.', 'images/iconos/famfam/add.png', 30),
(3, 'Nueva Orden de Trabajo', 'index.php?r=ordenesTrabajo/create', 'servicios', 'comprobantes', 'Guarda una nueva orden de trabajo.', 'images/iconos/famfam/add.png', 19),
(4, 'Nuevo Cliente', 'index.php?r=clientes/create', 'ventas', 'archivo', 'Archiva un nuevo cliente a la empresa.', 'images/iconos/famfam/add.png', 17),
(5, 'Nuevo Proveedor', 'index.php?r=proveedores/create', 'compras', 'archivo', 'Cree un nuevo proveedor', 'images/iconos/famfam/add.png', 18),
(6, 'Nuevo Servicio', 'index.php?r=servicios/create', 'servicios', 'archivo', 'Crea un nuevo servicio para ofrecer al cliente.', 'images/iconos/famfam/add.png', 20),
(7, 'Nuevo Producto', 'index.php?r=stock/create', 'productos', 'archivo', 'Crea un nuevo producto.', 'images/iconos/famfam/add.png', 24),
(8, 'Nuevo Inventario', 'index.php?r=inventarios/create', 'ventas', 'presupuestos', 'Nuevo inventario de la empresa.', 'images/iconos/famfam/add.png', 22),
(9, 'Nuevo Tipo de Producto', 'index.php?r=stockTipoProducto/create', 'productos', 'archivo', 'Crea un nuevo tipo de producto.', 'images/iconos/famfam/add.png', 23),
(10, 'Nueva Marca', 'index.php?r=stockMarcas/create', 'productos', 'archivo', 'Crea una nueva marca.', 'images/iconos/famfam/add.png', 25),
(11, 'Nueva Tarea', 'index.php?r=tareas/create', 'servicios', 'mantenimientos', 'Crea una nueva tarea la cual puede ser asignada a det. usuarios.', 'images/iconos/famfam/add.png', NULL),
(12, 'Nuevo Mantenimiento', 'index.php?r=mantenimientosEmpresas/create', 'servicios', 'mantenimientos', 'Crea un nuevo mantenimiento (el cual se pueden ingresar datos y tareas).', 'images/iconos/famfam/add.png', 26),
(13, 'Nuevo Pago', 'index.php?r=gastos/create', 'tesoreria', 'comprobantes', 'Crea un nuevo pago a un proveedor.', 'images/iconos/famfam/add.png', 31),
(14, 'Nuevo Cobro', 'index.php?r=pagos/create', 'tesoreria', 'comprobantes', 'Crea un nuevo cobro a un cliente.', 'images/iconos/famfam/add.png', 60),
(15, 'Nuevo Presupuesto', 'index.php?r=presupuestos/create', 'ventas', 'presupuestos', 'Acción para crear un nuevo presupuesto.', 'images/iconos/famfam/add.png', 34),
(16, 'Nueva Factura Corriente', 'index.php?r=facturasSalientes/crearFacturaCte', 'ventass', 'comprobantes', 'Nueva factura que se realizara periódicamente.', 'images/iconos/famfam/add.png', 56),
(17, 'Ver Clientes', 'index.php?r=clientes', 'ventas', 'archivo', 'Listado de clientes para realizar acciones sobre los mismos.', '', NULL),
(18, 'Proveedores', 'index.php?r=proveedores', 'compras', 'archivo', 'Listado de proveedores', '', NULL),
(19, 'Ordenes de Trabajo', 'index.php?r=ordenesTrabajo', 'servicios', 'comprobantes', 'Vea las ordenes de trabajo en forma de estados.', 'images/iconos/famfam/page.png', NULL),
(20, 'Servicios Disponibles (listado de servicios)', 'index.php?r=servicios', 'servicios', 'archivo', 'Listado de servicios.', 'images/iconos/famfam/page.png', NULL),
(21, 'Ver Stock  (disponibilidades)', 'index.php?r=stock/stockReal', 'productos', 'precios', 'Vea el STOCK disponible (mas allá de los productos cargados).', 'images/iconos/famfam/basket.png', NULL),
(22, 'Inventarios', 'index.php?r=inventarios', 'productos', 'comprobantes', 'Vea los inventarios creados.', 'images/iconos/famfam/box.png', NULL),
(23, 'Ver Tipo de Productos', 'index.php?r=stockTipoProducto', 'productos', 'archivo', 'Vea los tipo de productos existentes.', 'images/iconos/famfam/plugin.png', NULL),
(24, 'Ver Productos', 'index.php?r=stock', 'productos', 'comprobantes', 'Muestra los productos existentes (no muestra disponibilidades).', 'images/iconos/famfam/box.png', NULL),
(25, 'Ver Marcas', 'index.php?r=stockMarcas', 'productos', 'archivo', 'Muestra las marcas.', 'images/iconos/famfam/plugin.png', NULL),
(26, 'Mantenimientos (acceso periódico)', 'index.php?r=mantenimientosEmpresas', 'servicios', 'mantenimientos', 'Vea las empresas a las cuales se realiza mantenimiento.', '', NULL),
(27, 'Ver Tareas', 'index.php?r=tareas', 'servicios', '', 'Vea las tareas de la empresa', '', NULL),
(28, 'Mis Tareas', 'index.php?r=tareas/verMisTareas', 'servicios', 'mantenimientos', 'Ver las tareas asignadas a Ud.', '', NULL),
(29, 'Ver Calendario', 'index.php?r=cal', 'configuracion', '', 'Ver el calendario personal.', 'images/iconos/famfam/calendar.png', NULL),
(30, 'Facturas de Compra', 'index.php?r=facturasEntrantes', 'compras', 'comprobantes', 'Vea las facturas de compra realizadas.', 'images/iconos/famfam/script.png', NULL),
(31, 'Ver Pagos', 'index.php?r=gastos', 'tesoreria', 'comprobantes', 'Muestra los pagos realizados.', 'images/iconos/famfam/money_delete.png', NULL),
(32, 'Facturas de Venta', 'index.php?r=facturasSalientes', 'ventas', 'comprobantes', 'Vea las facturas de venta realizadas.', 'images/iconos/famfam/script.png', NULL),
(33, 'Precios Asignados', 'index.php?r=stockPrecios', 'productos', 'precios', 'Muestra los precios asignados.', 'images/iconos/famfam/money.png', NULL),
(34, 'Presupuestos', 'index.php?r=presupuestos', 'ventas', 'presupuestos', 'Acción para visualizar todos los presupuestos.', 'images/iconos/famfam/layout.png', NULL),
(35, 'Informe Morosos', 'index.php?r=balances/resumenMorosos', 'ventas', 'informes', 'Saque un resumen de todos los morosos de la empresa.', 'images/iconos/famfam/page.png', NULL),
(36, 'Informe Ordenes de Trabajo', 'index.php?r=balances/resumenOrdenes', 'servicios', 'informes', 'Saque un resumen mediante un rango de fechas de las ordenes de trabajo realizadas, tiempos de finalizacion etc', 'images/iconos/famfam/page.png', NULL),
(37, 'Informe de Deudas', 'index.php?r=balances/resumenDeudores', 'compras', 'informes', 'Resumen de TODOS los proveedores a los cuales se registra una deuda.', 'images/iconos/famfam/page.png', NULL),
(89, 'Puntos de Venta', 'index.php?r=puntoVenta', 'ventas', 'archivo', 'Puntos de venta, con la opción de cargar talonarios ', 'images/iconos/famfam/money.png', NULL),
(39, 'Informe Iva Compras', 'index.php?r=impresiones/librosiva&tipo=Compras', 'compras', 'informes', 'Resumen en EXCEL de los movimientos efectuados en un determinado rango de fechas.', 'images/iconos/famfam/page.png', NULL),
(40, 'Informe Contable', 'index.php?r=balances/facturacionContable', 'ventas', 'informes', 'Vea los movimientos de facturación realizados en un determinado rango de fechas y así poder calcular como por ejemplo el pago de IVA.', 'images/iconos/famfam/page.png', NULL),
(41, 'Informe Saldo de Cliente', 'index.php?r=facturasSalientes/saldoClientes', 'ventas', 'informes', 'Saque el informe de saldo de un determinado cliente seleccionando un rango de fecha.', 'images/iconos/famfam/user.png', NULL),
(42, 'Informe Saldo Ventas', 'index.php?r=facturasSalientes/saldoEmpresa', 'ventas', 'informes', 'Saque el informe de las ventas realizadas en un rango de fechas detallado por porcentajes de tipo de productos ', 'images/iconos/famfam/page.png', NULL),
(43, 'Informe Saldo Compras', 'index.php?r=facturasEntrantes/saldoProveedores', 'compras', 'informes', 'Vea un detalle por rango de fechas en el que se emiten las salidas efectuadas.', 'images/iconos/famfam/page.png', NULL),
(44, 'Informe Saldo Proveedor', 'index.php?r=facturasEntrantes/saldoProveedor', 'compras', 'informes', 'Vea un informe detallado de un proveedor en particular filtrando mediante un rango de fechas todas las entradas y salidas.', 'images/iconos/famfam/page.png', NULL),
(45, 'Impresiones (guardadas)', 'index.php?r=impresiones', 'configuraciones', 'impresiones', 'Muestra las impresiones guardadas.', 'images/iconos/famfam/printer.png', NULL),
(46, 'Nueva Impresion', 'index.php?r=impresiones/create', 'configuraciones', 'impresiones', 'Nueva Impresión de información (se pude utilizar como una anotación).', 'images/iconos/famfam/add.png', 45),
(47, 'Variables del sistema', 'index.php?r=settings', 'configuraciones', 'sistema', 'Vea (con posibilidad de cambio) las variables del sistema (impresiones, tiempos etc)', 'images/iconos/famfam/page_gear.png', NULL),
(48, 'Ver Usuarios', 'index.php?r=usuarios', 'configuraciones', 'usuarios', 'Visualice los usuarios existentes sobre el sistema, permitiendo hacer altas y bajas.', 'images/iconos/famfam/user.png', NULL),
(49, 'Nuevo Usuario', 'index.php?r=usuarios/create', 'configuraciones', 'usuarios', 'Acción para la creación de un nuevo usuario al sistema.', 'images/iconos/famfam/add.png', 48),
(50, 'Areas de Usuario', 'index.php?r=usuariosAreas', 'configuraciones', 'usuarios', 'Vea las áreas disponibles para los usuarios.', 'images/iconos/famfam/user.png', 48),
(51, 'Nueva Area de Usuario', 'index.php?r=usuariosAreas/create', 'configuraciones', 'usuarios', 'Crea una nueva Area la cual va a ser asignada lo/s usuario/s', 'images/iconos/famfam/add.png', 50),
(52, 'Tipo de Usuarios', 'index.php?r=usuariosTipoUsuarios', 'configuraciones', 'usuarios', 'Muesta los tipo de usuarios existentes.', 'images/iconos/famfam/user.png', 48),
(53, 'Nuevo Tipo de Usuario', 'index.php?r=usuariosTipoUsuarios/create', 'configuraciones', 'usuarios', 'Acción para crear un nuevo tipo de usuario.', 'images/iconos/famfam/add.png', 53),
(54, 'Nueva Configuracion', 'index.php?r=settings/create', 'configuraciones', 'sistema', 'Nueva configuración para el sistema (uso solamente para programadores).', 'images/iconos/famfam/add.png', 47),
(55, 'Actualizar Sistema', 'index.php?r=settings/actualizarSistema', 'configuraciones', 'sistema', 'Acción que permite tener el sistema siempre actualizado a su ultima versión. En caso de no existir actualización deja el sistema como esta.', 'images/iconos/famfam/page_gear.png', NULL),
(56, 'Facturas Corrientes', 'index.php?r=facturasSalientesCorriente', 'ventass', 'comprobantes', 'Vea las facturas que se deben realizar periódicamente.', 'images/iconos/famfam/script.png', NULL),
(57, 'Ver Acciones Disponibles', 'index.php?r=acciones', 'configuraciones', 'sistema', 'Vea todas las acciones disponibles.', 'images/iconos/famfam/page_gear.png', NULL),
(58, 'Informe Clientes', 'index.php?r=impresiones/create&tipoImpresion=clientes', 'ventas', 'informes', 'Listado de clientes', 'images/iconos/famfam/user.png', NULL),
(59, 'Informe Proveedores', 'index.php?r=impresiones/create&tipoImpresion=proveedores', 'compras', 'informes', 'Listado de Proveedores', 'images/iconos/famfam/user_gray.png', NULL),
(60, 'Ver Cobros', 'index.php?r=pagos', 'tesoreria', 'comprobantes', 'Muestra los cobros realizados.', 'images/iconos/famfam/money_add.png', NULL),
(61, 'Cheques Propios', 'index.php?r=cheques', 'tesoreria', 'cheques', 'Vea los cheques emitidos.', 'images/iconos/famfam/page_white_width.png', NULL),
(62, 'Nuevo Cheque', 'index.php?r=cheques/create', 'tesoreria', 'cheques', 'Acción para crear un nuevo cheque.', 'images/iconos/famfam/add.png', 61),
(66, 'Informe Servicios', 'index.php?r=impresiones/create&tipoImpresion=servicios', 'servicios', 'informes', 'Informe de servicios', '', NULL),
(65, 'Informe Stock', 'index.php?r=impresiones/create&tipoImpresion=stock', 'productos', 'informes', 'Informe de los productos.', '', NULL),
(67, 'Nueva Condicion de Compra', 'index.php?r=condicionesCompra/create', 'compras', 'archivo', 'Cree una nueva condicion de compra', 'images/iconos/famfam/add.png', 68),
(68, 'Condiciones de Compra', 'index.php?r=condicionesCompra', 'compras', 'archivo', 'Nueva forma para realizar el pago de una compra', NULL, NULL),
(69, 'Nueva Jurisdiccion', 'index.php?r=juridicciones/create', 'ventas', 'archivos', 'Ingresar nueva jurisdiccion', NULL, NULL),
(70, 'Ver Juridisiones', 'index.php?r=juridicciones/index', 'ventas', 'archivos', 'Listado de jurisdiccion', NULL, NULL),
(71, 'Nueva Clasificacion AFIP', 'index.php?r=clasificacionAfip/create', 'compras', 'archivos', 'Ingresar nueva Clasificacion', NULL, NULL),
(72, 'Ver Clasificacion AFIP', 'index.php?r=clasificacionAfip/index', 'compras', 'archivos', 'Listado de Clasificacion', NULL, NULL),
(73, 'Nueva Condicion de Venta', 'index.php?r=condicionesVenta/create', 'ventas', 'archivo', 'Ingresar nueva condicion de venta', 'images/iconos/famfam/add.png', 74),
(74, 'Condiciones de Venta', 'index.php?r=condicionesVenta/index', 'ventas', 'archivo', 'Ver condiciones de venta', NULL, NULL),
(75, 'Nueva Condicion de venta Items', 'index.php?r=condicionesVentaItems/create', '', '', 'Ingresar nueva condicion de venta Items', NULL, NULL),
(76, 'Ver Condiciones de venta Items', 'index.php?r=condicionesVentaItems/index', '', '', 'Ver condiciones de venta Items', NULL, NULL),
(77, 'Nueva Orden de Cobro', 'index.php?r=ordenesCobro/crearOrden', 'ventas', 'comprobantes', 'Ingresar nueva orden de cobro', 'images/iconos/famfam/add.png', 78),
(78, 'Ver Ordenes de Cobro', 'index.php?r=ordenesCobro/index', 'ventas', 'comprobantes', 'Ver ordenes de cobro', '', NULL),
(79, 'Ordenes de Pago', 'index.php?r=ordenesPago', 'compras', 'comprobantes', 'Vista de las ordenes de pago.', NULL, NULL),
(80, 'Nueva Orden de Pago', 'index.php?r=ordenesPago/create', 'compras', 'comprobantes', 'Nueva forma para realizar el pago de una compra', 'images/iconos/famfam/add.png', 79),
(81, 'Modificar Precios por Compra', 'index.php?r=stock/cambiarPrecioCompras', 'productos', 'precios', 'Modifica los precios solamente de la compra seleccionada.', 'images/iconos/famfam/money.png', 33),
(82, 'Modificar Precios por Categoria', 'index.php?r=stockTipoProducto', 'productos', 'precios', 'Cambia los precios solamente de la categoría seleccionada.', 'images/iconos/famfam/money.png', 33),
(83, 'Modificar Precios por Inventario', 'index.php?r=inventarios', 'productos', 'precios', 'Cambia los precios solamente a los productos del inventario.', 'images/iconos/famfam/money.png', 33),
(84, 'Ver Precios Asignados', 'index.php?r=stockPrecios', 'servicios', 'precios', 'Modificar los precios de los servicios ofrecidos.', NULL, NULL),
(85, 'Modificar precios de Servicios', 'index.php?r=stock/aplicarPreciosServicios', 'servicios', 'precios', 'Modificar los precios de los servicios ofrecidos.', 'images/iconos/famfam/money.png', 33),
(86, 'Conceptos de Factura de Compra', 'index.php?r=conceptos', 'compras', 'archivo', 'Conceptos para las compra de insumos/servicios', '', NULL),
(87, 'Nuevo Concepto de Fact. de Compra', 'index.php?r=conceptos/create', 'compras', 'archivo', 'Crea un nuevo concepto.', 'images/iconos/famfam/add.png', 86),
(88, 'Informe Iva Ventas', 'index.php?r=impresiones/librosiva&tipo=Ventas', 'ventas', 'informes', 'Crea un Excel de los movimientos de facturación realizados en un rango de fechas (FACTURAS A y B)', '', NULL);
