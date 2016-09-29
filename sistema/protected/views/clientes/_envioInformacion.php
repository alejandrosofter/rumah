<?php
if($cliente->celular!='')
    {
        echo CHtml::image('images/iconos/famfam/phone.png').'  <b>'.CHtml::link($cliente->nombre.'  '.$cliente->apellido.'  '.$cliente->razonSocial,'index.php?r=clientes/update&id='.$cliente->idCliente).'</b>  '. $cliente->celular. ' '.CHtml::checkBox('enviaMensajeCelular','0').' ';
        echo '<br>';
        
    }

    if($cliente->mobilContactoMantenimiento!='')
    {
        echo CHtml::image('images/iconos/famfam/phone.png').'  '.CHtml::link($cliente->nombresContactoMantenimiento,'index.php?r=clientes/update&id='.$cliente->idCliente).'  '. $cliente->mobilContactoMantenimiento. CHtml::checkBox('enviaMensajeMantCelular','0').' ';
        echo '<br>';
        
    }
    if(strpos($cliente->emailContactoMantenimiento,'@')!=false)
    {
        echo CHtml::image('images/iconos/famfam/email.png').'  '.CHtml::link($cliente->nombresContactoMantenimiento,'index.php?r=clientes/update&id='.$cliente->idCliente).'  '. $cliente->emailContactoMantenimiento. CHtml::checkBox('emailMantCelular','0').' ';
        echo '<br>';
        
    }
     if(strpos($cliente->email, '@')!=false)
    {
        echo CHtml::image('images/iconos/famfam/email.png').'  <b>'.CHtml::link($cliente->nombre.'  '.$cliente->apellido.'  '.$cliente->razonSocial,'index.php?r=clientes/update&id='.$cliente->idCliente).'</b>'. $cliente->email. CHtml::checkBox('email','0').' ';
        echo '<br>';
        
    }
?>
