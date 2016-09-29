<h1>Nueva Nota de Credito</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
'focus'=>$focus,
'id'=>'formCrearFactura'
	   
));?>
 <?php echo $form->errorSummary($model); ?>
<div class="row" >
   
<?PHP

$this->renderPartial('/facturasSalientes/_formFacturaCredito', array('model'=>$model,'form'=>$form,'imprime'=>$imprime),false);
?>
<?php if($textoOrden!=''){
	echo '<b>Ordenes de Trabajo</b>' ;
	 $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
    "model"=>$model, 
    "attribute"=>'descripcion', 
    "value"=>$textoOrden,
    "height"=>'100%',
    "width"=>'100%',
    "toolbarSet"=>'Basic',          # EXISTING(!) Toolbar (see: fckeditor.js)
    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
    
                                    # http://docs.fckeditor.net/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options
                                    # Additional Parameter (Can't configure a Toolbar dynamicly)
    ) ); 
	//echo CHtml::textArea('ordenesFacturadas',$textoOrden,array('class'=>'span6','rows'=>6)); 
	echo "<span class='help-block'><b>NOTA: </b>Ordenes procesadas para la factura.</span>";
	}
		?>
<?php

$this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
)); 
?>

<?php

$this->renderPartial('itemsFactura', array('bonificacion'=>0,'interes'=>0,'model'=>$model,'manager'=>$manager,'form'=>$form,'condicionVenta'=>$condicionVenta,'formaPago'=>$formaPago),false);


?>
</div>
<?php 
$this->rutaFormulario="facturasSalientes/facturaCredito";
$this->formularioContenido=true;
$this->extra.= "<br><br>".CHtml::link(
        'FINALIZAR NOTA CREDITO', 
        '#', 
        array(
            'onclick'=>'enviar()',
            'class'=>'btn primary'
            ));

echo "<script>
    function enviar(){
var input = document.createElement('input'); // Crea un elemento input

with(input) {

setAttribute('name', 'noValidate'); 

setAttribute('type', 'hidden'); 

setAttribute('value', 'false'); 
}
document.forms['formCrearFactura'].appendChild(input);
document.forms['formCrearFactura'].submit();
}
</script>";
?>
		



 <?php $this->endWidget(); ?>
     