<?php $this->breadcrumbs[] = Yii::t('Panel de Control', 'Panel de Control'); ?>

<?php echo $contentBefore; ?>

<?php if ( $showHeader ) { ?>
    <div id="dash-header">
        <span id="dash-controls">
            <a href="#" id="all_open" title="<?php echo Yii::t('Dashboard', 'Abrir')?>">
                <?php echo CHtml::image("$url/down.gif");?>
            </a>
            <a href="#" id="all_close" title="<?php echo Yii::t('Dashboard', 'Ocultar')?>">
                <?php echo CHtml::image("$url/up.gif");?>
            </a>
        </span>
        <a href="#" id="all_expand" title="<?php echo Yii::t('Dashboard', 'Expandir Todos')?>">
            <?php echo CHtml::image("$url/down.png");?>
        </a>
        <a href="#" id="all_collapse" title="<?php echo Yii::t('Dashboard', 'Ocultar Todos')?>">
            <?php echo CHtml::image("$url/up.png");?>
        </a>
        <a href="#" id="all_invert" title="<?php echo Yii::t('Dashboard', 'Invertir estados')?>">
            <?php echo CHtml::image("$url/invert.gif");?>
        </a>
        &nbsp;
        <?php if( (!$autoSave) and ($editable) ) { ?>
         <a href="#" id="all_save" title="<?php echo Yii::t('Dashboard', 'Guardar')?>">
            <?php echo CHtml::image("$url/save.png");?>
         </a>
        <?php } ?>
        <?php if($editable) { ?>
         <a href="<?php echo "$resetUrl";?>" title="<?php echo Yii::t('Dashboard', 'Restaurar Inicialmente')?>">
            <?php echo CHtml::image("$url/restore.png");?>
         </a>
        <?php } ?>

        <!-- Save message -->
        &nbsp;&nbsp;
        <span id="msgSave" style="display:none; margin-left: 30px;">
            <?php echo Yii::t('Dashboard', 'Guardado.')?>
        </span>

        <!-- Restore default message -->
        <?php if ( Yii::app()->user->hasFlash('resetDashboard')) { ?>
        <span style="margin-left: 30px;"
              onmouseover="$(this).delay(500).hide('slow'); return false;">
        <?php echo Yii::app()->user->getFlash('resetDashboard'); ?>
        </span>
        <?php } ?>
    </div>
    <?php } ?>

<div id='dashboard'>
 <table id="dash-column"><tr>
    <?php
    //foreach($portlets as $column)
    for($i=0; $i < $columns; $i++)
    { ?>
        <td style="vertical-align: top; width:<?php echo floor(100 / $columns) ?>%;">
        <?php
        if( !empty ($portlets[$i]) ) {
         foreach($portlets[$i] as $row) {
        ?>
            <div class="dash-portlet" id="<?php echo $row['id'] ?>">
                <div class="dash-portlet-header"><?php echo $row['title'] ?></div>
                <div class="dash-portlet-content"><?php echo $row['content'] ?></div>
            </div>
    <?php }} ?>
        </td>
<?php } ?>
    </tr></table>
</div>

<?php echo $contentAfter; ?>