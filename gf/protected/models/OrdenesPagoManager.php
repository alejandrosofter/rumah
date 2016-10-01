<?php
class OrdenesPagoManager extends TabularInputManager
{
 
    protected $class='OrdenesPagoVencimientos';
 
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
        $criteria->addNotInCondition('idOrdenPagoVencimiento', $itemsPk);
        $criteria->addCondition("idOrdenPago= {$model->idFacturaEntrante}");
 
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
        $item->idOrdenPago=$model->idOrdenPago;
 
    }
 
 
}

?>