
<?php

$this->widget('ext.eguiders.EGuider', array(
        'id'=> 'apellidg',
        'title'=> "Nombre del Cliente",
        'next'=> 'end',
        'description' => "<b>Personas Fisicas</b> ... es mas que nada para representar el nombre de la persona fisica.",
        'classString' => 'custom',
        'buttons' => array(
            array(
                'name'=>'Exit',
                'onclick'=> "js:function(){guiders.hideAll();}"
            )
            
            ),
        // remember that this CSS is going to overloads the default one,
        // not replace it !!
//        'cssFile'=> Yii::app()->baseUrl. '/css/custom_guiders.css',
        'classString' => 'custom',
    'show'=>true,
    'position'=>12,
    'attachTo' 		=> '#ape',
    )
);
$this->widget('ext.eguiders.EGuider', array(
        'id'=> 'g_razonSocial',
        'title'=> "Razon social",
        'description' => "<b>Empresas</b> ... es la razon social declarada en AFIP de este cliente (en caso de no tener dejarlo en blanco).",
        'classString' => 'custom',
        'buttons' => array(
            array(
                'name'=>'Exit',
                'onclick'=> "js:function(){guiders.hideAll();}"
            )
            ),
        'classString' => 'custom',
    'show'=>false,
    'position'=>12,
    'attachTo' 		=> '#razon',
    )
);
$this->widget('ext.eguiders.EGuider', array(
        'id'=> 'g_cuit',
        'title'=> "Cuit",
        'description' => "<b>Empresas</b> ... en caso de ser un apersona fisica dejarlo en blanco o bien anteponer el 0 (cero) en caso de ser el documento.",
        'classString' => 'custom',
        'buttons' => array(
            array(
                'name'=>'Exit',
                'onclick'=> "js:function(){guiders.hideAll();}"
            )
            
            ),
        // remember that this CSS is going to overloads the default one,
        // not replace it !!
//        'cssFile'=> Yii::app()->baseUrl. '/css/custom_guiders.css',
        'classString' => 'custom',
    'show'=>false,
    'position'=>12,
    'attachTo' 		=> '#cuit',
    )
);
$this->widget('ext.eguiders.EGuider', array(
        'id'=> 'g_telefono',
        'title'=> "Telefono",
        'description' => "<b>Atencion</b> ... este campo es importante ya que en caso de tener conectado un celular al sever se pueden enviar SMS al cliente en determinados eventos.",
        'classString' => 'custom',
        'buttons' => array(
            array(
                'name'=>'Exit',
                'onclick'=> "js:function(){guiders.hideAll();}"
            )
            
            ),
        // remember that this CSS is going to overloads the default one,
        // not replace it !!
//        'cssFile'=> Yii::app()->baseUrl. '/css/custom_guiders.css',
        'classString' => 'custom',
    'show'=>false,
    'position'=>12,
    'attachTo' 		=> '#telefono',
    )
);
$this->widget('ext.eguiders.EGuider', array(
        'id'=> 'g_email',
        'title'=> "Mail",
        'description' => "<b>Importante</b> ... es importante completar este campo ya que si bien no es requerido, forma parte del envio automatico en determinados eventos.",
        'classString' => 'custom',
        'buttons' => array(
            array(
                'name'=>'Exit',
                'onclick'=> "js:function(){guiders.hideAll();}"
            )
            
            ),
        // remember that this CSS is going to overloads the default one,
        // not replace it !!
//        'cssFile'=> Yii::app()->baseUrl. '/css/custom_guiders.css',
        'classString' => 'custom',
    'show'=>false,
    'position'=>12,
    'attachTo' 		=> '#email',
    )
);
?>
	<div id="ape" >
		<?php echo $form->labelEx($model,'apellido'); ?>

		<?php 
		echo $form->textField($model,'apellido',
		array('size'=>40,'maxlength'=>40,
                     'onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('apellidg')",
			  'style'=>"text-transform: uppercase;",
                   
		'onBlur'=>'this.value = this.value.toUpperCase(); ')); ?>
		
	</div >
	<div id="razon" class="row">
		<?php echo $form->labelEx($model,'razonSocial'); ?>
		<?php echo $form->textField($model,'razonSocial',
		array('size'=>40,'maxlength'=>40,
		'style'=>"text-transform: uppercase;",
                 'onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_razonSocial')",
		'onBlur'=>'this.value = this.value.toUpperCase(); ')); ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nombreFantasia'); ?>
		<?php echo $form->textField($model,'nombreFantasia',array('size'=>40,'maxlength'=>140)); ?>
		
	</div>
	<div class="row">

	<div id="cuit" class="row">
		<?php echo $form->labelEx($model,'cuit'); ?>
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'cuit',
        'mask'=>'99 - 99999999 - 9',
		'htmlOptions' => array('size' => 15,'onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_cuit')")
      ));?>
	
	</div>

	
		<div class="row">
		<?php echo $form->labelEx($model,'LetraHabitual'); ?>
		<?php echo  $form->dropDownList($model,'letraHabitual',$model->getCondicionesFactura(),array ('prompt'=>'Seleccione...'));?>
	
	</div>

	</div>

<div class="row" >
		<?php echo $form->labelEx($model,'condicionIva'); ?>
		<br>
		
		
		<?php echo  $form->dropDownList($model,'condicionIva',FacturasEntrantes::model()->getCondicionIva(),array ('prompt'=>'Seleccione...'));?>
	
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'localidad'); ?>
		<?php echo $form->textField($model,'localidad',array('size'=>30,'maxlength'=>60)); ?>
	
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->textField($model,'nro',array('class'=>'span2','maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jurisdiccion'); ?>
	<?php echo  $form->dropDownList($model,'idJuridiccion',CHtml::listData(Juridicciones::model()->findAll(), 'idJuridiccion', 'nombreJuridiccion'),array ('prompt'=>'Seleccione...'));?>

	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>30,'maxlength'=>30)); ?>

	</div>

	<div id="telefono" class="row">
		<?php echo $form->labelEx($model,'celular'); ?>
            <?php echo CHtml::image('images/iconos/famfam/phone.png'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>30,'maxlength'=>130,
                    'onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_telefono')",)); ?>
	
	</div>
	<div id="email" class="row">
		<?php echo $form->labelEx($model,'email'); ?>
            <?php echo CHtml::image('images/iconos/famfam/email.png'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>130,
                    'onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_email')",)); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codCliente'); ?>
		<?php echo $form->textField($model,'codCliente',array('size'=>30,'maxlength'=>30)); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'limiteCredito'); ?>
		<?php echo $form->textField($model,'limiteCredito',array('size'=>30,'maxlength'=>30)); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fechaAlta'); ?>
	
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaAlta'))?>

	</div>