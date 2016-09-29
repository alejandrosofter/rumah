<?php
class ImpresionOrdenManager extends TabularInputManager
{
 
    protected $class='RutinasImpresiones';
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else 
            return array(
                //'n0'=>new ItemsFacturaSaliente,
            );
    }
    
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('idItemsFacturaSaliente', $itemsPk);
        $criteria->addCondition("idFacturaSaliente= {$model->idFacturaSaliente}");
 
        //ventas
        ItemsFacturaSaliente::model()->deleteAll($criteria); 
//        ComprasItems::model()->deleteAll($criteria); 
    }
 
 
    public static function load($model)
    {
        $return= new ItemsFacturaSalienteManager;
        foreach ($model->items as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->idFacturaSaliente=$model->idFacturaSaliente;
 
    }
 
 
}

?>