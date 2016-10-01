<?php echo CHtml::link(CHtml::image('images/iconos/famfam/clock_add.png','Terminar',array('onclick'=>'$("#mydialog").dialog("open"); return false;')).' Nueva Alerta',
                    '#'); ?>
 - 
 <?php echo CHtml::link(CHtml::image('images/iconos/famfam/page_white_edit.png','Terminar').' Nueva Tarea',
                    'index.php?r=tareas/create'); ?>
-

<?php echo CHtml::link(CHtml::image('images/iconos/famfam/wrench.png','Terminar').' Nueva Orden',
                    'index.php?r=ordenesTrabajo/create'); ?>
                    -
                    <?php echo CHtml::link(CHtml::image('images/iconos/famfam/script.png','Terminar').' Facturar',
                    'index.php?r=facturasSalientes/crearFactura'); ?>
                    -
                    <?php echo CHtml::link(CHtml::image('images/iconos/famfam/money_add.png','Terminar').' Cobrar',
                    'index.php?r=ordenesCobro/crearCobro'); ?>