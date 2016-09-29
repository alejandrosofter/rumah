<?php
$this->breadcrumbs=array(
	'Presupuestos'=>array('/presupuestos'),
	'Presupuesto Items',
);

$this->menu=array(
	
        array('label'=>'Modificar Datos de Presupuesto', 'url'=>array('/presupuestos/update&id='.$idPresupuesto)),
        array('label'=>'Volver', 'url'=>array('/presupuestos')),
);
$pres=Presupuestos::model()->findByPk($_GET['idPresupuesto']);
$cliente=Clientes::model()->findByPk($pres->idClientePresupuesto);
$this->extra="<br>".CHtml::linkButton('Finalizar Presupuesto', array('class'=>'btn success','submit' => '', 'params' => array('finalizar'=> true) ));
$this->extra.="<br><br>".$this->renderPartial('/clientes/_envioInformacion',array('cliente'=>$cliente),true);
$this->rutaFormulario='/presupuestoItems/index&idPresupuesto='.$idPresupuesto;
        ?>

<h1>Items del Presupuesto</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'presupuesto-items-grid',
	'dataProvider'=>$model->search($idPresupuesto),
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'columns'=>array(
		'cantidadItems',
		'nombreStock',
		array(
      'class'=>'ext.gridcolumns.CalcColumn',
      'name'=>'porcentajeIva',
            'value'=>'($data->precioVenta*$data->cantidadItems*(($data->porcentajeIva/100)+1))-($data->precioVenta*$data->cantidadItems)',
            'header'=>'IVA',
            'tituloFooter'=>'$ IVA',
      'output'=>'"<b> ".$data->porcentajeIva." %</b>"',
      'type'=>'html',
      'footer'=>true,
           'footerOutput'=>'"<br>".Yii::app()->numberFormatter->formatCurrency($value,"$")'
     ),
            array(
     
            'value'=>'Yii::app()->numberFormatter->formatCurrency(round($data->precioVenta*($data->porcentajeIva!=0?(($data->porcentajeIva/100)+1):1),1),"$")',
            'header'=>'$ UNITARIO',
           
      'type'=>'html',
     ),
            array(
      'class'=>'ext.gridcolumns.CalcColumn',
      'name'=>'precioVenta',
            'value'=>'$data->precioVenta*$data->cantidadItems',
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
            'value'=>'round($data->precioVenta*($data->porcentajeIva!=0?(($data->porcentajeIva/100)+1):1),1)*$data->cantidadItems',
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

<?php $this->renderPartial('/varios/busquedaPorCodigo2', array('model'=>$model,'form'=>null),false);
 
echo CHtml::link('Archivos Cargados ('.$archivos.')',
                    Yii::app()->createUrl("imagenes/index",array("idTipo"=>$_GET['idPresupuesto'],'tipo'=>'presupuestos')));

?>