<?php
class AvisoManenimientosClientesCommand extends CConsoleCommand
{
    private function getTablaCliente($idCliente,$inicio,$fin)
    {
        $sql="SELECT * FROM `tareas` WHERE idClienteTarea='$idCliente' AND fechaTarea<'$fin' AND fechaTarea>'$inicio' ";
       $connection=Yii::app()->getDb();
        $command=$connection->createCommand($sql);
         $res= $command->queryAll();
         
         $tabla='<table>';
          $tabla.='<tr>';
          $tabla.='<th>Fecha </th>';
          $tabla.='<th>Prioridad </th>';
          $tabla.='<th>Descripcion </th>';
          $tabla.='<th>Visita de Rutina </th>';
          $tabla.='<th>Estado</th>';
          $tabla.='</tr>';
          foreach ($res as $tarea){
              $tabla.='<tr>';
          $tabla.='<td>'.Yii::app()->dateFormatter->format("dd-M-y",$tarea['fechaTarea']).' </td>';
          $tabla.='<td>'.$tarea['prioridadTarea'].' </td>';
          $tabla.='<td>'.$tarea['descripcionTarea'].'</td>';
          $visita=($tarea['visitaRutina']==1)?'Visita':'Tarea/Evento';
          $tabla.='<td>'.$visita.' </td>';
          $tabla.='<td>'.$tarea['estadoTarea'].' </td>';
          $tabla.='</tr>';
          }
          return $tabla;
          
    }
    
    public function run($args)
    {
       $sql="SELECT * FROM `mantenimientosEmpresas` ";
       $inicio=Date('Y-m-01');
       $fin=Date('Y-m-31');
       $connection=Yii::app()->getDb();
        $command=$connection->createCommand($sql);
         $res= $command->queryAll();
         $clientes='';
         foreach ($res as $mant){
             $cliente=Clientes::model()->findByPk($mant['idClienteEmpresa']);
             $nombreCliente=$cliente['apellido'].' '.$cliente['nombre'].' '.$cliente['razonSocial'];
             $tabla=$this->getTablaCliente($mant['idClienteEmpresa'],$inicio,$fin);
             $parametros['contacto']=$nombreCliente;
             
            $parametros['contenido']=$tabla;
            $parametros['cliente']=$nombreCliente;
            $parametros['nombreMantenimiento']=$cliente->nombresContactoMantenimiento;
            $parametros['visitasPactadas']=$mant['cantidadVisitasMensuales'];
            $parametros['fechaActual']=Yii::app()->dateFormatter->format("dd-M-y",Date('Y-m-d'));
            $parametros['fechaDesde']=Yii::app()->dateFormatter->format("dd-M-y",$inicio);
            $parametros['fechaHasta']=Yii::app()->dateFormatter->format("dd-M-y",$fin);
             if(Settings::model()->getValorSistema('TAREAS_ALERTAS_MANT_MAIL')==1)
             if($cliente->emailContactoMantenimiento!=''){
                 $clientes.=$nombreCliente.'<br> ';
                $titulo='Servicio por el periodo '.$parametros['fechaDesde'].' hasta '.$parametros['fechaHasta'];
                Mensajes::model()->enviarMail($cliente->emailContactoMantenimiento,Settings::model()->getValorSistema('MAIL_AUTOMATICO_MANTENIMIENTOS',$parametros,'impresiones'),$titulo,Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
            }
         

         }
         $parametros['clientes']=$clientes;
            $parametros['fechaActual']=Yii::app()->dateFormatter->format("dd-M-y",Date('Y-m-d'));
            $parametros['fechaDesde']=Yii::app()->dateFormatter->format("dd-M-y",$inicio);
            $parametros['fechaHasta']=Yii::app()->dateFormatter->format("dd-M-y",$fin);
            $titulo='Clientes con Mantenimientos PERIODO:'.$parametros['fechaDesde'].' '.$parametros['fechaHasta'];
         Mensajes::model()->enviarMail(Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'),Settings::model()->getValorSistema('MAIL_AUTOMATICO_MANTENIMIENTOS_ADMIN',$parametros,'impresiones'),$titulo,Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
         
         
      				
    }
    
}