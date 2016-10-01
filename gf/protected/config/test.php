<?php

$ruta = dirname(__FILE__) . '/base.txt';
$cadena = file_get_contents($ruta);
$base = str_replace(chr(10), "", $cadena); //remove carriage returns
$base = str_replace(chr(13), "", $cadena);
$base = str_replace('\n', "", $cadena);
$base = str_replace('\r', "", $cadena);
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'GfoxV3',
    'language' => 'es',
    'sourceLanguage' => 'es',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.crontab.*',
        'ext.bootstrap.components.*',
        'application.modules.auditTrail.models.AuditTrail',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
        'application.extensions.yii-mail.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'cal' => array('debug' => true),
        'auditTrail' => array(),
        'rights' => array(
            'install' => false,
            'userIdColumn' => 'idUsuario',
            'userNameColumn' => 'usuario_',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1234',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.*', '::1', '*'),
            'generatorPaths' => array(
                'ext.bootstrap.gii', // Since 0.9.1
            ),
        ),
    ),
    // application components
    'components' => array(
        'session' => array(
            'timeout' => 5000,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                
                array(
                    'class' => 'CWebLogRoute',
                ),
            ),
        ),

//		'user'=>array(
//			// enable cookie-based authentication
//			'allowAutoLogin'=>false,
//		), 
        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            'transportType' => 'smtp', /// case sensitive!
            'transportOptions' => array(
                'host' => 'smtp.gmail.com',
                'username' => 'yourgoogleemail@gmail.com',
                'password' => 'yourgooglemailpassword',
                'port' => '465',
                'encryption' => 'ssl',
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),
        'ePdf' => array(
            'class' => 'ext.yii-pdf.EYiiPdf',
            'params' => array(
                'mpdf' => array(
                    'librarySourcePath' => 'application.vendors.mpdf.*',
                    'constants' => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class' => 'mpdf', // the literal class filename to be loaded from the vendors folder
                /* 'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                  'mode'              => '', //  This parameter specifies the mode of the new document.
                  'format'            => 'A4', // format A4, A5, ...
                  'default_font_size' => 0, // Sets the default document font size in points (pt)
                  'default_font'      => '', // Sets the default font-family for the new document.
                  'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                  'mgr'               => 15, // margin_right
                  'mgt'               => 16, // margin_top
                  'mgb'               => 16, // margin_bottom
                  'mgh'               => 9, // margin_header
                  'mgf'               => 9, // margin_footer
                  'orientation'       => 'P', // landscape or portrait orientation
                  ) */
                ),
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendors.html2pdf_v4.*',
                    'classFile' => 'html2pdf.class.php', // For adding to Yii::$classMap
                /* 'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                  'orientation' => 'P', // landscape or portrait orientation
                  'format'      => 'A4', // format A4, A5, ...
                  'language'    => 'en', // language: fr, en, it ...
                  'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                  'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                  'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                  ) */
                )
            ),
        ),
        'user' => array(
            'class' => 'RWebUser',
        ),
        'fusioncharts' => array(
            'class' => 'ext.fusioncharts.fusionCharts',
        ),
        'chat' => array(
            'class' => 'ext.ChatAjax',
        ),
        'bootstrap' => array('class' => 'ext.bootstrap.components.Bootstrap'),
        'authManager' => array(
            'class' => 'RDbAuthManager'
        ),
        // uncomment the following to enable URLs in path-format
