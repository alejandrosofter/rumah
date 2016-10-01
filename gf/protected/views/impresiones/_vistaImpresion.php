<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
        'id'=>'dlg-address-view-'.$id,
        'options'=>array(
            'title'=>'Impresion',
            'autoOpen'=>true,
            'modal'=>true,
            'width'=>310,
//            'height'=>470,
        ),
 ));
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
    'action'=>Yii::app()->createUrl('/impresiones/imprimirAlgo&idTipo='.$id.'&tipo='.$tipo),
	'method'=>'post',
)); 



?>
<div class="form">
    
    
  
		<?php echo CHtml::submitButton('Imprimir',array('class'=>'btn primary')); ?>
       <br> Imprime a la impresora por defecto (en mis variables) <br>
		<?php echo CHtml::submitButton('Editar',array('class'=>'btn primary')); ?>
       <br> Vea la impresion <br>

</div>


<?php
$this->endWidget();
$this->endWidget();
?>
