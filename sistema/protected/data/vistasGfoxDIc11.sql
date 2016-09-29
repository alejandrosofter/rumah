-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-12-2011 a las 13:24:19
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.2-1ubuntu4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gfoxV3`
--

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `facturasEntrantes_view`
--
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

CREATE ALGORITHM=UNDEFINED DEFINER=`foxis`@`%` SQL SECURITY DEFINER VIEW `gfoxV3`.`facturasSalientes_view` AS (select `t`.`idFacturaSaliente` AS `idFacturaSaliente`,`t`.`idCliente` AS `idCliente`,`t`.`fecha` AS `fecha`,`t`.`numeroFactura` AS `numeroFactura`,`t`.`descripcion` AS `descripcion`,`t`.`estado` AS `estado`,`t`.`tipoFactura` AS `tipoFactura`,`t`.`idCentroCosto` AS `idCentroCosto`,`t`.`fechaEstimadaCobro` AS `fechaEstimadaCobro`,`t`.`esCorriente` AS `esCorriente`,`t`.`idCondicionVenta` AS `idCondicionVenta`,`t`.`bonificacion` AS `bonificacion`,`t`.`idListaPrecios` AS `idListaPrecios`,sum(if((`gfoxV3`.`itemsFacturaSaliente`.`porcentajeIva` = '21'),(`gfoxV3`.`itemsFacturaSaliente`.`importeItem` * `gfoxV3`.`itemsFacturaSaliente`.`cantidad`),0)) AS `iva21`,sum(if((`gfoxV3`.`itemsFacturaSaliente`.`porcentajeIva` = '10.5'),(`gfoxV3`.`itemsFacturaSaliente`.`importeItem` * `gfoxV3`.`itemsFacturaSaliente`.`cantidad`),0)) AS `iva105`,(select sum(`gfoxV3`.`pagos`.`importeDinero`) AS `SUM(pagos.importeDinero)` from (`gfoxV3`.`pagosFactura` left join `gfoxV3`.`pagos` on((`gfoxV3`.`pagos`.`idPago` = `gfoxV3`.`pagosFactura`.`idPago`))) where (`gfoxV3`.`pagosFactura`.`idFacturaSaliente` = `t`.`idFacturaSaliente`)) AS `pagos`,(sum((`gfoxV3`.`itemsFacturaSaliente`.`importeItem` * `gfoxV3`.`itemsFacturaSaliente`.`cantidad`)) + if(isnull(((sum((`gfoxV3`.`itemsFacturaSaliente`.`importeItem` * `gfoxV3`.`itemsFacturaSaliente`.`cantidad`)) * `gfoxV3`.`condicionesVentaItems`.`porcentajeInteres`) / 100)),0,((sum((`gfoxV3`.`itemsFacturaSaliente`.`importeItem` * `gfoxV3`.`itemsFacturaSaliente`.`cantidad`)) * `gfoxV3`.`condicionesVentaItems`.`porcentajeInteres`) / 100))) AS `importeFactura`,(sum((`gfoxV3`.`itemsFacturaSaliente`.`importeItem` * `gfoxV3`.`itemsFacturaSaliente`.`cantidad`)) + if(isnull(((sum((`gfoxV3`.`itemsFacturaSaliente`.`importeItem` * `gfoxV3`.`itemsFacturaSaliente`.`cantidad`)) * `gfoxV3`.`condicionesVentaItems`.`porcentajeInteres`) / 100)),0,((sum((`gfoxV3`.`itemsFacturaSaliente`.`importeItem` * `gfoxV3`.`itemsFacturaSaliente`.`cantidad`)) * `gfoxV3`.`condicionesVentaItems`.`porcentajeInteres`) / 100))) AS `importe`,if((`gfoxV3`.`clientes`.`tipoCliente` = 'Empresa'),`gfoxV3`.`clientes`.`razonSocial`,concat(`gfoxV3`.`clientes`.`apellido`,', ',`gfoxV3`.`clientes`.`nombre`)) AS `cliente` from (((`gfoxV3`.`facturasSalientes` `t` join `gfoxV3`.`clientes` on((`gfoxV3`.`clientes`.`idCliente` = `t`.`idCliente`))) left join `gfoxV3`.`itemsFacturaSaliente` on((`gfoxV3`.`itemsFacturaSaliente`.`idFacturaSaliente` = `t`.`idFacturaSaliente`))) left join `gfoxV3`.`condicionesVentaItems` on((`t`.`idCondicionVenta` = `gfoxV3`.`condicionesVentaItems`.`idCondicionVenta`))) group by `gfoxV3`.`itemsFacturaSaliente`.`idFacturaSaliente`,`t`.`idFacturaSaliente`);

-- --------------------------------------------------------

--
-- Estructura para la vista `facturasEntrantes_view`
--
DROP TABLE IF EXISTS `facturasEntrantes_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`foxis`@`%` SQL SECURITY DEFINER VIEW `facturasEntrantes_view` AS (select `proveedores`.`nombre` AS `nombreProveedor`,`t`.`idFacturaEntrante` AS `idFacturaEntrante`,`t`.`idProveedor` AS `idProveedor`,`t`.`fecha` AS `fecha`,`t`.`fechaVencimiento` AS `fechaVencimiento`,`t`.`numeroFactura` AS `numeroFactura`,`t`.`precio` AS `precio`,`t`.`descripcion` AS `descripcion`,`t`.`estado` AS `estado`,`t`.`tipoFactura` AS `tipoFactura`,`t`.`idCentroCosto` AS `idCentroCosto`,`t`.`iva21` AS `iva21`,`t`.`iva105` AS `iva105`,`t`.`esCorriente` AS `esCorriente`,`t`.`condicion` AS `condicion`,`t`.`condicionIva` AS `condicionIva`,`t`.`idCondicionCompra` AS `idCondicionCompra`,`t`.`importeDescuentos` AS `importeDescuentos`,`t`.`importeFlete` AS `importeFlete`,`t`.`importeRecargos` AS `importeRecargos`,`t`.`importeImpuestos` AS `importeImpuestos`,((((if((`t`.`condicion` = 'Stock'),sum(((`compras_items`.`importeCompra` * `compras_items`.`cantidad`) * if((`t`.`tipoFactura` = 'A'),((`compras_items`.`alicuotaIva` / 100) + 1),1))),sum((`facturasEntrantes_concepto`.`importe` * if((`t`.`tipoFactura` = 'A'),((`facturasEntrantes_concepto`.`alicuotaIva` / 100) + 1),1)))) + (`t`.`importeFlete` * 1.21)) + `t`.`importeRecargos`) + `t`.`importeImpuestos`) - `t`.`importeDescuentos`) AS `importe`,if((`t`.`condicion` = 'Stock'),sum(if((`compras_items`.`alicuotaIva` = '10.5'),(`compras_items`.`importeCompra` * `compras_items`.`cantidad`),0)),sum(if((`facturasEntrantes_concepto`.`alicuotaIva` = '10.5'),`facturasEntrantes_concepto`.`importe`,0))) AS `importe105`,if((`t`.`condicion` = 'Stock'),sum(if((`compras_items`.`alicuotaIva` = '21'),(`compras_items`.`importeCompra` * `compras_items`.`cantidad`),0)),sum(if((`facturasEntrantes_concepto`.`alicuotaIva` = '21'),`facturasEntrantes_concepto`.`importe`,0))) AS `importe21` from (((`facturasEntrantes` `t` left join `compras_items` on((`t`.`idFacturaEntrante` = `compras_items`.`idFacturaEntrante`))) left join `proveedores` on((`t`.`idProveedor` = `proveedores`.`idProveedor`))) left join `facturasEntrantes_concepto` on((`t`.`idFacturaEntrante` = `facturasEntrantes_concepto`.`idFacturaEntrante`))) group by `t`.`idFacturaEntrante` order by `t`.`idFacturaEntrante` desc);
