<?php
$this->breadcrumbs=array(
	'Cheques',
);

$this->menu=array(
	array('label'=>'Nuevo Cheque', 'url'=>array('create')),
);
?>

<h1>Cheques</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cheques-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
 array(
                        'header'=>'Cliente',
                        'name'=>'cliente',
                        'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
                        'value'=>'$data->cliente',
                		'type'=>'raw',
                ),
		'fechaEmision',
		'fechaCobro',
		'paguese',
		 array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
          
		/*
		'esCruzado',
		'idCuenta',
		'numeroCheque',
		*/
		array(
                  'name'=>'ultimoEstado',
                  'header'=>'Estados',
                    'type'=>'html',
                    'value'=>'CHtml::link(isset($data->ultimoEstado)?$data->ultimoEstado:"Estados",Yii::app()->createUrl("chequesEstados",array("idCheque"=>$data->idCheque)))',
                ),
              array(
                  'name'=>'diasCobro',
                    'type'=>'html',
                    'value'=>'($data->diasCobro<0)?"Debitado?":(($data->diasCobro==0)?"Hoy":(($data->diasCobro==1)?"Mañana":$data->diasCobro))',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>