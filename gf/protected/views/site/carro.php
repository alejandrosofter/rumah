<h1>CARRO</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(

	'dataProvider'=>$datos,

	'columns'=>array(

		array(
            'name' => 'username',
            'type' => 'raw',
            'value' => 'CHtml::encode($data["username"])'

        ),

	),
)); ?>