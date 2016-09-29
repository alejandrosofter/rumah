<?php
$this->breadcrumbs = array(
   $this->module->id,
);
?>

<!-- Event dialog -->
<?php
$calendarOptions = Yii::app()->controller->module->calendarOptions;


$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dlg_EventCal',
    'options' => array(
        'title' => Yii::t('CalModule.fullCal', 'Detalles de evento'),
        'modal' => true,
        'autoOpen' => false,
        'hide' => 'slide',
        'show' => 'slide',
        'buttons' => array(
            array(
                'text' => Yii::t('CalModule.fullCal', 'Aceptar'),
                'click' => "js:function() { eventDialogOK(); }"
            ),
            array(
                'text' => Yii::t('CalModule.fullCal', 'Cancelar'),
                'click' => 'js:function() { $(this).dialog("close"); }',
            ),
    ))));
?>

<div class="form">
    <?php echo CHtml::beginForm(); ?>
    <div class="row">
        <?php
        $mensaje='';
        echo CHtml::hiddenField("EventCal_id", 0);
        echo CHtml::label(Yii::t('CalModule.fullCal', 'Mensaje'), "EventCal_title");
        echo CHtml::textArea("EventCal_title",$mensaje,array('rows'=>6, 'cols'=>25));
//          echo CHtml::textArea("EventCal_title", array('rows'=>6, 'cols'=>50));
//fc-event fc-event-vert fc-corner-top fc-corner-bottom  ui-draggable ui-resizable
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('CalModule.fullCal', 'Comienzo'), "EventCal_start");
        echo CHtml::dropDownList("EventCal_start", 0, array());
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('CalModule.fullCal', 'Fin'), "EventCal_end");
        echo CHtml::dropDownList("EventCal_end", 0, array());
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('CalModule.fullCal', 'Todo el dia'), "EventCal_allDay");
        echo CHtml::checkBox("EventCal_allDay", true);
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('CalModule.fullCal', 'Editable'), "EventCal_editable");
        echo CHtml::checkBox("EventCal_editable", true);
        ?>
    </div>

    <?php echo CHtml::endForm(); ?>
    </div>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
        <!-- end Event dialog -->

        <!-- change user form  -->
    <div id='changeUser' style='display:none;'>
      <br>
         <?php $this->widget('ChangeUser', array('userId' => $userId)); ?>
      <br>
    </div>
    <!-- end form -->

    <!-- User preference dialog -->
<?php
if($calendarOptions['cronPeriod'])
{
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'dlg_Userpreference',
            'options' => array(
                'title' => Yii::t('CalModule.fullCal', Yii::t('CalModule.fullCal', 'Preferencias')),
                //'modal' => false,
                'autoOpen' => false,
                'buttons' => array(
                    array(
                        'text' => Yii::t('CalModule.fullCal', 'Aceptar'),
                        'click' => 'js:function() { userpreferenceOK(); }'
                    ),
                    array(
                        'text' => Yii::t('CalModule.fullCal', 'Cancelar'),
                        'click' => 'js:function() { $(this).dialog("close"); }'
                    ),)
                )));
        $this->widget('UserPreference', array('userId' => $userId));
        $this->endWidget('zii.widgets.jui.CJuiDialog');
} ?>
        <!-- end user preference dialog -->

        <div id='loading' style='display:none'>loading...</div>

        <div id="EventCal"></div>
<?php $this->widget('CalWidget'); ?>
