<h3>Datos de la Empresa</h3>
	<div class="row">
		<b><?php echo 'Razón Social de la Empresa' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_RAZONSOCIAL',Settings::model()->getValorSistema('DATOS_EMPRESA_RAZONSOCIAL'),array('class'=>'span5','maxlength'=>64)); 
		
		?>
		
		<span class='help-block'><b>NOTA: </b>Nombre que se usa para el aspecto financiero e impositivo.</span>
		
	</div>
<div class="row">
		<b><?php echo 'Inicio de Actividad' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_INICIOACTIVIDAD',Settings::model()->getValorSistema('DATOS_EMPRESA_INICIOACTIVIDAD'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		
		
	</div>

<div class="row">
		<b><?php echo 'Ingresos Brutos' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_INGBRUTOS',Settings::model()->getValorSistema('DATOS_EMPRESA_INGBRUTOS'),array('class'=>'span5','maxlength'=>64)); 
		
		?>
		
		
	</div>
	<div class="row">
		<b><?php echo 'Nombre de Fantasia de la Empresa ' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_FANTASIA',Settings::model()->getValorSistema('DATOS_EMPRESA_FANTASIA'),array('class'=>'span5','maxlength'=>64)); 
		
		?>
		
		<span class='help-block'><b>NOTA: </b>Nombre usado para el informal de las impresiones.</span>
		
	</div>
	<div class="row">
		<b><?php echo 'CUIT de la Empresa' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_CUIT',Settings::model()->getValorSistema('DATOS_EMPRESA_CUIT'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		<span class='help-block'><b>NOTA: </b>NO COLOCAR GUIONES ni espacios!.</span>
		
	</div>
<div class="row">
		<b><?php echo 'CONDICION IVA' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_CONDICIONIVA',Settings::model()->getValorSistema('DATOS_EMPRESA_CONDICIONIVA'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		
	</div>
	<div class="row">
		<b><?php echo 'Dirección' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_DIRECCION',Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECCION'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		
		
	</div>
	<div class="row">
		<b><?php echo 'Teléfonos' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_TELEFONO',Settings::model()->getValorSistema('DATOS_EMPRESA_TELEFONO'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
	</div>
	<div class="row">
		<b><?php echo 'Direción de retiro de Mercaderia/servicios' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_DIRECIONRETIRO',Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECIONRETIRO'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		
	</div>

	<div class="row">
		<b><?php echo 'Horarios de Atención' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_HORARIOS',Settings::model()->getValorSistema('DATOS_EMPRESA_HORARIOS'),array('class'=>'span5','maxlength'=>64)); 
		
		?>
	</div>
	<div class="row">
		<b><?php echo 'Site WEB' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_SITE',Settings::model()->getValorSistema('DATOS_EMPRESA_SITE'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
	</div>
	<div class="row">
		<b><?php echo 'Email Administración' ?></b>
		<?php echo CHtml::textField('DATOS_EMPRESA_EMAILADMIN',Settings::model()->getValorSistema('DATOS_EMPRESA_EMAILADMIN'),array('class'=>'span3','maxlength'=>64)); 
		
		?>
		
	</div>
<div class="row">
		<b><?php echo 'Reseña de la empresa' ?></b>
		<?php echo CHtml::textArea('DATOS_EMPRESA_RESENAEMPRESA',Settings::model()->getValorSistema('DATOS_EMPRESA_RESENAEMPRESA'),array('class'=>'span6','rows'=>'4','maxlength'=>64)); 
		
		?>
		
		
	</div>