<h3>GENERAL</h3>
<div class="row">
		<b><?php echo 'Cantidad de Decimales' ?></b>
		<?php echo CHtml::textField('DECIMALES_FACTURAS',Settings::model()->getValorSistema('DECIMALES_FACTURAS'),array('class'=>'span1','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Cantidad de decimales que maneja el sistema para VENTAS (esto deduce al imprementar el IVA) .</span>
		
	</div>
<div class="row">
		<b><?php echo 'Path de CRONS' ?></b>
		<?php echo CHtml::textField('GENERALES_PATH_CRONS',Settings::model()->getValorSistema('GENERALES_PATH_CRONS'),array('class'=>'span8','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Ruta del sistema (se usara para el el direccionamiento en mails etc) .</span>
		
	</div>
<div class="row">
		<b><?php echo 'Ruta de Sistema (afuera)' ?></b>
		<?php echo CHtml::textField('GENERALES_RUTASISTEMA',Settings::model()->getValorSistema('GENERALES_RUTASISTEMA'),array('class'=>'span8','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Ruta del sistema (se usara para el el direccionamiento en mails etc) .</span>
		
	</div>
<div class="row">
		<b><?php echo 'Email Remitente area FINANZAS' ?></b>
		<?php echo CHtml::textField('GENERALES_MAIL_REMITENTE_FINANZAS',Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_FINANZAS'),array('class'=>'span8','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>La respuesta a todos los mensajes desde COBROS, PAGOS, FACTURAS etc .</span>
		
	</div>
<h3>MAILS</h3>
<div class="row">
		<b><?php echo 'Host de Cuenta de MAIL' ?></b>
		<?php echo CHtml::textField('GENERALES_MAIL_HOST',Settings::model()->getValorSistema('GENERALES_MAIL_HOST'),array('class'=>'span8','maxlength'=>64));
		
		 ?>
		
	</div>
<div class="row">
		<b><?php echo 'Nombre de Cuenta' ?></b>
		<?php echo CHtml::textField('GENERALES_MAIL_CUENTA',Settings::model()->getValorSistema('GENERALES_MAIL_CUENTA'),array('class'=>'span8','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Nombre de la cuenta tal cual se escribe al ingresar.</span>
		
	</div>
<div class="row">
		<b><?php echo 'Clave de Cuenta' ?></b>
		<?php echo CHtml::textField('GENERALES_MAIL_CLAVE',Settings::model()->getValorSistema('GENERALES_MAIL_CLAVE'),array('class'=>'span8','maxlength'=>64));
		
		 ?>
	</div>

<div class="row">
		<b><?php echo 'Envio de MAILS (general)' ?></b>
		<?php echo  CHtml::dropDownList('GENERALES_MAIL_ACTIVOGENERAL',Settings::model()->getValorSistema('GENERALES_MAIL_ACTIVOGENERAL'),FacturasEntrantes::model()->getEstadosAlertas());?>
		

		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa el envio de mails .</span>
		
	</div>
	<div class="row">
		<b><?php echo 'Envio de Mensajes SMS' ?></b>
		<?php echo  CHtml::dropDownList('GENERALES_SMS_ACTIVO',Settings::model()->getValorSistema('GENERALES_SMS_ACTIVO'),FacturasEntrantes::model()->getEstadosAlertas());?>
		

		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa el envio de sms .</span>
		
	</div>
	<div class="row">
		<b><?php echo 'Envio de SMS' ?></b>
		<?php echo  CHtml::dropDownList('GENERALES_MENSAJETEXTO_ACTIVO',Settings::model()->getValorSistema('GENERALES_MENSAJETEXTO_ACTIVO'),FacturasEntrantes::model()->getEstadosAlertas());?>
		

		
		<span class='help-block'><b>NOTA: </b>Desactiva o Activa el envio de mensaje de textos.</span>
		
	</div>
	<div class="row">
		<b><?php echo 'Nro Telefono SMS' ?></b>
		<?php echo  CHtml::dropDownList('GENERALES_MENSAJETEXTO_NRO',Settings::model()->getValorSistema('GENERALES_MENSAJETEXTO_NRO'),FacturasEntrantes::model()->getEstadosAlertas());?>
		

		
		<span class='help-block'><b>NOTA: </b>Numero del telefono remitente.</span>
		
	</div>
	
	<div class="row">
		<b><?php echo 'Remitente de los mails en Tareas' ?></b>
		<?php echo CHtml::textField('GENERALES_MAIL_REMITENTE_TAREAS',Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'),array('class'=>'span8','maxlength'=>64));
		
		 ?>
		
		<span class='help-block'><b>NOTA: </b>Direccion de correo desde la cual se enviaran los mails de Tareas.</span>
		
	</div>