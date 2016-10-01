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
    'action'=>Yii::app()->createUrl('/stock/imprimirCodigo&id='.$id),
	'method'=>'post',
)); 



?>
<div class="form">
    Ingrese la cantidad:
    <?php echo CHtml::textField('cantidad',1); ?>

		<?php echo CHtml::submitButton('Imprimir',array('class'=>'btn primary')); ?>
       <br> Imprime a la impresora por defecto (en mis variables) <br>
		

</div>


<?php
$this->endWidget();
$this->endWidget();
?>
