<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Stocks',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('/ordenesTrabajo/porEstado&estado=Sin Asignar')),
);
?>

<h1>Ordenes Trabajo Stocks</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-items-grid',
	'dataProvider'=>$model->search($_GET['id']),
	'columns'=>array(
		'cantidad',
		'nombreStock',
		array(
      'class'=>'ext.gridcolumns.CalcColumn',
      'name'=>'porcentajeIva',
            'value'=>'($data->importe*$data->cantidad*(($data->porcentajeIva/100)+1))-($data->importe*$data->cantidad)',
            'header'=>'IVA',
            'tituloFooter'=>'$ IVA',
      'output'=>'"<b> ".$data->porcentajeIva." %</b>"',
      'type'=>'html',
      'footer'=>true,
           'footerOutput'=>'"<br>".Yii::app()->numberFormatter->formatCurrency($value,"$")'
     ),
            array(
     
            'value'=>'Yii::app()->numberFormatter->formatCurrency(round($data->importe*($data->porcentajeIva!=0?(($data->porcentajeIva/100)+1):1),1),"$")',
            'header'=>'$ UNITARIO',
           
      'type'=>'html',
     ),
            array(
      'class'=>'ext.gridcolumns.CalcColumn',
      'name'=>'importe',
            'value'=>'$data->importe*$data->cantidad',
            'header'=>'$ NETO',
            'tituloFooter'=>'SUB-TOTAL',
      'output'=>'"".Yii::app()->numberFormatter->formatCurrency($value,"$").""',
      'type'=>'html',
      'footer'=>true,
           'footerOutput'=>'"<br>".Yii::app()->numberFormatter->formatCurrency($value,"$")'
     ),
        array(
      'class'=>'ext.gridcolumns.CalcColumn',
      'name'=>'precioVenta',
            'value'=>'round($data->importe*($data->porcentajeIva!=0?(($data->porcentajeIva/100)+1):1),1)*$data->cantidad',
            'header'=>'$ FINAL',
            'tituloFooter'=>'TOTAL',
      'output'=>'Yii::app()->numberFormatter->formatCurrency($value,"$")',
      'type'=>'html',
      'footer'=>true,
            'footerOutput'=>'"<br>"."<b><big>".Yii::app()->numberFormatter->formatCurrency($value,"$")."</b></big>"'
     ),
		
        

		array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',
			'buttons' => array(
			 
                           'update' => array(
                               
                    			'label'=>'Actualizar',     
//                    			'url'=>'Yii::app()->createUrl("/presupuestoItems/update",array("id"=>$data->idItemPresupuesto))'   ,    // the PHP expression for generating the URL of the button
//                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(  
    'ajax'=>array(
            'type'=>'POST',
                // ajax post will use 'url' specified above 
            'url'=>"js:$(this).attr('href')", 
            'update'=>'#id_view',
           ),
     ),
     ),
                            ),
		),
	),
)); ?>
<div id="id_view"></div>

<?php $this->renderPartial('/varios/busquedaPorCodigo2', array('model'=>$model,'form'=>null,'ruta'=>'ordenesTrabajoStock/index&id='.$_GET['id']),false);
