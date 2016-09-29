<?php
class PresupuestoItemsManager extends TabularInputManager
{
 
    protected $class='PresupuestoItems';
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else 
            return array(
//                'n0'=>new PresupuestoItems,
            );
    }
    
    
 
    public function agregar($item)
    {
    	$num=$this->getLastNew()+1;
    	$indice='n'.$num;
//    	$this->setLastNew($this->getLastNew()+1);
    	$items=$this->getItems();
    	$items[$indice]=$item;
    	$this->setItems($items);
    	Yii::app()->user->setFlash('success',"Producto Agregado!");
    }
     
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('idItemPresupuesto', $itemsPk);
        $criteria->addCondition("idPresupuesto= {$model->idPresupuesto}");
 
        PresupuestoItems::model()->deleteAll($criteria); 
    }
 
 
    public static function load($model)
    {
        $return= new PresupuestosManager;
        foreach ($model->items as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->idPresupuesto=$model->idPresupuesto;
 
    }
 
 
}

?>