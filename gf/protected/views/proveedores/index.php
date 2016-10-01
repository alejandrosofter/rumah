<?php
$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
	array('label'=>'Nuevo Proveedor', 'url'=>array('create')),
	
);
?>

<h1>PROVEEDORES</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$model->search(),
    'filter'=>$model,
   
    'ajaxUpdate'=>false,
//    'pager'=>array('cssFile'=>false, 'class'=>'CLinkPager'),
    //'loadingCssClass'=>'loading-class',
    //'itemsCssClass'=>'item-class',
	//'htmlOptions'=>array('class'=>'zebra-striped'),
    'columns'=>array(
        'nombre',          
        'direccion',
        'telefono',
        'email',
'cuit',
        array(            
            'class'=>'CButtonColumn',
        ),
    ),
));
?>
