<?php
            $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'service-grid',
            'dataProvider'=>FacturasEntrantesVencimientos::model()->consultarPendientes($idProveedor),
 'selectionChanged'=>'setVars',
 'template'=>'{items}',
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
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
                   
                    
            ),
        ));
            ?>
<?php echo $form->textField($model,'selecciones',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<input type="hidden" name="paraCargar" >
            <script type="text/javascript">
            function setVars(target_id) {
            	
            idsel=	$.fn.yiiGridView.getChecked('service-grid','chk');
             $('#OrdenesPago_selecciones').val(idsel);
             //alert('seleccion: '+idsel);
        }

</script>