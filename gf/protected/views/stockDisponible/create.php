<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
        'id'=>'dlg-address-view-',
        'options'=>array(
            'title'=>'Impresion',
            'autoOpen'=>true,
            'modal'=>true,
            'width'=>700,
//            'height'=>470,
        ),
 ));
?>
<?php
$this->breadcrumbs=array(
	'Stock'=>array('/stock/stokReal'),
	'Nueva disponibilidad',
);

?>

<h1>Nueva Disponibilidad de Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<?php
$this->endWidget();
?>