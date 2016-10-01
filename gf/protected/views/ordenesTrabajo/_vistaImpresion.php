<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
        'id'=>'dlg-address-view-'. $model->idOrdenTrabajo,
        'options'=>array(
            'title'=>'Impresion de Orden nro '. $model->idOrdenTrabajo,
            'autoOpen'=>true,
            'modal'=>true,
            'width'=>390,
//            'height'=>470,
        ),
 ));
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
    'action'=>Yii::app()->createUrl('ordenesTrabajo/imprimir&idOrdenTrabajo='.$model->idOrdenTrabajo),
	'method'=>'post',
)); 



?>
<div class="form">
    
    
<?php echo $this->renderPartial('/rutinasImpresiones/_impresionesRutinas',array('esNuevo'=>true,'idRutina'=>$model->idRutina),true); ?>
    <div class="actions">
		<?php echo CHtml::submitButton('Imprimir',array('class'=>'btn primary')); ?>
	</div>
</div>


<?php
$this->endWidget();
$this->endWidget();
?>
