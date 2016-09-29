<?php echo "<b>".CHtml::link($data->nombre,
                    $data->direccion)."</b> ";
                   
                    ?>  <?php $this->widget('zii.widgets.CListView', array(
	'id'=>'compras-items-gridfd',
	'dataProvider'=>Acciones::model()->consultarHijos($data->idAccion),
'enablePagination'=>false,
'emptyText'=>'',
 'template'=>'{items}',
	'itemView'=>'/acciones/_accion2',
)); ?> 
<span class='help-block'><?php echo $data->descripcion;?> </span>
    <br>   
                