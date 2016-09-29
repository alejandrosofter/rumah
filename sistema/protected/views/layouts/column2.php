<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    
	<div class="content">
        <div class="row">
        <div class="span4">
        <h3><? echo CHtml::image('images/gfox3.png') ?></h3>
        
             <?php
//			$this->widget('ext.efgmenu.EFgMenu',array(
//    'bDev'=>true,
////    'id'=>'menuuuuu',
//    'items'=>Yii::app()->params['menuPrincipal'],
//    'menubarOptions' => array(
//        'direction'=>'vertical',
//        'flyOut'=>true
//    )
//));
			$this->widget('ext.emenu.EMenu', array(//'theme'=>'vimeo',
				'items'=>Yii::app()->params['menuPrincipal'],'id'=>'menuLateral','vertical'=>true
				//'htmlOptions'=>array('id'=>'menu'),
			));
			
		?>
        <h4><?php if(count($this->menu)!=0)echo 'Menu de Ayuda' ?></h4>
             <?php
			//$this->renderPartial('/stock/direcciones',array());
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,'id'=>'menu',
				'htmlOptions'=>array('id'=>'menu'),
			));
			
		?>
            <?php
            if(isset($this->extra)){
                if(isset($this->rutaFormulario))
                $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->rutaFormulario),
	'method'=>'post',
)); 
                echo $this->extra;
                if(isset($this->rutaFormulario))  $this->endWidget();
            }
            ?>
		
          </div>
          <div class="span12">
                
            <?php echo $content; ?>
          </div>
         
        </div>
      </div>
    
</div>
<?php $this->endContent(); ?>
