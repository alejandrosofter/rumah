<?php echo $item->fechaIngreso;  ?> 
:<?php echo $item->descripcionCliente;  ?><?php echo CHtml::link(CHtml::image('images/iconos/famfam/delete.png','Quitar'),Yii::app()->createUrl("stock/consultarCarro",array("idOrdenTrabajo"=>$item->idOrdenTrabajo,"accion"=>"quitarOrden")));   ?> <br>

