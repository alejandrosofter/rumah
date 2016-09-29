<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
      
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
	 <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 45px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 985px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span10,
      .content .span4 {
        min-height: 300px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 1;
      }

    </style>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php
	// remember that you can actually point to the js files directly if
// your script file is outside of protected/subfolders
$jqueryslidemenupath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/jqueryslidemenu/');


Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'/jqueryslidemenu.css');

Yii::app()->clientScript->registerCoreScript('jquery');
 
Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'/jqueryslidemenu.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/menu.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/bootstrap-dropdown.js'));

	?>
	<script>
	function initMenu() {
  $('#menu ul').hide();
	$("#menu ul:eq(<?php 
	echo isset(Yii::app()->request->cookies['menuSeleccion'])?Yii::app()->request->cookies['menuSeleccion']->value:0;
		 ?>)").show();//( "backgroundColor", "#ff0" );

  $('#menu li a').click(
    function() {
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
        $('#menu ul:visible').slideUp('normal');
        checkElement.slideDown('normal');
        return false;
        }
      }
    );
  
  }
$(document).ready(function() {initMenu();});

</script>

  
</head>

<body>
    <div class="topbar-wrapper" style="z-index: 5;">
    <div class="topbar" data-dropdown="dropdown" >
      <div class="topbar-inner">
        <div class="container">
          <h3><a ><?php echo CHtml::link(CHtml::image('images/gfox3.png'),'index.php?') ?></a></h3>
          <ul class="nav">
            <li class="active"><a href='index.php?'>Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Compras</a>
              <ul class="dropdown-menu">
                <li><a href="index.php?r=facturasEntrantes">Facturas</a></li>
                <li><a href="index.php?r=ordenesPago">Ordenes de Pago</a></li>
                <li><a href="index.php?r=proveedores">Proveedores</a></li>
                <li><a href="index.php?r=condicionesCompra">Condiciones de Compras</a></li>
                <li class="divider"></li>
                <li><a href="index.php?r=facturasEntrantes/crearParaStock">Nueva Factura Stock</a></li>
                <li><a href="index.php?r=proveedores/create">Nuevo Proveedor</a></li>
                <li><a href="index.php?r=conceptos/create">Nuevo Concepto</a></li>
                <li><a href="index.php?r=ordenesPago/crearOrden">Nueva Orden de Pago</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Ventas</a>
              <ul class="dropdown-menu">
                <li><a href="index.php?r=facturasSalientes">Facturas</a></li>
                <li><a href="index.php?r=ordenesCobro">Ordenes de Pago</a></li>
                <li><a href="index.php?r=clientes">Clientes</a></li>
                <li><a href="index.php?r=condicionesVenta">Condiciones de Ventas</a></li>
                <li><a href="index.php?r=presupuestos/index&estado=Para%20Aprobar">Presupuestos</a></li>
                <li><a href="index.php?r=puntoVenta">Talonarios</a></li>
                <li><a href="index.php?r=stock/stockReal">Stock</a></li>
                <li><a href="index.php?r=clientes/ctasCorrientes">Ctas. Ctes</a></li>
                <li class="divider"></li>
                <li><a href="index.php?r=facturasSalientes/crearFactura">Nueva Factura</a></li>
                <li><a href="index.php?r=clientes/create">Nuevo Cliente</a></li>
                <li><a href="index.php?r=ordenesCobro/crearCobro">Nueva Orden de Cobro</a></li>
                <li><a href="index.php?r=facturasSalientes/facturaCredito">Nueva Nota de Credito</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Productos & Servicios</a>
              <ul class="dropdown-menu">
                <li><a href="index.php?r=stock">Productos</a></li>
                <li><a href="index.php?r=servicios">Servicios</a></li>
                <li><a href="index.php?r=inventarios">Inventarios</a></li>
                <li><a href="index.php?r=ordenesTrabajo/porEstado&estado=">Ordenes de Servicio</a></li>
                <li><a href="index.php?r=mantenimientosEmpresas">Contratos</a></li>
                <li><a href="index.php?r=tareas">Tareas</a></li>
                <li class="divider"></li>
                <li><a href="index.php?r=ordenesTrabajo/create">Nueva Orden de Servicio</a></li>
                <li><a href="index.php?r=stock/create">Nuevo Producto</a></li>
                <li><a href="index.php?r=inventarios/create">Nuevo Inventario</a></li>
                <li><a href="index.php?r=servicios/create">Nuevo Servicio</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Configuraciones</a>
              <ul class="dropdown-menu">
                <li><a href="index.php?r=usuarios">Usuarios</a></li>
                <li><a href="index.php?r=settings/variablesSistema">Variables de Sistema</a></li>
                <li><a href="index.php?r=mensajes">Comunicacion</a></li>
                <li><a href="index.php?r=cuentas">Cuentas Contables</a></li>
                <li><a href="index.php?r=formasDePago">Formas de Pago</a></li>
                <li><a href="index.php?r=settings/ImpresionesSistema">Impresiones</a></li>
                <li><a href="index.php?r=crons">Crons(tareas programadas)</a></li>
                <li class="divider"></li>
                <li><a href="index.php?r=settings/actualizarSistema">Actualizar Sistema</a></li>
                <li><a href="index.php?r=usuarios/create">Nuevo Usuario</a></li>
              </ul>
            </li>
          </ul>
          <form class="pull-left" action="">
            <?php                               try {
                                    echo $this->renderPartial('/layouts/_buscadorAcciones',array(),true);
                               } catch (Exception $exc) {
                                  
                               }
                              ?>
          </form>
          <ul class="nav secondary-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">Ayuda</a>
              <ul class="dropdown-menu">
                <li><a href="http://foxis.com.ar/foxisSite/index.php?option=com_content&view=article&id=68&Itemid=49">Ver ayuda</a></li>
      
              </ul>
            </li>
          </ul>
        
        </div>
      </div><!-- /topbar-inner -->
    </div><!-- /topbar -->
  </div><!-- /topbar-wrapper -->


   <div class="container">
       
 <div class="breadcrumb">
 <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	 </div>
      <div class="content">

       

        <div class="row">

          <div class="span10">
                
            <?php echo $content; ?>
          </div>
          
        </div>
      </div>

	<footer>
		<p>Copyright &copy; <?php echo date('Y'); ?> por Foxis.<br/>
		Todos los derechos reservados.<br/>
               
	</footer>

    </div>

</body>
</html>