<?php
$this->breadcrumbs=array(
	'Movimiento de Cliente'
);

//$this->menu=array(
//	array('label'=>'Crear Usuario', 'url'=>array('create')),
//	array('label'=>'Administrar Areas', 'url'=>array('/usuariosAreas')),
//	array('label'=>'Administrar Tipo Usuarios', 'url'=>array('/usuariosTipoUsuarios')),
//);
?>

<h1>Movimientos</h1>
Se listan los movimientos del cliente en el sistema: <br><b>
<?php $movimientos=$model->consultaMovimientos($idCliente);
if(count($movimientos)==0)echo 'No se registran movimientos sobre este cliente!';
?>
	</b>
<table>
<tr>
	<th></th>
	<th> Fecha</th>
	<th> Movimiento</th>
	<th> Estado</th>
	
	<th> Acciones</th>
</tr>
<?php foreach($movimientos as $item):?>
<tr>
	<td> <?php echo getTipo($item['tipo']) ?></td>
	<td> <?php echo $item['fecha']  ?></td>
	<td> <?php echo $item['detalle']  ?></td>
	<td> <?php echo getEstado($item['tipo'],$item['estado']) ?></td>
	<td> <?php echo getAcciones($item['tipo'],$item['idElemento']) ?></td>
</tr>

<?php endforeach;?>
<?php
function getTipo($tipo)
{
	$iconoOk=CHtml::image('images/iconos/famfam/tick.png',$tipo);
	$iconoAlerta=CHtml::image('images/iconos/famfam/error.png',$tipo);
    $iconoError=CHtml::image('images/iconos/famfam/exclamation.png',$tipo);           
	$acciones='';
	switch($tipo){
		case 'Factura':{
			return CHtml::link(CHtml::image('images/iconos/famfam/script.png',$tipo,array()),
                    "index.php?r=facturasSalientes");
			
			break;
		}
		case 'Orden de Trabajo':{
			return CHtml::link(CHtml::image('images/iconos/famfam/wrench.png',$tipo,array()),
                    "index.php?r=ordenesTrabajo");
			break;
		}
		case 'Tareas':{
			return CHtml::link(CHtml::image('images/iconos/famfam/page_white_edit.png',$tipo,array()),
                    "index.php?r=tareas");
			break;
		}
		case 'Cobros':{
			return CHtml::link(CHtml::image('images/iconos/famfam/money.png',$tipo,array()),
                    "index.php?r=ordenesCobro");
			break;
		}
	}
	return $acciones;
}
function getEstado($tipo,$estado)
{
	$iconoOk=CHtml::image('images/iconos/famfam/tick.png',$estado);
	$iconoAlerta=CHtml::image('images/iconos/famfam/error.png',$estado);
    $iconoError=CHtml::image('images/iconos/famfam/exclamation.png',$estado);           
	$acciones='';
	switch($tipo){
		case 'Factura':{
			if($estado=='CANC') return $iconoOk;
			return $iconoAlerta;
			break;
		}
		case 'Orden de Trabajo':{
			if($estado=='Realizada') return $iconoOk;
			return $iconoAlerta;
			break;
		}
		case 'Tareas':{
			if($estado=='Finalizada') return $iconoOk;
			return $iconoAlerta;
			break;
		}
		case 'Cobros':{
			//if($estado=='Realizada') return $iconoOk;
			return $iconoOk;
			break;
		}
	}
	return $acciones;
}
function getAcciones($tipo,$idElemeno)
{
	$acciones='';
	$idElemeno=isset($idElemeno)?$idElemeno:0;
	switch($tipo){
		case 'Factura':{
			$factura=FacturasSalientes::model()->findByPk($idElemeno);
			$acciones=CHtml::link(CHtml::image('images/iconos/famfam/money.png','Terminar',array('ALIGN'=>'right')),
                    "index.php?r=ordenesCobro/pagoDirecto&idFactura=$idElemeno&idCliente=".$factura->idCliente);
            $acciones.=CHtml::link(CHtml::image('images/iconos/famfam/calendar_link.png','Vencimientos',array('ALIGN'=>'right')),
                    "index.php?r=facturasEntrantesVencimientos&idFacturaEntrante=$idElemeno");
           $acciones.=CHtml::link(CHtml::image('images/iconos/famfam/printer.png','Vencimientos',array('ALIGN'=>'right')),
                    "index.php?r=impresiones/create&idTipo=$idElemeno&tipoImpresion=factura");
			break;
		}
		case 'Orden de Trabajo':{
			$acciones=CHtml::link(CHtml::image('images/iconos/famfam/arrow_right.png','Terminar',array('ALIGN'=>'right')),
                    "index.php?r=ordenesTrabajoEstados/verEstadosOrden&id=$idElemeno");
             $acciones.=CHtml::link(CHtml::image('images/iconos/famfam/money_add.png','Facturar',array('ALIGN'=>'right')),
                    "index.php?r=facturasSalientes/crearFactura&idOrdenTrabajo=$idElemeno");
             $acciones.=CHtml::link(CHtml::image('images/iconos/famfam/printer.png','Imprimir',array('ALIGN'=>'right')),
                    "index.php?r=impresiones/create&idTipo=$idElemeno&tipoImpresion=orden");
			break;
		}
		case 'Tareas':{
			$acciones=CHtml::link(CHtml::image('images/iconos/famfam/group.png','Destinatarios',array('ALIGN'=>'right')),
                    "index.php?r=tareasDestinatarios/tareas&id=$idElemeno");
             $acciones.=CHtml::link(CHtml::image('images/iconos/famfam/arrow_right.png','Nuevo Estado',array('ALIGN'=>'right')),
                    "index.php?r=tareasEstados/create&id=$idElemeno");
             $acciones.=CHtml::link(CHtml::image('images/iconos/famfam/eye.png','Seguimiento',array('ALIGN'=>'right')),
                    "index.php?r=tareasEstados/estadosTarea&id=$idElemeno");
			break;
		}
		case 'Cobros':{
			
			break;
		}
	}
	return $acciones;
}
?>
</table>