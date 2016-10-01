<?php 

class NuevaTareaUsuarioCommand extends CConsoleCommand
{
    public function actionAgregarTareaUsuario($idTarea, $idUsuario, $idUsuarioEmisor)
    {
        $tarea=Tareas::model()->findByPk($idTarea);
        $nuevaTarea=new Tareas;
        $nuevaTarea->idClienteTarea=$tarea->idClienteTarea;
        $nuevaTarea->fechaTarea=Date('Y-m-d');
        $nuevaTarea->prioridadTarea=$tarea->prioridadTarea;
        $nuevaTarea->estadoTarea='Para Realizar';
        $nuevaTarea->descripcionTarea=$tarea->descripcionTarea;
        $nuevaTarea->tipoTarea=$tarea->tipoTarea;
        $nuevaTarea->visitaRutina=$tarea->visitaRutina;
        $nuevaTarea->save();
        
        $destinatario=new TareasDestinatarios;
        $destinatario->idTarea=$nuevaTarea->idTarea;
        $destinatario->idUsuarioEmisor=$idUsuarioEmisor;
        $destinatario->idUsuario=$idUsuario;
        if($destinatario->save())
        if(Settings::model()->getValorSistema('TAREAS_ALERTAS_MANT_MAIL')==1)
                                if($destinatario->visitaRutina==1){
                                $cliente=Clientes::model()->findByPk($destinatario->idClienteTarea);
                                $visita=($destinatario->visitaRutina==1)?'Visita':'Tarea o evento';
                                $titulo=$visita.' ('.$destinatario->tipoTarea.')';
                                $emailCliente=$cliente->emailContactoMantenimiento;
                                $parametros['oficial']=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
                                $parametros['cliente']=$cliente->nombresContactoMantenimiento;
                                $parametros['descripcion']=$destinatario->descripcionTarea;
                                $parametros['estado']=$destinatario->estadoTarea=='Para Realizar'?'estaremos asistiendo a sus oficinas':'hemos asistido a sus oficinas';
                                $parametros['visitaRutina']=$destinatario->visitaRutina;
                                $parametros['tipo']=$destinatario->tipoTarea;
                                $parametros['mensajeAsistencia']=$destinatario->tipoTarea;
                                $parametros['fecha']=$destinatario->fechaTarea;
                                 Mensajes::model()->enviarMail($emailCliente,Settings::model()->getValorSistema('IMPRESION_MAIL_TAREAMANTENIMIENTO',$parametros,'impresiones'),$titulo,Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
                            }
        
//        $destinatarios=TareasDestinatarios::model()->consultarUsuariosTarea2($idTarea);
//        foreach ($destinatarios as $dest){
//            $model=new TareasDestinatarios;
//            $model->attributes=$dest;
//            $model->save();
//        }
         $cliente=Clientes::model()->findByPk($nuevaTarea->idClienteTarea);
             $nombreCliente=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
             $user=Usuarios::model()->findByPk($idUsuario);
             $parametros['titulo']="Nueva Tarea (".$nombreCliente.') REF:'.$nuevaTarea->idTarea;
      			$parametros['mensaje']=$nuevaTarea->descripcionTarea;
      			$parametros['fecha']=$nuevaTarea->fechaTarea;
                        $parametros['cliente']=$nombreCliente;
                        $parametros['prioridadTarea']=$nuevaTarea->prioridadTarea;
                        $parametros['tipoTarea']=$nuevaTarea->tipoTarea;
                        $parametros['visitaRutina']=$nuevaTarea->visitaRutina;
                        $parametros['prioridadTarea']=$nuevaTarea->prioridadTarea;
                        $parametros['linkMisTareas']=CHtml::link('Ver mis Tareas','http://'.Settings::model()->getValorSistema('GENERALES_RUTASISTEMA').'/index.php?r=tareas/verMisTareas');
      			if($user->email!='')
      				Mensajes::model()->enviarMail($user->email,Settings::model()->getValorSistema('GENERALES_MAIL_IMPRESION_TAREA',$parametros,'impresiones'),$parametros['titulo'],Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
                
            
    
    }
}