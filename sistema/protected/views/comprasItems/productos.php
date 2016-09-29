<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Compras'=>array('/compras'),
	'Listado de Productos',
);


$this->menu=array(
	array('label'=>'Listado Productos'),
	array('label'=>'Nuevo Producto', 'url'=>array('create&idCompra='.$idCompra)),
);
?>

<h1>Productos de Compra</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compras-items-grid',
	'dataProvider'=>$model,

	'columns'=>array(

		'nombreStock',
		'cantidad',
		'alicuotaIva',
		'importeCompra',
		array(
                  'name'=>'stockeado',
                    'type'=>'html',
                    'value'=>'($data->stockeado==1)?"si":"no"',
                ),
		array(
			'class'=>'CButtonColumn','template' => ' {stockear} {destockear} {view} {update} {delete}',
			'buttons' => array(
			 'destockear' => array(
                    			'label'=> 'Quitar de Stock',
                    			'url'=>'Yii::app()->createUrl("comprasItems/quitarStock",array("idCompraItem"=>$data->idCompraItem, "idCompra"=>$data->idCompra))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/lorry_delete.png',
                    
                            ),
                            'stockear' => array(
                    			'label'=>'Agregar a Stock',
                    			'url'=>'Yii::app()->createUrl("comprasItems/agregarStock",array("idCompraItem"=>$data->idCompraItem, "idCompra"=>$data->idCompra))'  ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/lorry_add.png',
                    
                            ),
                            ),
		),
	),
)); ?>
