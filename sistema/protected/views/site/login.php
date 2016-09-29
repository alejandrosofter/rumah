<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>LOGIN</h1>

<p>Por favor complete los datos para ingresar al sistema:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre de Usuario'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>


<p class="hint">
			NOTA: si no tiene ingreso al sistema contactese con el administrador del sistema.
		</p>
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'Recordar contaseña'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton(); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
