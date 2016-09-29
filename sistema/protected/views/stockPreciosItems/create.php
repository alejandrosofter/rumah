<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
        'id'=>'dlg-address-view-'.$id,
        'options'=>array(
            'title'=>'Impresion',
            'autoOpen'=>true,
            'modal'=>true,
            'width'=>700,
//            'height'=>470,
        ),
 ));
?>

<h1>Asignar precio al Producto/Servicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
$this->endWidget();
?>