<?php
            $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'service-grid',
            'dataProvider'=>FacturasSalientesVencimiento::model()->consultarPendientes($idCliente),
 'selectionChanged'=>'setVars',

            'columns'=>array(
             array( 'class'=>'CCheckBoxColumn',
                                //'value'=>'$data->id_service',
                                //'selectableRows'=>10,
                                 'id'=>'chk',
                                'selectableRows'=>1000,
                  ),
                    'factura',
                    array(
                  'name'=>'fechaVencimiento',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fechaVencimiento);',
                ),
                   array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeF,"$")',
                ),
                   
                    
            ),
        ));
            ?>
<?php echo $form->textField($model,'selecciones',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<input type="hidden" name="paraCargar" >
            <script type="text/javascript">
            function setVars(target_id) {
            	
            idsel=	$.fn.yiiGridView.getChecked('service-grid','chk');
             $('#OrdenesCobro_selecciones').val(idsel);
             //alert('seleccion: '+idsel);
        }

</script>