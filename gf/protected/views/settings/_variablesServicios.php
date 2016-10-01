<h3>Variables de Servicios</h3>

<h3>Tareas</h3>
<div class="row">
		<b><?php echo 'Enviar Mail al Finalizar Tarea' ?></b>
		<?php echo  CHtml::dropDownList('TAREAS_ENVIAR_MAIL_FINALIZADA',Settings::model()->getValorSistema('TAREAS_ENVIAR_MAIL_FINALIZADA'),FacturasEntrantes::model()->getEstadosAlertas());?>
		
		
		<span class='help-block'><b>NOTA: </b>Activar o no el envio de mails al finalizar una tarea.</span>
		
	</div>
<div class="row">
		<b><?php echo 'Email remitente de Tareas' ?></b>
		<?php echo CHtml::textField('GENERALES_MAIL_REMITENTE_TAREAS',Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'),array('class'=>'span7','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Remitente de los emails enviados por el sistema .</span>
		
	</div>
<div class="row">
		<b><?php echo 'Envia Mail a Usuarios' ?></b>
		<?php echo  CHtml::dropDownList('TAREAS_ALERTAS_USUARIOS_MAIL',Settings::model()->getValorSistema('TAREAS_ALERTAS_USUARIOS_MAIL'),FacturasEntrantes::model()->getEstadosAlertas());?>
		

		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa el envio de mails al usuario de la tarea.</span>
		
	</div>
<div class="row">
		<b><?php echo 'Envia Mail Mantenimientos' ?></b>
		<?php echo  CHtml::dropDownList('TAREAS_ALERTAS_MANT_MAIL',Settings::model()->getValorSistema('TAREAS_ALERTAS_MANT_MAIL'),FacturasEntrantes::model()->getEstadosAlertas());?>
		

		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa el envio de mails al encargado de la empresa.</span>
		
	</div>
<div class="row">
		<b><?php echo 'Alertas Tareas Activas' ?></b>
		<?php echo  CHtml::dropDownList('TAREAS_ALERTAS_ACTIVAS',Settings::model()->getValorSistema('TAREAS_ALERTAS_ACTIVAS'),FacturasEntrantes::model()->getEstadosAlertas());?>
		

		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa las alertas para las tareas para el módulo de Servicios .</span>
		
	</div>
<h3>Ordenes de Trabajo</h3>
<div class="row">
		<b><?php echo 'Imprimir Comprobantes Cliente(default)' ?></b>
		<?php echo CHtml::textField('ORDENES_CANTIDAD_CLIENTE',Settings::model()->getValorSistema('ORDENES_CANTIDAD_CLIENTE'),array('class'=>'span1','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Cantidad de comprobantes para el cliente que figura cada vez que se crea una orden.</span>
		
	</div>
<div class="row">
		<b><?php echo 'Imprimir Comprobantes Extras(default)' ?></b>
		<?php echo CHtml::textField('ORDENES_CANTIDAD_EXTRAS',Settings::model()->getValorSistema('ORDENES_CANTIDAD_EXTRAS'),array('class'=>'span1','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Cantidad de comprobantes para el cliente que figura cada vez que se crea una orden.</span>
		
	</div>
<div class="row">
		<b><?php echo 'Cantidad de días para finalización (default)' ?></b>
		<?php echo CHtml::textField('SERVICIOS_DIAS_FINALIZA',Settings::model()->getValorSistema('SERVICIOS_DIAS_FINALIZA'),array('class'=>'span2','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Cantidad de días para la finalizacion de las ordenes de trabajo, a partir de ese limite comienza a correr una alerta .</span>
		
	</div>
<div class="row">
		<b><?php echo 'Alertas Ordenes Activas' ?></b>
		<?php echo  CHtml::dropDownList('SERVICIOS_ALERTAS_ACTIVAS',Settings::model()->getValorSistema('SERVICIOS_ALERTAS_ACTIVAS'),FacturasEntrantes::model()->getEstadosAlertas());?>
		
	
		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa las alertas de las ordenes para el módulo de Servicios .</span>
		
	</div>

	<div class="row">
		<b><?php echo 'Envio de MAILS en Ordenes' ?></b>
		<?php echo  CHtml::dropDownList('GENERALES_MAIL_ACTIVORDENES',Settings::model()->getValorSistema('GENERALES_MAIL_ACTIVORDENES'),FacturasEntrantes::model()->getEstadosAlertas());?>
		

		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa el envio para las Ordenes para el módulo de Servicios .</span>
		
	</div>
	<div class="row">
		<b><?php echo 'Mail Remitente' ?></b>
		<?php echo  CHtml::textField('GENERALES_MAIL_REMITENTE_ORDENES',Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_ORDENES'),array('class'=>'span7','maxlength'=>64));?>
		

		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa el envio para las Ordenes para el módulo de Servicios .</span>
		
	</div>
	<div class="row">
		<b><?php echo 'Area Encargada' ?></b>
		<?php echo  CHtml::dropDownList('ORDENES_AREA_ENCARGADA',Settings::model()->getValorSistema('ORDENES_AREA_ENCARGADA'),CHtml::listData(UsuariosAreas::model()->findAll(), 'idUsuarioArea', 'nombreArea'));?>
		

		
		<span class='help-block'><b>NOTA: </b>Selecciona el area que sera notificada en el momento de un evento en ordenes .</span>
		
	</div>
<h3>Impresion Ordenes de Trabajo</h3>
	<div class="row">
		<b><?php echo 'Dirección' ?></b>
		<?php echo CHtml::textField('ORDENESTRABAJO_DIRECCION',Settings::model()->getValorSistema('ORDENESTRABAJO_DIRECCION'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		
		
	</div>
	<div class="row">
		<b><?php echo 'Teléfonos' ?></b>
		<?php echo CHtml::textField('ORDENESTRABAJO_TELEFONO',Settings::model()->getValorSistema('ORDENESTRABAJO_TELEFONO'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
	</div>
	<div class="row">
		<b><?php echo 'Direción de retiro de Mercaderia/servicios' ?></b>
		<?php echo CHtml::textField('ORDENESTRABAJO_DIRECIONRETIRO',Settings::model()->getValorSistema('ORDENESTRABAJO_DIRECIONRETIRO'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		
	</div>

	<div class="row">
		<b><?php echo 'Horarios de Atención' ?></b>
		<?php echo CHtml::textField('ORDENESTRABAJO_HORARIOS',Settings::model()->getValorSistema('ORDENESTRABAJO_HORARIOS'),array('class'=>'span5','maxlength'=>64)); 
		
		?>
	</div>
	<div class="row">
		<b><?php echo 'Site WEB' ?></b>
		<?php echo CHtml::textField('ORDENESTRABAJO_SITE',Settings::model()->getValorSistema('ORDENESTRABAJO_SITE'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
	</div>
	<div class="row">
		<b><?php echo 'Email Administración' ?></b>
		<?php echo CHtml::textField('ORDENESTRABAJO_EMAILADMIN',Settings::model()->getValorSistema('ORDENESTRABAJO_EMAILADMIN'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		
	</div>