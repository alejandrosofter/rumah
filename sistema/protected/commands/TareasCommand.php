<?php 

class TareasCommand extends CConsoleCommand
{
    private function getCantidad($idUsuario)
    {
        $sql="SELECT * FROM `tareas_destinatarios` t
INNER JOIN tareas on t.idTarea = tareas.idTarea
INNER JOIN usuarios on usuarios .idUsuario = t.idUsuario

 WHERE estadoTarea<>'Finalizada' AND t.idUsuario='$idUsuario'";
       $connection=Yii::app()->getDb();
        $command=$connection->createCommand($sql);
         $res= $command->queryAll();
         $cantidad=count($res);
         return $cantidad;
    }
    private function getMensaje($idUsuario)
    {
        $sql="SELECT * FROM `tareas_destinatarios` t
INNER JOIN tareas on t.idTarea = tareas.idTarea
INNER JOIN usuarios on usuarios .idUsuario = t.idUsuario

 WHERE estadoTarea<>'Finalizada' AND t.idUsuario='$idUsuario'";
       $connection=Yii::app()->getDb();
        $command=$connection->createCommand($sql);
         $res= $command->queryAll();
         $cantidad=count($res);
         if($cantidad==0) return false;
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
        $sql="SELECT * FROM `usuarios` t";
       $connection=Yii::app()->getDb();
        $command=$connection->createCommand($sql);
         $res= $command->queryAll();
         foreach ($res as $usuario){
             $usuario=Usuarios::model()->findByPk($usuario['idUsuario']);
             
             $parametros['titulo']="INFORME de Tareas (".$this->getCantidad($usuario['idUsuario']).')';
      			$parametros['contenido']=$this->getMensaje($usuario['idUsuario']);
      			$parametros['usuario']=$usuario['nombre'];
                        $parametros['fecha']=Date('d-m-Y');
                        
      			if($usuario['email']!='' && $parametros['contenido']!=false)
      				Mensajes::model()->enviarMail($usuario['email'],Settings::model()->getValorSistema('GENERALES_MAIL_IMPRESION_TAREAPENDIENTE',$parametros,'impresiones'),$parametros['titulo'],Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
      			
         }
       
    }
}