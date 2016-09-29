<?php
$this->breadcrumbs=array(
	'Tareas'=>array(''),
);

?>

<h1>Tarea Periodica</h1>
A traves de esta interfaz ud. podra crear una tarea que se crea (ejecuta) cada cierto tiempo:
<br><br>
<div class='form'>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
)); $this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
));
        ?>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
     'tabs'=>array(
     'Tarea'=>$this->renderPartial('/tareas/_form',array('model'=>$modeloTarea),true),
     'Horarios'=>$this->renderPartial('/crons/_form',array('model'=>$modeloCron),true),

    'Usuarios'=>$this->renderPartial('/tareas/_formUsuariosCron',array('model'=>$modeloTarea),true)),
));


?>
	
	
	
	
	<div class="actions">
		<?php echo CHtml::submitButton('Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>