<?php
class OrdenesCobroManager extends TabularInputManager
{
 
    protected $class='OrdenesCobroVencimientos';
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else 
            return array(
                'n0'=>new OrdenesPagoVencimientos,
            );
    } 
 
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
//        $criteria->addNotInCondition('idOrdenCobroVencimiento', $itemsPk);      
         $criteria->addNotInCondition('idOrdenCobroFacturas', $itemsPk);
        $criteria->addCondition("idOrdenCobro= {$model->idFacturaSaliente}");
 
        OrdenesPagoVencimientos::model()->deleteAll($criteria); 
    }
 
 
    public static function load($model)
    {
        $return= new OrdenesPagoManager;
        foreach ($model->items as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->idOrdenCobro=$model->idOrdenCobro;
 
    }
 
 
}

?>