//		'urlManager'=>array(
//			'urlFormat'=>'path',
//			'rules'=>array(
//      '<controller:\w+>/<id:\d+>'=>'<controller>/view',
//      '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//      '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//    ),
//    'showScriptName'=>false,
//		),


        'db' => array(
            'connectionString' => "mysql:host=localhost;dbname=$base",
            'emulatePrepare' => true,
            'username' => 'foxis',
            'password' => '1234',
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'settings' => array(
            'class' => 'CmsSettings',
            'cacheId' => 'global_website_settings',
            'cacheTime' => 20,
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'menuPrincipal' => array(
            array('label' => 'Compras', 'url' => array('#'), 'items' => array(
                    array('label' => 'Facturas', 'url' => array('/facturasEntrantes'), 'items' => array(
                            array('label' => 'Nueva Factura STOCK', 'url' => array('/facturasEntrantes/crearParaStock')),
                            array('label' => 'Nueva Factura INSUMOS/SERVICIOS', 'url' => array('/facturasEntrantes/crearParaConceptos')),
                    )),
                    array('label' => 'Ordenes de Pago', 'url' => array('/ordenesPago'), 'items' => array(
                            array('label' => 'Nueva Orden de Pago', 'url' => array('/ordenesPago/crearOrden')),
                    )),
                    array('label' => 'Proveedores', 'url' => array('/proveedores'), 'items' => array(
                            array('label' => 'Nuevo Proveedor', 'url' => array('/proveedores/create')),
                            array('label' => 'Jurisdicciones', 'url' => array('/juridicciones')),
                    )),
                    array('label' => 'Condiciones Compra', 'url' => array('/condicionesCompra'), 'items' => array(
                            array('label' => 'Nueva Condición', 'url' => array('/condicionesCompra/create')),
                    )),
                    array('label' => 'Gasto Rapido', 'url' => array('#'), 'items' => array(
                            array('label' => 'por Factura X', 'url' => array('/facturasEntrantes/gastoRapido&factura=x')),
                            array('label' => 'por Fatura A', 'url' => array('/facturasEntrantes/gastoRapido&factura=a')),
                            array('label' => 'por Fatura B', 'url' => array('/facturasEntrantes/gastoRapido&factura=b')),
                            array('label' => 'por Fatura C', 'url' => array('/facturasEntrantes/gastoRapido&factura=c')),
                    )),
                    array('label' => 'Conceptos', 'url' => array('/conceptos'), 'items' => array(
                            array('label' => 'Nuevo Concepto', 'url' => array('/conceptos/create')),
                    )),
                    array('label' => 'Informes', 'url' => array('#'), 'items' => array(
                            array('label' => 'Deudas', 'url' => array('/balances/resumenDeudores')),
                            array('label' => 'Libro IVA compra', 'url' => array('/impresiones/librosIva&tipo=Compras')),
                            array('label' => 'Listado Proveedores', 'url' => array('/impresiones/create&tipoImpresion=proveedores')),
                            array('label' => 'Saldo de Compras', 'url' => array('/facturasEntrantes/saldoProveedores')),
                            array('label' => 'Consulta Saldo de Proveedor', 'url' => array('/facturasEntrantes/saldoProveedor')),
                    )),
                //array('label'=>'Compras de Stock', 'url'=>array('/facturasEntrantes/consultarCompraStock')),
            )),
            array('label' => 'Ventas', 'url' => array('#'), 'items' => array(
                    array('label' => 'Comprobantes', 'url' => array(''), 'items' => array(
                            array('label' => 'Facturas', 'url' => array('/facturasSalientes'), 'items' => array(
                                    array('label' => 'Nueva Factura', 'url' => array('/facturasSalientes/crearFactura')),)),
                            array('label' => 'Notas de Credito', 'url' => array('/facturasSalientes/notasCredito'), 'items' => array(
                                    array('label' => 'Nueva Notas de Credito', 'url' => array('/facturasSalientes/facturaCredito')),
                            )),
                            array('label' => 'Ordenes Cobro', 'url' => array('/ordenesCobro'), 'items' => array(
                                    array('label' => 'Nueva Orden de Cobro', 'url' => array('/ordenesCobro/crearCobro')),
                            )),
                    )),
                    array('label' => 'Clientes', 'url' => array('/clientes'), 'items' => array(
                            array('label' => 'Nuevo Cliente', 'url' => array('/clientes/create')),
                    )),
                    array('label' => 'Presupuestos', 'url' => array('/presupuestos/index&estado=Para%20Aprobar'), 'items' => array(
                            array('label' => 'Nuevo Presupuesto', 'url' => array('/presupuestos/create')),
                    )),
                    array('label' => 'Vendedores', 'url' => array('/vendedores'), 'items' => array(
                            array('label' => 'Informe de Ventas', 'url' => array('/vendedores/informeVentas')),
                    )),
                    array('label' => 'Pre-Ventas', 'url' => array('#'), 'items' => array(
                            array('label' => 'Estados de Pre-Ventas', 'url' => array('/PreVentasNombreEstados')),
                            array('label' => 'Empresas', 'url' => array('/PreVentasEmpresas')),
                            array('label' => 'Informes', 'url' => array('#'), 'items' => array(
                                    array('label' => 'Informe por fecha', 'url' => array('/PreVentasEmpresas/informeUsuario')),
                            )),
                    )),
                    array('label' => 'Informes', 'url' => array('#'), 'items' => array(
                            array('label' => 'Informe Contable', 'url' => array('/balances/facturacionContable')),
                            array('label' => 'Consulta de Ventas', 'url' => array('/balances/informeVentas')),
                            array('label' => 'Listado Clientes', 'url' => array('/impresiones/create&tipoImpresion=clientes')),
                            array('label' => 'Exporta a Citi Ventas (AFIP)', 'url' => array('/impresiones/exportar&resumen=citiVentas')),
                            array('label' => 'Libro IVA Ventas', 'url' => array('/impresiones/librosiva&tipo=Ventas')),
                            array('label' => 'Morosos', 'url' => array('/balances/resumenMorosos')),
                            array('label' => 'Saldo Cliente', 'url' => array('/facturasSalientes/saldoClientes')),
                            array('label' => 'Saldo General', 'url' => array('/facturasSalientes/saldoEmpresa')),
                    )),
                    array('label' => 'Datos', 'url' => array(''), 'items' => array(
                            array('label' => 'Condiciones Venta', 'url' => array('/condicionesVenta'), 'items' => array(
                                    array('label' => 'Nueva Condición', 'url' => array('/condicionesVenta/create')),
                            )),
                            array('label' => 'Talonarios/Puntos de Venta', 'url' => array('/puntoVenta')),
                    )),
                    array('label' => 'Ctas Corrientes', 'url' => array('/clientes/ctasCorrientes')),
                    array('label' => 'Stock (disponibilidad)', 'url' => array('/stock/stockReal')),
//		array('label'=>'Consulta de Precios', 'url'=>array('/stock/consultaPrecios')),
            )),
            array('label' => 'Productos', 'url' => array('#'), 'items' => array(
                    array('label' => 'Productos', 'url' => array('/stock'), 'items' => array(
                            array('label' => 'Tipo de Producto', 'url' => array('/stockTipoProducto'), 'items' => array(
                                    array('label' => 'Nuevo', 'url' => array('/stockTipoProducto/create')),
                            )),
                            array('label' => 'Marcas', 'url' => array('/stockMarcas'), 'items' => array(
                                    array('label' => 'Nueva Marca', 'url' => array('/stockMarcas/create')),
                            )),
                    )),
                    array('label' => 'Inventarios', 'url' => array('/inventarios'), 'items' => array(
                            array('label' => 'Nuevo Inventario', 'url' => array('/inventarios/create')),
                    )),
                    array('label' => 'Informes', 'url' => array('#'), 'items' => array(
                            array('label' => 'Informe de Stock', 'url' => array('/stock/informeStock')),
                    )),
                    array('label' => 'Nuevo Producto', 'url' => array('/stock/create')),
            )),
            array('label' => 'Servicios', 'url' => array('#'), 'items' => array(
                    array('label' => 'Ordenes de Trabajo', 'url' => array('/ordenesTrabajo/porEstado&estado='), 'items' => array(
                            array('label' => 'Nueva Orden', 'url' => array('/ordenesTrabajo/create')),
                            array('label' => 'Rutinas', 'url' => array('/rutinasOrdenesTrabajo'), 'items' => array(
                                    array('label' => 'Nueva Rutina', 'url' => array('/rutinasOrdenesTrabajo/create')),
                            )),
                            array('label' => 'Recursos', 'url' => array('/recursosOrdenesTrabajo'), 'items' => array(
                                    array('label' => 'Nuevo Recurso', 'url' => array('/recursosOrdenesTrabajo/create')),
                                    array('label' => 'Tipo de Recursos', 'url' => array('/recursosTipoRecursosOrdenesTrabajo'), 'items' => array(
                                            array('label' => 'Nuevo Tipo de recurso', 'url' => array('/recursosTipoRecursosOrdenesTrabajo/create')),
                                    )),
                            )),
                    )),
                    array('label' => 'Tareas', 'url' => array('/tareas/'), 'items' => array(
                            array('label' => 'Mis Tareas', 'url' => array('/tareas/verMisTareas')),
                            array('label' => 'Nueva Tarea', 'url' => array('/tareas/create')),
                            array('label' => 'Pendientes', 'url' => array('/tareas/pendientes')),
                            array('label' => 'Nuevo Cron a Usuario', 'url' => array('/crons/createUsuario')),
                    )),
                    array('label' => 'Contratos', 'url' => array('/mantenimientosEmpresas'), 'items' => array(
                            array('label' => 'Nuevo Contrato', 'url' => array('/mantenimientosEmpresas/create')),
                    )),
                    array('label' => 'Servicios disponibles', 'url' => array('/servicios'), 'items' => array(
                            array('label' => 'Nuevo Servicio', 'url' => array('/servicios/create')),
                    )),
                    array('label' => 'Informes', 'url' => array('#'), 'items' => array(
                            array('label' => 'Consulta de Performance', 'url' => array('/balances/resumenOrdenes')),
                            array('label' => 'Listado de Servicios', 'url' => array('/impresiones/create&tipoImpresion=servicios')),
                    )),
            )),
            array('label' => 'Configuraciones', 'url' => array('#'), 'items' => array(
                    array('label' => 'Usuarios', 'url' => array('/usuarios'), 'items' => array(
                            array('label' => 'Paneles de Usuario', 'url' => array('/usuariosPaneles')),
                            array('label' => 'Nuevo Usuario', 'url' => array('/usuarios/create')),
                            array('label' => 'Areas de Usuarios', 'url' => array('/usuariosAreas')),
                            array('label' => 'Permisos de Usuario', 'url' => array('/rights')),
                    )),
                    array('label' => 'Actualizar Sistema', 'url' => array('/settings/actualizarSistema')),
                    array('label' => 'Variables de Sistema', 'url' => array('/settings/variablesSistema'), 'items' => array(
                            array('label' => 'Mis Variables', 'url' => array('/settings/variablesSistemaUsuario')),
                    )),
                    array('label' => 'Crons', 'url' => array('/crons'), 'items' => array(
                            array('label' => 'Nuevo Cron', 'url' => array('/crons/create')),
                            array('label' => 'Nuevo Cron a Usuario', 'url' => array('/crons/createUsuario')),
                    )),
                    array('label' => 'Comunicacion', 'url' => array('/mensajes'), 'items' => array(
                            array('label' => 'Nuevo Mensaje SMS', 'url' => array('/mensajes/createMensajeSms')),
                            array('label' => 'Nuevo EMAIL', 'url' => array('/mensajes/createMensaje')),
                    )),
                    array('label' => 'Contabilidad', 'url' => array('#'), 'items' => array(
                            array('label' => 'Cuentas Contables', 'url' => array('/cuentas')),
                            array('label' => 'Formas de Pago', 'url' => array('/formasDePago')),
                    )),
                    array('label' => 'Impresiones', 'url' => array('/settings/ImpresionesSistema'), 'items' => array(
                            array('label' => 'Cierre Impresoras Fiscales', 'url' => array('/cuentas'), 'items' => array(
                                    array('label' => 'Cierre A (Ticket Fiscal)', 'url' => array('/impresiones/cierreATF')),
                                    array('label' => 'Cierre Z (Ticket Fiscal)', 'url' => array('/impresiones/cierreZTF')),
                                )
                            ),
                        )
                    ),
                //array('label'=>'Acciones Disponibles', 'url'=>array('/acciones')),
            )),
        )
    ),
);
