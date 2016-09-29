<?php echo CHtml::link(CHtml::image('images/iconos/famfam/arrow_refresh.png'),'#',array('onclick'=>'javascript:getCodigo()'))?>
<?php echo $form->textField($model,$campo,array('class'=>isset($class)?$class:'')); ?>
<?php $cad= str_pad ($pais.$empresa.$codigoProducto, 12, "15", STR_PAD_LEFT); ?>
<script>
function getCodigo() {
    var checksum = 0;
	var message='<?php echo $cad ?>';
    message = message.split('').reverse();
    
    for(var pos in message){
        checksum += message[pos] * (3 - 2 * (pos % 2));
    }
    var codigoComprobacion= ((10 - (checksum % 10 )) % 10);

    var codigoProducto = <?php echo $cad ?>;
    var codigo =codigoProducto.toString()+codigoComprobacion.toString();
    document.getElementById('<?php echo $campoLlegada ?>').value=codigo;
   // alert(codigo);
}

</script>
