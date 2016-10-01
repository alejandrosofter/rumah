<?php
$this->breadcrumbs=array(
	'Componentes',
);

$this->menu=array(
	array('label'=>'Listar Componentes', 'url'=>array('index')),
);
?>

<h1>Componentes</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'componentes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idComponente',
		'idStock',
		array(
			'class'=>'CButtonColumn','template' => ' {productos} {view} {update} {delete}',
			'buttons' => array(
                            'productos' => array(
                    			'label'=>'Agregar Productos',
                    			'url'=>'Yii::app()->createUrl("ComponentesItems/create",array("idComponente"=>$data->idComponente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/add.png',
                    
                            ),
                            
                            ),
		),
	),
)); ?>
