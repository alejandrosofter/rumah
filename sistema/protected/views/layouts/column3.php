<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="content">
        <div class="row">
        <div class="span4">
        <h3><? echo CHtml::image('images/gfox3.png') ?></h3>
             <?php
			
			$this->widget('ext.emenu.EMenu', array(//'theme'=>'vimeo',
				'items'=>Yii::app()->params['menuPrincipal'],'id'=>'menuLateral','vertical'=>true
				//'htmlOptions'=>array('id'=>'menu'),
			));
			
		?>
            <h5>Bitacora</h5>
             <?php
			$this->renderPartial('/stock/direcciones',array());
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,'id'=>'menu',
				'htmlOptions'=>array('id'=>'menu'),
			));
			
		?>
		
          </div>
          <div class="span12">
                
            <?php echo $content; ?>
          </div>
          
        </div>
      </div>
</div>
<?php $this->endContent(); ?>
