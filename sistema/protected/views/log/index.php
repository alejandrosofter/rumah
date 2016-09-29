<?php
$this->breadcrumbs=array(
	'Logs',
);

$this->menu=array(
	array('label'=>'Create Log', 'url'=>array('create')),
	array('label'=>'Manage Log', 'url'=>array('admin')),
);
?>

<h1>Logs</h1>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$model->search(),
'filter'=>$model,
    'ajaxUpdate'=>false,
    'template'=>'{summary}{items}{pager}',
    
    'pager'=>array(
        'maxButtonCount'=>'7',
    ),
   
));
?>
