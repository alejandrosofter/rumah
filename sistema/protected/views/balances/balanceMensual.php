<?php
$this->breadcrumbs=array(
	'Balace Mensual'
);

?>

<h1>BALANCE MENSUAL</h1>
A continuación tiene un vistazo general del funcionamiento economico, contable, financiero, administrativo de la empresa. Por favor seleccione un mes y uño para vizualizar:
<br><br>
<?php $form=$this->beginWidget('CActiveForm', array(
	'enableAjaxValidation'=>false,'id'=>'Balances-form'
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar...</p>
	<div class="row">
		<?php echo $form->labelEx($model,'fechaInicio'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaInicio'))?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fechaFin'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaFin'))?>
	</div>
	<div class="actions">
<?php echo CHtml::submitButton('Reporte',array('class'=>'btn primary')); ?>
</div>
</div>
<?php $this->endWidget(); ?>
<b>BALANCE PAGOS/GASTOS</b>
Vea como fue el flujo de efectivo a lo largo del mes pudiendo chequear la VARIANZA de ambos (osea PAGOS menos los GASTOS):<br><br>
<b>IMPORTE PAGOS:</b> $ <?php echo number_format($importePagos,2,'.',',') ?> <BR>
<b>IMPORTE GASTOS:</b> $ <?php echo number_format($importeGastos,2,'.',',') ?><br>
<b>DIFERENCIA :</b> $ <?php echo number_format($importePagos-$importeGastos,2,'.',',') ?><br><br>
<?PHP
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
   
      'title' => array('text' => ''),
      'xAxis' => array(
         'categories' => $diasMes,
         'title' => array('text' => 'Día'),
         
         
        
      ),
      'yAxis' => array(
         'title' => array('text' => 'Importe'),
         'type'=> 'float',
       
         
      ),
      'series' => array(
         array('name' => 'Pagos', 'type'=> 'area', 'data' => $pagos),
         array('name' => 'Gastos','type'=> 'area', 'data' => $gastos),
          array('name' => 'Varianza','type'=>'spline', 'data' => $varianza),
          //array('showInLegend'=>'false','name' => 'Total','center'=>array(100, 80),'size'=>100,'type'=>'pie', 'data' => array(array('name'=>'Pagos','y'=>150),array('name'=>'Gastos','y'=>80))),
      )
   )
));
?>
