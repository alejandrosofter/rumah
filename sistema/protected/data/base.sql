CREATE TABLE  `gfoxV3`.`presupuestos_ordenesTrabajo` (
`idPresupuestoOrden` INT( 100 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`idPresupuesto` INT( 100 ) NOT NULL ,
`idOrdenTrabajo` INT( 100 ) NOT NULL ,
`fecha` DATE NOT NULL
) ENGINE = INNODB;

CREATE TABLE  `gfoxV3`.`facturasOrdenesTrabajo` (
`idFacturaOrden` INT( 100 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`idFacturaSaliente` INT( 100 ) NOT NULL ,
`idOrdenTrabajo` INT NOT NULL ,
`fecha` DATE NOT NULL
) ENGINE = INNODB;

ALTER TABLE  `facturasOrdenesTrabajo` ADD FOREIGN KEY (  `idFacturaSaliente` ) REFERENCES  `gfoxV3`.`facturasSalientes` (
`idFacturaSaliente`
) ON DELETE CASCADE ON UPDATE CASCADE ;  

CREATE TABLE  `gfoxV3`.`cheques` (
`idCheque` INT( 100 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`fechaEmision` DATE NOT NULL ,
`fechaCobro` DATE NOT NULL ,
`idCliente` INT( 100 ) NOT NULL ,
`paguese` TEXT NOT NULL ,
`importe` FLOAT NOT NULL ,
`esCruzado` BOOL NOT NULL ,
`idCuenta` INT( 100 ) NOT NULL,
`numeroCheque` INT (100) NOT NULL);

CREATE TABLE  `gfoxV3`.`cheques_estados` (
`idEstadoCheque` INT( 100 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`idCheque` INT( 100 ) NOT NULL ,
`fecha` DATE NOT NULL ,
`nombreEstado` VARCHAR( 100 ) NOT NULL
) ENGINE = INNODB;

ALTER TABLE  `cheques_estados` ADD INDEX (  `idCheque` );
ALTER TABLE  `cheques_estados` ADD FOREIGN KEY (  `idCheque` ) REFERENCES  `gfoxV3`.`cheques` (
`idCheque`
) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `usuarios` CHANGE  `rutaImagen`  `rutaImagen` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

CREATE TABLE  `gfoxV3`.`sesiones` (
`idSesion` INT( 100 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`idUsuario` INT( 50 ) NOT NULL ,
`fechaIngresa` INT( 50 ) NOT NULL ,
`fechaEgresa` INT( 50 ) NOT NULL
) ENGINE = MYISAM ;

ALTER TABLE  `facturasEntrantes` ADD  `condicion` VARCHAR( 100 ) NOT NULL ,
ADD  `condicionIva` VARCHAR( 100 ) NOT NULL;

CREATE TABLE  `gfoxV3`.`conceptos` (
`idConcepto` INT( 100 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`nombreConcepto` TEXT NOT NULL ,
`idCuentaContable` INT( 100 ) NOT NULL ,
`codigoConcepto` VARCHAR( 50 ) NOT NULL
) ENGINE = MYISAM ;

CREATE TABLE  `gfoxV3`.`facturasEntrantes_concepto` (
`idFacturaConcepto` INT( 100 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`idFacturaEntrante` INT( 100 ) NOT NULL ,
`idConcepto` INT( 100 ) NOT NULL
) ENGINE = INNODB;

ALTER TABLE  `compras_items` DROP FOREIGN KEY  `compras_items_ibfk_1` ;

UPDATE compras_items t
INNER JOIN compras on compras.idCompra = t.idCompra
SET t.idCompra = compras.idFacturaEntrante;

ALTER TABLE  `compras_items` CHANGE  `idCompra`  `idFacturaEntrante` INT( 100 ) NOT NULL;

ALTER TABLE  `facturasEntrantes_concepto` ADD  `alicuotaIva` FLOAT NOT NULL;

CREATE TABLE  `gfoxV3`.`acciones` (
`idAccion` INT( 100 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`nombre` VARCHAR( 100 ) NOT NULL ,
`direccion` VARCHAR( 200 ) NOT NULL
) ENGINE = MYISAM ;

DROP TABLE  `prochatrooms_config` ,
`prochatrooms_group` ,
`prochatrooms_message` ,
`prochatrooms_profiles` ,
`prochatrooms_rooms` ,
`prochatrooms_users` ;